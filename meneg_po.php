<!DOCTYPE html>
<!-- здесь расположены фильтры -->
<script> // Этот скрипт при запуске формы сохраняет имя активной формы в LocalStorage
  
      const LS= localStorage;
      form = {name:"meneg_po"}
      LS.setItem('form',JSON.stringify(form));
  
</script>
<script src="./js/forma.js"></script>
<script src="./js/tock.js"></script>

<form action="meneger.php?page=meneg_po" method="POST">
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
    <nav class="navbar navbar-expand d-flex flex-column align-item-start" id="sidebar">
        <a href="#" class="navbar-brand text-light mt-5">
            <div class="display-5 font-weight-bold">INFOCELL</div>
        </a>
        <ul class="navbar-nav d-flex flex-column mt-5 w-100">
                <?php

                function stranaQuery($conn, $query) {
                    $stmt = mysqli_prepare($conn, $query);
                    mysqli_stmt_execute($stmt);
                    return mysqli_stmt_get_result($stmt);
                }

                function renderCountryDropdown($conn) {
                    $query = 'SELECT DISTINCT  proizvoditel.Strana_proizvoditel FROM proizvoditel ORDER BY Strana_proizvoditel';
                    $result = stranaQuery($conn, $query);
                    if(mysqli_num_rows($result) > 0) {
                        echo '<li class="nav-item dropdown w-100">';
                        echo '<a href="#" class="nav-link dropdown-toggle text-light pl-4" id="navbarDropdown" name="Strana_proizvoditel" role="button" data-toggle="dropdown" aria-expanded="false">';
                        echo 'Выберите страну</a>';
                        echo '<ul class="dropdown-menu w-100" aria-labelledby="navbarDropdown">';
                        while($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
                            foreach ($row as $cellValue) {
                                if (!empty($cellValue)) {
                                echo '<li class="form-check">';
                                echo '<input class="form-check-input" type="checkbox" name="Strana_proizvoditel[]" value="' . htmlspecialchars($cellValue, ENT_QUOTES) . '" id="flexCheckDefault">';
                                echo '<label class="form-check-label" for="flexCheckDefault">' . htmlspecialchars($cellValue, ENT_QUOTES) . '</label>';
                                echo '</li>';}
                            }
                        }
                        echo '</ul>';
                        echo '</li>';
                    } else {
                        echo '<li>По запросу ничего не нашлось</li>';
                    }
                }

                renderCountryDropdown($conn);
                ?>
            
            <li class="nav-item dropdown w-100">
            <a href="#" class="nav-link dropdown-toggle text-light pl-4" name="Nalichie_zashchity_sdelki" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
            Защита сделки
            </a>
            <ul class="dropdown-menu w-100" aria-labelledby="navbarDropdown">
                
                <li class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Nalichie_zashchity_sdelki" id="inlineRadio" value="" checked>
                            <label class="form-check-label" for="inlineRadio">Все</label>
                        </li>
                <?php
                // Используем prepared statements для защиты от SQL-инъекций
                $query = 'SELECT DISTINCT  presejl.Nalichie_zashchity_sdelki FROM presejl';
                $statement = mysqli_prepare($conn, $query);
                mysqli_stmt_execute($statement);
                $result = mysqli_stmt_get_result($statement);

                // Генерируем опции типов оборудования из результатов запроса к базе данных
                if(mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                    foreach ($row as $key => $cellValue) 
                        // Добавляем уникальное значение для каждого типа оборудования
                        {
                            if (!empty($cellValue)) {
                            echo"<li class='form-check form-check-inline'><input class='form-check-input' type='radio' name='Nalichie_zashchity_sdelki' value='$cellValue' id='inlineRadio' >
                            <label class='form-check-label' for='inlineRadio'>$cellValue</li>";}
                        }
                    }
                } else {
                    // Если типы оборудования не найдены в базе данных, выводим сообщение
                    echo "<li class='no-results-message'>
                            По запросу ничего не найдено.
                        </li>";
                }
                ?>
            </ul>
            </li>
            
            <li class="nav-item dropdown w-100">
            <a href="#" class="nav-link dropdown-toggle text-light pl-4" name="Nahozhdenie_v_reestr_Minpromtorg" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
            Наличие в Минпромторге
            </a>
            <ul class="dropdown-menu w-100" aria-labelledby="navbarDropdown">
            <li class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="Nahozhdenie_v_reestr_Minpromtorg" id="inlineRadio" value="" checked> 
                        <label class="form-check-label" for="inlineRadio">Все</label>
                    </li>
                <?php
                // Используем prepared statements для защиты от SQL-инъекций
                $query = 'SELECT DISTINCT  proizvoditel.Nahozhdenie_v_reestr_Minpromtorg FROM proizvoditel';
                $statement = mysqli_prepare($conn, $query);
                mysqli_stmt_execute($statement);
                $result = mysqli_stmt_get_result($statement);

                // Генерируем опции типов оборудования из результатов запроса к базе данных
                if(mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                    foreach ($row as $key => $cellValue) 
                        // Добавляем уникальное значение для каждого типа оборудования
                        {
                            if (!empty($cellValue)) {
                            echo"<li class='form-check form-check-inline'><input class='form-check-input' type='radio' name='Nahozhdenie_v_reestr_Minpromtorg' value='$cellValue' id='inlineRadio' >
                            <label class='form-check-label' for='inlineRadio'>$cellValue</li>";}
                        }
                    }
                } else {
                    // Если типы оборудования не найдены в базе данных, выводим сообщение
                    echo "<li class='no-results-message'>
                            По запросу ничего не найдено.
                        </li>";
                }
                ?>
            </ul>
            </li>
            
            <li class="nav-item dropdown w-100">
            <a href="#" class="nav-link dropdown-toggle text-light pl-4" name="Za_kem_presejl" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
            Осуществление пресейла
            </a>
            <ul class="dropdown-menu w-100" aria-labelledby="navbarDropdown">
                <li class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="Za_kem_presejl" id="inlineRadio" value="" checked>
                        <label class="form-check-label" for="inlineRadio">все</label>
                </li>
                <?php
                // Используем prepared statements для защиты от SQL-инъекций
                $query = 'SELECT DISTINCT  presejl.Za_kem_presejl FROM presejl';
                $statement = mysqli_prepare($conn, $query);
                mysqli_stmt_execute($statement);
                $result = mysqli_stmt_get_result($statement);

                // Генерируем опции типов оборудования из результатов запроса к базе данных
                if(mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                    foreach ($row as $key => $cellValue) {
                        // Добавляем уникальное значение для каждого типа оборудования
                        if (!empty($cellValue)) {
                        echo "<li class='form-check form-check-inline'><input class='form-check-input' type='radio' name='Za_kem_presejl' value='$cellValue' id='inlineRadio' >
                        <label class='form-check-label' for='inlineRadio'>$cellValue</li>";}
                    }
                    }
                } else {
                    // Если типы оборудования не найдены в базе данных, выводим сообщение
                    echo "<li class='no-results-message'>
                            По запросу ничего не найдено.
                        </li>";
                }
                ?>
            </ul>
            </li>
            
            
            <li class="nav-item dropdown w-100">
            <a href="#" class="nav-link dropdown-toggle text-light pl-4" name="Za_kem_podderzhka_PO" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
            Осуществление поддержки ПО
            </a>
            <ul class="dropdown-menu w-100" aria-labelledby="navbarDropdown">
                <li class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="Za_kem_podderzhka_PO" id="inlineRadio" value="" checked>
                        <label class="form-check-label" for="inlineRadio">Все</label>
                </li>
                <?php
                // Используем prepared statements для защиты от SQL-инъекций
                $query = 'SELECT DISTINCT servisnaya_model_po.Za_kem_podderzhka_PO FROM servisnaya_model_po';
                $statement = mysqli_prepare($conn, $query);
                mysqli_stmt_execute($statement);
                $result = mysqli_stmt_get_result($statement);

                // Генерируем опции типов оборудования из результатов запроса к базе данных
                if(mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                    foreach ($row as $key => $cellValue) 
                        // Добавляем уникальное значение для каждого типа оборудования
                        {
                            if (!empty($cellValue)) {
                            echo"<li class='form-check form-check-inline'><input class='form-check-input' type='radio' name='Za_kem_podderzhka_PO' value='$cellValue' id='inlineRadio' >
                            <label class='form-check-label' for='inlineRadio'>$cellValue</li>";}
                        }
                    }
                } else {
                    // Если типы оборудования не найдены в базе данных, выводим сообщение
                    echo "<li class='no-results-message'>
                            По запросу ничего не найдено.
                        </li>";
                }
                ?>
            </ul>
            </li>
            <li class="nav-item dropdown w-100">
            <a href="#" class="nav-link dropdown-toggle text-light pl-4" name="za_kem_predostavlenie_proshivok" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
            Поставшик прошивки
            </a>
            <ul class="dropdown-menu w-100" aria-labelledby="navbarDropdown">
                <!-- Добавляем опцию "Все" для всех типов оборудования -->
                <li class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="za_kem_predostavlenie_proshivok" id="inlineRadio" value="" checked>
                        <label class="form-check-label" for="inlineRadio">Все</label>
                    </li>
                <?php
                // Используем prepared statements для защиты от SQL-инъекций
                $query = 'SELECT DISTINCT servisnaya_model_oborudovanie.za_kem_predostavlenie_proshivok FROM servisnaya_model_oborudovanie';
                $statement = mysqli_prepare($conn, $query);
                mysqli_stmt_execute($statement);
                $result = mysqli_stmt_get_result($statement);

                // Генерируем опции типов оборудования из результатов запроса к базе данных
                if(mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                    foreach ($row as $key => $cellValue) 
                        // Добавляем уникальное значение для каждого типа оборудования
                        {
                            if (!empty($cellValue)) {
                            echo"<li class='form-check form-check-inline'><input class='form-check-input' type='radio' name='za_kem_predostavlenie_proshivok' value='$cellValue' id='inlineRadio' >
                            <label class='form-check-label' for='inlineRadio'>$cellValue</li>";
                            }
                        }
                    }
                } else {
                    // Если типы оборудования не найдены в базе данных, выводим сообщение
                    echo "<li class='no-results-message'>
                            По запросу ничего не найдено.
                        </li>";
                }
                ?>
            </ul>
            </li>
            <li class="nav-item dropdown w-100">
            <a href="#" class="nav-link dropdown-toggle text-light pl-4" name="Kanal_postavki" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
            Канал поставки
            </a>
            <ul class="dropdown-menu w-100" aria-labelledby="navbarDropdown">
                <!-- Добавляем опцию "Все" для всех типов оборудования -->
                <li class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="Kanal_postavki" id="inlineRadio" value="" checked>
                        <label class="form-check-label" for="inlineRadio">Все</label>
                    </li>

                <?php
                // Используем prepared statements для защиты от SQL-инъекций
                $query = 'SELECT DISTINCT  presejl.Kanal_postavki FROM presejl';
                $statement = mysqli_prepare($conn, $query);
                mysqli_stmt_execute($statement);
                $result = mysqli_stmt_get_result($statement);

                // Генерируем опции типов оборудования из результатов запроса к базе данных
                if(mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                    foreach ($row as $key => $cellValue) 
                        // Добавляем уникальное значение для каждого типа оборудования
                        {
                            
                            if (!empty($cellValue)) {
                                echo"<li class='form-check form-check-inline'>
                                         <input class='form-check-input' type='radio' name='Kanal_postavki' value='$cellValue' id='inlineRadio'>
                                         <label class='form-check-label' for='inlineRadio'>$cellValue</label>
                                     </li>";
                            }
                        }
                    }
                } else {
                    // Если типы оборудования не найдены в базе данных, выводим сообщение
                    echo "<li class='no-results-message'>
                            По запросу ничего не найдено.
                        </li>";
                }
                ?>
            </ul>
            </li>
            <li class="nav-item dropdown w-100">
            <a href="#" class="nav-link dropdown-toggle text-light pl-4" name="Status_Infocell" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
            Статус Инфосэл
            </a>
            <ul class="dropdown-menu w-100" aria-labelledby="navbarDropdown">
                <!-- Добавляем опцию "Все" для всех типов оборудования -->
                <li class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="Status_Infocell" id="inlineRadio" value="" checked>
                        <label class="form-check-label" for="inlineRadio">Все</label>
                    </li>

                <?php
                // Используем prepared statements для защиты от SQL-инъекций
                $query = 'SELECT DISTINCT proizvoditel.Status_Infocell FROM proizvoditel';
                $statement = mysqli_prepare($conn, $query);
                mysqli_stmt_execute($statement);
                $result = mysqli_stmt_get_result($statement);

                // Генерируем опции типов оборудования из результатов запроса к базе данных
                if(mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                    foreach ($row as $key => $cellValue) 
                        // Добавляем уникальное значение для каждого типа оборудования
                        {
                            if (!empty($cellValue)) {
                                echo"<li class='form-check form-check-inline'>
                                <input class='form-check-input' type='radio' name='Status_Infocell' value='$cellValue' id='inlineRadio'>
                                <label class='form-check-label' for='inlineRadio'>$cellValue</label>
                            </li>";
                            }
                            
                            
                        }
                    }
                } else {
                    // Если типы оборудования не найдены в базе данных, выводим сообщение
                    echo "<li class='no-results-message'>
                            По запросу ничего не найдено.
                        </li>";
                }
                ?>
            </ul>
            </li>
            <li class="nav-item dropdown w-100">
                <a href="#" class="nav-link dropdown-toggle text-light pl-4" id="navbarDropdown" name="Status_SMART" role="button" data-toggle="dropdown" aria-expanded="false">
                    Статус СМАРТ</a>
                <ul class="dropdown-menu w-100" aria-labelledby="navbarDropdown">
                    <li class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="Status_SMART" id="inlineRadio" value="" checked>
                        <label class="form-check-label" for="inlineRadio">Все</label>
                    </li>
                    <?php
                            $query = 'SELECT DISTINCT proizvoditel.Status_SMART FROM proizvoditel';
                            $data  = mysqli_query($conn, $query) or die('<br>Ошибка выполнения запроса');
                            if(mysqli_num_rows($data) > 0)
                            {
                                // $numrows=mysqli_num_rows($data);// Для отладки
                                while($row = mysqli_fetch_assoc($data))
                                {// Формируем таблицу
                                        foreach ($row as $key => $cellValue) {
                                            if (!empty($cellValue)) {
                                                echo"<li class='form-check form-check-inline'>
                                                         <input class='form-check-input' type='radio' name='Status_SMART' value='$cellValue' id='inlineRadio'>
                                                         <label class='form-check-label' for='inlineRadio'>$cellValue</label>
                                                     </li>";
                                            }
                                        }
                                }
                            }
                            else
                            {
                                // echo "<br>По запросу ничего не нашлось";
                                ?>
                                <tr>
                                    <td>
                                        По запросу ничего не нашлось
                                    </td>
                                </tr>
                                <?php
                            }
                        ?>     
                </ul> 
            </li>


            <input class="btn btn-secondary" type="submit"  name="Применить" id="butt_apply" value="Применить"></input>
            <input class="btn btn-secondary" type="submit"  name="Сброс настроек" id="buttonClear" value="Сброс настроек"  onClick="window.location.reload();"></input>
        </ul>
    </nav>
