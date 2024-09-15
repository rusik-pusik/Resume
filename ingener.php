<!DOCTYPE html>
<!-- здесь расположены фильтры -->
<script> // Этот скрипт при запуске формы сохраняет имя активной формы в LocalStorage
  
      const LS= localStorage;
      form = {name:"ingener"}
      LS.setItem('form',JSON.stringify(form));
  
</script>
<form action="meneger.php?page=ingener" method="POST">
    <?php
    $server="127.0.0.1";
    $user  ="root";
    $pass  ="1";
    $dbname ="bd_infocell";
    $dbtable ="model_oborudovaniya";
    $dbtable2 ="proizvoditel";
    $conn  = mysqli_connect($server, $user,$pass, $dbname);
    ?>
    <nav class="navbar navbar-expand d-flex flex-column align-item-start" id="sidebar">
        <a href="#" class="navbar-brand text-light mt-5">
            <div class="display-5 font-weight-bold">INFOCELL</div>
        </a>
        <ul class="navbar-nav d-flex flex-column mt-5 w-100">
           
            <li class="nav-item dropdown w-100">
            <a href="#" class="nav-link dropdown-toggle text-light pl-4" name="Tip_oborudovaniya" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                Тип оборудования
            </a>
            <ul class="dropdown-menu w-100" aria-labelledby="navbarDropdown">
                <!-- Добавляем опцию "Все" для всех типов оборудования -->
                <li class="form-check">
                <input class="form-check-input" type="radio" name="Tip_oborudovaniya" id="flexRadioDefault" value="" checked>
                <label class="form-check-label" for="flexRadioDefault">
                    Все
                </label>
                </li>

                <?php
                // Используем prepared statements для защиты от SQL-инъекций
                $query = 'SELECT DISTINCT model_oborudovaniya.Tip_oborudovaniya FROM model_oborudovaniya ORDER BY Tip_oborudovaniya';
                $statement = mysqli_prepare($conn, $query);
                mysqli_stmt_execute($statement);
                $result = mysqli_stmt_get_result($statement);

                // Генерируем опции типов оборудования из результатов запроса к базе данных
                if(mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                    foreach ($row as $key => $cellValue) {
                        if (!empty($cellValue)) {
                        // Добавляем уникальное значение для каждого типа оборудования
                        echo "<li class='form-check equipment-type-option'>
                        <input type='hidden' name='Imya_proizvoditelya' value='' />
                                <input class='form-check-input' type='radio' name='Tip_oborudovaniya' value='$cellValue' id='flexRadioDefault'>
                                <label class='form-check-label' for='flexRadioDefault'>$cellValue</label>
                            </li>";}
                    }
                    }
                } 
                ?>
            </ul>
            </li>
            <?php

function stranaQuery($conn, $query) {
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_execute($stmt);
    return mysqli_stmt_get_result($stmt);
}

function renderCountryDropdown($conn) {
    $query = 'SELECT DISTINCT proizvoditel.Strana_proizvoditel FROM proizvoditel ORDER BY Strana_proizvoditel';
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
                echo '<input type="hidden" name="Strana_proizvoditel" value="" />';
                echo '<input class="form-check-input" type="checkbox" name="Strana_proizvoditel[]" value="' . htmlspecialchars($cellValue, ENT_QUOTES) . '" id="flexCheckDefault">';
                echo '<label class="form-check-label" for="flexCheckDefault">' . htmlspecialchars($cellValue, ENT_QUOTES) . '</label>';
                echo '</li>';}
            }
        }
        echo '</ul>';
        echo '</li>';
    } 
}

renderCountryDropdown($conn);
?>
<?php
function proizvoditelQuery($conn, $query) {
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_execute($stmt);
    return mysqli_stmt_get_result($stmt);
}

function renderProizvoditelDropdown($conn) {
    $query = 'SELECT DISTINCT proizvoditel.Imya_proizvoditelya FROM proizvoditel ORDER BY Imya_proizvoditelya';
    $result = proizvoditelQuery($conn, $query);
    if(mysqli_num_rows($result) > 0) {
        echo '<li class="nav-item dropdown w-100">';
        echo '<a href="#" class="nav-link dropdown-toggle text-light pl-4" id="navbarDropdown" name="Imya_proizvoditelya" role="button" data-toggle="dropdown" aria-expanded="false">';
        echo 'Выберите страну</a>';
        echo '<ul class="dropdown-menu w-100" aria-labelledby="navbarDropdown">';
        while($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
            foreach ($row as $cellValue) {
                if (!empty($cellValue)) {
                echo '<li class="form-check">';
                echo '<input type="hidden" name="Imya_proizvoditelya" value="" />';
                echo '<input class="form-check-input" type="checkbox" name="Imya_proizvoditelya[]" value="' . htmlspecialchars($cellValue, ENT_QUOTES) . '" id="flexCheckDefault">';
                echo '<label class="form-check-label" for="flexCheckDefault">' . htmlspecialchars($cellValue, ENT_QUOTES) . '</label>';
                echo '</li>';}
            }
        }
        echo '</ul>';
        echo '</li>';
    } 
}

