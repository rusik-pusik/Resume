<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Инфосэл</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script  src="./js/scripts.js?vers=99" ></script>
    <script src="js/popper.js" defer></script>
    <script src="js/bootstrap.min.js" defer></script>
    <script src="js/air-datepicker.js"></script>
    <link rel="stylesheet" href="css/air-datepicker.css">
 
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <script src="./js/forma1.js?vers=123" defer></script>
    <script src="./js/forma.js?vers=223" defer></script>
    <script src="./js/forma_radio.js?vers=259" defer></script>
    <link href="css/role.css?vers=56" rel="stylesheet">
    
    <script src="js/rome.js" defer></script>
<!-- <script src="js/main.js" defer></script> -->

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
        <style>
      /* Стили для красивого отображения */
#sidebar {
  background-color: #f8f9fa;
  /* border: 5px solid #ddd; */
  
  border-radius: 15px;
}
.animated-dropdown {
  transition: all 0.3s ease;
}
.dropdown-toggle {
    white-space: wrap;
}
.animated-dropdown.collapsed {
  transform: rotate(180deg);
}
.list-unstyled {
  padding-left: 0;
  list-style: none;
}
.subSubmenu2 {
  padding-left: 5%;
  list-style: none;
}
.pageSubmenu1 {
  padding-left: 5%;
  list-style: none;
}
.pageSubmenu2 {
  padding-left: 5%;
  list-style: none;
}
.pageSubmenu3 {
  padding-left: 5%;
  list-style: none;
}
.dropdown {
  position: relative;
  padding-left: 1.5em;
}

.dropdown-toggle {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;

}
.modal {
  z-index: 105000000; /* или больше, если требуется */
}
.dropdown-border{
  /* border-bottom: 1px solid #f0f0f0; подчеркивание */
  /* border-left: 1px solid #f0f0f0;
  border-right: 1px solid #f0f0f0;
  border-top: 1px solid #f0f0f0; */
  border-radius: 5px ;
}
.dropdown-toggle:hover {
  background-color: #f1f1f1;
}

.collapse {
  display: none;
}

.collapse.show {
  display: block;
}

.collapse .dropdown {
  position: relative;
  top: 0;
  left: 100%;
  display: none;
  background-color: #f9f9f9;
  box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
  z-index: 1;
}

.collapse .dropdown .dropdown-toggle {
  border-bottom: none; /* убираем подчеркивание для вложенного dropdown */
}

.collapse .dropdown .collapse {
  display: none;
}

.collapse .dropdown:hover .collapse {
  display: block;
}
.list-unstyled li a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  border-bottom: 1px solid #ddd; /* подчеркивание */
  transition: background-color 0.3s; /* плавное изменение цвета фона */
}

.list-unstyled li a:last-child {
  border-bottom: none; /* убираем подчеркивание для последнего элемента */
}

.list-unstyled li a:hover {
  background-color: #e9ecef; /* изменение цвета фона при наведении */
}
    </style>
     <style>
  /* Add this style to position the split button properly */
.btn-group {
    position: relative;
    display: inline-block;
}

/* Style for the split button */
.btn-group > .btn {
    position: relative;
    z-index: 2;
}

.btn-group > .btn + .btn {
    margin-left: -1px;
}

.btn-group > .btn:hover,
.btn-group > .btn:focus {
    z-index: 3;
}

/* Style for the dropdown toggle button */
.btn-group > .btn.dropdown-toggle-split {
    padding-right: 1.75rem; /* Adjust as needed */
    padding-left: 1.75rem;  /* Adjust as needed */
}

.btn-group > .btn.dropdown-toggle-split::after {
    margin-left: 0;
}

.btn-group > .btn.dropdown-toggle-split::after,
.btn-group > .btn.dropdown-toggle-split::before {
    display: none;
}

/* Style for the dropdown menu */
.btn-group > .btn + .dropdown-menu {
    margin-top: 0;
}
.div1 {     padding: 12px 16px; }
    </style>
    <!-- Custom styles for this template -->
    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">
    <!-- Custom styles for this template -->

