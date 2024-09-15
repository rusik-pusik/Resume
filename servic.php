<!DOCTYPE html>
<!-- здесь расположены фильтры -->
<script> // Этот скрипт при запуске формы сохраняет имя активной формы в LocalStorage
  
      const LS= localStorage;
      form = {name:"servic"}
      LS.setItem('form',JSON.stringify(form));
  
</script>
<form action="meneger.php?page=servic" method="POST">
    <?php
    $server="127.0.0.1";
    $user  ="root";
    $pass  ="1";
    $dbname ="bd_infocell";
    $dbtable ="servisnaya_model_oborudovanie";
    $dbtable2 ="servisnyj_dogovor";
    $dbtable3 ="sotrudnik";
    $dbtable4 ="oborudovanie";
    $conn  = mysqli_connect($server, $user,$pass, $dbname);
    ?>
    <nav class="navbar navbar-expand d-flex flex-column align-item-start" id="sidebar">
        <a href="#" class="navbar-brand text-light mt-5">
            <div class="display-5 font-weight-bold">INFOCELL</div>
        </a>
        <ul class="navbar-nav d-flex flex-column mt-5 w-100">
            <li class="nav-item dropdown w-100">
                
                
                    <?php
                function stranaQuery($conn, $query) {
                    $stmt = mysqli_prepare($conn, $query);
                    mysqli_stmt_execute($stmt);
                    return mysqli_stmt_get_result($stmt);
                }
                function renderNaimennovanie_organizaciiDropdown($conn) {
                    $query = 'SELECT DISTINCT servisnyj_dogovor.Naimennovanie_organizacii FROM servisnyj_dogovor ORDER BY Naimennovanie_organizacii';
                    $result = stranaQuery($conn, $query);
                    if(mysqli_num_rows($result) > 0) {
                        echo '<li class="nav-item dropdown w-100">';
                        echo '<a href="#" class="nav-link dropdown-toggle text-light pl-4" id="navbarDropdown" name="Naimennovanie_organizacii" role="button" data-toggle="dropdown" aria-expanded="false">';
                        echo 'Организация</a>';
                        echo '<ul class="dropdown-menu w-100" aria-labelledby="navbarDropdown">';
                        while($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
                            foreach ($row as $cellValue) {
                                if (!empty($cellValue)) {
                                echo '<li class="form-check">';
                                echo '<input class="form-check-input" type="checkbox" name="Naimennovanie_organizacii[]" value="' . htmlspecialchars($cellValue, ENT_QUOTES) . '" id="flexCheckDefault">';
                                echo '<label class="form-check-label" for="flexCheckDefault">' . htmlspecialchars($cellValue, ENT_QUOTES) . '</label>';
                                echo '</li>';}
                            }
                        }
                        echo '</ul>';
                        echo '</li>';
                    }
                }
                renderNaimennovanie_organizaciiDropdown($conn);
                ?>
                <?php
                function ImyaQuery($conn, $query) {
                    $stmt = mysqli_prepare($conn, $query);
                    mysqli_stmt_execute($stmt);
                    return mysqli_stmt_get_result($stmt);
                }

                function renderImyaDropdown($conn) {
                    $query = 'SELECT DISTINCT sotrudnik.Imya FROM sotrudnik ORDER BY Imya';
                    $result = ImyaQuery($conn, $query);
                    if(mysqli_num_rows($result) > 0) {
                        echo '<li class="nav-item dropdown w-100">';
                        echo '<a href="#" class="nav-link dropdown-toggle text-light pl-4" id="navbarDropdown" name="Imya" role="button" data-toggle="dropdown" aria-expanded="false">';
                        echo 'Имя менеджера</a>';
                        echo '<ul class="dropdown-menu w-100" aria-labelledby="navbarDropdown">';
                        while($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
                            foreach ($row as $cellValue) {
                                if (!empty($cellValue)) {
                                echo '<li class="form-check">';
                                echo '<input class="form-check-input" type="checkbox" name="Imya[]" value="' . htmlspecialchars($cellValue, ENT_QUOTES) . '" id="flexCheckDefault">';
                                echo '<label class="form-check-label" for="flexCheckDefault">' . htmlspecialchars($cellValue, ENT_QUOTES) . '</label>';
                                echo '</li>';}
                            }
                        }
                        echo '</ul>';
                        echo '</li>';
                    } 
                }
                renderImyaDropdown($conn);
                ?>
                <?php
                function FamiliyaQuery($conn, $query) {
                    $stmt = mysqli_prepare($conn, $query);
                    mysqli_stmt_execute($stmt);
                    return mysqli_stmt_get_result($stmt);
                }

                function renderFamiliyaDropdown($conn) {
                    $query = 'SELECT DISTINCT sotrudnik.Familiya FROM sotrudnik ORDER BY Familiya';
                    $result = FamiliyaQuery($conn, $query);
                    if(mysqli_num_rows($result) > 0) {
                        echo '<li class="nav-item dropdown w-100">';
                        echo '<a href="#" class="nav-link dropdown-toggle text-light pl-4" id="navbarDropdown" name="Familiya" role="button" data-toggle="dropdown" aria-expanded="false">';
                        echo 'Фамилия менеджера</a>';
                        echo '<ul class="dropdown-menu w-100" aria-labelledby="navbarDropdown">';
                        while($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
                            foreach ($row as $cellValue) {
                                if (!empty($cellValue)) {
                                echo '<li class="form-check">';
                                echo '<input class="form-check-input" type="checkbox" name="Familiya[]" value="' . htmlspecialchars($cellValue, ENT_QUOTES) . '" id="flexCheckDefault">';
                                echo '<label class="form-check-label" for="flexCheckDefault">' . htmlspecialchars($cellValue, ENT_QUOTES) . '</label>';
                                echo '</li>';}
                            }
                        }
                        echo '</ul>';
                        echo '</li>';
                    } 
                }
                renderFamiliyaDropdown($conn);
               
                ?>




                <li class="nav-item dropdown w-100">
                <a href="#" class="nav-link dropdown-toggle text-light pl-4" id="navbarDropdown" role="button" aria-haspopup="true" name="Data_nachala_dogovora" data-toggle="dropdown" aria-expanded="false">
                    Дата начала договора
                </a>
                <div class="dropdown-menu w-100" aria-labelledby="navbarDropdown" role="menu">
                    <label for="date1" class="sr-only">Выберите дату начала договора</label>
                    <input type="date" id="date1" name="Data_nachala_dogovora" class="form-control">
                </div>
                </li>
                <li class="nav-item dropdown w-100">
                <a href="#" class="nav-link dropdown-toggle text-light pl-4" id="navbarDropdown" role="button" aria-haspopup="true" name="Data_nachala_dogovora" data-toggle="dropdown" aria-expanded="false">
                    Дата окончания договора
                </a>
                <div class="dropdown-menu w-100" aria-labelledby="navbarDropdown" role="menu">
                    <label for="date1" class="sr-only">Выберите дату окончания договора</label>
                    <input type="date" id="date1" name="Data_nachala_dogovora" class="form-control">
                </div>
                </li>



                <li class="nav-item dropdown w-100">
            <a href="#" class="nav-link dropdown-toggle text-light pl-4" name="za_kem_ZIP" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
            Поставщики ЗИП
            </a>
            <ul class="dropdown-menu w-100" aria-labelledby="navbarDropdown">
                
                <li class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="za_kem_ZIP" id="inlineRadio" value="" checked>
                            <label class="form-check-label" for="inlineRadio">Все</label>
                        </li>
                <?php
                // Используем prepared statements для защиты от SQL-инъекций
                $query = 'SELECT DISTINCT servisnaya_model_oborudovanie.za_kem_ZIP FROM servisnaya_model_oborudovanie';
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
                            echo"<li class='form-check form-check-inline'><input class='form-check-input' type='radio' name='za_kem_ZIP' value='$cellValue' id='inlineRadio' >
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
            <a href="#" class="nav-link dropdown-toggle text-light pl-4" name="SN_ustrojstva" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
            SN
            </a>
            <ul class="dropdown-menu w-100" aria-labelledby="navbarDropdown">
                
                <li class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="SN_ustrojstva" id="inlineRadio" value="" checked>
                            <label class="form-check-label" for="inlineRadio">Все</label>
                        </li>
                <?php
                // Используем prepared statements для защиты от SQL-инъекций
                $query = 'SELECT DISTINCT oborudovanie.SN_ustrojstva FROM oborudovanie';
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
                            echo"<li class='form-check form-check-inline'><input class='form-check-input' type='radio' name='SN_ustrojstva' value='$cellValue' id='inlineRadio' >
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
            <a href="#" class="nav-link dropdown-toggle text-light pl-4" name="SLA" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
            Уровень SLA
            </a>
            <ul class="dropdown-menu w-100" aria-labelledby="navbarDropdown">
                
                <li class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="SLA" id="inlineRadio" value="" checked>
                            <label class="form-check-label" for="inlineRadio">Все</label>
                        </li>
                <?php
                // Используем prepared statements для защиты от SQL-инъекций
                $query = 'SELECT DISTINCT oborudovanie.SLA FROM oborudovanie';
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
                            echo"<li class='form-check form-check-inline'><input class='form-check-input' type='radio' name='SLA' value='$cellValue' id='inlineRadio' >
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
                <!-- Создаем выпадающее меню для выбора названия оборудования -->
                    <a href="#" class="nav-link dropdown-toggle text-light pl-4" id="navbarDropdown" role="button" name="Nomer_dogovora" data-toggle="dropdown" aria-expanded="false">
                    Номер договора
                    </a>
                    <ul class="dropdown-menu w-100" aria-labelledby="navbarDropdown">
                        <!-- Создаем форму для ввода названия оборудования -->
                        <div class="form-group">
                            <!-- Создаем поле ввода с меткой -->
                            <label for="Nomer_dogovora">Введите номер договора:</label>
                            <input type="text" id="Nomer_dogovora" name="Nomer_dogovora" class="form-control" placeholder="номер договора" value="">

                            <!-- Добавляем скрытое поле с CSRF-токеном для защиты от атак межсайтовой подделки запросов -->
                            <input type="hidden" name="csrf_token" value="{{ csrf_token() }}">
                        </div>
                    </ul> 
                </li>
                <li class="nav-item dropdown w-100">
                    <a href="#" class="nav-link dropdown-toggle text-light pl-4" id="navbarDropdown" role="button" aria-haspopup="true" name="data_vzyatiya_vzyatiya_na_podderzhku" data-toggle="dropdown" aria-expanded="false">
                        Дата начала поддержки
                    </a>
                    <div class="dropdown-menu w-100" aria-labelledby="navbarDropdown" role="menu">
                        <label for="date3" class="sr-only">Выберите дату начала поддержки</label>
                        <input type="date" id="date3" name="data_vzyatiya_vzyatiya_na_podderzhku" class="form-control">
                    </div>
                </li>
                <li class="nav-item dropdown w-100">
                    <a href="#" class="nav-link dropdown-toggle text-light pl-4" id="navbarDropdown" role="button" aria-haspopup="true" name="Data_okonchaniya_podderzhki" data-toggle="dropdown" aria-expanded="false">
                        Дата окончания поддержки
                    </a>
                    <div class="dropdown-menu w-100" aria-labelledby="navbarDropdown" role="menu">
                        <label for="date4" class="sr-only">Выберите дату начала поддержки</label>
                        <input type="date" id="date4" name="Data_okonchaniya_podderzhki" class="form-control">
                    </div>
                </li>
                <input class="btn btn-secondary" type="submit"  name="Применить" id="butt_apply" value="Применить"></input>
                <input class="btn btn-secondary" type="submit"  name="Сброс настроек" id="buttonClear" value="Сброс настроек"  onClick="window.location.reload();"></input>
            </li>
        </ul>
    </nav>
