<!DOCTYPE html>
<html lang="en">
    <head>
    <script> // Этот скрипт при запуске формы сохраняет имя активной формы в LocalStorage
  
  const LS= localStorage;
  form = {name:"insert_proizv"}
  LS.setItem('form',JSON.stringify(form));

  </script>
    <script src="./js/tock.js"></script>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Инфосел</title>
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
    <form action="insert_proizv.php" method="POST">    
<?php
  $server="127.0.0.1";
  $user  ="root";
  $pass  ="1";
  $dbname ="bd_infocell";
  $dbtable ="presejl";
  $dbtable2 ="proizvoditel";
  $dbtable3 ="for_manager_oborudovanie";
  $dbtable4 ="servisnaya_model_oborudovanie";
  $conn  = mysqli_connect($server, $user,$pass, $dbname);
  $insertQuery="";

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
                            <h1 class="fw-bolder mb-1">Производитель</h1>
                            <!-- Post meta content-->
                            <a class="badge bg-secondary text-decoration-none link-light" href="#!"></a>
                        </header>
                        <section class="mb-5" >
                        <div class="container">
                        <div class="row">
                          <div class="col-md-4">
                            <div class="block">
                              <h4>Имя производителя</h4>
                                <div class="mb-3">
                                    <?php
                                        // Используем prepared statements для защиты от SQL-инъекций
                                        $query = 'SELECT DISTINCT   proizvoditel.Imya_proizvoditelya  FROM proizvoditel ORDER BY  Imya_proizvoditelya ASC';
                                    
                                        $data  = mysqli_query($conn, $query) or die('<br>Ошибка выполнения запроса');
                                        if(mysqli_num_rows($data) > 0)
                                        {
                                            $numrows=mysqli_num_rows($data);// Для отладки
                                            // echo "<br>Получены данные $numrows строк";
                                            echo"<label for='exampleDataL'  class='form-label'>Имя производителя</label>
                                                    <input class='form-control' list='datalistOption' name='Imya_proizvoditelya' id='exampleDataL' required placeholder='Введите Имя'>
                                                        <datalist id='datalistOption'>";  
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
                                        $query = 'SELECT DISTINCT  proizvoditel.Strana_proizvoditel  FROM proizvoditel ORDER BY  Strana_proizvoditel ASC';
                                    
                                        $data  = mysqli_query($conn, $query) or die('<br>Ошибка выполнения запроса');
                                        if(mysqli_num_rows($data) > 0)
                                        {
                                            $numrows=mysqli_num_rows($data);// Для отладки
                                            // echo "<br>Получены данные $numrows строк";
                                            echo"<label for='exampleDataL0'  class='form-label'>Страна Производителя</label>
                                                    <input class='form-control' list='datalistOption0' name='Strana_proizvoditel' id='exampleDataL0' required placeholder='Введите страну'>
                                                        <datalist id='datalistOption0'>";  
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
                                        $query = 'SELECT DISTINCT  proizvoditel.Ssylka_na_sajt_proizvoditelya  FROM proizvoditel ORDER BY  Ssylka_na_sajt_proizvoditelya ASC';
                                    
                                        $data  = mysqli_query($conn, $query) or die('<br>Ошибка выполнения запроса');
                                        if(mysqli_num_rows($data) > 0)
                                        {
                                            $numrows=mysqli_num_rows($data);// Для отладки
                                            // echo "<br>Получены данные $numrows строк";
                                            echo"<label for='exampleDataL1'  class='form-label'>Ссылка на сайт производителя</label>
                                                    <input class='form-control' list='datalistOption1' name='Ssylka_na_sajt_proizvoditelya' id='exampleDataL1' required placeholder='Введите ссылку'>
                                                        <datalist id='datalistOption1'>";  
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
                                  <label for="selectData9" class="form-label">Поставки в Россию</label>
                                  <select  class="form-select" id="selectData9" required name="Osushchestvlyaet_li_postavki_v_Rossiyu">
                                    <option value="">Выберите из списка</option>
                                    <option value="Да">Да</option>
                                    <option value="Нет">Нет</option>
                                    <option value="-">-</option>
                                  </select>
                                </div>

                               
                                <div class="mb-3">
                                    <?php
                                        // Получаем все возможные значения ENUM из базы данных
                                        $query = "SHOW COLUMNS FROM `proizvoditel` LIKE 'Tip_oborudovaniya'";
                                        $result = mysqli_query($conn, $query);
                                        $row = mysqli_fetch_array($result);
                                        $type = $row['Type'];
                                        $enumList = explode(",", str_replace("'", "", substr($type, 5, (strlen($type)-6))));
                                        echo $type;
                                        // Если получили значения ENUM
                                        if(!empty($enumList))
                                        {
                                            echo"<label for='exampleDataL91'  class='form-label'>Тип оборудования</label>
                                                <input class='form-control' list='datalistOption91' name='Tip_oborudovaniya' id='exampleDataL91' required placeholder='Введите ссылку'>
                                                <datalist id='datalistOption91'>";  

                                            foreach($enumList as $value)
                                            {
                                                echo"<option value='$value'>";
                                            }

                                            echo"</datalist>";
                                        }
                                        else
                                        {
                                            // Если не получили значения ENUM
                                            ?>
                                            <tr>
                                                <td>
                                                    
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    ?>
                                </div>
                                
                          </div>
                        </div>
                        <div class="col-md-4">
                            <div class="block">
                                <div class="mb-3">
                                  <label for="selectData11" class="form-label">Реестр Минпромторг</label>
                                  <select  class="form-select" id="selectData11" required name="Nahozhdenie_v_reestr_Minpromtorg">
                                    <option value="">Выберите из списка</option>
                                    <option value="Да">Да</option>
                                    <option value="Нет">Нет</option>
                                    <option value="Частично">Частично</option>
                                    <option value="-">-</option>
                                  </select>
                                </div>
                                <div class="mb-3">
                                    <?php
                                        // Используем prepared statements для защиты от SQL-инъекций
                                        $query = 'SELECT DISTINCT  proizvoditel.Status_Infocell  FROM proizvoditel ORDER BY  Status_Infocell ASC';
                                    
                                        $data  = mysqli_query($conn, $query) or die('<br>Ошибка выполнения запроса');
                                        if(mysqli_num_rows($data) > 0)
                                        {
                                            $numrows=mysqli_num_rows($data);// Для отладки
                                            // echo "<br>Получены данные $numrows строк";
                                            echo"<label for='exampleDataL5'  class='form-label'>Статус Инфосэлл</label>
                                                    <input class='form-control' list='datalistOption5' name='Status_Infocell' id='exampleDataL5' required placeholder='Введите статус '>
                                                        <datalist id='datalistOption5'>";  
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
                                        $query = 'SELECT DISTINCT  proizvoditel.Status_SMART  FROM proizvoditel ORDER BY  Status_SMART ASC';
                                    
                                        $data  = mysqli_query($conn, $query) or die('<br>Ошибка выполнения запроса');
                                        if(mysqli_num_rows($data) > 0)
                                        {
                                            $numrows=mysqli_num_rows($data);// Для отладки
                                            // echo "<br>Получены данные $numrows строк";
                                            echo"<label for='exampleDataL6'  class='form-label'>Статус Смарт</label>
                                                    <input class='form-control' list='datalistOption6' name='Status_SMART' id='exampleDataL6' required placeholder='Введите статус'>
                                                        <datalist id='datalistOption6'>";  
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
                                        $query = 'SELECT DISTINCT  proizvoditel.Rebate  FROM proizvoditel ORDER BY  Rebate ASC';
                                    
                                        $data  = mysqli_query($conn, $query) or die('<br>Ошибка выполнения запроса');
                                        if(mysqli_num_rows($data) > 0)
                                        {
                                            $numrows=mysqli_num_rows($data);// Для отладки
                                            // echo "<br>Получены данные $numrows строк";
                                            echo"<label for='exampleDataL7'  class='form-label'>Rebate</label>
                                                    <input class='form-control' list='datalistOption7' name='Rebate' id='exampleDataL7' required placeholder='Введите Rebate'>
                                                        <datalist id='datalistOption7'>";  
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
                                <style>
                                            .hidden-form {
                                                display: none;
                                            }
                                        </style>
                                <div class="mb-3 hidden-form">
                                    <?php  
                                        // Используем prepared statements для защиты от SQL-инъекций  
                                        $query = 'SELECT DISTINCT proizvoditel.Data_vneseniya_izmenenij FROM proizvoditel ORDER BY Data_vneseniya_izmenenij ASC';  
                                        $data = mysqli_query($conn, $query) or die('<br>Ошибка выполнения запроса');  
                                        $numrows = mysqli_num_rows($data);  
                                        echo "<label for='exampleDataLi100' class='form-label'>Дата ввода</label>  
                                            <input class='form-control' list='datalistOptions100' id='exampleDataLi100' name='Data_vneseniya_izmenenij' value='" . date('Y-m-d') . "' required placeholder='Введите дату'>  
                                            <datalist id='datalistOptions100'>";    
                                    ?>  
                                </div>
                            </div>
                        </div>
                      </div>
                      <input class="btn btn-secondary"  type="submit"  name="Применить" id="butt_apply" value="Применить"></input>
                      <input class="btn btn-secondary" type="submit"  name="Сброс настроек" id="buttonClear" value="Сброс настроек"  onClick="window.location.reload();"></input>
                      
                        <?php
                            $server="127.0.0.1";
                            $user  ="root";
                            $pass  ="1";
                            $dbname ="bd_infocell";
                            $dbtable2 ="proizvoditel";
                            $conn  = mysqli_connect($server, $user,$pass, $dbname);
                            
                            //proizvoditel
                            $Imya_proizvoditelya = "";
                            $Strana_proizvoditel = "";
                            $Ssylka_na_sajt_proizvoditelya = "";
                            $Osushchestvlyaet_li_postavki_v_Rossiyu = "";
                            $Tip_oborudovaniya = "";
                            $Nahozhdenie_v_reestr_Minpromtorg = "";
                            $Status_Infocell = "";
                            $Status_SMART = "";
                            $Rebate = "";
                            $Data_vneseniya_izmenenij = "";

                            if(isset($_POST['Применить']))
                            {//проверяем формы на заполнение
                                // echo "DEBUG - Есть POST";
                                // также точка с запятой отсутствовала
                                //proizvoditel
                                $Imya_proizvoditelya = $_POST['Imya_proizvoditelya'];
                                $Strana_proizvoditel = $_POST['Strana_proizvoditel'];
                                $Ssylka_na_sajt_proizvoditelya = $_POST['Ssylka_na_sajt_proizvoditelya'];
                                $Osushchestvlyaet_li_postavki_v_Rossiyu = $_POST['Osushchestvlyaet_li_postavki_v_Rossiyu'];
                                $Tip_oborudovaniya = $_POST['Tip_oborudovaniya'];
                                $Nahozhdenie_v_reestr_Minpromtorg = $_POST['Nahozhdenie_v_reestr_Minpromtorg'];
                                $Status_Infocell = $_POST['Status_Infocell'];
                                //servisnaya_model_oborudovanie
                                $Status_SMART = $_POST['Status_SMART'];
                                $Rebate = $_POST['Rebate'];
                                $Data_vneseniya_izmenenij = $_POST['Data_vneseniya_izmenenij'];
                            }
                            //создаем условие для выборки
                            if ($Imya_proizvoditelya !=""  || $Strana_proizvoditel !="" || $Ssylka_na_sajt_proizvoditelya !="" || $Osushchestvlyaet_li_postavki_v_Rossiyu !="" ||
                            $Tip_oborudovaniya !="" || $Nahozhdenie_v_reestr_Minpromtorg !="" || $Status_Infocell !=""  || $Status_SMART !="" || $Rebate !="" ||
                                $Data_vneseniya_izmenenij !="")
                            {
                                
                                $insertQuery = "INSERT INTO proizvoditel (Imya_proizvoditelya , Strana_proizvoditel , Ssylka_na_sajt_proizvoditelya ,Osushchestvlyaet_li_postavki_v_Rossiyu ,Tip_oborudovaniya, Nahozhdenie_v_reestr_Minpromtorg ,Status_Infocell , Status_SMART ,Rebate ,Data_vneseniya_izmenenij) 
                                VALUES ('$Imya_proizvoditelya', '$Strana_proizvoditel','$Ssylka_na_sajt_proizvoditelya','$Osushchestvlyaet_li_postavki_v_Rossiyu','$Tip_oborudovaniya', '$Nahozhdenie_v_reestr_Minpromtorg','$Status_Infocell','$Status_SMART','$Rebate','$Data_vneseniya_izmenenij')";
                            }
                            if (!empty($insertQuery)) {
                               
                                $result = mysqli_query($conn, $insertQuery) or die('<br>Ошибка выполнения запроса: ' . mysqli_error($conn));
                                if ($result) {
                                    echo "Запрос выполнен успешно";
                                } else {
                                    echo "Ошибка выполнения запроса: " . mysqli_error($conn);
                                }
                            }
                           
                        ?>   


                </div>
            </div>
        </div>
    </form>
        <!-- Footer-->
        <footer class="py-5 bg-light">
            <div class="container"><p class="m-0 text-center text-black"> &copy;Инфосэл Все права защищены</p></div>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="js/scripts.js"></script>
        <script src="js/search.js"></script>
            </body>
        </html>

