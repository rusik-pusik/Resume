let FormName = "unknown";
function getFormName() // Выдает имя активной формы
{
  let FormName = "unknown";
    if(LS.getItem('form')){
        let forma =JSON.parse(LS.getItem('form'));
        FormName=forma["name"];
    }
    return FormName;
}

document.addEventListener('DOMContentLoaded', function () {
  // Вызываем функцию ClearFormData() (предполагается, что она определена где-то в вашем коде)


  const formName = getFormName(); // Получаем имя активной формы

  if (formName) {
    // Проверяем поддержку localStorage в текущем браузере
    if (typeof localStorage !== 'undefined') {
      const radios = document.querySelectorAll('.radio');

      radios.forEach(radio => {
        getFormName(); 
        const formName = getFormName(); 
        const storageKey = `${formName}_${radio.id}`;
        const storedValue = localStorage.getItem(storageKey);

        // Убеждаемся, что радиокнопка существует в сохраненных данных
        if (storedValue !== null) {
          // Если значение найдено в localStorage, устанавливаем состояние радиокнопки
          const isChecked = storedValue === 'true';
          radio.checked = isChecked;
        } else {
          // Если значения не найдено в localStorage, сбрасываем состояние радиокнопки
          radio.checked = false;
        }

        // Обновляем визуальное состояние радиокнопки
        updateradioState(radio);
      });

      // Присоединяем слушатель события change для радиокнопок
      document.addEventListener("change", function(event) {
        radioclear(event, formName);
      });

      // Выводим имя активной формы в консоль
      console.log(`Активная форма: ${formName}`);
    } else {
      // Выводим сообщение, если localStorage не поддерживается в текущем браузере
      console.log("localStorage не поддерживается в этом браузере.");
    }
  } else {
    // Выводим сообщение, если имя активной формы не определено
    console.log("Активная форма не определена.");
  }
});

// Функция для обновления визуального состояния радиокнопки
function updateradioState(radio) {
  const radioParent = radio.parentNode;
  if (radio.checked) {
    radioParent.classList.add('checked');
  } else {
    radioParent.classList.remove('checked');
  }
}
function saveFormData() {
  var date = document.getElementById("airdatepicker").value;
  localStorage.setItem("formData", date);
}

function loadFormData() {
  var savedData = localStorage.getItem("formData");
  document.getElementById("airdatepicker").value = savedData;
}
async function radioclear(event, formName) {
  let logstr = "Завершаем radioclear"; // Проверить вызовы - не всегда существует event.target
  
  if (!event || !event.target) {
    console.log("Event or event.target is undefined.");
    return;
  }



    if (event.target.classList.contains('radio')) {
      const radio = event.target;
   
  
      // Удаление класса "checked" у всех радиокнопок в группе
      const radioGroup = document.querySelectorAll(`input[type="radio"]`);
      radioGroup.forEach(function(radioBtn) {
        const storageKey = `${formName}_${radioBtn.id}`;
        const radioParent = radioBtn.parentNode;
  
        if (radioBtn !== radio) {
          // Убираем класс "checked" у предыдущего радиокнопки
          radioParent.classList.remove('checked');
  
          // Снимаем чек с предыдущего радиокнопки и обновляем localStorage
          radioBtn.checked = false;
          localStorage.setItem(storageKey, 'false');
        }
        logstr += "\n В локальном хранилище по ключу " + storageKey + " лежит " + localStorage.getItem(storageKey);
      });
  
      // Обновление визуального состояния текущей радиокнопки
      updateradioState(radio);

      // Сохранение состояния текущей радиокнопки в localStorage
      const storageKey = `${formName}_${radio.id}`;
      localStorage.setItem(storageKey, radio.checked.toString());
      logstr += "\n В локальном хранилище по ключу " + storageKey + " лежит " + localStorage.getItem(storageKey);
    }
 
 
  console.log(logstr);
}


function ClearFormData1() {
  document.querySelector('#buttonClear').onclick = function() {
    // Убрать состояние радиокнопок
    const radio = document.querySelectorAll('.radio');
    radio.forEach(radio => {
      const radioParent = radio.parentNode;
      radio.checked = false;
      radioParent.classList.remove('checked');
    });
    const checkboxes = document.querySelectorAll('.checkbox');
    checkboxes.forEach(checkbox => {
      const checkboxParent = checkbox.parentNode;
      checkbox.checked = false;
      checkboxParent.classList.remove('checked');
    });
    // Очистить Local Storage полностью
    localStorage.clear();

    alert('Настройки очищены');
  };
}
document.addEventListener("change", function() {
  // Вызываем функцию при изменении формы
  getFormName(); 
  const formName = getFormName(); 
  radioclear(formName);
});

// Вызываем функцию при загрузке страницы и при изменении размера окна
document.addEventListener("DOMContentLoaded", function() {
  getFormName(); 
  const formName = getFormName(); 
  radioclear(formName);
  
});

window.addEventListener("resize", function() {
  getFormName(); 
  const formName = getFormName(); 
  radioclear(formName);

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