</form>
   
    <section class="p-4 my-container">
        <header class="d-flex flex-wrap justify-content-center  mb-4 ">
        <a  class="d-flex align-items-center mb-md-0 me-md-auto text-dark text-decoration-none">
        <h3>База знаний Инфосэл</h3>
        </a>
        <ul class="nav nav-tabs">
            <a href="meneger.php?page=meneg" class="nav-link ">Менеджерам</a>
            <a href="meneger.php?page=ingener" class="nav-link">Инженерам</a>
            <a href="meneger.php?page=servic" class="nav-link active">Сервис</a>
            <a href="index.php" class="nav-link " aria-current="page" >Новости</a>
            <a  class="nav-link" href="doci.php">Документация</a>
        </ul>
        </header>
        <div class="d-flex flex-wrap justify-content-center  mb-4 border-bottom">
        <a  class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <button class="btn my-0 " id="menu-btn" >Выберите фильтры</button>
        </a>
        <h4 >Страница для Сервиса</h4>
        </div>
       
    
        
        
            <!-- здесь расположена таблица -->
            
        <table id="mytable" class="table table-striped table-hover table-responsive table-bordered table-sm " >
            <thead >
                <tr>
                    <th>Номер договора</th>
                    <th>Организация</th>
                    <th>Начало договра</th>
                    <th>Окончание договора</th>
                    <th>Стоимость</th>
                    <th>SN</th>
                    <th>PN</th>
                    <th>Дата начала поддержки</th>
                    <th>Дата окончания поддержки</th>
                    <th>Уровень SLA</th>
                    <th>Фамилия менеджера</th>
                    <th>ЗИП</th>
                </tr>
            </thead>
            <tbody >
                <?php
                    $server="127.0.0.1";
                    $user  ="root";
                    $pass  ="1";
                    $dbname ="bd_infocell";
                    $dbtable ="servisnaya_model_oborudovanie";
                    $dbtable2 ="servisnyj_dogovor";
                    $dbtable3 ="sotrudnik";
                    $dbtable4 ="oborudovanie";
                    $conn  = mysqli_connect($server, $user,$pass, $dbname);
                    // if(!$conn)
                    // {
                    //     die("connection Failed!" . mysqli_connect_error());
                    // }
                    // else{
                    //     echo "Connection Established";
                    // }
                    // echo " DEBUG - Начало кода для запроса ";
                    $query = 'SELECT servisnyj_dogovor.Nomer_dogovora, servisnyj_dogovor.Naimennovanie_organizacii, servisnyj_dogovor.Data_nachala_dogovora, servisnyj_dogovor.Data_okonchaniya_dogovora, servisnyj_dogovor.Stoimost, oborudovanie.SN_ustrojstva, oborudovanie.PN, oborudovanie.data_vzyatiya_vzyatiya_na_podderzhku, oborudovanie.Data_okonchaniya_podderzhki, oborudovanie.SLA, concat(sotrudnik.Familiya," ", sotrudnik.Imya, " ",sotrudnik.Otchestvo ), servisnaya_model_oborudovanie.za_kem_ZIP
                    FROM servisnyj_dogovor
                    JOIN oborudovanie_servisnyj_dogovor_presejl_servis ON oborudovanie_servisnyj_dogovor_presejl_servis.Nomer_dogovora=servisnyj_dogovor.Nomer_dogovora
                    JOIN oborudovanie ON oborudovanie.SN_ustrojstva=oborudovanie_servisnyj_dogovor_presejl_servis.SN_ustrojstva
                    JOIN sotrudnik_servisnyj_dogovor ON sotrudnik_servisnyj_dogovor.Nomer_dogovora=servisnyj_dogovor.Nomer_dogovora
                    JOIN sotrudnik ON sotrudnik.ID_sotrudnik=sotrudnik_servisnyj_dogovor.ID_sotrudnik
                    JOIN servisnaya_model_oborudovanie ON servisnaya_model_oborudovanie.id_servisnoj_modeli_oborudovaniya=oborudovanie_servisnyj_dogovor_presejl_servis.id_servisnaya_modeli_oborudovanie'; //Типа запрос делаем все равно, вначале для всей таблицы
                    $Nomer_dogovora = "";
                    $Naimennovanie_organizacii = "";
                    $Familiya = "";
                    $Imya = "";
                    $Data_nachala_dogovora = "";
                    $Data_okonchaniya_dogovora = "";
                    $SLA = "";
                    $za_kem_ZIP = "";
                    $SN_ustrojstva = "";
                    $data_vzyatiya_vzyatiya_na_podderzhku = "";
                    $Data_okonchaniya_podderzhki = "";
                    if(isset($_POST['Применить']))
                    {//проверяем формы на заполнение
                        // echo " DEBUG - Есть POST ";
                        // также точка с запятой отсутствовала
                        $Nomer_dogovora = $_POST['Nomer_dogovora'];
                        $Naimennovanie_organizacii = $_POST['Naimennovanie_organizacii'];
                        $Familiya = $_POST['Familiya'];
                        $Imya = $_POST['Imya'];
                        $Data_nachala_dogovora = $_POST['Data_nachala_dogovora'];
                        $Data_okonchaniya_dogovora = $_POST['Data_okonchaniya_dogovora'];
                        $SLA = $_POST['SLA'];
                        $za_kem_ZIP = $_POST['za_kem_ZIP'];
                        $SN_ustrojstva = $_POST['SN_ustrojstva'];
                        $data_vzyatiya_vzyatiya_na_podderzhku = $_POST['data_vzyatiya_vzyatiya_na_podderzhku'];
                        $vsdati = strtotime($data_vzyatiya_vzyatiya_na_podderzhku);
                        $vsdati=date("d/m/Y",$vsdati);
                        $Data_okonchaniya_podderzhki = $_POST['Data_okonchaniya_podderzhki'];
                        $okdati = strtotime($Data_okonchaniya_podderzhki);
                        $okdati=date("d/m/Y",$okdati);
                    }
                    //создаем условие для выборки
                    if ($Nomer_dogovora !="" || $Naimennovanie_organizacii !="" || $Familiya !="" || $Imya !="" || $Data_nachala_dogovora !="" || $Data_okonchaniya_dogovora !="" || $SLA !="" || $za_kem_ZIP !="" || $SN_ustrojstva !="" || $data_vzyatiya_vzyatiya_na_podderzhku !="" || $Data_okonchaniya_podderzhki !="")
                    {
                        $mass = array(
                            "0" => "$Nomer_dogovora",
                            "1" => "$Data_nachala_dogovora",
                            "2" => "$Data_okonchaniya_dogovora",
                            "3" => "$SLA",
                            "4" => "$za_kem_ZIP",
                            "5" => "$SN_ustrojstva",
                            "6" => "$data_vzyatiya_vzyatiya_na_podderzhku",
                            "7" => "$Data_okonchaniya_podderzhki",
                        );
                        
                        $mass1 = array(
                            "0" => "servisnyj_dogovor.Nomer_dogovora",
                            "1" => "servisnyj_dogovor.Data_nachala_dogovora",
                            "2" => "servisnyj_dogovor.Data_okonchaniya_dogovora",
                            "3" => "oborudovanie.SLA",
                            "4" => "servisnaya_model_oborudovanie.za_kem_ZIP",
                            "5" => "oborudovanie.SN_ustrojstva",
                            "6" => "oborudovanie.data_vzyatiya_vzyatiya_na_podderzhku",
                            "7" => "oborudovanie.Data_okonchaniya_podderzhki",
                        );
                        
                        $a="";
                        $SQLCond="";
                        for($i=0; $i<8; $i++)
                        {
                            if(!($mass[$i]==""))
                            {
                                $SQLCond="$mass1[$i]= '$mass[$i]'";
                                if(($SQLCond!="" and $a!=""))
                                {
                                    $a = $a . ' AND ' . $SQLCond;
                                }
                                else 
                                {
                                    $a = $a . $SQLCond;
                                }
                            }
                        }
                        
                        $Naimennovanie_organizacii = $_POST['Naimennovanie_organizacii']; 
                        // echo "Naimennovanie_organizacii = $Naimennovanie_organizacii";
                        if(!($Naimennovanie_organizacii==""))
                        {
                            $str2="";
                            $first2=true;
                            foreach ($Naimennovanie_organizacii as $Naimennovanie_organizaciiNum=>$value) 
                            {
                                if ($first2)
                                {
                                    $first2=false;
                                    $str2="servisnyj_dogovor.Naimennovanie_organizacii ='$value'";
                                }
                                else
                                {
                                    $str2=$str2." OR "."servisnyj_dogovor.Naimennovanie_organizacii ='$value' ";
                                }
                                // echo "Организация : ".$servisnyj_dogovor.$Naimennovanie_organizaciiNum." Значение ".$value."<br />";
                            }
                            // echo "<br> str2=$str2";
                            $SQLCond2=$str2.$SQLCond2;
                            // echo $SQLCond2;
                            if(($SQLCond2!="" and $a!=""))
                            {
                                $a = $a . ' AND ' . $SQLCond2;
                            }
                            else
                            {
                                $a = $a . $SQLCond2;
                            }
                        }
                        $Familiya = $_POST['Familiya'];
                        // echo "Familiya = $Familiya";
                        if(!($Familiya==""))
                        {
                            $str3="";
                            $first3=true;
                            foreach ($Familiya as $FamiliyaNum=>$value)
                            {
                                if ($first3)
                                {
                                    $first3=false;
                                    $str3="Familiya ='$value'";
                                }
                                else
                                {
                                    $str3=$str3." OR "."sotrudnik.Familiya ='$value' ";
                                }
                                // echo "Familiya : ".$sotrudnik.$FamiliyaNum." Значение ".$value."<br />";
                            }
                            // echo "<br> str3=$str3";
                            $SQLCond3=$str3.$SQLCond3;
                            // echo $SQLCond3;
                            if(($SQLCond3!="" and $a!=""))
                            {
                                $a = $a . ' AND ' . $SQLCond3;
                            }
                            else 
                            {
                                $a = $a . $SQLCond3;
                            }
                        }
                        $Imya = $_POST['Imya'];
                        // echo "Imya = $Imya";
                        if(!($Imya==""))
                        {
                            $str4="";
                            $first4=true;
                            foreach ($Imya as $ImyaNum=>$value)
                            {
                                if ($first4)
                                {
                                    $first4=false;
                                    $str4="Imya ='$value'";
                                }
                                else
                                {
                                    $str4=$str4." OR "."sotrudnik.Imya ='$value' ";
                                }
                                // echo "Imya : ".$sotrudnik.$ImyaNum." Значение ".$value."<br />";
                            }
                            // echo "<br> str4=$str4";
                            $SQLCond4=$str4.$SQLCond4;
                            // echo $SQLCond4;
                            if(($SQLCond4!="" and $a!=""))
                            {
                                $a = $a . ' AND ' . $SQLCond4;
                            }
                            else 
                            {
                                $a = $a . $SQLCond4;
                            }
                        }
                        
                        $query = 'SELECT servisnyj_dogovor.Nomer_dogovora, servisnyj_dogovor.Naimennovanie_organizacii, servisnyj_dogovor.Data_nachala_dogovora, servisnyj_dogovor.Data_okonchaniya_dogovora, servisnyj_dogovor.Stoimost, oborudovanie.SN_ustrojstva, oborudovanie.PN, oborudovanie.data_vzyatiya_vzyatiya_na_podderzhku, oborudovanie.Data_okonchaniya_podderzhki, oborudovanie.SLA, concat(sotrudnik.Familiya," ", sotrudnik.Imya, " ",sotrudnik.Otchestvo ), servisnaya_model_oborudovanie.za_kem_ZIP
                        FROM servisnyj_dogovor
                        JOIN oborudovanie_servisnyj_dogovor_presejl_servis ON oborudovanie_servisnyj_dogovor_presejl_servis.Nomer_dogovora=servisnyj_dogovor.Nomer_dogovora
                        JOIN oborudovanie ON oborudovanie.SN_ustrojstva=oborudovanie_servisnyj_dogovor_presejl_servis.SN_ustrojstva
                        JOIN sotrudnik_servisnyj_dogovor ON sotrudnik_servisnyj_dogovor.Nomer_dogovora=servisnyj_dogovor.Nomer_dogovora
                        JOIN sotrudnik ON sotrudnik.ID_sotrudnik=sotrudnik_servisnyj_dogovor.ID_sotrudnik
                        JOIN servisnaya_model_oborudovanie ON servisnaya_model_oborudovanie.id_servisnoj_modeli_oborudovaniya=oborudovanie_servisnyj_dogovor_presejl_servis.id_servisnaya_modeli_oborudovanie WHERE '.$a; // Переписали $query если есть дополнит. условия
                    }

                    //echo  "Сформировали запрос $query";
                    $data  = mysqli_query($conn, $query) or die('<br>Ошибка выполнения запроса');
                    if(mysqli_num_rows($data) > 0)
                    {
                        $numrows=mysqli_num_rows($data);// Для отладки
                        //echo "<br>Получены данные $numrows строк";
                        while($row = mysqli_fetch_assoc($data))
                        {// Формируем таблицу
                            ?>
                            <tr>
                                <?php
                                foreach ($row as $key => $cellValue) {
                                    if ($key=="id") continue; // На следующую итерацию уйти
                                    if ($key=="categori")continue;
                                    
                                    // if ($key == "Nomer_dogovora") {
                                    //     echo "<td><a href='$cellValue'>$cellValue</a></td>";
                                    //     continue;    
                                    // }


                                    if ($key == "data_vzyatiya_vzyatiya_na_podderzhku") {
                                        if (!empty($cellValue)) { // Проверяем, что ячейка не пуста
                                            $date = date('d.m.Y', strtotime($cellValue)); // преобразуем дату в нужный формат
                                            echo "<td> $date </td>"; // выводим ячейку таблицы с отформатированной датой
                                        } else {
                                            echo "<td></td>"; // Выводим пустую ячейку
                                        }
                                        continue; 
                                    }
                                    if ($key == "Data_nachala_dogovora") {
                                        if (!empty($cellValue)) { // Проверяем, что ячейка не пуста
                                            $date = date('d.m.Y', strtotime($cellValue)); // преобразуем дату в нужный формат
                                            echo "<td> $date </td>"; // выводим ячейку таблицы с отформатированной датой
                                        } else {
                                            echo "<td></td>"; // Выводим пустую ячейку
                                        }
                                        continue; 
                                    }
                                    if ($key == "Data_okonchaniya_dogovora") {
                                        if (!empty($cellValue)) { // Проверяем, что ячейка не пуста
                                            $date = date('d.m.Y', strtotime($cellValue)); // преобразуем дату в нужный формат
                                            echo "<td> $date </td>"; // выводим ячейку таблицы с отформатированной датой
                                        } else {
                                            echo "<td></td>"; // Выводим пустую ячейку
                                        }
                                        continue; 
                                    }
                                    if ($key == "Data_okonchaniya_podderzhki") {
                                        if (!empty($cellValue)) { // Проверяем, что ячейка не пуста
                                            $date = date('d.m.Y', strtotime($cellValue)); // преобразуем дату в нужный формат
                                            echo "<td> $date </td>"; // выводим ячейку таблицы с отформатированной датой
                                        } else {
                                            echo "<td></td>"; // Выводим пустую ячейку
                                        }
                                        continue; 
                                    }
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