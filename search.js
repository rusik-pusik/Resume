// window.onload = () => {//страница прогрузилась
//     let input = document.querySelector('#input');//получаем доступ к поисковику
//     input.output = function(){//создаем функцию
//         let cellValue = this.cellValue.trim();//отлавливаем введенное значение
//         let list = document.querySelectorAll('#content');//обращаемся к коллекции данных 
//         if(cellValue != ''){
//             list.forEach(elem =>{//создаем список
//                 if(elem.innerText.search(cellValue)== -1){//сравнивает текст с значение в value и если совпадение найденно то добавляется новый класс
//                     elem.classList.add('hide');
//                 }
//             });
//         }else{
//             list.forEach(elem =>{
//                 elem.classList.remove('hide')//для отладки
//             });
//         }
//         console.log(this.cellValue);//выводит полученные значения
//     }
    
// }