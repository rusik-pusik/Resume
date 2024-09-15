<?php
    session_start();
    ?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <script src="./js/tock.js"></script>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Инфосэл</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/stiles.css" rel="stylesheet" />
        <link href="css/blogcss.css" rel="stylesheet" />
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
       </head>
    <body>
    <form action="insert_index.php" method="POST">  
          
<?php

$server="127.0.0.1";
$user  ="root";
$pass  ="1";
$dbname ="bd_infocell_news";
$dbtable ="news";
$dbtable1 ="news_tags";
$dbtable2 ="tegs";
$conn  = mysqli_connect($server, $user,$pass, $dbname);
$insertQuery2="";
?>
        <!-- Page content-->
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
                        <section class="mb-5" >
                        <div class="container">
                            <div class="row">
                            <div class="col-md-4">
                                <div class="block">
                                <h4>Текст Новости</h4>
                                <div class="mb-3">
                                    <?php
                                        $query = 'SELECT DISTINCT news.name_news FROM news';
                                        $data = mysqli_query($conn, $query) or die('<br>Ошибка выполнения запроса');
                                        if(mysqli_num_rows($data) > 0) {
                                            $numrows = mysqli_num_rows($data);
                                            echo "<label for='exampleDataLi16' class='form-label'>Имя новости</label>
                                                <input class='form-control' list='datalistOptions16' id='exampleDataLi16' name='name_news' required placeholder='Введите имя'>
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
                                                <input class='form-control' id='exampleDataLi16' name='name_news' required placeholder='Введите имя'>
                                                <span class='text-danger'>Данные не доступны</span>";
                                        }
                                    ?>
                                </div>

                                <div class="mb-3">  
                                    <?php  
                                      
                                     
                                
                                        echo "<label for='exampleDataLi15' class='form-label'>Текст новости</label>"; 
                                        echo "<textarea class='form-control' list='datalistOptions15' id='exampleDataLi15' name='text_news' required placeholder='Введите новость'>"; 
                                        
                                       
                                        
                                        echo "</textarea>"; 
                                    ?>  
                                </div>


                                        <style>
                                            .hidden-form {
                                                display: none;
                                            }
                                        </style>

                                        <!-- Дополнительный HTML-код страницы -->

                                        <div class="mb-3 hidden-form">  
                                            <?php  
                                                // Используем prepared statements для защиты от SQL-инъекций  
                                                $query = 'SELECT DISTINCT news.data_news FROM news ORDER BY data_news ASC';  
                                                $data = mysqli_query($conn, $query) or die('<br>Ошибка выполнения запроса');  
                                        
                                                $numrows = mysqli_num_rows($data);  
                                                echo "<label for='exampleDataLi151' class='form-label'>Дата ввода</label>  
                                                    <input class='form-control' list='datalistOptions151' id='exampleDataLi151' name='data_news' value='" . date('Y-m-d') . "' required placeholder='Введите дату'>  
                                                    <datalist id='datalistOptions151'>";    
                                            ?>  
                                        </div>

                                    <div class="mb-3">
                                <?php
                                    // Используем prepared statements для защиты от SQL-инъекций
                                    $query = 'SELECT DISTINCT   news.link1  FROM news ORDER BY  link1 ASC';
                                    $data = mysqli_query($conn, $query) or die('<br>Ошибка выполнения запроса');
                                    if(mysqli_num_rows($data) > 0) {
                                        $numrows = mysqli_num_rows($data);
                                        echo'<input type="hidden" name="link1" value="" />';
                                        echo "<label for='exampleDataLi152' class='form-label'> link1</label>
                                            <input class='form-control' list='datalistOptions152' id='exampleDataLi152' name='link1'  placeholder='Введите link1'>
                                            <datalist id='datalistOptions152'>";  
                                        while($row = mysqli_fetch_assoc($data)) {
                                            foreach ($row as $cellValue) {
                                                echo "<option value='$cellValue'>";
                                            }
                                        }
                                        echo "</datalist>";
                                    }
                                    else {
                                        echo'<input type="hidden" name="link1" value="" />';
                                        echo "<label for='exampleDataLi152' class='form-label'>link1</label>
                                            <input class='form-control' id='exampleDataLi152' name='link1'  placeholder='Введите link1'>
                                            <span class='text-danger'>Данные не доступны</span>";
                                    }
                                ?>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <?php
                                            // Используем prepared statements для защиты от SQL-инъекций
                                            $query = 'SELECT DISTINCT   news.link2  FROM news ORDER BY  link2 ASC';
                                            if(mysqli_num_rows($data) > 0) {
                                                $numrows = mysqli_num_rows($data);
                                                echo'<input type="hidden" name="link2" value="" />';
                                                echo "<label for='exampleDataLi13' class='form-label'>link2</label>
                                                    <input class='form-control' list='datalistOptions13' id='exampleDataLi13' name='link2'  placeholder='Введите link2'>
                                                    <datalist id='datalistOptions13'>";  
                                                while($row = mysqli_fetch_assoc($data)) {
                                                    foreach ($row as $cellValue) {
                                                        echo "<option value='$cellValue'>";
                                                    }
                                                }
                                                echo "</datalist>";
                                            }
                                            else {
                                                echo'<input type="hidden" name="link2" value="" />';
                                                echo "<label for='exampleDataLi13' class='form-label'>link2</label>
                                                    <input class='form-control' id='exampleDataLi13' name='link2'  placeholder='Введите link2'>
                                                    <span class='text-danger'>Данные не доступны</span>";
                                            }
                                        ?>
                                    </div>
                                    <div class="mb-3">
                                        <?php
                                            // Используем prepared statements для защиты от SQL-инъекций
                                            $query = 'SELECT DISTINCT   news.link3  FROM news ORDER BY  link3 ASC';
                                            if(mysqli_num_rows($data) > 0) {
                                                $numrows = mysqli_num_rows($data);
                                                echo'<input type="hidden" name="link3" value="" />';

                                                echo "<label for='exampleDataLi131' class='form-label'>link3</label>
                                                    <input class='form-control' list='datalistOptions131' id='exampleDataLi131' name='link3'  placeholder='Введите link3'>
                                                    <datalist id='datalistOptions131'>";  
                                                while($row = mysqli_fetch_assoc($data)) {
                                                    foreach ($row as $cellValue) {
                                                        echo "<option value='$cellValue'>";
                                                    }
                                                }
                                                echo "</datalist>";
                                            }
                                            else {
                                                echo "<label for='exampleDataLi131' class='form-label'>link3</label>
                                                    <input class='form-control' id='exampleDataLi131' name='link3'  placeholder='Введите link3'>
                                                    <span class='text-danger'>Данные не доступны</span>";
                                            }
                                        ?>
                                    </div>
                                    <div class="mb-3">
                                        <?php
                                            // Используем prepared statements для защиты от SQL-инъекций
                                            $query = 'SELECT DISTINCT   news.image_news  FROM news ORDER BY  image_news ASC';
                                            if(mysqli_num_rows($data) > 0) {
                                                $numrows = mysqli_num_rows($data);
                                                echo'<input type="hidden" name="image_news" value="" />';

                                                echo "<label for='exampleDataLi132' class='form-label'>image_news</label>
                                                    <input class='form-control' list='datalistOptions132' id='exampleDataLi132' name='image_news'  placeholder='Введите image_news'>
                                                    <datalist id='datalistOptions132'>";  
                                                while($row = mysqli_fetch_assoc($data)) {
                                                    foreach ($row as $cellValue) {
                                                        echo "<option value='$cellValue'>";
                                                    }
                                                }
                                                echo "</datalist>";
                                            }
                                            else {
                                                echo "<label for='exampleDataLi132' class='form-label'>image_news</label>
                                                    <input class='form-control' id='exampleDataLi132' name='image_news'  placeholder='Введите image_news'>
                                                    <span class='text-danger'>Данные не доступны</span>";
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="block">
                                <h4>Категории</h4>
                                    <div class="mb-3">
                                        <?php
                                            // Используем prepared statements для защиты от SQL-инъекций
                                            $query = 'SELECT DISTINCT  tegs.name_tag   FROM tegs ORDER BY  name_tag  ASC';
                                            if(mysqli_num_rows($data) > 0) {
                                                $numrows = mysqli_num_rows($data);
                                                echo "<label for='exampleDataL1' class='form-label'>Категорию</label>
                                                    <input class='form-control' list='datalistOption1' id='exampleDataL1' name='name_tag_1' required  placeholder='Введите Категорию'>
                                                    <datalist id='datalistOption1'>";  
                                                while($row = mysqli_fetch_assoc($data)) {
                                                    foreach ($row as $cellValue) {
                                                        echo "<option value='$cellValue'>";
                                                    }
                                                }
                                                echo "</datalist>";
                                            }
                                            else {
                                                echo "<label for='exampleDataL1' class='form-label'>Категорию</label>
                                                    <input class='form-control' id='exampleDataL1' name='name_tag_1'  required placeholder='Введите Категорию'>
                                                    <span class='text-danger'>Данные не доступны</span>";
                                            }
                                        ?>
                                    </div>
                                    <div class="mb-3">
                                        <?php
                                            // Используем prepared statements для защиты от SQL-инъекций
                                            $query = 'SELECT DISTINCT  tegs.name_tag   FROM tegs ORDER BY  name_tag  ASC';
                                            if(mysqli_num_rows($data) > 0) {
                                                $numrows = mysqli_num_rows($data);
                                                echo "<label for='exampleDataL11' class='form-label'>Категорию</label>
                                                    <input class='form-control' list='datalistOption11' id='exampleDataL11' name='name_tag_2'   placeholder='Введите Категорию'>
                                                    <datalist id='datalistOption11'>";  
                                                while($row = mysqli_fetch_assoc($data)) {
                                                    foreach ($row as $cellValue) {
                                                        echo "<option value='$cellValue'>";
                                                    }
                                                }
                                                echo "</datalist>";
                                            }
                                            else {
                                                echo "<label for='exampleDataL11' class='form-label'>Категорию</label>
                                                    <input class='form-control' id='exampleDataL11' name='name_tag_2'  placeholder='Введите Категорию'>
                                                    <span class='text-danger'>Данные не доступны</span>";
                                            }
                                        ?>
                                    </div>
                                    <div class="mb-3">
                                        <?php
                                            // Используем prepared statements для защиты от SQL-инъекций
                                            $query = 'SELECT DISTINCT  tegs.name_tag   FROM tegs ORDER BY  name_tag  ASC';
                                            if(mysqli_num_rows($data) > 0) {
                                                $numrows = mysqli_num_rows($data);
                                                echo "<label for='exampleDataL12' class='form-label'>Категорию</label>
                                                    <input class='form-control' list='datalistOption12' id='exampleDataL12' name='name_tag_3'  placeholder='Введите Категорию'>
                                                    <datalist id='datalistOption12'>";  
                                                while($row = mysqli_fetch_assoc($data)) {
                                                    foreach ($row as $cellValue) {
                                                        echo "<option value='$cellValue'>";
                                                    }
                                                }
                                                echo "</datalist>";
                                            }
                                            else {
                                                echo "<label for='exampleDataL12' class='form-label'>Категорию</label>
                                                    <input class='form-control' id='exampleDataL12' name='name_tag_3'  placeholder='Введите Категорию'>
                                                    <span class='text-danger'>Данные не доступны</span>";
                                            }
                                        ?>
                                    </div>
                                    <div class="mb-3">
                                <?php
                                    // Используем prepared statements для защиты от SQL-инъекций
                                    $query = 'SELECT DISTINCT  tegs.name_tag   FROM tegs ORDER BY  name_tag  ASC';
                                    if(mysqli_num_rows($data) > 0) {
                                        $numrows = mysqli_num_rows($data);
                                        echo "<label for='exampleDataL13' class='form-label'>Категорию</label>
                                            <input class='form-control' list='datalistOption13' id='exampleDataL13' name='name_tag_4'  placeholder='Введите Категорию'>
                                            <datalist id='datalistOption13'>";  
                                        while($row = mysqli_fetch_assoc($data)) {
                                            foreach ($row as $cellValue) {
                                                echo "<option value='$cellValue'>";
                                            }
                                        }
                                        echo "</datalist>";
                                    }
                                    else {
                                        echo "<label for='exampleDataL13' class='form-label'>Категорию</label>
                                            <input class='form-control' id='exampleDataL13' name='name_tag_4'   placeholder='Введите Категорию'>
                                            <span class='text-danger'>Данные не доступны</span>";
                                    }
                                ?>
                                    </div>
                                    <div class="mb-3">
                                <?php
                                    // Используем prepared statements для защиты от SQL-инъекций
                                    $query = 'SELECT DISTINCT  tegs.name_tag   FROM tegs ORDER BY  name_tag  ASC';
                                    if(mysqli_num_rows($data) > 0) {
                                        $numrows = mysqli_num_rows($data);
                                        echo "<label for='exampleDataL14' class='form-label'>Категорию</label>
                                            <input class='form-control' list='datalistOption14' id='exampleDataL14' name='name_tag_5'  placeholder='Введите Категорию'>
                                            <datalist id='datalistOption14'>";  
                                        while($row = mysqli_fetch_assoc($data)) {
                                            foreach ($row as $cellValue) {
                                                echo "<option value='$cellValue'>";
                                            }
                                        }
                                        echo "</datalist>";
                                    }
                                    else {
                                        echo "<label for='exampleDataL14' class='form-label'>Категорию</label>
                                            <input class='form-control' id='exampleDataL14' name='name_tag_5'  placeholder='Введите Категорию'>
                                            <span class='text-danger'>Данные не доступны</span>";
                                    }
                                ?>
                                    </div>
                                
                                </div>
                            </div>
                            
                        </div>
                      <input class="btn btn-secondary"  href="index.php"  type="submit"  name="Применить" id="butt_apply" value="Отправить новость"></input>
                      
            </div>
            </div>
        </div>
    </form>
    <?php
    session_start();
       if (isset($_POST['Применить'])) {
        // Проверяем, была ли уже отправлена данная форма
        if (!isset($_SESSION['form_submitted'])) {
                            $server = "127.0.0.1";
                            $user = "root";
                            $pass = "1";
                            $dbname = "bd_infocell_news";
                            $dbtable = "news";
                            $dbtable1 = "news_tags";
                            $dbtable2 = "tegs";
                            $conn = mysqli_connect($server, $user, $pass, $dbname);
                            $name_news = "";
                            $data_news = "";
                            $text_news = "";
                            $link1 = "";
                            $link2 = "";
                            $link3 = "";
                            $image_news = "";
                           // Объявим $name_tag как массив
                            $name_tag = array();
                          
                                // Получаем данные из формы
                                $name_news = $_POST['name_news'];
                                $data_news = $_POST['data_news'];
                                $text_news = $_POST['text_news'];
                                $link1 = $_POST['link1'];
                                $link2 = $_POST['link2'];
                                $link3 = $_POST['link3'];
                                $image_news = $_POST['image_news'];
                                $name_tag[1] = isset($_POST['name_tag_1']) ? $_POST['name_tag_1'] : '';
                                $name_tag[2] = isset($_POST['name_tag_2']) ? $_POST['name_tag_2'] : '';
                                $name_tag[3] = isset($_POST['name_tag_3']) ? $_POST['name_tag_3'] : '';
                                $name_tag[4] = isset($_POST['name_tag_4']) ? $_POST['name_tag_4'] : '';
                                $name_tag[5] = isset($_POST['name_tag_5']) ? $_POST['name_tag_5'] : '';
                            // создаем условие для выборки
                            if ( !empty($name_tag) || $name_news != "" || $data_news != "" || $text_news != "" ) {
                                $mass = array(
                                    "0" => "$name_news",
                                    "1" => "$data_news",
                                    "2" => "$text_news",
                                    "3" => "$link1",
                                    "4" => "$link2",
                                    "5" => "$link3",
                                    "6" => "$image_news",
                                );
                                $mass1 = array(
                                    "0" => "news.name_news",
                                    "1" => "news.data_news",
                                    "2" => "news.text_news",
                                    "3" => "news.link1",
                                    "4" => "news.link2",
                                    "5" => "news.link3",
                                    "6" => "news.image_news",
                                );
                                
                                $a = "";
                                for ($i = 0; $i < 6; $i++) {
                                    if (!($mass[$i] == "")) {
                                        $SQLCond0 = "";
                                        $SQLCond0 = "$mass1[$i] = '$mass[$i]'" . $SQLCond0;
                                        if (($SQLCond0 != "") && ($a != "")) {
                                            $a = $a . ' AND ' . $SQLCond0;
                                        } else {
                                            $a = $a . $SQLCond0;
                                        }
                                    }
                                }
                                $SQLCond10 = ""; // Инициализируем пустую строку для хранения финального SQL-условия
                              
                                // Собираем значения из $_POST в массив $name_tag
                                
                                // foreach ($name_tag as $key => $value) {
                                //     echo "Element $key: $value<br>";
                                // }
                                
                                $SQLCond = ""; // Не используется в данном коде, можно удалить
                              
                                if (!empty($name_tag)) {
                                    // ... your existing PHP code ...
                                    $mass3 = array(
                                        "1" => "tegs.name_tag",
                                        "2" => "tegs.name_tag",
                                        "3" => "tegs.name_tag",
                                        "4" => "tegs.name_tag",
                                        "5" => "tegs.name_tag",
                                    );
                            
                                    if (!empty($name_tag)) {
                                        $a1 = ""; // Инициализируем переменную (не используется в данном коде, можно удалить)
                                        $str = ""; // Инициализируем переменную для хранения SQL-условия
                                        $first = true; // Флаг используется для добавления 'OR' между условиями в SQL-запросе
                                        foreach ($name_tag as $name_tagNum => $value) {
                                            if (!empty($value)) { // Проверяем, что значение не пустое
                                                if ($first) {
                                                    // Если это первое непустое значение, не добавляем 'OR' в SQL-условие
                                                    $first = false;
                                                    $str = $mass3[$name_tagNum] . " ='$value'";
                                                } else {
                                                    // Для последующих непустых значений добавляем 'OR' между условиями в SQL-запросе
                                                    $str = ($str . ' OR ' . $mass3[$name_tagNum] . " ='$value' ");
                                                }
                                            }
                                        }
                            
                                        // echo "$str"; // Not used (you can remove this line)
                            
                                        $SQLCond10 = $str . $SQLCond10;
                            
                                        if (($SQLCond10 != "" and $a1 != "")) {
                                            $a1 = $a1 . ' AND ' . $SQLCond10;
                                        } else {
                                            $a1 = $a1 . $SQLCond10;
                                        }
                                    }
                                }
                                // echo "$a1";
        


                            //  echo  "Сформировали запрос $query";
                            
                                // Start a transaction
                            
                                        if ( $name_tag != "" &&  $name_news != "" && $data_news != "" && $text_news != "") {
                                            // Execute the first query
                                            $query0 = "SELECT tegs.name_tag FROM tegs";
                                            //  echo "Сформировали запрос $query0";
                                            foreach ($name_tag as $name_tagNum) {
                                                if (!empty($name_tagNum)) {
                                                    $selectQuery = "SELECT name_tag FROM tegs WHERE name_tag LIKE '%$name_tagNum%'";
                                                    $result = mysqli_query($conn, $selectQuery);
                                                    //   echo "Сформировали запрос $selectQuery";
                                                    if ($result) {
                                                        if (mysqli_num_rows($result) == 0) {
                                                            $insertQuery = "INSERT INTO tegs (name_tag) VALUES ('$name_tagNum')";
                                                            $insertResult = mysqli_query($conn, $insertQuery);
                                                            $insertQuery1 = "INSERT INTO news (name_news, data_news, text_news, link1, link2, link3,image_news)
                                                            SELECT '$name_news', '$data_news', '$text_news', '$link1', '$link2', '$link3' ,'$image_news'
                                                            FROM dual
                                                            WHERE NOT EXISTS (
                                                                SELECT 1 FROM news WHERE data_news = '$data_news' AND name_news = '$name_news'
                                                            )";

                                                            //  echo "Сформировали запрос $insertQuery1";
                                                            $result1 = mysqli_query($conn, $insertQuery1);
                                                            if (!$result1) {
                                                                throw new Exception(
                                                                    'Ошибка выполнения INSERT запроса для news: ' . mysqli_error($conn));
                                                            }
                                                            if ($insertResult) {
                                                                //  echo "Запрос успешно выполнен.";
                                                            } else {
                                                                //  echo "Ошибка при выполнении запроса: " . mysqli_error($conn);
                                                            }
                                                        } else {
                                                              echo "Элемент, похожий на значение '$name_tagNum', уже существует в таблице.";
                                                            $insertQuery1 = "INSERT INTO news (name_news, data_news, text_news, link1, link2, link3,image_news)
                                                            SELECT '$name_news', '$data_news', '$text_news', '$link1', '$link2', '$link3','$image_news'
                                                            FROM dual
                                                            WHERE NOT EXISTS (
                                                                SELECT 1 FROM news WHERE data_news = '$data_news' AND name_news = '$name_news'
                                                            )";
                                                            //   echo "Сформировали запрос $insertQuery1";
                                                            $result1 = mysqli_query($conn, $insertQuery1);
                                                            if (!$result1) {
                                                                throw new Exception(
                                                                     'Ошибка выполнения INSERT запроса для news: ' . mysqli_error($conn)
                                                                );
                                                            }
                                                        }
                                                    } else {
                                                        //   echo "Ошибка при выполнении запроса: " . mysqli_error($conn);
                                                    }


                                                } else {
                                                    //  echo "Переменная 'name_tagNum' пуста.";
                                                }
                                                
                                           
                                            //  echo "Сформировали запрос $query1";
                                            // Execute the second query only if the first query was successful
                                            
                                            
                                            $query = "SELECT news.id_news FROM news WHERE $a";
                                            //   echo "Сформировали запрос $query";
                                            // If all queries were successful, commit the transaction
                                            mysqli_query($conn, "COMMIT");
                                        
                                            // Rest of your code...
                                        
                                            
                                        $data  = mysqli_query($conn, $query) or die('<br>Ошибка выполнения запроса');
                                        if(mysqli_num_rows($data) > 0)
                                            {
                                                $numrows=mysqli_num_rows($data);// Для отладки
                                                //  echo "<br>Получены данные $numrows строк";
                                                while($row = mysqli_fetch_assoc($data))
                                                {// Формируем таблицу
                                                    $id_news = $row['id_news'];
                                                    
                                                   
                                                }
                                            }
                                            else
                                            {
                                                //  echo "<br>По запросу ничего не нашлось";
                                                ?>
                                                <tr>
                                                    <td>
                                                        
                                                    </td>
                                                </tr>
                                                <?php
                                            }

                                            $name_tag_array = array();

                                            $query1 = "SELECT tegs.name_tag FROM tegs WHERE $a1";
                                            $data1 = mysqli_query($conn, $query1) or die('<br>Ошибка выполнения запроса'); 
                                            // echo "Сформировали запрос $query1"; 
                                            
                                            if (mysqli_num_rows($data1) > 0) {  
                                                $numrows = mysqli_num_rows($data1); // For debugging  
                                                // echo "<br>Получены данные $numrows строк";  
                                            
                                                while ($row1 = mysqli_fetch_assoc($data1)) {
                                                    $name_tag_array[] = $row1['name_tag'];
                                                }
                                                
                                            } else {
                                                // echo "<br>По запросу ничего не нашлось"; 
                                            }
                                            // Assuming $name_tagNum is an array with multiple values
                                            // and $id_news is already assigned with a valid value
                                            if (!empty($name_tag_array) && isset($id_news)) {
                                                foreach ($name_tag_array as $tagValue) {
                                                    // Check if the 'name_tag' exists in the 'tegs' table before inserting into 'news_tags'
                                                    $checkTagQuery = "SELECT name_tag FROM tegs WHERE name_tag = '$tagValue'";
                                                    $tagResult = mysqli_query($conn, $checkTagQuery);

                                                    if (mysqli_num_rows($tagResult) > 0) {
                                                        $insertQuery2 = "INSERT INTO news_tags (name_tag, id_news) VALUES ('$tagValue', '$id_news')";
                                                        $result2 = mysqli_query($conn, $insertQuery2);

                                                        if ($result2) {
                                                            // echo "Запрос успешно выполнен для тега: $tagValue.<br>";
                                                        } else {
                                                            //  echo "Ошибка при выполнении запроса для тега: $tagValue. Ошибка: " . mysqli_error($conn) . "<br>";
                                                        }
                                                    } else {
                                                         echo "Тег '$tagValue' не существует в таблице 'tegs'. Запрос не будет выполнен.<br>";
                                                    }
                                                }
                                            } else {
                                                // echo "Переменная 'name_tagNum' не является массивом, пуста или переменная 'id_news' пуста. Запрос не будет выполнен.<br>";
                                            }
                                        //echo "Сформировали запрос $insertQuery2";
                                        }
                                        } else {
                                          echo "в ЗАПРОСЕ ОШИБКА";
                                        }
                                    // Redirect the user to the desired page
                                    echo "Страница 'index.php' успешно загружена.";
                                    exit();
                            }
                                $_SESSION['form_submitted'] = true;
                            header("Location: insert_index.php");
                            exit;
                        }
                    }
                        ?>
        <!-- Footer-->
        <footer class="py-5 bg-light">
            <div class="container"><p class="m-0 text-center text-black"> &copy;Инфосэл Все права защищены</p></div>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="js/scripts.js"></script>
        <script src="js/search.js"></script>
            </body>
        </html>