renderProizvoditelDropdown($conn);

            ?>
            <li class="nav-item dropdown w-100">
                <!-- Создаем выпадающее меню для выбора названия оборудования -->
                <a href="#" class="nav-link dropdown-toggle text-light pl-4" id="navbarDropdown" role="button" name="Naimenovanie_modeli_oborudovaniya1" data-toggle="dropdown" aria-expanded="false">
                    Название оборудования
                </a>
                <ul class="dropdown-menu w-100" aria-labelledby="navbarDropdown">
                    <!-- Создаем форму для ввода названия оборудования -->
                    <div class="form-group">
                        <!-- Создаем поле ввода с меткой -->
                        <label for="naimenovanie_modeli_oborudovaniya_input">Введите название оборудования:</label>
                        <input type="text" id="naimenovanie_modeli_oborudovaniya_input" name="Naimenovanie_modeli_oborudovaniya" class="form-control" placeholder="Название оборудования" value="">

                        <!-- Добавляем скрытое поле с CSRF-токеном для защиты от атак межсайтовой подделки запросов -->
                        <input type="hidden" name="csrf_token" value="{{ csrf_token() }}">
                    </div>
                </ul> 
            </li>
            <li class="nav-item dropdown w-100">
            <a href="#" class="nav-link dropdown-toggle text-light pl-4" name="Nahozhdenie_v_reestr_Minpromtorg" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
            Наличие в Минпромторге
            </a>
            <ul class="dropdown-menu w-100" aria-labelledby="navbarDropdown">
                <!-- Добавляем опцию "Все" для всех типов оборудования -->
                <li class="form-check">
                <input class="form-check-input" type="radio" name="Nahozhdenie_v_reestr_Minpromtorg" id="flexRadioDefault" value="" checked>
                <label class="form-check-label" for="flexRadioDefault">
                    Все
                </label>
                </li>

                <?php
                // Используем prepared statements для защиты от SQL-инъекций
                $query = 'SELECT DISTINCT model_oborudovaniya.Nahozhdenie_v_reestr_Minpromtorg FROM model_oborudovaniya';
                $statement = mysqli_prepare($conn, $query);
                mysqli_stmt_execute($statement);
                $result = mysqli_stmt_get_result($statement);

                // Генерируем опции типов оборудования из результатов запроса к базе данных
                if(mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                    foreach ($row as $key => $cellValue) {
                        // Добавляем уникальное значение для каждого типа оборудования
                        if (!empty($cellValue)) {
                        echo "<li class='form-check equipment-type-option'>
                        
                                <input class='form-check-input' type='radio' name='Nahozhdenie_v_reestr_Minpromtorg' value='$cellValue' id='flexRadioDefault'>
                                <label class='form-check-label' for='flexRadioDefault'>$cellValue</label>
                            </li>";}
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
            <input class="btn btn-secondary" type="submit"  name="Применить" id="butt_apply" value="Применить"></input>
            <input class="btn btn-secondary" type="submit"  name="Сброс настроек" id="buttonClear" value="Сброс настроек"></input>
            <input class="btn btn-secondary" type="submit" name="Экспорт" id="exportButton" value="Экспорт"></input>
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
            <a href="meneger.php?page=ingener" class="nav-link active">Инженерам</a>
            <a href="meneger.php?page=servic" class="nav-link ">Сервис</a>
            <a href="index.php" class="nav-link  " aria-current="page" >Новости</a>
            <a  class="nav-link" href="doci.php">Документация</a>
        </ul>
        </header>
        <div class="d-flex flex-wrap justify-content-center  mb-4 border-bottom">
        <a  class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <button class="btn my-0 " id="menu-btn" >Выберите фильтры</button>
        </a>
        <h4 >Страница для Инженеров</h4>
        </div>
        <!-- здесь расположена таблица -->

        <table id="mytable" class="table table-striped table-hover table-responsive table-bordered table table-sm" >

            <thead>
                <tr >
                    <th >Страна </th>
                    <th >Производитель</th>
                    <th >Название оборудования</th>
                    <th >Тип оборудования</th>
                    <th >Наличие в Минпромторге</th>
                    <th >Ссылка на сайт</th>
                    <th >Ссылка на модель</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php
                $server="127.0.0.1";
                $user  ="root";
                $pass  ="1";
                $dbname ="bd_infocell";
                $dbtable ="model_oborudovaniya";
                $dbtable2 ="proizvoditel";
                $conn  = mysqli_connect($server, $user,$pass, $dbname);
                // if(!$conn)
                // {
                //     die("connection Failed!" . mysqli_connect_error());
                // }
                // else{
                //     echo "Connection Established";
                // }
                // echo " DEBUG - Начало кода для запроса ";
                $query = 'SELECT proizvoditel.Strana_proizvoditel, model_oborudovaniya.Imya_proizvoditelya,model_oborudovaniya.Naimenovanie_modeli_oborudovaniya,model_oborudovaniya.Tip_oborudovaniya, model_oborudovaniya.Nahozhdenie_v_reestr_Minpromtorg, model_oborudovaniya.Ssylka_na_sajt_proizvoditelya_na_model, proizvoditel.Ssylka_na_sajt_proizvoditelya
                FROM model_oborudovaniya JOIN proizvoditel ON model_oborudovaniya.Imya_proizvoditelya=proizvoditel.Imya_proizvoditelya'; //Типа запрос делаем все равно, вначале для всей таблицы
                $Tip_oborudovaniya = "";
                $Imya_proizvoditelya = "";
                $Strana_proizvoditel = "";
                $Nahozhdenie_v_reestr_Minpromtorg = "";
                $Naimenovanie_modeli_oborudovaniya = "";
                if(isset($_POST['Применить']))
                {
                    // echo " DEBUG - Есть POST ";
                    // также точка с запятой отсутствовала
                    $Tip_oborudovaniya = $_POST['Tip_oborudovaniya'];
                    $Imya_proizvoditelya = $_POST['Imya_proizvoditelya'];
                    $Strana_proizvoditel = $_POST['Strana_proizvoditel'];
                    $Nahozhdenie_v_reestr_Minpromtorg = $_POST['Nahozhdenie_v_reestr_Minpromtorg'];
                    $Naimenovanie_modeli_oborudovaniya = $_POST['Naimenovanie_modeli_oborudovaniya'];
                }
                if ($Tip_oborudovaniya !="" || $Strana_proizvoditel !="" || $Imya_proizvoditelya !="" || $Nahozhdenie_v_reestr_Minpromtorg !="" || $Naimenovanie_modeli_oborudovaniya !="" )
                {
                    $mass = array(
                        "0" => "$Naimenovanie_modeli_oborudovaniya",
                        "1" => "$Nahozhdenie_v_reestr_Minpromtorg",
                    );
                    $mass1 = array(
                        "0" => "proizvoditel.Naimenovanie_modeli_oborudovaniya",
                        "1" => "proizvoditel.Nahozhdenie_v_reestr_Minpromtorg",
                    );
                    // echo " DEBUG - Прошли условие ";
                    $SQLCond="";
                    $SQLCond2="";
                    $a="";
                    // echo "mass = $mass";
                    for($i=0; $i<2; $i++)
                    {
                        if(!($mass[$i]==""))
                        {
                            $SQLCond="";
                            $SQLCond="$mass1[$i]= '$mass[$i]'".$SQLCond;
                            
                            if(($SQLCond!="" and $a!=""))
                            {
                                $a = $a . ' AND ' . $SQLCond;
                            }
                            else 
                            {
                                $a = $a . $SQLCond;
                            }
                            // echo "\n\rSQLCond = $SQLCond";
                        }
                    }
                    $Tip_oborudovaniya = $_POST['Tip_oborudovaniya']; 
                    if(!($Tip_oborudovaniya==""))
                    {   
                        $str1="";
                        $first1=true;
                        foreach ($Tip_oborudovaniya as $Tip_oborudovaniyaNum=>$value) {
                            if ($first1)
                            {
                                $first1=false;
                                $str1="proizvoditel.Tip_oborudovaniya ='$value'";
                            }else
                            {
                                $str1=$str1." OR "."proizvoditel.Tip_oborudovaniya ='$value' ";
                            }
                             echo "Производители : ".$proizvoditel.$Tip_oborudovaniyaNum." Значение ".$value."<br />";
                        }
                         echo "<br> str1=$str1";
                        $SQLCond1=$str1.$SQLCond1;
                         echo $SQLCond1;
                        if(($SQLCond1!="" and $a!=""))
                        {
                            $a = $a . ' AND ' . $SQLCond1;
                        }
                        else 
                        {
                            $a = $a . $SQLCond1;
                        }
                    }
                    $Imya_proizvoditelya = $_POST['Imya_proizvoditelya']; 
                    if(!($Imya_proizvoditelya==""))
                    {   
                        $str1="";
                        $first1=true;
                        foreach ($Imya_proizvoditelya as $Imya_proizvoditelyaNum=>$value) {
                            if ($first1)
                            {
                                $first1=false;
                                $str1="proizvoditel.Imya_proizvoditelya ='$value'";
                            }else
                            {
                                $str1=$str1." OR "."proizvoditel.Imya_proizvoditelya ='$value' ";
                            }
                             echo "Производители : ".$proizvoditel.$Imya_proizvoditelyaNum." Значение ".$value."<br />";
                        }
                         echo "<br> str1=$str1";
                        $SQLCond1=$str1.$SQLCond1;
                         echo $SQLCond1;
                        if(($SQLCond1!="" and $a!=""))
                        {
                            $a = $a . ' AND ' . $SQLCond1;
                        }
                        else 
                        {
                            $a = $a . $SQLCond1;
                        }
                    }
                    $Strana_proizvoditel = $_POST['Strana_proizvoditel']; 
                    // echo "Strana_proizvoditel = $Strana_proizvoditel";
                    if(!($Strana_proizvoditel==""))
                    {
                        $str4="";
                        $first4=true;
                        foreach ($Strana_proizvoditel as $Strana_proizvoditelNum=>$value) {
                            if ($first4)
                            {
                                $first4=false;
                                $str4="proizvoditel.Strana_proizvoditel  ='$value'";
                            }
                            else
                            {
                                $str4=$str4." OR "."proizvoditel.Strana_proizvoditel ='$value' ";
                            }
                            // echo "Производители : ".$proizvoditel.$Strana_proizvoditelNum." Значение ".$value."<br />";
                        }
                        // echo "<br> str4=$str4";
                        $SQLCond2=$str4.$SQLCond2;
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
                    $query = 'SELECT proizvoditel.Strana_proizvoditel, model_oborudovaniya.Imya_proizvoditelya,model_oborudovaniya.Naimenovanie_modeli_oborudovaniya,model_oborudovaniya.Tip_oborudovaniya, model_oborudovaniya.Nahozhdenie_v_reestr_Minpromtorg, model_oborudovaniya.Ssylka_na_sajt_proizvoditelya_na_model, proizvoditel.Ssylka_na_sajt_proizvoditelya
                    FROM model_oborudovaniya JOIN proizvoditel ON model_oborudovaniya.Imya_proizvoditelya=proizvoditel.Imya_proizvoditelya WHERE '. $a; // Переписали $query если есть дополнит. условия
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
                            <tr class="fs-6">
                                <?php
                                foreach ($row as $key => $cellValue) {
                                    if ($key=="id") continue; // На следующую итерацию уйти
                                    // if ($key=="Tip_oborudovaniya")continue;
                                    if ($key == "Ssylka_na_sajt_proizvoditelya_na_model") {
                                        if ($cellValue == "нет") {
                                            echo "<td>$cellValue</td>";
                                        } else {
                                            echo "<td><a href='$cellValue'>Перейти</a></td>";
                                        }
                                        continue;    
                                    }
                                    if ($key == "Ssylka_na_sajt_proizvoditelya") {
                                        if ($cellValue == "нет") {
                                            echo "<td>$cellValue</td>";
                                        } else {
                                            echo "<td><a href='$cellValue'>Перейти</a></td>";
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
                            <?php
                                
                                echo "<td> пусто </td>";
                                echo "<td> пусто </td>";
                                echo "<td> пусто </td>";
                                echo "<td> пусто </td>";
                                echo "<td> пусто </td>";
                                echo "<td> пусто</td>";
                                ?>
                            </td>
                        </tr>
                        <?php
                    }
                ?>
            </tbody>
        </table>
        
</section>
