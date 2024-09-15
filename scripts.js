// let inputtext=document.querySelector('.inputText');
//     submitForm=document.querySelector('.submitForm');
//     information=document.querySelectorAll('.searchDiv');

//     searchFunction=(text)=>{
//         information.forEach((element)=>{
//             if(element.textContent==text){
//             element.style="animation:animationElement 2s;";
//             console.log(element);
//             }
//         });
//     }
// submitForm.addEventlistener('click',(e)=>{
//     e.preventDefault();
//     searchFunction(inputText.value);
// });

// Функция для обновления классов в зависимости от размера экрана
function updateClassBasedOnScreenSize() {
  var myDivElements = document.querySelectorAll(".myDiv");
  if (myDivElements.length > 0) {
    myDivElements.forEach(function(myDiv) {
      if (window.innerWidth >= 1200) {
        myDiv.classList.remove("col-md-4");
        myDiv.classList.add("col-md-3");
      } else {
        myDiv.classList.remove("col-md-3");
        myDiv.classList.add("col-md-4");
      }
    });
  }
  if (myDivElements.length > 0) {
    myDivElements.forEach(function(myDiv) {
      if (window.innerWidth >= 1500) {
        myDiv.classList.remove("col-md-3");
        myDiv.classList.add("col-md-2");
      } else {
        myDiv.classList.remove("col-md-2");
        myDiv.classList.add("col-md-3");
      }
    });
  }
  if (myDivElements.length > 0) {
    myDivElements.forEach(function(myDiv) {
      if (window.innerWidth >= 3240) {
        myDiv.classList.remove("col-md-2");
        myDiv.classList.add("col-md-1");
      } else {
        myDiv.classList.remove("col-md-1");
        myDiv.classList.add("col-md-2");
      }
    });
  }
}
document.addEventListener("change", function() {
  // Вызываем функцию при изменении формы
  updateClassBasedOnScreenSize();
});

// Вызываем функцию при загрузке страницы и при изменении размера окна
document.addEventListener("DOMContentLoaded", function() {
  updateClassBasedOnScreenSize();
  
});

window.addEventListener("resize", function() {
  updateClassBasedOnScreenSize();

});


  // Вызываем функцию при загрузке страницы и при изменении размера окна для 4K
//   document.addEventListener("DOMContentLoaded", updateClassBasedOnScreenSize4K);
//   window.addEventListener("resize", updateClassBasedOnScreenSize4K);
// Добавляем слушатель событий для изменения формы

// const controls = document.getElementById('controls');
// controls.addEventListener('change', e => {
//   toggleColumn(e.target.dataset.columnClass);
// });

// function toggleColumn(columnClass) {
// 	const cells = document.querySelectorAll(`.${columnClass}`);
  
//   cells.forEach(cell => {
//   	cell.classList.toggle('hidden');
//   });
// }






// $(document).ready(function() {
//     var table = $('#myTable').DataTable();
  
//     // добавляем блок управления таблицей
//     var tableControls = $('<div id="table-controls"></div>').insertBefore('#myTable_wrapper');
  
//     // добавляем кнопки для скрытия/показа каждого столбца
//     $('#myTable thead th').each(function() {
//       var columnIndex = $(this).index();
//       var columnName = $(this).text();
//       var button = $('<button class="toggle-button">Hide ' + columnName + '</button>');
//       button.appendTo(tableControls);
  
//       // обработчик события нажатия на кнопку скрытия/показа столбца
//       button.click(function() {
//         var column = table.column(columnIndex);
//         column.visible(!column.visible());
//         button.text(column.visible() ? 'Hide ' + columnName : 'Show ' + columnName);
//       });
//     });
  
//     // добавляем кнопку для скрытия/показа всех столбцов
//     var toggleAllButton = $('<button id="toggle-all-button">Hide All</button>');
//     toggleAllButton.appendTo(tableControls);
  
//     // обработчик события нажатия на кнопку скрытия/показа всех столбцов
//     toggleAllButton.click(function() {
//       var visible = table.columns().visible();
//       table.columns().visible(!visible);
//       toggleAllButton.text(visible ? 'Show All' : 'Hide All');
//       $('.toggle-button').each(function() {
//         var columnName = $(this).text().replace(/(Hide|Show)\s/, '');
//         $(this).text(visible ? 'Show ' + columnName : 'Hide ' + columnName);
//       });
//     });
//   });