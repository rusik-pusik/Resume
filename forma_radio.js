

function getFormName() // Выдает имя активной формы
{
    let FormName = "unknown";
    if(LS.getItem('form')){
        let forma =JSON.parse(LS.getItem('form'));
        FormName=forma["name"];
    }
    return FormName;
}


// Дождитесь события "DOMContentLoaded", чтобы убедиться, что весь DOM был загружен
document.addEventListener('DOMContentLoaded', function () {
  (function($) {
    // Объявление плагина jQuery с именем iComputerSlide и передачей параметра options.
    $.fn.iComputerSlide = function(options) {
        
        // Настройки по умолчанию, которые могут быть переопределены параметрами options.
        options = $.extend({
            height: 200,    // Высота элемента по умолчанию
            btnClose: "Close",  // Текст кнопки "Закрыть" по умолчанию
            btnOpen: "Open"     // Текст кнопки "Открыть" по умолчанию
        }, options);
  
        // Функция makeWrap создает обертку для элемента, добавляя кнопки "Закрыть" и "Открыть".
        makeWrap = function($element, options) {
            return '<div class="io_item">' +
                '<div class="io_item_wrap" style="max-height:' + options.height + 'px">' + $element[0].outerHTML +
                '<div class="io_trans"></div>' +
                '</div>' +
                '<div class="io_button_wrap">' +
                '<a class="io_button btn_close">' + options.btnClose + '</a>' +
                '<a class="io_button btn_open">' + options.btnOpen + '</a>' +
                '</div>' +
                '</div>';
        };
  
        // Обработчик события клика на кнопках "Закрыть" и "Открыть" для переключения класса "open".
        $(document).on("click", ".io_button", function() {
            $(this).parents(".io_item").toggleClass("open");
        });
  
        // Для каждого элемента, на который применяется плагин, заменяется содержимое на созданную обертку.
        return this.each(function() {
            var $element = $(this);
            $element.replaceWith(makeWrap($element, options));

        });
    };
  })(jQuery);
  
  // После загрузки страницы выполнится следующий блок кода.
  $(function() {
    // 1. Сохраните состояния радио до применения плагина.

  
  // 2. Примените плагин для изменения структуры элементов.
  $(".item_text").iComputerSlide({
    height: 150,
    btnClose: "Свернуть",
    btnOpen: "Раскрыть"
  });
  // Обновленный обработчик события "change" для радио
  $(".item_text .radio .checkbox").on("change", function() {
    const radio = $(this);
    const storageKey = `${formName}_${radio.attr('id')}`;
    localStorage.setItem(storageKey, radio.prop('checked').toString());
  });

  // Восстановить состояние радио из Local Storage после загрузки страницы
  $(".item_text .radio .checkbox").each(function() {
    const radio = $(this);
    const storageKey = `${formName}_${radio.attr('id')}`;
    const storedValue = localStorage.getItem(storageKey);
    if (storedValue !== null) {
      const isChecked = storedValue === 'true';
      radio.prop('checked', isChecked);
    }
  });

  });


  // Получение имени активной формы с помощью функции getFormName()
  const formName = getFormName(); // Получить имя активной формы (предположим, что у вас есть такая функция)

  if (formName) {
    // Проверка поддержки localStorage в текущем браузере
    if (typeof localStorage !== 'undefined') {
      // Получение всех чекбоксов на странице
      const checkboxes = document.querySelectorAll('.checkbox');

      checkboxes.forEach(checkbox => {
        const storageKey = `${formName}_${checkbox.id}`;
        const storedValue = localStorage.getItem(storageKey);
      
        // Убедитесь, что чекбокс существует в сохраненных данных
        if (storedValue !== null) {
          // Если значение найдено в localStorage, установите состояние чекбокса
          const isChecked = storedValue === 'true';
          checkbox.checked = isChecked;
        } else {
          // Если значения не найдено в localStorage, сбросьте состояние чекбокса
          checkbox.checked = false;
        }
      
        // Обновление визуального состояния чекбокса
        updateCheckboxState(checkbox);
      });
      

      // Добавление обработчика события "change" на документ, чтобы отслеживать изменения состояния чекбоксов
      document.addEventListener("change", function(event) {
        if (event.target.classList.contains('checkbox')) {
          const checkbox = event.target;

          // Обновление визуального состояния чекбокса
          updateCheckboxState(checkbox);

          // Сохранение состояния чекбокса в localStorage, связанного с формой
          const storageKey = `${formName}_${checkbox.id}`;
          localStorage.setItem(storageKey, checkbox.checked.toString());
        }
      });

      // Функция для обновления визуального состояния чекбокса
      function updateCheckboxState(checkbox) {
        const checkboxParent = checkbox.parentNode;
        if (checkbox.checked) {
          checkboxParent.classList.add('checked');
        } else {
          checkboxParent.classList.remove('checked');
        }
      }

      // Вывод имени активной формы в консоль
      console.log(`Активная форма: ${formName}`);
    } else {
      // Вывод сообщения, если localStorage не поддерживается в текущем браузере
      console.log("localStorage не поддерживается в этом браузере.");
    }
  } else {
    // Вывод сообщения, если имя активной формы не определено
    console.log("Активная форма не определена.");
  }
});




/*

const form = document.getElementById('form1');
const formFileds = form.elements;

const submitBtn = form.querySelector('[type=""submit]');
 submitBtn.addEventListener('click',clearStorage);

 for (let i = 0; i < formFileds.length; i++){
    formFileds[i].addEventListener('change',changeHandler)
 }

function clearStorage(){
    localStorage.clear();
}
function changeHandler(){
    if (this.type !== 'checkbox'){
        console.log(this.name,this.value)
        localStorage.setItem(this.name, this.value)
    }else{
        console.log(this.name, this.checked)
        localStorage.setItem(this.name, this.checked)
    }    
}*/
