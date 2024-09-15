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
        <script src="./js/forma.js"></script>
    </head>
    <body>
    
          

        <!-- Page content-->
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-8">
                <form action="insert_doci.php" method="POST"> 
                    <!-- Post content-->
                    <article>
                        <!-- Post header-->
                        <header class="mb-4">
                            <!-- Post title-->
                            <h1 class="fw-bolder mb-1">О компании</h1>
                            <!-- Post meta content-->
                            <a class="badge bg-secondary text-decoration-none link-light" href="#!"></a>
                        </header>
                     
                        <div class="container">
                        <?php
                        $server="127.0.0.1";
                        $user  ="root";
                        $pass  ="1";
                        $dbname ="bd_infocell_docs";
                        $dbtable ="doc";
                        $dbtable1 ="doc_tag";
                        $dbtable2 ="tag1";
                        $conn  = mysqli_connect($server, $user,$pass, $dbname);
                        ?>
                            <div class="row">
                            <div class="col-md-4">
                                <div class="block">
                                <h4>департамент</h4>
                                <div class="mb-3">
                                <label for="selectData11" class="form-label">департамент</label>
                                <select class="form-select" id="selectData11" required name="name_doc">
                                    <option value="">Выберите из списка</option>
                                    <option value="Технический Департамент">Технический Департамент</option>
                                    <option value="Отдел кадров">Отдел кадров</option>
                                    <option value="Регламенты">Регламенты</option>
                                    <option value="Департамент закупок и логистики">Департамент закупок и логистики</option>
                                    <option value="Финансы и бухгалтерия">Финансы и бухгалтерия</option>
                                    <option value="Юридический отдел">Юридический отдел</option>
                                    <option value="Департамент комплексных проектов">Департамент комплексных проектов</option>
                                    <option value="Департамент технической политики и развития">Департамент технической политики и развития</option>
                                  </select>
                                  
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
                            <div class="col-md-4">
                                <div class="block">
                                <h4>Категории</h4>
                                <div class="mb-3">
                                <?php
                                        // Используем prepared statements для защиты от SQL-инъекций
                                        $query = 'SELECT DISTINCT   tag1.folder_level_1  FROM tag1 ORDER BY  folder_level_1 ASC';
                                        $data = mysqli_query($conn, $query) or die('<br>Ошибка выполнения запроса');
                                        if(mysqli_num_rows($data) > 0) {
                                            $numrows = mysqli_num_rows($data);
                                            echo'<input type="hidden" name="folder_level_1" value="" />';
                                            echo "<label for='exampleDataL44' class='form-label'>folder_level_1</label>
                                                <input class='form-control' list='datalistOption44' id='exampleDataL44' name='folder_level_1'  placeholder='Введите folder_level_1'>
                                                <datalist id='datalistOption44'>";  
                                            while($row = mysqli_fetch_assoc($data)) {
                                                foreach ($row as $cellValue) {
                                                    echo "<option value='$cellValue'>";
                                                }
                                            }
                                            echo "</datalist>";
                                        }
                                        else {
                                            echo'<input type="hidden" name="folder_level_1" value="" />';
                                            echo "<label for='exampleDataL44' class='form-label'>folder_level_1</label>
                                                <input class='form-control' id='exampleDataL44' name='folder_level_1'  placeholder='Введите folder_level_1'>
                                                <span class='text-danger'>Данные не доступны</span>";
                                        }
                                    ?>
                               
                              
                                    </div>
                                    <div class="mb-3">
                                    <?php
                                        // Используем prepared statements для защиты от SQL-инъекций
                                        $query = 'SELECT DISTINCT   tag1.folder_level_2  FROM tag1 ORDER BY  folder_level_2 ASC';
                                        $data = mysqli_query($conn, $query) or die('<br>Ошибка выполнения запроса');
                                        if(mysqli_num_rows($data) > 0) {
                                            $numrows = mysqli_num_rows($data);
                                            echo'<input type="hidden" name="folder_level_2" value="" />';
                                            echo "<label for='exampleDataL44' class='form-label'> folder_level_2</label>
                                                <input class='form-control' list='datalistOption44' id='exampleDataL44' name='folder_level_2'  placeholder='Введите folder_level_2'>
                                                <datalist id='datalistOption44'>";  
                                            while($row = mysqli_fetch_assoc($data)) {
                                                foreach ($row as $cellValue) {
                                                    echo "<option value='$cellValue'>";
                                                }
                                            }
                                            echo "</datalist>";
                                        }
                                        else {
                                            echo'<input type="hidden" name="folder_level_2" value="" />';
                                            echo "<label for='exampleDataL44' class='form-label'>folder_level_2</label>
                                                <input class='form-control' id='exampleDataL44' name='folder_level_2'  placeholder='Введите folder_level_2'>
                                                <span class='text-danger'>Данные не доступны</span>";
                                        }
                                    ?>
                                        
                                    </div>
                                    <div class="mb-3">
                                    <?php
                                        // Используем prepared statements для защиты от SQL-инъекций
                                        $query = 'SELECT DISTINCT   tag1.folder_level_3  FROM tag1 ORDER BY  folder_level_3 ASC';
                                        $data = mysqli_query($conn, $query) or die('<br>Ошибка выполнения запроса');
                                        if(mysqli_num_rows($data) > 0) {
                                            $numrows = mysqli_num_rows($data);
                                            echo'<input type="hidden" name="folder_level_3" value="" />';
                                            echo "<label for='exampleDataL12' class='form-label'> folder_level_3</label>
                                                <input class='form-control' list='datalistOption12' id='exampleDataL12' name='folder_level_3'  placeholder='Введите folder_level_3'>
                                                <datalist id='datalistOption12'>";  
                                            while($row = mysqli_fetch_assoc($data)) {
                                                foreach ($row as $cellValue) {
                                                    echo "<option value='$cellValue'>";
                                                }
                                            }
                                            echo "</datalist>";
                                        }
                                        else {
                                            echo'<input type="hidden" name="folder_level_3" value="" />';
                                            echo "<label for='exampleDataL12' class='form-label'>folder_level_3</label>
                                                <input class='form-control' id='exampleDataL12' name='folder_level_3'  placeholder='Введите folder_level_3'>
                                                <span class='text-danger'>Данные не доступны</span>";
                                        }
                                    ?>
                                    </div>
                                    <div class="mb-3">
                                    <?php
                                        // Используем prepared statements для защиты от SQL-инъекций
                                        $query = 'SELECT DISTINCT   tag1.folder_level_4  FROM tag1 ORDER BY  folder_level_4 ASC';
                                        $data = mysqli_query($conn, $query) or die('<br>Ошибка выполнения запроса');
                                        if(mysqli_num_rows($data) > 0) {
                                            $numrows = mysqli_num_rows($data);
                                            echo'<input type="hidden" name="folder_level_4" value="" />';
                                            echo "<label for='exampleDataL13' class='form-label'> folder_level_4</label>
                                                <input class='form-control' list='datalistOption13' id='exampleDataL13' name='folder_level_4'  placeholder='Введите folder_level_4'>
                                                <datalist id='datalistOption13'>";  
                                            while($row = mysqli_fetch_assoc($data)) {
                                                foreach ($row as $cellValue) {
                                                    echo "<option value='$cellValue'>";
                                                }
                                            }
                                            echo "</datalist>";
                                        }
                                        else {
                                            echo'<input type="hidden" name="folder_level_4" value="" />';
                                            echo "<label for='exampleDataL13' class='form-label'>folder_level_4</label>
                                                <input class='form-control' id='exampleDataL13' name='folder_level_4'  placeholder='Введите folder_level_4'>
                                                <span class='text-danger'>Данные не доступны</span>";
                                        }
                                    ?>
                                    </div>
                                    <div class="mb-3">
                                    <?php
                                        // Используем prepared statements для защиты от SQL-инъекций
                                        $query = 'SELECT DISTINCT   tag1.folder_level_5  FROM tag1 ORDER BY  folder_level_5 ASC';
                                        $data = mysqli_query($conn, $query) or die('<br>Ошибка выполнения запроса');
                                        if(mysqli_num_rows($data) > 0) {
                                            $numrows = mysqli_num_rows($data);
                                            echo'<input type="hidden" name="folder_level_5" value="" />';
                                            echo "<label for='exampleDataL14' class='form-label'> folder_level_5</label>
                                                <input class='form-control' list='datalistOption14' id='exampleDataL14' name='folder_level_5'  placeholder='Введите folder_level_5'>
                                                <datalist id='datalistOption14'>";  
                                            while($row = mysqli_fetch_assoc($data)) {
                                                foreach ($row as $cellValue) {
                                                    echo "<option value='$cellValue'>";
                                                }
                                            }
                                            echo "</datalist>";
                                        }
                                        else {
                                            echo'<input type="hidden" name="folder_level_5" value="" />';
                                            echo "<label for='exampleDataL14' class='form-label'>folder_level_5</label>
                                                <input class='form-control' id='exampleDataL14' name='folder_level_5'  placeholder='Введите folder_level_5'>
                                                <span class='text-danger'>Данные не доступны</span>";
                                        }
                                    ?>
                               
                                    </div>
                                    <div class="mb-3">
                                    <label for="selectData1131" class="form-label">расширение файла</label>
                                    <select class="form-select" id="selectData131"  name="type">
                                    <option value="">Выберите из списка</option>
                                    <option value="Pdf">Pdf</option>
                                    <option value="Docx">Docx</option>
                                    <option value="Xlsm">Xlsm</option>
                                    </select>
                                 
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                      <input class="btn btn-secondary"   type="submit"  name="Применить" id="butt_apply" value="Отправить новость"></input>
                      <?php
                            $server = "127.0.0.1";
                            $user = "root";
                            $pass = "1";
                            $dbname ="bd_infocell_docs";
                            $dbtable ="doc";
                            $dbtable1 ="doc_tag";
                            $dbtable2 ="tag1";
                            $conn = mysqli_connect($server, $user, $pass, $dbname);
                            $name_doc = "";
                            $doc_date = "";
                            $file_link = "";
                            $img_link = "";
                            $folder_level_1 = "";
                            $folder_level_2 = "";
                            $folder_level_3 = "";
                            $folder_level_4 = "";
                            $folder_level_5 = "";
                            $type = "";
                            
                           // Объявим $name_tag как массив
                            if (isset($_POST['Применить'])) {
                                // Получаем данные из формы
                                $name_doc = $_POST['name_doc'];
                                $doc_date = $_POST['doc_date'];
                                $file_link = $_POST['file_link'];
                                $img_link = $_POST['img_link'];
                                $folder_level_1 = $_POST['folder_level_1'];
                                $folder_level_2 = $_POST['folder_level_2'];
                                $folder_level_3 = $_POST['folder_level_3'];
                                $folder_level_4 = $_POST['folder_level_4'];
                                $folder_level_5 = $_POST['folder_level_5'];
                                $type = $_POST['type'];
                            // создаем условие для выборки
                            if ( $name_doc != "" ||$doc_date != ""||  $file_link != "" || $img_link != "" || $folder_level_1 != "" || $folder_level_2 != ""||  $folder_level_3 != "" || $folder_level_4 != "" || $folder_level_5 != "" || $Fail_voc != "" ) {
                                $mass = array(
                                    "0" => "$name_doc",
                                    "1" => "$doc_name",
                                    "2" => "$doc_date",
                                    "3" => "$file_link",
                                    "4" => "$img_link",
                                    "5" => "$folder_level_1",
                                    "6" => "$folder_level_2",
                                    "7" => "$folder_level_3",
                                    "8" => "$folder_level_4",
                                    "9" => "$folder_level_5",
                                    "10" => "$type"
                                );
                                $mass1 = array(
                                    "0" => "document.name_doc",
                                    "1" => "document.doc_name",
                                    "2" => "document.doc_date",
                                    "3" => "document.file_link",
                                    "4" => "document.img_link",
                                    "5" => "document.folder_level_1",
                                    "6" => "document.folder_level_2",
                                    "7" => "document.folder_level_3",
                                    "8" => "document.folder_level_4",
                                    "9" => "document.folder_level_5",
                                    "10" => "document.type",
                                );
                                
                                $a = "";
                                for ($i = 0; $i < 11; $i++) {
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
                                foreach ($_POST as $key => $value) {
                                    echo "Element $key: $value<br>";
                                }
                                $SQLCond = ""; // Не используется в данном коде, можно удалить
                              
                            
                                // echo "$a1";
        


                              echo  "Сформировали запрос $query";
                            
                                // Start a transaction
                                
                                    // Execute the first query
                                    $query0 = "SELECT doc.name_doc FROM doc";
                                    
                                    // Formulate the INSERT query, and ensure $folder_level_4 and $folder_level_5 are set to empty strings if they are not defined
                              
                                
                                    $insertQuery2 = "INSERT INTO doc (name_doc, doc_date, file_link,  folder_level_1, folder_level_2, folder_level_3, folder_level_4, folder_level_5, type) 
                                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                   
                   
                       // Создайте подготовленное выражение
                       $stmt = mysqli_prepare($conn, $insertQuery2);

                       if ($stmt) {
                           // Привяжите параметры к заполнителям
                           mysqli_stmt_bind_param($stmt, "sssssssssss", $name_doc, $doc_date, $file_link,  $folder_level_1, $folder_level_2, $folder_level_3, $folder_level_4, $folder_level_5, $type);

                           // Выполните подготовленное выражение
                           if (mysqli_stmt_execute($stmt)) {
                               echo "Данные успешно вставлены!";
                           } else {
                               echo "Ошибка выполнения подготовленного выражения: " . mysqli_stmt_error($stmt);
                           }

                           // Закройте подготовленное выражение
                           mysqli_stmt_close($stmt);
                       } else {
                           echo "Ошибка при подготовке выражения: " . mysqli_error($conn);
                       }
                                
                                        } else {
                                          echo "в ЗАПРОСЕ ОШИБКА";
                                        }
                                   
                                    exit();
                            }
                        ?>
                            </form>

                </div>
            </div>
        </div>

        <!-- Footer-->
        <footer class="py-5 bg-light">
            <div class="container"><p class="m-0 text-center text-black"> &copy;Инфосэл Все права защищены</p></div>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="js/scripts.js"></script>
        <script src="js/search.js"></script>
            </body>
        </html>