<script src="./js/doci_script.js?vers=12"></script>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <form action="insert_index121.php" method="POST">
                <div class="form-group">
                    <label for="fileInput">Внесите данные файла </label>
                    <label for="fileInput">(прошу будьте внимательны, браузер скрывает путь файла ,поэтому прошу указывать его самостоятельно)</label>
                    <label for="fileInput">Путь файла вы можете найти в свойства файла</label>
                    <input type="file" class="form-control-file" id="fileInput" onchange="showFileInfo()">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="fileName" placeholder="Имя файла" name="name_doc" readonly>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="fileExtension" placeholder="Расширение файла" name="type" readonly>
                </div>
                <label for="fileInput">файл должен находиться в папке doci перед тем как быть добавлен на сайт</label>
                <div class="form-group">
                    <input type="text" class="form-control" id="filePath" placeholder="Путь к файлу" name="file_link">
                </div>
                <div class="form-group">
                    <label for="exampleDataLi151" class="form-label">Дата ввода</label>
                    <input class="form-control" id="exampleDataLi151" name="doc_date" value="<?php echo date('Y-m-d'); ?>" required placeholder="Введите дату">
                </div>
                <input class="btn btn-secondary" type="submit" name="Применить" id="butt_apply"></input>
            </form>
        </div>
        <div class="col-md-4">
            <form action="insert_index121.php" method="POST">
                <div class="mb-3">
                    <label for="fileInput">Внесите данные папок </label>
               
                    <?php
                    $server="127.0.0.1";
                    $user  ="root";
                    $pass  ="1";
                    $dbname ="bd_infocell_docs";
                    $dbtable ="doc";
                    $dbtable1 ="doc_tag";
                    $dbtable2 ="tag1";
                    $conn  = mysqli_connect($server, $user,$pass, $dbname);
                        // Используем prepared statements для защиты от SQL-инъекций
                        $query = 'SELECT DISTINCT  tag1.folder_level_1  FROM tag1 ORDER BY  folder_level_1 ASC';
                    
                        $data  = mysqli_query($conn, $query) or die('<br>Ошибка выполнения запроса');
                        if(mysqli_num_rows($data) > 0)
                        {
                            $numrows=mysqli_num_rows($data);// Для отладки
                            // echo "<br>Получены данные $numrows строк";
                            echo"<label for='example1'  class='form-label'>1 уровень папки</label>
                                    <input class='form-control' list='datalist1' name='folder_level_1' id='example1'  placeholder='Введите ссылку'>
                                        <datalist id='datalist1'>";  
                            while($row = mysqli_fetch_assoc($data))
                            {// Формируем таблицу  
                                    foreach ($row as $cellValue) {
                                        echo"<option value='$cellValue'>";
                                    };

                            }
                            echo"</datalist>";
                        }
                        else
                        {
                            // echo "<br>По запросу ничего не нашлось";
                            ?>
                            <tr>
                                <td>
                                    
                                </td>
                            </tr>
                            <?php
                        }
                    ?>
                </div>
                <div class="mb-3">
                    <?php
                        // Используем prepared statements для защиты от SQL-инъекций
                        $query1 = 'SELECT DISTINCT  tag1.folder_level_2  FROM tag1 ORDER BY BINARY folder_level_2 ASC';
                        // echo  "Сформировали запрос $query1";
                        $data1  = mysqli_query($conn, $query1) or die('<br>Ошибка выполнения запроса');
                        if(mysqli_num_rows($data1) > 0)
                        {
                            $numrows=mysqli_num_rows($data1);// Для отладки
                            // echo "<br>Получены данные $numrows строк";
                            echo"<label for='example2'  class='form-label'>2 уровень папки</label>
                                    <input class='form-control' list='datalist2' name='folder_level_2' id='example2'  placeholder='Введите ссылку'>
                                        <datalist id='datalist2'>";  
                            while($row1 = mysqli_fetch_assoc($data1))
                            {// Формируем таблицу  
                                    foreach ($row1 as $cellValue1) {
                                        echo"<option value='$cellValue1'>";
                                    };

                            }
                            echo"</datalist>";
                        }
                        else
                        {
                            // echo "<br>По запросу ничего не нашлось";
                            ?>
                            <tr>
                                <td>
                                    
                                </td>
                            </tr>
                            <?php
                        }
                    ?>
                </div>
                <div class="mb-3">
                    <?php
                        // Используем prepared statements для защиты от SQL-инъекций
                        $query2 = 'SELECT DISTINCT  tag1.folder_level_3  FROM tag1 ORDER BY  folder_level_3 ASC';
                    
                        $data2  = mysqli_query($conn, $query2) or die('<br>Ошибка выполнения запроса');
                        if(mysqli_num_rows($data2) > 0)
                        {
                            $numrows=mysqli_num_rows($data2);// Для отладки
                            // echo "<br>Получены данные $numrows строк";
                            echo"<label for='example3'  class='form-label'>3 уровень папки</label>
                                    <input class='form-control' list='datalist3' name='folder_level_3' id='example3'  placeholder='Введите ссылку'>
                                        <datalist id='datalist3'>";  
                            while($row2 = mysqli_fetch_assoc($data2))
                            {// Формируем таблицу  
                                    foreach ($row2 as $cellValue2) {
                                        echo"<option value='$cellValue2'>";
                                    };

                            }
                            echo"</datalist>";
                        }
                        else
                        {
                            // echo "<br>По запросу ничего не нашлось";
                            ?>
                            <tr>
                                <td>
                                    
                                </td>
                            </tr>
                            <?php
                        }
                    ?>
                </div>
                <div class="mb-3">
                    <?php
                        // Используем prepared statements для защиты от SQL-инъекций
                        $query3 = 'SELECT DISTINCT  tag1.folder_level_4  FROM tag1 ORDER BY  folder_level_4 ASC';
                    
                        $data3  = mysqli_query($conn, $query3) or die('<br>Ошибка выполнения запроса');
                        if(mysqli_num_rows($data3) > 0)
                        {
                            $numrows=mysqli_num_rows($data3);// Для отладки
                            // echo "<br>Получены данные $numrows строк";
                            echo"<label for='example4'  class='form-label'>4 уровень папки</label>
                                    <input class='form-control' list='datalist4' name='folder_level_4' id='example4'  placeholder='Введите ссылку'>
                                        <datalist id='datalist4'>";  
                            while($row3 = mysqli_fetch_assoc($data3))
                            {// Формируем таблицу  
                                    foreach ($row3 as $cellValue3) {
                                        echo"<option value='$cellValue3'>";
                                    };

                            }
                            echo"</datalist>";
                        }
                        else
                        {
                            // echo "<br>По запросу ничего не нашлось";
                            ?>
                            <tr>
                                <td>
                                    
                                </td>
                            </tr>
                            <?php
                        }
                    ?>
                </div>
                <div class="mb-3">
                    <?php
                        // Используем prepared statements для защиты от SQL-инъекций
                        $query4 = 'SELECT DISTINCT  tag1.folder_level_5  FROM tag1 ORDER BY  folder_level_5 ASC';
                    
                        $data4  = mysqli_query($conn, $query4) or die('<br>Ошибка выполнения запроса');
                        if(mysqli_num_rows($data4) > 0)
                        {
                            $numrows=mysqli_num_rows($data4);// Для отладки
                            // echo "<br>Получены данные $numrows строк";
                            echo"<label for='example5'  class='form-label'>5 уровень папки</label>
                                    <input class='form-control' list='datalist5' name='folder_level_5' id='example5'  placeholder='Введите ссылку'>
                                        <datalist id='datalist5'>";  
                            while($row4 = mysqli_fetch_assoc($data4))
                            {// Формируем таблицу  
                                    foreach ($row4 as $cellValue4) {
                                        echo"<option value='$cellValue4'>";
                                    };

                            }
                            echo"</datalist>";
                        }
                        else
                        {
                            // echo "<br>По запросу ничего не нашлось";
                            ?>
                            <tr>
                                <td>
                                    
                                </td>
                            </tr>
                            <?php
                        }
                    ?>
                </div>
                <input class="btn btn-secondary" type="submit" name="Применить1" id="butt_apply"></input>
            </form>
        </div>
    </div>
