<!DOCTYPE html>
<html lang="en">
    <head>
    <script> // Этот скрипт при запуске формы сохраняет имя активной формы в LocalStorage
  
  const LS= localStorage;
  form = {name:"insert"}
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
    <form action="insert.php" method="POST">    
<?php
  $server="172.20.10.22";
  $user  ="root";
  $pass  ="1";
  $dbname ="bd_infocell";
  $dbtable ="presejl";
  $dbtable2 ="proizvoditel";
  $dbtable3 ="for_manager_oborudovanie";
  $dbtable4 ="servisnaya_model_oborudovanie";
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
                                        $query = 'SELECT DISTINCT   proizvoditel.Imya_proizvoditelya  FROM proizvoditel ORDER BY  Imya_proizvoditelya ASC';
                                    
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
                                    <?php
                                        // Используем prepared statements для защиты от SQL-инъекций
                                        $query = 'SELECT DISTINCT  proizvoditel.Tip_oborudovaniya  FROM proizvoditel ORDER BY  Tip_oborudovaniya ASC';
                                    
                                        $data  = mysqli_query($conn, $query) or die('<br>Ошибка выполнения запроса');
                                        if(mysqli_num_rows($data) > 0)
                                        {
                                            $numrows=mysqli_num_rows($data);// Для отладки
                                            // echo "<br>Получены данные $numrows строк";
                                            echo"<label for='exampleDataL0'  class='form-label'>Тип продукта</label>
                                                    <input class='form-control' list='datalistOption0' name='Tip_oborudovaniya' id='exampleDataL0' required placeholder='Введите тип '>
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
                                  <label for="selectData9" class="form-label">Реестр Минпромторг</label>
                                  <select  class="form-select" id="selectData9" required name="Nahozhdenie_v_reestr_Minpromtorg">
                                    <option value="">Выберите из списка</option>
                                    <option value="Да">Да</option>
                                    <option value="Нет">Нет</option>
                                    <option value="Частично">Частично</option>
                                    <option value="-">-</option>
                                  </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="block">
                                <h4>Пресейл</h4>
                                <div class="mb-3">
                                    <?php
                                        // Используем prepared statements для защиты от SQL-инъекций
                                        $query = 'SELECT DISTINCT  presejl.Postavshik FROM presejl ORDER BY  Postavshik ASC';
                                    
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
                                    <option value="Дистрибьютер">Дистрибьютер</option>
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
                                    <option value="частично">Частично</option>
                                    <option value="Нет">Нет</option>
                                    <option value="-">-</option>
                                    <option value="ТД//Дистрибьютер">ТД//Дистрибьютер</option>
                                  </select>
                                </div>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="block">
                              <h4>Сервисное оборудование</h4>
                              <div class="mb-3">
                                  <label for="selectData11" class="form-label">За кем настройка</label>
                                  <select class="form-select" id="selectData11" required name="za_kem_nastrojka">
                                    <option value="">Выберите из списка</option>
                                    <option value="ТД">ТД</option>
                                    <option value="Вендор">Вендор</option>
                                    <option value="Нет">Нет</option>
                                    <option value="Дистрибьютер">Дистрибьютер</option>
                                    <option value="ТД\\вендор">ТД\\вендор</option>
                                    <option value="-">-</option>
                                  </select>
                                </div>
                                <div class="mb-3">
                                  <label for="selectData12" class="form-label">За кем сервис</label>
                                  <select class="form-select" id="selectData12" required name="za_kem_servis">
                                    <option value="">Выберите из списка</option>
                                    <option value="ТД">ТД</option>
                                    <option value="Вендор">Вендор</option>
                                    <option value="Нет">Нет</option>
                                    <option value="Дистрибьютер">Дистрибьютер</option>
                                    <option value="ТД\\вендор">ТД\\вендор</option>
                                    <option value="-">-</option>
                                  </select>
                                </div>
                                <div class="mb-3">
                                  <label for="selectData13" class="form-label">За кем ЗИП</label>
                                  <select class="form-select" id="selectData13" required name="za_kem_ZIP">
                                    <option value="">Выберите из списка</option>
                                    <option value="Вендор">Вендор</option>
                                    <option value="Дистрибьютер">Дистрибьютер</option>
                                    <option value="Инфосэл">Инфосэл</option>
                                    <option value="Партнеры">Партнеры</option>
                                    <option value="Нет">Нет</option>
                                    <option value="-">-</option>
                                  </select>
                                </div>
                                <div class="mb-3">
                                  <label for="selectData14"  class="form-label">За кем предоставление прошивок</label>
                                  <select class="form-select" id="selectData14" required name="za_kem_predostavlenie_proshivok">
                                    <option value="">Выберите из списка</option>
                                    <option value="Вендор">Вендор</option>
                                    <option value="Дистрибьютер">Дистрибьютер</option>
                                    <option value="Частично">Частично</option>
                                    <option value="Нет">Нет</option>
                                    <option value="-">-</option>
                                  </select>
                                </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <input class="btn btn-secondary"  type="submit"  name="Применить" id="butt_apply" value="Применить"></input>
                      <input class="btn btn-secondary" type="submit"  name="Сброс настроек" id="buttonClear" value="Сброс настроек"  onClick="window.location.reload();"></input>
                      <?php
                            $server="172.20.10.22";
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
                            $server="172.20.10.22";
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
                                $za_kem_nastrojka = "";
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
                                // $numrows=mysqli_num_rows($data);// Для отладки
                                // echo "<br>Получены данные $numrows строк";
                                while($row = mysqli_fetch_assoc($data))
                                {// Формируем таблицу
                                    $id_serv_oborud = $row['id_servisnoj_modeli_oborudovaniya'];
                                    ?>
                                    <tr>

                                        <?php
                                        foreach ($row as $key => $cellValue) {
                                            // echo "<td> $cellValue </td>";
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
                        $server = "172.20.10.22";
                        $user = "root";
                        $pass = "1";
                        $dbname = "bd_infocell";
                        $dbtable = "presejl";
                        $dbtable2 = "proizvoditel";
                        $dbtable3 = "for_manager_oborudovanie";
                        $dbtable4 = "servisnaya_model_oborudovanie";
                        $conn = mysqli_connect($server, $user, $pass, $dbname);

                        // производитель
                        $Imya_proizvoditelya = "";
                        $Tip_oborudovaniya = "";
                        $Nahozhdenie_v_reestr_Minpromtorg = "";
                        // presejl
                        $Postavshik = "";
                        $Kanal_postavki = "";
                        $Nalichie_zashchity_sdelki = "";
                        $Za_kem_presejl = "";
                        // сервисная модель оборудования
                        $za_kem_nastrojka = "";
                        $za_kem_servis = "";
                        $za_kem_ZIP = "";
                        $za_kem_predostavlenie_proshivok = "";

                        if (isset($_POST['Применить'])) {
                            // проверяем формы на заполнение
                            // производитель
                            $Imya_proizvoditelya = $_POST['Imya_proizводitelya'];
                            $Tip_oborудования = $_POST['Tip_oborудования'];
                            $Nahozhdenie_v_reестре_Minpromtorg = $_POST['Nahozhdenie_v_reестре_Minpromtorg'];

                            // presejl
                            $Postavshik = $_POST['Postavshik'];
                            $Kanal_postавки = $_POST['Kanal_postавки'];
                            $Nalichie_zashчity_sdelки = $_POST['Nalichie_zashчity_sdelки'];
                            $Za_kem_presejl = $_POST['Za_kem_presejl'];

                            // сервисная модель оборудования
                            $za_kem_nastrojка = $_POST['za_kem_nastrojка'];
                            $za_kem_servis = $_POST['za_kem_servis'];
                            $za_kem_ZIP = $_POST['za_kem_ZIP'];
                            $za_kem_predostavление_proshivok = $_POST['za_kem_predostавление_proshivок'];
                        }

                        // создаем условие для выборки
                        if ($Imya_proizводitelya != "" || $Tip_oborудования != "" || $Nahozhdenie_v_reестре_Minpromtorg != "" || $Postavshik != "" ||
                            $Kanal_postавки != "" || $Nalichie_zashчity_sdelки != "" || $Za_kem_presejl != "" || $za_kem_nastrojка != "" || $za_kem_servис != "" ||
                            $za_kem_ZIP != "" || $za_kem_predostавление_proshivok != "") {

                            // Предполагаем, что у вас есть значения для $id_serv_oborud и $idPreseyl
                            $id_serv_oborud = 1; // Замените на фактическое значение
                            $idPreseyl = 1; // Замените на фактическое значение

                            $insertQuery = "INSERT INTO for_manager_oborудование (Imya_proizводitelya, Tip_oborудования, Nahozhdenie_v_reестре_Minpromtorg, id_servисной модели оборудования, id_prisejla) 
                            VALUES ('$Imya_proizводитelya', '$Tip_oborудования', '$Nahozhdenie_v_reестре_Minpromtorg', '$id_serv_oborud', '$idPreseyl')";

                            echo "Сформировали запрос $insertQuery";
                            $result = mysqli_query($conn, $insertQuery) or die('<br>Ошибка выполнения запроса: ' . mysqli_error($conn));

                            if ($result) {
                                echo "Запрос выполнен успешно";
                            } else {
                                echo "Ошибка выполнения запроса: " . mysqli_error($conn);
                            }
                        } else {
                            echo "Не заполнены необходимые поля для выполнения запроса.";
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
        <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <h4 class="mb-3">Как пользоваться?</h4>
                            <p class="mb-3">Чтобы добавить новый документ на страницу, необходимо совершить 3 действия:</p>
                            <ol>
                                <li>Заполнить карточку документа (если его нет)</li>
                                <li>Заполнить необходимый файловый путь (если его нет)</li>
                                <li>Если документ и файловый путь уже есть в базе данных, то просто заполните данные в 3 окне</li>
                            </ol>
                        </div>
                        <div class="col-md-4">
                            <form action="insert_index121.php" method="POST">
                                <div class="form-group">
                                    <label for="fileInput" class="mb-3">Внесите данные файла</label>
                                    <p class="mb-3 text-muted">(прошу будьте внимательны, браузер скрывает путь файла, поэтому прошу указывать его самостоятельно)</p>
                                    <p class="mb-3 text-muted">Путь файла вы можете найти в свойствах файла</p>
                                    <input type="file" class="form-control-file mb-3" id="fileInput" onchange="showFileInfo()">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control mb-3" id="fileName" placeholder="Имя файла" name="name_doc" readonly>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control mb-3" id="fileExtension" placeholder="Расширение файла" name="type" readonly>
                                </div>
                                <p class="mb-3 text-muted">Файл должен находиться в папке doci перед тем как быть добавлен на сайт</p>
                                <div class="form-group">
                                    <input type="text" class="form-control mb-3" id="filePath" placeholder="Путь к файлу" name="file_link">
                                </div>
                                <div class="form-group">
                                    <label for="exampleDataLi151" class="form-label">Дата ввода</label>
                                    <input class="form-control mb-3" id="exampleDataLi151" name="doc_date" value="<?php echo date('Y-m-d'); ?>" required placeholder="Введите дату">
                                </div>
                                <input class="btn btn-secondary mb-3" type="submit" name="Применить" id="butt_apply">
                            </form>
                        </div>
                       
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" data-bs-target="#exampleModalToggle3" data-bs-toggle="modal">Открыть второе  окно</button>
            </div>
            <?php
$server = "172.20.10.22";
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
            </body>
        </html>

