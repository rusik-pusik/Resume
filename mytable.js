$(document).ready(function() {
	function getFormName() {
	  let FormName = "unknown";
	  if (LS.getItem('form')) {
		let forma = JSON.parse(LS.getItem('form'));
		FormName = forma["name"];
	  }
	  return FormName;
	}
  var table = $('#mytable').DataTable({
    "scrollY": true,
    "scrollX": true,
    "pageLength": 25,
    "scrollCollapse": true,
    "fixedHeader": true,
    "language": {
        "url": "/js/Russian.json"
    },
    "dom": 
        '<"container-fluid"<"row"<"col"l><"col"><"col"><"col"f><"col"<"dt-buttons" B>>>>' +
        't' +
        '<"container-fluid"<"row"<"col"i><"col"p>>>',
    "buttons": [
        'copy', 'csv', 'excel'
    ]
});
$.getJSON('/js/Russian.json', function() {
// Добавьте обработчик клика на кнопку экспорта
// $('#exportButton').click(function() {
//     // Получите данные таблицы в массиве объектов
//     var data = table.rows().data().toArray();

//     // Преобразуйте данные в формат Excel
//     var header = table.columns().header().toArray().map(function(column) {
//       return $(column).text();
//     });
//     var workbook = XLSX.utils.book_new();
//     var worksheet = XLSX.utils.json_to_sheet(data, { header: header });
//     XLSX.utils.book_append_sheet(workbook, worksheet, 'Sheet1');

//     // Сохраните файл Excel на диск пользователя
//     var filename = 'table.xlsx';
//     XLSX.writeFile(workbook, filename);
//   });
var loadedSettings = JSON.parse(localStorage.getItem(getFormName())) || {};
console.log('visibilitySettings after loading:', loadedSettings);

// Установка видимости столбцов в соответствии с загруженными настройками
table.columns().every(function(index) {
  this.visible(loadedSettings[index] !== false);
});

// Создание и добавление контейнера для кнопок управления таблицей
var tableControls = $('<div id="table-controls"></div>').insertBefore('#mytable_wrapper');
var toggleAllButton = $('<button class="btn-sm btn btn-outline-dark" id="toggle-all-button">ВСЁ</button>');
toggleAllButton.appendTo(tableControls);

// Установка видимости каждого столбца и создание кнопок для переключения видимости
table.columns().every(function() {
  var columnIndex = this.index();
  var columnName = this.header().textContent.trim();

  var button = $('<button class="toggle-button btn-sm btn btn-outline-dark" data-column="' + columnIndex + '">' + columnName + '</button>');

  // Добавление обработчика события нажатия на каждую кнопку
  button.click(function() {
    var column = table.column(columnIndex);
    column.visible(!column.visible());

    // Изменение цвета фона кнопки в зависимости от видимости
    button.css('background-color', column.visible() ? 'lightblue' : 'transparent');

    button.text(column.visible() ? '' + columnName : '' + columnName);
    toggleAllButton.text(table.columns(':visible').length ? 'ВСЁ' : 'ВСЁ');
	
	
    table.draw();
  });
  button.addClass('button-hover');
  // Установка начального цвета фона кнопки в зависимости от видимости
  button.css('background-color', this.visible() ? 'lightblue' : 'transparent');

  button.appendTo(tableControls);

  var column = table.column(columnIndex);
  button.text(column.visible() ? '' + columnName : '' + columnName);
});

// Стилизация кнопок с помощью CSS
var css = `
  .button-hover:hover {
    color: gray !important;
  }
  #toggle-all-button {
    background-color: ${table.columns(':visible').length ? 'transparent' : 'lightblue'};
    color: ${table.columns(':visible').length ? 'black' : 'black'};
  }
`;
$('<style>').text(css).appendTo('head');

// Обработчик события нажатия на кнопку "ВЫКЛ ВСЁ"
toggleAllButton.click(function() {
  var visible = table.columns().visible();
  visible = visible.map(function(e) {
    e.data = !e.data;
    return e;
  });

  table.columns().visible(visible);

  let visible_check = table.columns().visible();
  let allVisible = true;

  for (let i = 0; i < visible.length; i++) {
    if (!visible[i]) {
      allVisible = false;
      break;
    }
  }

  // Изменение текста и стилей кнопок в зависимости от видимости всех столбцов
  let buttonText = allVisible ? 'ВСЁ' : 'ВСЁ';
  $(this).text(buttonText);

  $('.toggle-button').each(function() {
    var columnIndex = $(this).data('column');
    var column = table.column(columnIndex);
    $(this).text(allVisible ? '' + column.header().textContent.trim() : '' + column.header().textContent.trim());
    $(this).css('background-color', allVisible ? 'transparent' : 'lightblue');
  });

  // Установка видимости всех столбцов
  if (allVisible) {
    table.columns().visible(false);
  } else {
    table.columns().visible(true);
  }
  table.columns.adjust().draw();
});

// Обработчик события клика на области контролов таблицы
document.querySelector('#table-controls').onclick = function() {
  var visibilitySettings = {};

  // Сохранение текущих настроек видимости столбцов
  table.columns().every(function(index) {
    var column = this;
    visibilitySettings[index] = column.visible();
  });

  console.log('visibilitySettings before saving:', visibilitySettings);

  var FormName = getFormName();
  localStorage.setItem(FormName, JSON.stringify(visibilitySettings));
};
});
});

	function ClearFormData() // Почистить formData
{
    document.querySelector('#buttonClear').onclick = function(){
        const LS= localStorage;
        let FormName = getFormName(); // получить имя активной формы
        let formData = {}; // создать пустой объект formData
        if (LS.getItem('formData')) { // если есть сохраненные данные formData
            formData = JSON.parse(LS.getItem('formData')); // получить их и преобразовать в объект
        }
        if (formData[FormName]) { // если есть сохраненные данные для текущей формы
            formData[FormName] = {}; // создать пустой объект для сохранения данных формы
            LS.setItem('formData', JSON.stringify(formData)); // сохранить пустой объект в локальное хранилище
            alert('Настройки очищены');
        }
    }
}
// // Эта функция выполняется, когда документ готов
// $(document).ready(function() {
		
