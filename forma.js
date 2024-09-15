
function getFormName() // Выдает имя активной формы
{
  let FormName = "unknown";
    if(LS.getItem('form')){
        let forma =JSON.parse(LS.getItem('form'));
        FormName=forma["name"];
    }
    return FormName;
}


document.addEventListener('DOMContentLoaded',function()
{
  let formData = {}; // объявляем formData здесь, чтобы она была доступна во всем коде
  let FormName = "unknown";
    ClearFormData();
    const form= document.querySelector('form'); // Получили форму
    const LS= localStorage; // Доступ к localStorage
    FormName=getFormName();

    // получить данные из input
    form.addEventListener('input', function(event){ // Обработчик нажатия на элемент формы
        
        let itemData={}; // пустой объект
        if (FormName in formData)
        {
            itemData=formData[FormName]; // Если существуют данные для этой формы, то получаем их
        }else{
            formData[FormName]={};
            itemData=formData[FormName];
        }

        let key  = event.target.name;//создаем значение для ключа по имени активного элемент
        if (key.indexOf("[]")>0) // Если это массив
        {
            itemData[event.target.name] = []; // Пишем в itemData ключ по массиву
            let mas = form.elements[key]; 
            for(let i=0;i<mas.length;i++) // Проставляем элементы массива
            {
                if(mas[i].checked) {itemData[event.target.name].push(mas[i].value);} // То что отмечено, забиваем в массив
            }
        }else{ // Если не массив
            itemData[event.target.name]= event.target.value; // Делаем как было - сохряняем в formData значения элемента
        }
        LS.setItem('formData',JSON.stringify(formData)); // Сохраняем обратно
    });

    // восстановить
    let itemData={}; // создание пустого объекта для хранения данных формы

if(LS.getItem('formData')){ // проверка наличия данных формы в локальном хранилище
  formData =JSON.parse(LS.getItem('formData')); // получение данных формы и преобразование их в объект
  if(LS.getItem('form')){ // проверка наличия имени текущей формы в локальном хранилище
    FormName=getFormName(); // получение имени текущей формы
    if (FormName in formData) // проверка наличия данных текущей формы в объекте данных форм
    {
      itemData = formData[FormName]; // получение данных текущей формы и сохранение их в объекте itemData
    }
  }
  
  // заполнение полей формы данными из объекта itemData
  for(let key in itemData)
  {
    if (key.indexOf("[]")>0) // если ключ содержит символ [], это означает, что это массив
    {
      let masName=key; // сохранение имени массива в переменной masName
      let mas = form.elements[masName]; // получение элементов формы, соответствующих массиву
      for(let i = 0;i < mas.length;i++) // перебор элементов массива
      {
        for(let j=0;j<itemData[key].length;j++) // перебор значений массива, сохраненных в itemData
        {
          if (mas[i].value==itemData[key][j]) // если значение элемента формы соответствует значению из itemData
          {
            mas[i].checked=true; // установка флага checked
          }
        }
      }
    }
    if(form.elements[key].type==='checkbox'&&itemData[key]==='on') // если элемент формы - это флажок и его значение равно "on"
    {
      form.elements[key].checked =true; // установка флага checked
    }
    else 
    {
      form.elements[key].value =itemData[key]; // установка значения элемента формы
    }
  }
}
})
function ClearFormData() // Почистить formData
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
}

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
