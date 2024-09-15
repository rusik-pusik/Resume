document.addEventListener('DOMContentLoaded',function()
{
    document.querySelector('#buttonClear').onclick = function(){
        const LS= localStorage;
        let formName = getFormName(); // получить имя активной формы
        let formData = {}; // создать пустой объект formData
        if (LS.getItem('formData')) { // если есть сохраненные данные formData
            formData = JSON.parse(LS.getItem('formData')); // получить их и преобразовать в объект
        }
        if (formData[formName]) { // если есть сохраненные данные для текущей формы
            formData[formName] = {}; // создать пустой объект для сохранения данных формы
            LS.setItem('formData', JSON.stringify(formData)); // сохранить пустой объект в локальное хранилище
            alert('Настройки очищены');
        }
    }
})

// document.querySelector('#buttonClear').onclick = function(){
//     localStorage.clear();
//     alert('Настройки очищены');
// }


// $(document).ready(function() {
//     var loadedSettings = JSON.parse(localStorage.getItem('visibilitySettings')) || {};
//     console.log('visibilitySettings after loading:', loadedSettings);
    
//     table.columns().every(function(index) {
//       this.visible(loadedSettings[index] !== false);
//     });
  
//     // Create toggle buttons and set initial state
//     var tableControls = $('<div id="table-controls"></div>').insertBefore('#mytable_wrapper');
//     var toggleAllButton = $('<button class=" btn-sm btn btn-outline-dark" id="toggle-all-button">ВЫКЛ ВСЁ</button>');
//     toggleAllButton.appendTo(tableControls);
//     table.columns().every(function() {
//       var columnIndex = this.index();
//       var columnName = this.header().textContent.trim();
//       var button = $('<button class="toggle-button btn-sm btn btn-outline-dark" data-column="' + columnIndex + '">ВЫКЛ ' + columnName + '</button>');
//       button.appendTo(tableControls);
//       var column = table.column(columnIndex);
//       button.text(column.visible() ? 'ВЫКЛ ' + columnName : 'ВКЛ ' + columnName);
//     });
  
//     $('.toggle-button').click(function() {
//       // Code for handling button clicks
//     });
  
//     toggleAllButton.click(function() {
//       // Code for handling "toggle all" button clicks
//     });
  
//     // Save visibility settings to local storage on button click
//     document.querySelector('#table-controls').onclick = function() {
//       var visibilitySettings = {};
//       table.columns().every(function(index) {
//         var column = this;
//         visibilitySettings[index] = column.visible();
//       });
//       console.log('visibilitySettings before saving:', visibilitySettings);
//       localStorage.setItem('visibilitySettings', JSON.stringify(visibilitySettings));
//     };
//   });