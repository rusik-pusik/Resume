<!DOCTYPE html>
<html lang="en">
<body>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>База знаний Инфосэл</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/fontello.css">
    <link rel="stylesheet" href="css/stele.css?vers=1">
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500&display=swap" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css" rel="stylesheet">
   
    <link rel="stylesheet" href="css/air-datepicker.css">
    <!-- bootstrap js -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.min.js" integrity="sha384-5h4UG+6GOuV9qXh6HqOLwZMY4mnLPraeTrjT5v07o347pj6IkfuoASuGBhfDsp3d" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.9/xlsx.full.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
    <script src="./js/apq.js?vers=1"></script>
    <script src="./js/forma.js?vers=13"></script>
    <script src="./js/tock.js?vers=22"></script>
    <script>




document.addEventListener("DOMContentLoaded", function() {
    // Выбираем все элементы списка <li> с атрибутом name="Tip_obor"
    const dropdowns = document.querySelectorAll('li[name="Tip_obor"]');
    
    // Функция для обновления цвета фона выпадающего списка
    function updateDropdownColor(dropdown, inputs) {
        let anyWithValue = false;
            
        // Перебираем все вложенные <input> элементы
        inputs.forEach(function(input) {
            // Проверяем, является ли элемент чекбоксом или радиокнопкой,
            // и если он отмечен и имеет значение, то устанавливаем флаг anyWithValue в true
            if ((input.type === "checkbox" || input.type === "radio") && input.checked && input.value !== "") {
                anyWithValue = true;
            } else if (input.type === "date" && input.value) {
                // Если элемент является полем для ввода даты и имеет значение, устанавливаем флаг anyWithValue в true
                anyWithValue = true;
            }
        });
            
        // Если есть элементы с заполненными значениями, устанавливаем красный цвет фона для выпадающего списка
        if (anyWithValue) {
            dropdown.style.background = "red";
        } else {
            // В противном случае удаляем стиль, чтобы вернуть исходный цвет фона
            dropdown.style.background = ""; // Удаление стиля для возврата цвета
        }
    }
    
    // Перебираем все выпадающие списки
    dropdowns.forEach(function(dropdown) {
        // Выбираем все вложенные <input> элементы, которые являются чекбоксами, радиокнопками или полями для ввода даты
        const inputs = dropdown.querySelectorAll('input[type="checkbox"], input[type="radio"], input[name="Data_vneseniya_izmenenij[]"]');
        
        // Для каждого <input> элемента добавляем обработчик события "change", который вызывает функцию updateDropdownColor
        inputs.forEach(function(input) {
            input.addEventListener("change", function() {
                updateDropdownColor(dropdown, inputs);
            });
        });
        
        // Вызываем функцию updateDropdownColor при загрузке страницы для установки начального цвета фона
        updateDropdownColor(dropdown, inputs); // Вызов при загрузке страницы
    });
});

    </script>
</head>



    <!-- здесь расположены фильтры -->
    <?php   
        $page = isset($_GET['page']) ? htmlspecialchars($_GET['page']) : 'meneg';
        if(isset($_GET['page'])){
            $page = $_GET['page'];
            $allowed_pages = ['meneg', 'ingener', 'servic','meneg_po'];
            if(in_array($page, $allowed_pages)){
                // допустимое значение параметра
            }else{
                // недопустимое значение параметра, обработка ошибки
            }
        }else{
            // параметр "page" не передан, загрузить страницу по умолчанию
        } 
        if( isset($_GET['page']))
        {
            if($_GET['page']=="meneg")
                require_once "meneg.php";
            if($_GET['page']=="ingener")
                require_once "ingener.php";
            if($_GET['page']=="servic")
                require_once "servic.php";
            if($_GET['page']=="meneg_po")
                require_once "meneg_po.php";
        }else{
            require_once "meneg.php";
        }
    ?>
    

    
    <script src="js/air-datepicker.js"></script>
    <script>
        new AirDatepicker('#airdatepicker', {
            isMobile: true,
            autoClose: false,
            position: 'right top',
            multipleDates: true,
            range: true,
            multipleDatesSeparator: ' - ',
            
           
            buttons: ['today', 'clear'],
            locale: {
                days: ['воскресенье','понедельник','вторник','среда','четверг','пятница','суббота'],
                daysShort: ['вск','пнд','втр','срд','чтв','птн','сбт'],
                daysMin: ['Вс','Пн','Вт','Ср','Чт','Пт','Сб'],
                months: ['Январь','Февраль','Март','Апрель','Май','Июнь','Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь'],
                monthsShort: ['Янв','Фев','Мар','Апр','Май','Июн','Июл','Авг','Сен','Окт','Ноя','Дек'],
                today: 'Today',
                clear: 'Clear',
                dateFormat: 'dd.MM.yyyy',
                timeFormat: 'hh:mm aa',
                firstDay: 0
            }
        });
    </script>
        <script>
        var menu_btn = document.querySelector("#menu-btn")
        var sidebar = document.querySelector("#sidebar")
        var container = document.querySelector(".my-container")
        menu_btn.addEventListener("click", () => 
        {
            sidebar.classList.toggle("active-nav")
            container.classList.toggle("active-cont")
        })
    </script>
    <script src="./js/mytable.js?vers=2"></script>
    
    <script>
// Остановка распространения события при кликах на флажки (checkbox) и метки (label)
// Находим все флажки внутри элементов с классом "dropdown-menu"
var checkboxes = document.querySelectorAll('.dropdown-menu input[type="checkbox"]');
// Добавляем обработчик события клика для каждого флажка
checkboxes.forEach(function(checkbox) {
  checkbox.addEventListener('click', function(event) {
    // Останавливаем распространение события клика (event propagation)
    event.stopPropagation();
  });
});

// Находим все метки внутри элементов с классом "dropdown-menu"
var labels = document.querySelectorAll('.dropdown-menu label');
// Добавляем обработчик события клика для каждой метки
labels.forEach(function(label) {
  label.addEventListener('click', function(event) {
    // Останавливаем распространение события клика (event propagation)
    event.stopPropagation();
  });
});
</script>

<script>
    // Stop event propagation for radio button and label clicks
    var radios = document.querySelectorAll('.dropdown-menu input[type="radio"]');
    radios.forEach(function(radio) {
        radio.addEventListener('click', function(event) {
            event.stopPropagation();
        });
    });

    var labels = document.querySelectorAll('.dropdown-menu label');
    labels.forEach(function(label) {
        label.addEventListener('click', function(event) {
            event.stopPropagation();
        });
    });
</script>
<?php
// Включаем файл script.php
include 'script.php';
?>
</body>

</html>