</div>

<?php
$server = "127.0.0.1";
$user = "root";
$pass = "1";
$dbname = "bd_infocell_docs";
$dbtable = "doc";
$conn = mysqli_connect($server, $user, $pass, $dbname);
// Проверяем, была ли отправлена форма
if (isset($_POST['Применить'])) {
    // Валидируем и санитизируем входные данные
    $name_doc = isset($_POST['name_doc']) ? $_POST['name_doc'] : '';
    $file_link = isset($_POST['file_link']) ? $_POST['file_link'] : '';
    $type = isset($_POST['type']) ? $_POST['type'] : '';
    $doc_date = isset($_POST['doc_date']) ? $_POST['doc_date'] : '';

    // Вставляем данные в базу данных с использованием подготовленных выражений
    $insertQuery = "INSERT INTO doc (name_doc, file_link, type, doc_date) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $insertQuery);
    mysqli_stmt_bind_param($stmt, 'ssss', $name_doc, $file_link, $type, $doc_date);
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        echo "Данные успешно добавлены";
    } else {
        echo "Ошибка при добавлении данных: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
<?php
$server = "127.0.0.1";
$user = "root";
$pass = "1";
$dbname = "bd_infocell_docs";
$dbtable ="doc";
$dbtable1 ="doc_tag";
$dbtable2 ="tag1";
$conn = mysqli_connect($server, $user, $pass, $dbname);
// Проверяем, была ли отправлена форма
if (isset($_POST['Применить1'])) {
    // Валидируем и санитизируем входные данные
    $folder_level_1 = isset($_POST['folder_level_1']) ? $_POST['folder_level_1'] : '';
    $folder_level_2 = isset($_POST['folder_level_2']) ? $_POST['folder_level_2'] : '';
    $folder_level_3 = isset($_POST['folder_level_3']) ? $_POST['folder_level_3'] : '';
    $folder_level_4 = isset($_POST['folder_level_4']) ? $_POST['folder_level_4'] : '';
    $folder_level_5 = isset($_POST['folder_level_5']) ? $_POST['folder_level_5'] : '';
    // Вставляем данные в базу данных с использованием подготовленных folder_level_4
    $insertQuery = "INSERT INTO tag1 (folder_level_1, folder_level_2, folder_level_3, folder_level_4,  folder_level_5) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $insertQuery);
    mysqli_stmt_bind_param($stmt, 'sssss', $folder_level_1, $folder_level_2, $folder_level_3, $folder_level_4, $folder_level_5);
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        echo "Данные успешно добавлены";
    } else {
        echo "Ошибка при добавлении данных: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>


            <form action="insert_index121.php" method="POST" id="32w">  
            <?php
            $server = "127.0.0.1";
            $user = "root";
            $pass = "1";
            $dbname = "bd_infocell_docs";
            $dbtable ="doc";
            $dbtable1 ="doc_tag";
            $dbtable2 ="tag1";
            $conn  = mysqli_connect($server, $user,$pass, $dbname);
            ?>
                <div class="container mt-5">
                    <div class="row">
                        <div class="col-lg-8">
                            <!-- Post content-->
                            <article>
                                <!-- Post header-->
                                <header class="mb-4">
                                    <!-- Post title-->
                                    <h1 class="fw-bolder mb-1">О компании</h1>
                                    <!-- Post meta content-->
                                    <a class="badge bg-secondary text-decoration-none link-light" href="#!"></a>
                                </header>
                                <section class="mb-5">
                                <div class="container">
                                    <div class="row">
                                    <div class="col-md-4">
                                        <div class="block">
                                            <h4>Текст Новости</h4>
                                            <div class="mb-3">
                                                <?php
                                                    $query = 'SELECT DISTINCT doc.name_doc FROM doc';
                                                    $data = mysqli_query($conn, $query) or die('<br>Ошибка выполнения запроса');
                                                    if(mysqli_num_rows($data) > 0) {
                                                        $numrows = mysqli_num_rows($data);
                                                        echo "<label for='exampleDataLi16' class='form-label'>Имя новости</label>
                                                            <input class='form-control' list='datalistOptions16' id='exampleDataLi16' name='name_doc' required placeholder='Введите имя'>
                                                            <datalist id='datalistOptions16'>";  
                                                        while($row = mysqli_fetch_assoc($data)) {
                                                            foreach ($row as $cellValue) {
                                                                echo "<option value='$cellValue'>";
                                                            }
                                                        }
                                                        echo "</datalist>";
                                                    }
                                                    else {
                                                        echo "<label for='exampleDataLi16' class='form-label'>имя новости</label>
                                                            <input class='form-control' id='exampleDataLi16' name='name_doc' required placeholder='Введите имя'>
                                                            <span class='text-danger'>Данные не доступны</span>";
                                                    }
                                                ?>
                                            </div>
                                            <div class="mb-3">
                                    <div class="text_hide_wrap">
                                        <div class="item_text">
                                    <?php
                                        $query = 'SELECT DISTINCT doc.name_doc FROM  doc';
                                        $data = mysqli_query($conn, $query) or die('<br>Ошибка выполнения запроса');
                                        if(mysqli_num_rows($data) > 0) {
                                            $numrows = mysqli_num_rows($data);
                                            echo "<label for='exampleDataLi20' class='form-label'>Имя документа</label>
                                                <input class='form-control' list='datalistOptions20' id='exampleDataLi20' name='name_doc' required placeholder='Введите имя документа'>
                                                <datalist id='datalistOptions20'>";  
                                            while($row = mysqli_fetch_assoc($data)) {
                                                foreach ($row as $cellValue) {
                                                    echo "<option value='$cellValue'>";
                                                }
                                            }
                                            echo "</datalist>";
                                        }
                                        else {
                                            echo "<label for='exampleDataLi20' class='form-label'>Имя документа</label>
                                                <input class='form-control' id='exampleDataLi20' name='name_doc' required placeholder='Введите имя документа'>
                                                <span class='text-danger'>Данные не доступны</span>";
                                        }
                                    ?>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="mb-3">  
                                    <?php 
                                        // echo "<label for='exampleDataLi15' class='form-label'>Текст сопровождение</label>"; 
                                        // echo "<textarea class='form-control' list='datalistOptions15' id='exampleDataLi15' name='about_doc' required placeholder='Введите текст'>"; 
                                        // echo "</textarea>"; 
                                    ?>  
                                </div> -->


                                        <style>
                                            .hidden-form {
                                                display: none;
                                            }
                                        </style>

                                        <!-- Дополнительный HTML-код страницы -->

                                        <div class="mb-3 hidden-form">  
                                            <?php  
                                                // Используем prepared statements для защиты от SQL-инъекций  
                                                $query = 'SELECT DISTINCT doc.doc_date FROM doc ORDER BY doc_date ASC';  
                                                $data = mysqli_query($conn, $query) or die('<br>Ошибка выполнения запроса');  
                                        
                                                $numrows = mysqli_num_rows($data);  
                                                echo "<label for='exampleDataLi151' class='form-label'>Дата ввода</label>  
                                                    <input class='form-control' list='datalistOptions151' id='exampleDataLi151' name='doc_date' value='" . date('Y-m-d') . "' required placeholder='Введите дату'>  
                                                    <datalist id='datalistOptions151'>";    
                                            ?>  
                                        </div>

                                        <div class="mb-3" style ='height: 200px;'>
                                            <?php
                                                // Используем prepared statements для защиты от SQL-инъекций
                                                $query = 'SELECT DISTINCT doc.file_link FROM doc ORDER BY file_link ASC';
                                                $data = mysqli_query($conn, $query) or die('<br>Ошибка выполнения запроса');
                                                if(mysqli_num_rows($data) > 0) {
                                                    $numrows = mysqli_num_rows($data);
                                                    echo'<input style ="height: 200px;" type="hidden" name="file_link" value="" />';
                                                    echo "<label for='exampleDataLi152' class='form-label'>file_link</label>
                                                        <input class='form-control' list='datalistOptions152' id='exampleDataLi152' name='file_link' placeholder='Введите file_link'>
                                                        <datalist id='datalistOptions152'>";  
                                                    while($row = mysqli_fetch_assoc($data)) {
                                                        foreach ($row as $cellValue) {
                                                            echo "<option value='$cellValue'>";
                                                        }
                                                    }
                                                    echo "</datalist>";
                                                }
                                                else {
                                                    echo'<input type="hidden" name="file_link" value="" />';
                                                    echo "<label for='exampleDataLi152' class='form-label'>file_link</label>
                                                        <input class='form-control' id='exampleDataLi152' name='file_link' placeholder='Введите file_link'>
                                                        <span class='text-danger'>Данные не доступны</span>";
                                                }
                                            ?>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-4">
                                        <div class="position-sticky" style="top:-100rem;">
                                            <nav id="sidebar"class=" bg-primary text-white">
                                                <div class="text_hide_wrap">
                                                    <form  method="POST" id="myForm" action="doci.php?page=doci_ok">
                                                        <div class="p-3 chess mb-2">
                                                            <h5 class="overtext otstupmen">Выберите папку с документами</h5>
                                                            <?php
                                                            $server = "127.0.0.1";
                                                            $user = "root";
                                                            $pass = "1";
                                                            $dbname = "bd_infocell_docs";
                                                            $dbtable ="doc";
                                                            $dbtable1 ="doc_tag";
                                                            $dbtable2 ="tag1";
                                                            $conn = mysqli_connect($server, $user, $pass, $dbname);
                                                            // Проверка подключения
                                                            if (!$conn) {
                                                                die("Ошибка подключения: " . mysqli_connect_error());
                                                            }
                                                            ?>
                                                            <?php
                                                            echo '<div class="dropdown-border" style="padding: 1px 1px;">';
                                                                echo '<div class="p-0">';
                                                                    echo '<ul class="list-unstyled components overtext">';
                                                                        echo '<li>';
                                                                            echo '<div class="nav-link text-black" name="Dep_name">';
                                                                                echo '<label class="tag-checkbox tag-checkbox-label checked" for="checkbox1_">';
                                                                                echo '<ion-icon name="business"></ion-icon>&nbsp;'; 
                                                                                    echo '<input class="radio" type="radio" name="Dep_name" value="" id="checkbox1_" >';
                                                                                        echo "Выберите отдел и папку с документами";
                                                                                echo '</label>';
                                                                            echo '</div>';
                                                                        echo '</li>';
                                                                    echo '</ul>';
                                                                echo '</div>';
                                                            echo '</div>';
                                                            function Dep_nameQuery($conn, $query0) {
                                                                $stmt0 = mysqli_prepare($conn, $query0);
                                                                mysqli_stmt_execute($stmt0);
                                                                return mysqli_stmt_get_result($stmt0);
                                                            }
                                                            function Dep_nameDropdown($conn) {
                                                                $query0 = 'SELECT DISTINCT doc_tag.Dep_name FROM doc_tag ORDER BY BINARY Dep_name';
                                                                $result0 = Dep_nameQuery($conn, $query0);

                                                                if (mysqli_num_rows($result0) > 0) {
                                                                    $counter0 = 1; // Initialize a counter for unique IDs

                                                                    while ($row0 = mysqli_fetch_array($result0, MYSQLI_NUM)) {
                                                                        foreach ($row0 as $cellValue0) {
                                                                            if (!empty($cellValue0) && $cellValue0 !== '-') {
                                                                                $uni0 = 'dropdown_'. $counter0; // Generate a unique ID using the counter
                                                                                
                                                                                echo '<div class="dropdown-border" style="padding: 1px 1px;">';
                                                                                    echo '<div class="p-0">';
                                                                                        echo '<ul class="list-unstyled components overtext">';
                                                                                            echo '<li>';
                                                                                                echo '<div class="nav-link text-black" name="Dep_name">';
                                                                                                echo '<label class="tag-checkbox tag-checkbox-label" id="Dep_name1" data-toggle="collapse" aria-expanded="false" data-target="#' . $uni0 . '" for="checkbox0_' . htmlspecialchars($cellValue0, ENT_QUOTES) . '">'; 
                                                                                                echo '<ion-icon name="person"></ion-icon>&nbsp;'; 
                                                                                                echo '<input class="radio" type="radio" name="Dep_name" value="' . htmlspecialchars($cellValue0, ENT_QUOTES) . '" id="checkbox0_' . htmlspecialchars($cellValue0, ENT_QUOTES) . '">'; 
                                                                                                echo htmlspecialchars($cellValue0, ENT_QUOTES); 
                                                                                                echo '</label>'; 
                                                                                                
                                                                                                echo '</div>';
                                                                                            echo '</li>';
                                                                                        echo '</ul>';
                                                                                    echo '</div>';
                                                                                echo '</div>';

                                                                                // Increment the counter0 for the next iteration
                                                                            
                                                                                echo '<ul class="collapse list-unstyled pageSubmenu1" id="' . $uni0 . '" style="margin-bottom: 0px;">';
                                                                                renderfolder_level_1Dropdown($conn, $cellValue0); // Pass $cellValue to the next function
                                                                                echo '</ul>';
                                                                                $counter0++;
                                                                            }
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                            function folder_level_1Query($conn, $query) {
                                                                $stmt = mysqli_prepare($conn, $query);
                                                                mysqli_stmt_execute($stmt);
                                                                return mysqli_stmt_get_result($stmt);
                                                            }
                                                            function renderfolder_level_1Dropdown($conn, $cellValue0) {
                                                                $query = 'SELECT DISTINCT t.folder_level_1
                                                                FROM doc
                                                                LEFT JOIN doc_tag dt ON doc.name_doc = dt.name_doc
                                                                LEFT JOIN tag1 t ON dt.ID_tag = t.ID 
                                                                WHERE (dt.Dep_name = "' . $cellValue0 . '") 
                                                                ORDER BY BINARY folder_level_1';
                                                                $result = folder_level_1Query($conn, $query);
                                                            
                                                                if (mysqli_num_rows($result) > 0) {
                                                                    $counter = 1; // Initialize a counter for unique IDs
                                                            
                                                                    while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
                                                                        foreach ($row as $cellValue) {
                                                                            if (!empty($cellValue) && $cellValue !== '-') {
                                                                                $uniqueId = 'dropdown1_' . $counter . '_' .  uniqid(); // Generate a unique ID using the counter
                                                                                echo '<div class="  dropdown-border" style="padding: 1px 1px;">';
                                                                                    echo '<div class="p-0 ">';
                                                                                        echo '<ul class="list-unstyled components overtext">';
                                                                                            echo '<li>';
                                                                                                echo '<div class="nav-link text-black " name="folder_level_1">';
                                                                                                echo '<label class="tag-checkbox tag-checkbox-label" id="folder_level_11" data-toggle="collapse" aria-expanded="false" data-target="#' . $uniqueId . '" for="checkbox1_' . htmlspecialchars($cellValue, ENT_QUOTES) . '">'; 
                                                                                                echo '<ion-icon name="folder"></ion-icon>&nbsp;'; 
                                                                                                echo '<input class="radio" type="radio" name="folder_level_1" value="' . htmlspecialchars($cellValue, ENT_QUOTES) . '" id="checkbox1_' . htmlspecialchars($cellValue, ENT_QUOTES) . '">'; 
                                                                                                echo htmlspecialchars($cellValue, ENT_QUOTES); 
                                                                                                echo '</label>';
                                                                                                echo '</div>';
                                                                                            echo '</li>';
                                                                                        echo '</ul>';
                                                                                    echo '</div>';
                                                                                echo '</div>';
                                                                                // Increment the counter for the next iteration
                                                                                echo '<ul class="collapse list-unstyled pageSubmenu1" id="' . $uniqueId . '" style="margin-bottom: 0px;">';
                                                                                renderfolder_level_2Dropdown($conn, $cellValue); // Pass $cellValue to the next function
                                                                                echo '</ul>';
                                                                                $counter++;
                                                                            }
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                            function folder_level_2Query($conn, $query1) {
                                                                $stmt1 = mysqli_prepare($conn, $query1);
                                                                mysqli_stmt_execute($stmt1);
                                                                return mysqli_stmt_get_result($stmt1);
                                                            }
                                                            
                                                            function renderfolder_level_2Dropdown($conn, $cellValue) {
                                                                $query1 = 'SELECT DISTINCT folder_level_2 FROM doc
                                                                LEFT JOIN doc_tag dt ON doc.name_doc = dt.name_doc
                                                                LEFT JOIN  tag1 ON dt.ID_tag = tag1.ID WHERE (folder_level_1 = "' . $cellValue . '") ORDER BY BINARY folder_level_2';
                                                                $result1 = folder_level_2Query($conn, $query1);
                                                                
                                                                if (mysqli_num_rows($result1) > 0) {
                                                                    $counter1 = 1; // Initialize a counter for unique IDs
                                                            
                                                                    while ($row1 = mysqli_fetch_array($result1, MYSQLI_NUM)) {
                                                                        foreach ($row1 as $cellValue1) {
                                                                            if (!empty($cellValue1) && $cellValue1 !== '-') {
                                                                                $checkboxId = 'checkbox_' . $counter1. '_' .  uniqid(); // Generate a unique ID for checkbox
                                                                                echo '<div class=" dropdown-border" style="padding: 1px 1px;">';
                                                                                    echo '<div class="p-0 ">';
                                                                                        echo '<ul class="list-unstyled components overtext">';
                                                                                            echo '<li>';
                                                                                                echo '<div class="nav-link text-black " name="folder_level_2">';
                                                                                                    echo '<label class="tag-checkbox  tag-checkbox-label" id="folder_level_22" data-toggle="collapse" aria-expanded="false" data-target="#' . $checkboxId . '" for="checkbox2_' . htmlspecialchars($cellValue1, ENT_QUOTES) . '">';
                                                                                                    echo '<ion-icon name="folder"></ion-icon>&nbsp;';
                                                                                                    echo '<input class="radio" type="radio" name="folder_level_2" value="' . htmlspecialchars($cellValue1, ENT_QUOTES) . '" id="checkbox2_' . htmlspecialchars($cellValue1, ENT_QUOTES) . '">';
                                                                                                    echo htmlspecialchars($cellValue1, ENT_QUOTES);
                                                                                                    echo '</label>';
                                                                                                echo '</div>';
                                                                                            echo '</li>';
                                                                                        echo '</ul>';
                                                                                    echo '</div>';
                                                                                echo '</div>';
                                                                                echo '<ul class="collapse list-unstyled pageSubmenu1" id="' . $checkboxId . '" style="margin-bottom: 0px;">';
                                                                                renderfolder_level_3Dropdown($conn, $cellValue1); // Pass $cellValue to the next function
                                                                                echo '</ul>';
                                                                                $counter1++;
                                                                            }
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                            function folder_level_3Query($conn, $query2) {
                                                                $stmt2 = mysqli_prepare($conn, $query2);
                                                                mysqli_stmt_execute($stmt2);
                                                                return mysqli_stmt_get_result($stmt2);
                                                            }

                                                            function renderfolder_level_3Dropdown($conn, $cellValue1) {
                                                                $query2 = 'SELECT DISTINCT folder_level_3 FROM doc
                                                                LEFT JOIN doc_tag dt ON doc.name_doc = dt.name_doc
                                                                LEFT JOIN tag1 ON dt.ID_tag = tag1.ID WHERE (folder_level_2 = "' . $cellValue1 . '") ORDER BY BINARY folder_level_3';
                                                                $result2 = folder_level_3Query($conn, $query2);
                                                                
                                                                if (mysqli_num_rows($result2) > 0) {
                                                                    $counter2 = 1; // Initialize a counter for unique IDs

                                                                    while ($row2 = mysqli_fetch_array($result2, MYSQLI_NUM)) {
                                                                        foreach ($row2 as $cellValue2) {
                                                                            if (!empty($cellValue2) && $cellValue2 !== '-') {
                                                                                $checkboxId1 = 'checkbox1_' . $counter2. '_' .  uniqid(); // Generate a unique ID for checkbox
                                                                                echo '<div class="dropdown-border" style="padding: 1px 1px;">';
                                                                                    echo '<div class="p-0 ">';
                                                                                        echo '<ul class="list-unstyled components overtext">';
                                                                                            echo '<li>';
                                                                                                echo '<div class=" nav-link text-black "  name="folder_level_3">';
                                                                                                    echo '<label class="tag-checkbox tag-checkbox-label" id="folder_level_33" data-toggle="collapse" aria-expanded="false" data-target="#' . $checkboxId1 . '" for="checkbox3_' . htmlspecialchars($cellValue2, ENT_QUOTES) . '">';
                                                                                                    echo '<ion-icon name="folder"></ion-icon>&nbsp;';
                                                                                                    echo '<input class="radio" type="radio" name="folder_level_3" value="' . htmlspecialchars($cellValue2, ENT_QUOTES) . '" id="checkbox3_' . htmlspecialchars($cellValue2, ENT_QUOTES) . '">';
                                                                                                    echo htmlspecialchars($cellValue2, ENT_QUOTES);
                                                                                                    echo '</label>';
                                                                                                echo '</div>';
                                                                                            echo '</li>';
                                                                                        echo '</ul>';
                                                                                    echo '</div>';
                                                                                echo '</div>';
                                                                                $counter2++;
                                                                                echo '<ul class="collapse list-unstyled pageSubmenu2" id="' . $checkboxId1 . '" style="margin-bottom: 0px;">';
                                                                                renderfolder_level_4Dropdown($conn, $cellValue2); // Pass $cellValue to the next function
                                                                                echo '</ul>';
                                                                            }
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                            function folder_level_4Query($conn, $query3) {
                                                                $stmt3 = mysqli_prepare($conn, $query3);
                                                                mysqli_stmt_execute($stmt3);
                                                                return mysqli_stmt_get_result($stmt3);
                                                            }
                                                            
                                                            function renderfolder_level_4Dropdown($conn, $cellValue2) {
                                                                $query3 = 'SELECT DISTINCT folder_level_4 FROM doc
                                                                LEFT JOIN doc_tag dt ON doc.name_doc = dt.name_doc
                                                                LEFT JOIN tag1  ON dt.ID_tag = tag1.ID WHERE (folder_level_3 = "' . $cellValue2 . '") ORDER BY BINARY folder_level_4';
                                                                $result3 = folder_level_4Query($conn, $query3);
                                                                
                                                                if (mysqli_num_rows($result3) > 0) {
                                                                    $counter3 = 1; // Initialize a counter for unique IDs
                                                            
                                                                    while ($row3 = mysqli_fetch_array($result3, MYSQLI_NUM)) {
                                                                        foreach ($row3 as $cellValue3) {
                                                                            if (!empty($cellValue3) && $cellValue3 !== '-') {
                                                                                $checkboxId2 = 'checkbox2_' . $counter3. '_' .  uniqid(); // Generate a unique ID for checkbox
                                                                                
                                                                            echo '<div class="dropdown-border" style="padding: 1px 1px;">';
                                                                                echo '<div class="p-0">';
                                                                                    echo '<ul class="list-unstyled components overtext">';
                                                                                        echo '<li>';
                                                                                            echo '<div class=" nav-link text-black "  name="folder_level_4">';
                                                                                                echo '<label class="tag-checkbox tag-checkbox-label" id="folder_level_44" data-toggle="collapse" aria-expanded="false" for="checkbox4_' . htmlspecialchars($cellValue3, ENT_QUOTES) . '">';
                                                                                                echo '<ion-icon name="folder"></ion-icon>&nbsp;';
                                                                                                echo '<input class="radio" type="radio" name="folder_level_4" value="' . htmlspecialchars($cellValue3, ENT_QUOTES) . '" id="checkbox4_' . htmlspecialchars($cellValue3, ENT_QUOTES) . '">';
                                                                                                echo htmlspecialchars($cellValue3, ENT_QUOTES);
                                                                                                echo '</label>';
                                                                                            echo '</div>';
                                                                                        echo '</li>';
                                                                                    echo '</ul>';
                                                                                echo '</div>';
                                                                            echo '</div>';
                                                                            $counter3++;
                                                                            echo "<ul class='collapse list-unstyled pageSubmenu2' id=' . $checkboxId2 . ' style='margin-bottom: 0px;'>";
                                                                            renderfolder_level_5Dropdown($conn, $cellValue3); // Pass $cellValue to the next function
                                                                            echo '</ul>';
                                                                            }
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                            function folder_level_5Query($conn, $query4) {
                                                                $stmt4 = mysqli_prepare($conn, $query4);
                                                                mysqli_stmt_execute($stmt4);
                                                                return mysqli_stmt_get_result($stmt4);
                                                            }
                                                            
                                                            function renderfolder_level_5Dropdown($conn, $cellValue3) {
                                                                $query4 = 'SELECT DISTINCT tag1.folder_level_5 FROM doc
                                                                LEFT JOIN doc_tag dt ON doc.name_doc = dt.name_doc
                                                                LEFT JOIN tag1  ON dt.ID_tag = tag1.ID WHERE (folder_level_4 = "' . $cellValue3 . '") ORDER BY BINARY folder_level_5';
                                                                $result4 = folder_level_5Query($conn, $query4);
                                                                echo  "Сформировали запрос $query4";
                                                                if (mysqli_num_rows($result4) > 0) {
                                                            
                                                                    while ($row4 = mysqli_fetch_array($result4, MYSQLI_NUM)) {
                                                                        foreach ($row4 as $cellValue4) {
                                                                            if (!empty($cellValue4) && $cellValue4 !== '-') {
                                                                                echo  "Сформировали запрос $cellValue4";
                                                                            echo '<div class="row dropdown-border" style="padding: 1px 1px;">';
                                                                                echo '<div class="p-0 col-md-12">';
                                                                                    echo '<ul class="list-unstyled components overtext">';
                                                                                        echo '<li>';
                                                                                            echo '<div class=" nav-link text-black "  name="folder_level_5">';
                                                                                                echo '<label class="tag-checkbox tag-checkbox-label" id="folder_level_55" data-toggle="collapse" aria-expanded="false" for="checkbox5_' . htmlspecialchars($cellValue4, ENT_QUOTES) . '">';
                                                                                                echo '<ion-icon name="folder"></ion-icon>&nbsp;';
                                                                                                echo '<input class="radio" type="radio" name="folder_level_5" value="' . htmlspecialchars($cellValue4, ENT_QUOTES) . '" id="checkbox5_' . htmlspecialchars($cellValue4, ENT_QUOTES) . '">';
                                                                                                echo htmlspecialchars($cellValue4, ENT_QUOTES);
                                                                                                echo '</label>';
                                                                                            echo '</div>';
                                                                                        echo '</li>';
                                                                                    echo '</ul>';
                                                                                echo '</div>';
                                                                            echo '</div>';
                                                                            }
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                            Dep_nameDropdown($conn);
                                                            ?>
                                                        </div>
                                                    </form>
                                                </div>
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                            <input class="btn btn-secondary"  href="insert-index121.php"  type="submit"  name="Применить" id="butt_apply" value="Отправить новость"></input>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    <!-- Footer-->
    <footer class="py-5 bg-light">
        <div class="container"><p class="m-0 text-center text-black"> &copy;Инфосел Все права защищены</p></div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/scripts.js"></script>
    <script src="js/search.js"></script>
    
        </body>
    </html>

   
</body>
</html>