</form>
    <!-- Секция для расположения кнопок -->
    
<section class="p-4 my-container">
        <header class="d-flex flex-wrap justify-content-center  mb-4 ">
        <a  class="d-flex align-items-center mb-md-0 me-md-auto text-dark text-decoration-none">
        <h3>База знаний Инфосэл</h3>
        </a>
        <ul class="nav nav-tabs">
            <a href="meneger.php?page=meneg" class="nav-link ">Менеджерам по оборудованию</a>
            <a href="meneger.php?page=meneg_po" class="nav-link active">Менеджерам по ПО</a>
            <a href="meneger.php?page=ingener" class="nav-link ">Инженерам</a>
            <a href="meneger.php?page=servic" class="nav-link ">Сервисная</a>
            <a href="index.php" class="nav-link  btn-outline-primary  btn-lg" aria-current="page" >Новости</a>
        </ul>
        </header>
        <div class="d-flex flex-wrap justify-content-center  mb-4 border-bottom">
        <a  class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <button class="btn my-0 " id="menu-btn" >Выберите фильтры</button>
        </a>
        <h4 >Страница для Менеджеров по ПО</h4>
        </div>
    
        <!-- здесь расположена таблица -->
        <table id="mytable" class="table table-striped table-hover table-responsive table-bordered table-sm display wrap"  >
        <thead>
            <tr>
                <th>Производитель</th>
                <th>Страна</th>
                <th>Ссылка на сайт производителя</th>
                <th>Статус СМАРТ</th>
                <th>Минпромторг</th>
                <th>За кем поддержка ПО</th>
                <th>За кем Прошивка</th>
                <th>Канал поставки</th>
                <th>За кем пресейл</th>
                <th>Защита сделки</th>
                
            </tr>
        </thead>
        <tbody>
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
                // if(!$conn)
                // {
                //     die("connection Failed!" . mysqli_connect_error());
                // }
                // else{
                //     echo "Connection Established";
                // }

                // echo " DEBUG - Начало кода для запроса ";
                $query = 'SELECT proizvoditel.Imya_proizvoditelya, proizvoditel.Strana_proizvoditel,proizvoditel.Ssylka_na_sajt_proizvoditelya,proizvoditel.Status_Infocell, proizvoditel.Status_SMART,
                servisnaya_model_po.Za_kem_podderzhka_PO, servisnaya_model_po.Za_kem_predostavlenie_proshivok,
                presejl.Kanal_postavki, presejl.Za_kem_presejl , presejl.Nalichie_zashchity_sdelki 
                FROM proizvoditel 
                JOIN for_manager_po ON proizvoditel.Imya_proizvoditelya   =for_manager_po.Imya_proizvoditelya    
                JOIN servisnaya_model_po ON for_manager_po.id_servisnoj_modeli_PO =servisnaya_model_po.id_servisnoj_modeli_PO  
                JOIN presejl  ON presejl .id_prisejla=for_manager_po.id_prisejla '; //Типа запрос делаем все равно, вначале для всей таблицы
                $Strana_proizvoditel = "";
                $Imya_proizvoditelya = "";
                $Nalichie_zashchity_sdelki = "";
                $Nahozhdenie_v_reestr_Minpromtorg = "";
                $Za_kem_presejl = "";
                $za_kem_servis = "";
                $za_kem_predostavlenie_proshivok = "";
                $Kanal_postavki = "";
                $Status_Infocell = "";
                $Status_SMART = "";
                $Za_kem_podderzhka_PO = "";
                if(isset($_POST['Применить']))
                {//проверяем формы на заполнение
                    // echo "DEBUG - Есть POST";
                    // также точка с запятой отсутствовала
                    $Strana_proizvoditel = $_POST['Strana_proizvoditel'];
                    $Imya_proizvoditelya = $_POST['Imya_proizvoditelya'];
                    $Nalichie_zashchity_sdelki = $_POST['Nalichie_zashchity_sdelki'];
                    $Nahozhdenie_v_reestr_Minpromtorg = $_POST['Nahozhdenie_v_reestr_Minpromtorg'];
                    $Za_kem_presejl = $_POST['Za_kem_presejl'];
                    $za_kem_servis = $_POST['za_kem_servis'];
                    $za_kem_predostavlenie_proshivok = $_POST['za_kem_predostavlenie_proshivok'];
                    $Kanal_postavki = $_POST['Kanal_postavki'];
                    $Status_Infocell = $_POST['Status_Infocell'];
                    $Status_SMART = $_POST['Status_SMART'];
                    $Za_kem_podderzhka_PO = $_POST['Za_kem_podderzhka_PO'];
                }
                //создаем условие для выборки
                if ($Strana_proizvoditel !="" || $Imya_proizvoditelya !="" ||$Nalichie_zashchity_sdelki !="" || $Nahozhdenie_v_reestr_Minpromtorg !="" || $Za_kem_presejl !="" || $Status_Infocell !="" || $za_kem_servis !=""|| $za_kem_predostavlenie_proshivok !="" || $Kanal_postavki !="" || $Status_SMART !="")
            {
                $mass = array(
                    "0" => "$Nalichie_zashchity_sdelki",
                    "1" => "$Nahozhdenie_v_reestr_Minpromtorg",
                    "2" => "$Status_SMART",
                    "3" => "$Za_kem_presejl",
                    "4" => "$Status_Infocell",
                    "5" => "$za_kem_servis",
                    "6" => "$Kanal_postavki",
                    "7" => "$za_kem_predostavlenie_proshivok",
                    "8" => "$Za_kem_podderzhka_PO",
                );
                $mass1 = array(
                    "0" => "Nalichie_zashchity_sdelki",
                    "1" => "Nahozhdenie_v_reestr_Minpromtorg",
                    "2" => "Status_SMART",
                    "3" => "Za_kem_presejl",
                    "4" => "Status_Infocell",
                    "5" => "za_kem_servis",
                    "6" => "Kanal_postavki",
                    "7" => "za_kem_predostavlenie_proshivok",
                    "8" => "Za_kem_podderzhka_PO",
                );
                // echo " DEBUG - Прошли условие ";
                $a="";
                $SQLCond="";
                for($i=0; $i<10; $i++)
                {
                    if(!($mass[$i]==""))
                    {
                        $SQLCond0="";
                        $SQLCond0="$mass1[$i]= '$mass[$i]'".$SQLCond0;
                        // echo $SQLCond0;
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
                $Strana_proizvoditel=$_POST['Strana_proizvoditel'];
                // echo "Strana_proizvoditel = $Strana_proizvoditel";
                //SELECT * FROM users WHERE strana ='Китай' OR strana='Россия'
                if(!($Strana_proizvoditel==""))
                {
                    $str="";
                    $first=true;
                    foreach ($Strana_proizvoditel as $Strana_proizvoditelNum=>$value) {
                        if ($first)
                        {
                            $first=false;
                            $str="proizvoditel.Strana_proizvoditel ='$value'";
                        }else
                        {
                            $str=($str." OR "."proizvoditel.Strana_proizvoditel ='$value' ");
                        }
                        // echo "Страна : ".$Strana_proizvoditelNum." Значение ".$value."<br />";
                    }
                    // echo "<br> str=$str";
                    $SQLCond=$str.$SQLCond;
                    // echo $SQLCond;
                    if(($SQLCond!="" and $a!=""))
                    {
                        $a = $a . ' AND ' . $SQLCond;
                    }
                    else 
                    {
                        $a = $a . $SQLCond;
                    }
                }

                // echo "Imya_proizvoditelya = $Imya_proizvoditelya";
                
                $Imya_proizvoditelya = $_POST['Imya_proizvoditelya']; 
                if(!($Imya_proizvoditelya==""))
                {   
                    $str1="";
                    $first1=true;
                    $SQLCond1="";
                    foreach ($Imya_proizvoditelya as $Imya_proizvoditelyaNum=>$value) {
                        if ($first1)
                        {
                            $first1=false;
                            $str1="proizvoditel.Imya_proizvoditelya ='$value'";
                        }else
                        {
                            $str1=$str1." OR "."proizvoditel.Imya_proizvoditelya ='$value' ";
                        }
                        // echo "Производители : ".$proizvoditel.$Imya_proizvoditelyaNum." Значение ".$value."<br />";
                    }
                    // echo "<br> str1=$str1";
                    $SQLCond1=$str1.$SQLCond1;
                    // echo $SQLCond1;
                    if(($SQLCond1!="" and $a!=""))
                    {
                        $a = $a . ' AND ' . $SQLCond1;
                    }
                    else 
                    {
                        $a = $a . $SQLCond1;
                    }
                }
                $query = 'SELECT proizvoditel.Imya_proizvoditelya, proizvoditel.Strana_proizvoditel,proizvoditel.Ssylka_na_sajt_proizvoditelya,proizvoditel.Status_Infocell, proizvoditel.Status_SMART, servisnaya_model_po.Za_kem_podderzhka_PO, servisnaya_model_po.Za_kem_predostavlenie_proshivok, presejl.Kanal_postavki, presejl.Za_kem_presejl , presejl.Nalichie_zashchity_sdelki 
                FROM proizvoditel 
                JOIN for_manager_po ON proizvoditel.Imya_proizvoditelya   =for_manager_po.Imya_proizvoditelya    
                JOIN servisnaya_model_po ON for_manager_po.id_servisnoj_modeli_PO =servisnaya_model_po.id_servisnoj_modeli_PO  
                JOIN presejl  ON presejl .id_prisejla=for_manager_po.id_prisejla  WHERE '.$a; // Переписали $query если есть дополнит. условия
            }
            
            // echo  "Сформировали запрос $query";
            $data  = mysqli_query($conn, $query) or die('<br>Ошибка выполнения запроса');
                if(mysqli_num_rows($data) > 0)
                {
                    $numrows=mysqli_num_rows($data);// Для отладки
                    // echo "<br>Получены данные $numrows строк";
                    while($row = mysqli_fetch_assoc($data))
                    {// Формируем таблицу
                        ?>
                        <tr>
                            <?php
                            foreach ($row as $key => $cellValue) {
                                if ($key=="id") continue; // На следующую итерацию уйти
                                if ($key=="id_servisnoj_modeli_oborudovaniya")continue;
                                if ($key == "Ssylka_na_sajt_proizvoditelya") {
                                    if ($cellValue == "нет") {
                                        echo "<td>$cellValue</td>";
                                    } else {
                                        echo "<td><a href='$cellValue'>Перейти</a></td>";
                                    }
                                    continue;    
                                }
                                // В этом коде мы добавляем проверку значения ячейки на равенство строке "не выводить ссылку". Если значение ячейки равно этой строке, то мы выводим значение ячейки без ссылки, используя тег <td>. В противном случае мы выводим значение ячейки как ссылку, используя тег <a> и атрибут href. Оператор continue используется для перехода к следующей итерации цикла, чтобы не выполнять дополнительный код после условия, если ключ не равен "url".
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
                        <td> пусто </td>
                                <td> пусто </td>
                                <td> пусто </td>
                                <td> пусто </td>
                                <td> пусто </td>
                                <td> пусто </td>
                                <td> пусто </td>
                                <td> пусто </td>
                                <td> пусто </td>
                        </td>
                    </tr>
                    <?php
                }
            ?>
        </tbody>
    </table>
</section>
<!-- bootstrap js -->
<!-- custom js -->