// 	// Получаем сохраненные настройки видимости или создаем пустой объект, если они не существуют
// 	var loadedSettings = JSON.parse(localStorage.getItem('visibilitySettings')) || {};
	
// 	// Выводим в консоль значения объекта loadedSettings после загрузки
// 	console.log('visibilitySettings after loading:', loadedSettings);
// 	// Устанавливаем начальную видимость столбцов на основе сохраненных настроек
// 	table.columns().every(function(index) {
// 		this.visible(loadedSettings[index] !== false);
// 	});
// 	// Этот код выполняется при клике на элемент с идентификатором "table-controls"
// 	document.querySelector('#table-controls').onclick = function() {
		
// 		// Создаем пустой объект, который будет использоваться для хранения состояния видимости столбцов в таблице
// 		var visibilitySettings = {};
		
// 		// Перебираем все столбцы таблицы и сохраняем их текущее состояние видимости в объекте visibilitySettings
// 		table.columns().every(function(index) {
// 			var column = this;
// 			visibilitySettings[index] = column.visible();
// 		});
		
// 		// Выводим в консоль значения объекта visibilitySettings перед сохранением
// 		console.log('visibilitySettings before saving:', visibilitySettings);
		
// 		// Сохраняем объект visibilitySettings в локальном хранилище браузера
// 		localStorage.setItem('visibilitySettings', JSON.stringify(visibilitySettings));
// 		// Обновляем текст кнопок на основе текущего состояния столбцов
		
// 	};
	
// });

// Данный код добавляет обработчик клика на кнопку "Hide All" в элементе с id "table-controls". При клике на кнопку, видимость всех столбцов в таблице DataTable инвертируется, то есть, если какие-то столбцы были видимы, то они становятся невидимыми, и наоборот.
// Далее, текст кнопки "Hide All" или "Show All" изменяется в зависимости от текущего состояния видимости столбцов. Кроме того, для каждой кнопки, которая отвечает за отдельный столбец, текст также изменяется в зависимости от его текущей видимости.
// Наконец, вызывается метод "columns.adjust().draw()", который перерисовывает таблицу после изменения видимости столбцов.
// В целом, данный код отвечает за скрытие/отображение столбцов таблицы DataTable и изменение текста на кнопках, которые управляют видимостью отдельных столбцов.