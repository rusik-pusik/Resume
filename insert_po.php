<!DOCTYPE html>
<html lang="en">
    <head>
    <script> // Этот скрипт при запуске формы сохраняет имя активной формы в LocalStorage
  
  const LS= localStorage;
  form = {name:"insert_po"}
  LS.setItem('form',JSON.stringify(form));

  </script>
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
    <form action="insert_po.php" method="POST">    
<?php
  $server="127.0.0.1";
  $user  ="root";
  $pass  ="1";
  $dbname ="bd_infocell";
  $dbtable ="servisnaya_model_po";
  $dbtable2 ="proizvoditel";
  $dbtable3 ="for_manager_po";
  $dbtable5 ="presejl";
  $conn  = mysqli_connect($server, $user,$pass, $dbname);
  

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
                              <h4>Производитель</h4>
                              <div class="mb-3">
                              <?php
                                // Используем prepared statements для защиты от SQL-инъекций
                                $query = 'SELECT DISTINCT  proizvoditel.Imya_proizvoditelya  FROM proizvoditel';
                               
                                $data  = mysqli_query($conn, $query) or die('<br>Ошибка выполнения запроса');
                                if(mysqli_num_rows($data) > 0)
                                {
                                    $numrows=mysqli_num_rows($data);// Для отладки
                                    // echo "<br>Получены данные $numrows строк";
                                    echo"<label for='exampleDataL1'  class='form-label'>Имя производителя</label>
                                            <input class='form-control' list='datalistOption1' name='Imya_proizvoditelya' id='exampleDataL1' required placeholder='Введите Имя'>
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
                                  <label for="selectData10" class="form-label">Тип оборудования</label>
                                  <select class="form-select" id="selectData10"required name="Tip_oborudovaniya">
                                    <option value="">Выберите из списка</option>
                                    <option value="Сервера">Сервера</option>
                                    <option value="СХД">СХД</option>
                                    <option value="SAN сеть">SAN сеть</option>
                                    <option value="Сетевое офисное">Сетевое офисное</option>
                                    <option value="Сетевое WAN">Сетевое WAN</option>
                                    <option value="Сетевое WiFi">Сетевое WiFi</option>
                                    <option value="Сетевое цод">Сетевое цод</option>
                                    <option value="ВКС">ВКС</option>
                                    <option value="IP ATC">IP ATC</option>
                                    <option value="Шлюзы">Шлюзы</option>
                                    <option value="Телефонные аппараты">Телефонные аппараты</option>
                                    <option value="Блэйд-Сервера">Блэйд-Сервера</option>
                                    <option value="Бесперебойное питание">Бесперебойное питание</option>
                                    <option value="Клиентские устройства">Клиентские устройства</option>
                                    <option value="Процессора">Процессора</option>
                                    <option value="Память (ОЗУ)">Память (ОЗУ)</option>
                                    <option value="HDD">HDD</option>
                                    <option value="DWDM">DWDM</option>
                                  </select>
                                </div>

                                <div class="mb-3">
                                  <label for="selectData9" class="form-label">Реестр Минпромторг</label>
                                  <select  class="form-select" id="selectData9" required name="Nahozhdenie_v_reestr_Minpromtorg">
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
                                $query = 'SELECT DISTINCT  proizvoditel.Strana_proizvoditel  FROM proizvoditel';
                               
                                $data  = mysqli_query($conn, $query) or die('<br>Ошибка выполнения запроса');
                                if(mysqli_num_rows($data) > 0)
                                {
                                    $numrows=mysqli_num_rows($data);// Для отладки
                                    // echo "<br>Получены данные $numrows строк";
                                    echo"<label for='exampleDataL2'  class='form-label'>Страна производителя</label>
                                            <input class='form-control'name='Strana_proizvoditel' list='datalistOption2' id='exampleDataL2'  placeholder='Введите страну'>
                                                <datalist id='datalistOption2'>";  
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
                                $query = 'SELECT DISTINCT  proizvoditel.Ssylka_na_sajt_proizvoditelya FROM proizvoditel';
                               
                                $data  = mysqli_query($conn, $query) or die('<br>Ошибка выполнения запроса');
                                if(mysqli_num_rows($data) > 0)
                                {
                                    $numrows=mysqli_num_rows($data);// Для отладки
                                    // echo "<br>Получены данные $numrows строк";
                                    echo"<label for='exampleDataL3'  class='form-label'>Поставляет в Россию?</label>
                                            <input class='form-control' list='datalistOption3' name='Ssylka_na_sajt_proizvoditelya' id='exampleDataL3'  placeholder='Введите ответ'>
                                                <datalist id='datalistOption3'>";  
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
                                  <label for="selectData15" class="form-label" >Осуществляет поставки в Россию</label>
                                  <select class="form-select" id="selectData15"  name="Osushchestvlyaet_li_postavki_v_Rossiyu">
                                    <option value="">Выберите из списка</option>
                                    <option value="Да">Да</option>
                                    <option value="Нет">Нет</option>
                                    <option value="-">-</option>
                                  </select>
                                </div>
                                
                                
                                

                                <div class="mb-3">
                              <?php
                                // Используем prepared statements для защиты от SQL-инъекций
                                $query = 'SELECT DISTINCT  proizvoditel.Status_Infocell FROM proizvoditel';
                               
                                $data  = mysqli_query($conn, $query) or die('<br>Ошибка выполнения запроса');
                                if(mysqli_num_rows($data) > 0)
                                {
                                    $numrows=mysqli_num_rows($data);// Для отладки
                                    // echo "<br>Получены данные $numrows строк";
                                    echo"<label for='exampleDataL4'  class='form-label'>Статус Инфосэл</label>
                                            <input class='form-control'name='Status_Infocell' list='datalistOption4' id='exampleDataL4'  placeholder='Введите ответ'>
                                                <datalist id='datalistOption4'>";  
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
                                $query = 'SELECT DISTINCT  proizvoditel.Status_SMART FROM proizvoditel';
                               
                                $data  = mysqli_query($conn, $query) or die('<br>Ошибка выполнения запроса');
                                if(mysqli_num_rows($data) > 0)
                                {
                                    $numrows=mysqli_num_rows($data);// Для отладки
                                    // echo "<br>Получены данные $numrows строк";
                                    echo"<label for='exampleDataL5' class='form-label'>Статус SMART</label>
                                            <input class='form-control' list='datalistOption5' name='Status_SMART'  id='exampleDataL5'  placeholder='Введите ответ'>
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
                                $query = 'SELECT DISTINCT  proizvoditel.Rebate FROM proizvoditel';
                               
                                $data  = mysqli_query($conn, $query) or die('<br>Ошибка выполнения запроса');
                                if(mysqli_num_rows($data) > 0)
                                {
                                    $numrows=mysqli_num_rows($data);// Для отладки
                                    // echo "<br>Получены данные $numrows строк";
                                    echo"<label for='exampleDataL6'  class='form-label'>Rebate</label>
                                            <input class='form-control' name='Rebate' list='datalistOption6' id='exampleDataL6'  placeholder='Введите ответ'>
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
                                $query = 'SELECT DISTINCT  proizvoditel.Data_vneseniya_izmenenij FROM proizvoditel';
                               
                                $data  = mysqli_query($conn, $query) or die('<br>Ошибка выполнения запроса');
                                if(mysqli_num_rows($data) > 0)
                                {
                                    $numrows=mysqli_num_rows($data);// Для отладки
                                    // echo "<br>Получены данные $numrows строк";
                                    echo"<label for='exampleDataL7'  class='form-label'>Дата внесения</label>
                                            <input class='form-control' name='Data_vneseniya_izmenenij' list='datalistOption7' id='exampleDataL7' placeholder='Введите ответ'>
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
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="block">
                              <h4>Пресейл</h4>
                              <div class="mb-3">
                              <?php
                                // Используем prepared statements для защиты от SQL-инъекций
                                $query = 'SELECT DISTINCT  presejl.Postavshik FROM presejl';
                               
                                $data  = mysqli_query($conn, $query) or die('<br>Ошибка выполнения запроса');
                                if(mysqli_num_rows($data) > 0)
                                {
                                    $numrows=mysqli_num_rows($data);// Для отладки
                                    // echo "<br>Получены данные $numrows строк";
                                    echo"<label for='exampleDataLi1' class='form-label'>Поставщик</label>
                                            <input class='form-control'  list='datalistOptions1' id='exampleDataLi1' name='Postavshik' required placeholder='Введите поставщика'>
                                                <datalist id='datalistOptions1'>";  
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
                                  <label for="selectData6" class="form-label">Канал поставки</label>
                                  <select class="form-select" id="selectData6" required name="Kanal_postavki">
                                    <option value="">Выберите из списка</option>
                                    <option value="Прямой">Прямой</option>
                                    <option value="Дистрибьютер">Дистрибьютер</option>
                                    <option value="Серый">Серый</option>
                                    <option value="-">-</option>
                                  </select>
                                </div>
                                <div class="mb-3">
                                  <label for="selectData7" class="form-label">Наличие защиты сделки</label>
                                  <select class="form-select" id="selectData7" required name="Nalichie_zashchity_sdelki">
                                    <option value="">Выберите из списка</option>
                                    <option value="Есть">Есть</option>
                                    <option value="Нет">Нет</option>
                                    <option value="-">-</option>
                                  </select>
                                </div>
                                <div class="mb-3">
                                  <label for="selectData8" class="form-label">За кем пресейл</label>
                                  <select class="form-select" id="selectDat8"required name="Za_kem_presejl">
                                    <option value="">Выберите из списка</option>
                                    <option value="ТД">ТД</option>
                                    <option value="Дистрибьютер">Дистрибьютер</option>
                                    <option value="Вендор">Вендор</option>
                                    <option value="Нет">Нет</option>
                                    <option value="-">-</option>
                                  </select>
                                </div>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="block">
                              <h4>Сервисное оборудование  ПО</h4>
                              <div class="mb-3">
                                  <label for="selectData11" class="form-label">За кем настройка</label>
                                  <select class="form-select" id="selectData11" required name="Za_kem_podderzhka_PO">
                                    <option value="">Выберите из списка</option>
                                    <option value="ТД">ТД</option>
                                    <option value="Вендор">Вендор</option>
                                    <option value="Нет">Нет</option>
                                    <option value="ТД\\вендор">ТД\\вендор</option>
                                    <option value="-">-</option>
                                  </select>
                                </div>
                                <div class="mb-3">
                                  <label for="selectData12" class="form-label">За кем сервис</label>
                                  <select class="form-select" id="selectData12" required name="Za_kem_predostavlenie_proshivok">
                                    <option value="">Выберите из списка</option>
                                    <option value="ТД">ТД</option>
                                    <option value="Вендор">Вендор</option>
                                    <option value="Нет">Нет</option>
                                    <option value="ТД\\вендор">ТД\\вендор</option>
                                    <option value="-">-</option>
                                  </select>
                                </div>
                                </div>
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
                            $dbtable ="presejl";
                            $dbtable2 ="proizvoditel";
                            $dbtable3 ="for_manager_oborudovanie";
                            $dbtable4 ="servisnaya_model_oborudovanie";
                            $conn  = mysqli_connect($server, $user,$pass, $dbname);
                            $query = "SELECT presejl.id_prisejla FROM presejl ";
                            
                            $Postavshik = "";
                            $Kanal_postavki = "";
                            $Nalichie_zashchity_sdelki = "";
                            $Za_kem_presejl = "";
                            
                
                            
                        if(isset($_POST['Применить']))
                        {
                            
                            //presejl
                            $Postavshik = $_POST['Postavshik'];
                            $Kanal_postavki = $_POST['Kanal_postavki'];
                            $Nalichie_zashchity_sdelki = $_POST['Nalichie_zashchity_sdelki'];
                            $Za_kem_presejl = $_POST['Za_kem_presejl'];
                        }
                        //создаем условие для выборки
                        if ( $Postavshik !="" ||
                           $Kanal_postavki !="" || $Nalichie_zashchity_sdelki !="" || $Za_kem_presejl !=""  )
                    {
                        $mass = array(
                            "0" => "$Postavshik",
                            "1" => "$Kanal_postavki",
                            "2" => "$Nalichie_zashchity_sdelki",
                            "3" => "$Za_kem_presejl",
                        );
                        $mass1 = array(
                          "0" => "presejl.Postavshik",
                          "1" => "presejl.Kanal_postavki",
                          "2" => "presejl.Nalichie_zashchity_sdelki",
                          "3" => "presejl.Za_kem_presejl",
                        );
                        $a="";
                        $SQLCond="";
                        for($i=0; $i<4; $i++)
                        {
                            if(!($mass[$i]==""))
                            {
                                $SQLCond0="";
                                $SQLCond0="$mass1[$i]= '$mass[$i]'".$SQLCond0;
                                //  echo $SQLCond0;
                                if(($SQLCond0!="" and $a!=""))
                                {
                                    $a = $a . ' AND ' . $SQLCond0;
                                }
                                else 
                                {
                                    $a = $a . $SQLCond0;
                                }
                            }
                        }
                                $query = "SELECT presejl.id_prisejla FROM presejl WHERE $a";
                      
                    }

                        //  echo  "Сформировали запрос $query";
            $data  = mysqli_query($conn, $query) or die('<br>Ошибка выполнения запроса');
                if(mysqli_num_rows($data) > 0)
                {
                    $numrows=mysqli_num_rows($data);// Для отладки
                    // echo "<br>Получены данные $numrows строк";
                    while($row = mysqli_fetch_assoc($data))
                    {// Формируем таблицу
                        $idPreseyl = $row['id_prisejla'];
                        ?>
                        <tr>
                            <?php
                            foreach ($row as $key => $cellValue) {
                                echo "<td> $cellValue </td>";
                            }
                            ?>
                        </tr>
                        <?php
                    }
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
                            $query = "SELECT
                            servisnaya_model_oborudovanie.id_servisnoj_modeli_oborudovaniya
                        FROM
                        servisnaya_model_oborudovanie";
                            //proizvoditel
                            //servisnaya_model_oborudovanie
                            $Za_kem_podderzhka_PO = "";
                            $za_kem_servis = "";
                            $za_kem_ZIP = "";
                            $za_kem_predostavlenie_proshivok = "";
                            
                
                            
                        if(isset($_POST['Применить']))
                        {//проверяем формы на заполнение
                            //servisnaya_model_oborudovanie
                            $za_kem_nastrojka = $_POST['za_kem_nastrojka'];
                            $za_kem_servis = $_POST['za_kem_servis'];
                            $za_kem_ZIP = $_POST['za_kem_ZIP'];
                            $za_kem_predostavlenie_proshivok = $_POST['za_kem_predostavlenie_proshivok'];
                        }
                        //создаем условие для выборки
                        if ( $za_kem_nastrojka !="" || $za_kem_servis !="" ||
                            $za_kem_ZIP !="" || $za_kem_predostavlenie_proshivok !="")
                    {
                        $mass = array(
                            "0" => "$za_kem_nastrojka",
                            "1" => "$za_kem_servis",
                            "2" => "$za_kem_ZIP",
                            "3" => "$za_kem_predostavlenie_proshivok",
                        );
                        $mass1 = array(
                          "0" => "servisnaya_model_oborudovanie.za_kem_nastrojka",
                          "1" => "servisnaya_model_oborudovanie.za_kem_servis",
                          "2" => "servisnaya_model_oborudovanie.za_kem_ZIP",
                          "3" => "servisnaya_model_oborudovanie.za_kem_predostavlenie_proshivok",
                        );
                        $a="";
                        $SQLCond="";
                        for($i=0; $i<4; $i++)
                        {
                            if(!($mass[$i]==""))
                            {
                                $SQLCond0="";
                                $SQLCond0="$mass1[$i]= '$mass[$i]'".$SQLCond0;
                                //  echo $SQLCond0;
                                if(($SQLCond0!="" and $a!=""))
                                {
                                    $a = $a . ' AND ' . $SQLCond0;
                                }
                                else
                                {
                                    $a = $a . $SQLCond0;
                                }
                            }
                        }
                                $query = "SELECT servisnaya_model_oborudovanie.id_servisnoj_modeli_oborudovaniya FROM servisnaya_model_oborudovanie WHERE $a";
                              }

                // echo  "Сформировали запрос $query";
                $data  = mysqli_query($conn, $query) or die('<br>Ошибка выполнения запроса');
                if(mysqli_num_rows($data) > 0)
                {
                    $numrows=mysqli_num_rows($data);// Для отладки
                    // echo "<br>Получены данные $numrows строк";
                    while($row = mysqli_fetch_assoc($data))
                    {// Формируем таблицу
                        $id_serv_oborud = $row['id_servisnoj_modeli_oborudovaniya'];
                        ?>
                        <tr>

                            <?php
                            foreach ($row as $key => $cellValue) {
                                echo "<td> $cellValue </td>";
                            }
                            ?>
                        </tr>
                        <?php
                    }
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
                                   <?php
                              $server="127.0.0.1";
                              $user  ="root";
                              $pass  ="1";
                              $dbname ="bd_infocell";
                              $dbtable ="servisnaya_model_po";
                              $dbtable2 ="proizvoditel";
                              $dbtable3 ="for_manager_po";
                              $dbtable5 ="presejl";
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
                            //presejl
                            $Postavshik = "";
                            $Kanal_postavki = "";
                            $Nalichie_zashchity_sdelki = "";
                            $Za_kem_presejl = "";
                            //servisnaya_model_oborudovanie
                            $za_kem_nastrojka = "";
                            $za_kem_servis = "";
                            $za_kem_ZIP = "";
                            $za_kem_predostavlenie_proshivok = "";
                            
                
                            
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
                            $Status_SMART = $_POST['Status_SMART'];
                            $Rebate = $_POST['Rebate'];
                            
                            //presejl
                            $Postavshik = $_POST['Postavshik'];
                            $Kanal_postavki = $_POST['Kanal_postavki'];
                            $Nalichie_zashchity_sdelki = $_POST['Nalichie_zashchity_sdelki'];
                            $Za_kem_presejl = $_POST['Za_kem_presejl'];
                            //servisnaya_model_oborudovanie
                            $za_kem_nastrojka = $_POST['za_kem_nastrojka'];
                            $za_kem_servis = $_POST['za_kem_servis'];
                            $za_kem_ZIP = $_POST['za_kem_ZIP'];
                            $za_kem_predostavlenie_proshivok = $_POST['za_kem_predostavlenie_proshivok'];
                            $Data_vneseniya_izmenenij = $_POST['Data_vneseniya_izmenenij'];
                            $fData_vneseniya_izmenenij = strtotime($Data_vneseniya_izmenenij);
                            $fData_vneseniya_izmenenij=date("Y/m/d",$fData_vneseniya_izmenenij);
                        }
                        //создаем условие для выборки
                        if ($Imya_proizvoditelya !="" || $Strana_proizvoditel !="" || $Ssylka_na_sajt_proizvoditelya !="" ||
                         $Osushchestvlyaet_li_postavki_v_Rossiyu !="" || $Tip_oborudovaniya !="" || $Nahozhdenie_v_reestr_Minpromtorg !="" ||
                          $Status_Infocell !="" || $Status_SMART !="" || $Rebate !="" || $Data_vneseniya_izmenenij !="" || $Postavshik !="" ||
                           $Kanal_postavki !="" || $Nalichie_zashchity_sdelki !="" || $Za_kem_presejl !=""  || $za_kem_nastrojka !="" || $za_kem_servis !="" ||
                            $za_kem_ZIP !="" || $za_kem_predostavlenie_proshivok !="")
                    {
                        
                        $insertQuery = "INSERT INTO for_manager_oborudovanie (Imya_proizvoditelya , Tip_oborudovaniya , Nahozhdenie_v_reestr_Minpromtorg ,id_servisnoj_modeli_oborudovaniya ,id_prisejla ) 
                        VALUES ('$Imya_proizvoditelya', '$Tip_oborudovaniya','$Nahozhdenie_v_reestr_Minpromtorg','$id_serv_oborud','$idPreseyl')";
                    }
                    echo  "Сформировали запрос $insertQuery";
                    $result = mysqli_query($conn, $insertQuery) or die('<br>Ошибка выполнения запроса: ' . mysqli_error($conn));

                    if ($result) {
                        echo "Запрос выполнен успешно";
                    } else {
                        echo "Ошибка выполнения запроса: " . mysqli_error($conn);
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

