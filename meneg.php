<!DOCTYPE html>
<!-- здесь расположены фильтры -->
<script> // Этот скрипт при запуске формы сохраняет имя активной формы в LocalStorage
  
      const LS= localStorage;
      form = {name:"meneg"}
      LS.setItem('form',JSON.stringify(form));
  
</script>

<form action="meneger.php?page=meneg" method="POST">
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
    ?>
    <nav class="navbar navbar-expand d-flex flex-column align-item-start" id="sidebar">
        <a href="#" class="navbar-brand text-light mt-5">
            <div class="display-5 font-weight-bold">INFOCELL</div>
        </a>
        <ul class="navbar-nav d-flex flex-column mt-5 w-100">
        <input class="btn btn-secondary" type="submit"  name="Применить" id="butt_apply" value="Применить"></input>
            <input class="btn btn-secondary" type="submit"  name="Сброс настроек" id="buttonClear" value="Сброс настроек"  onClick="window.location.reload();"></input>
       
        <?php

function Tip_oborudovaniyaQuery($conn, $query) {
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_execute($stmt);
    return mysqli_stmt_get_result($stmt);
}

function renderTip_oborudovaniyaDropdown($conn) {
    $query = 'SELECT DISTINCT proizvoditel.Tip_oborudovaniya FROM proizvoditel ORDER BY BINARY Tip_oborudovaniya ';
    $result = Tip_oborudovaniyaQuery($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        echo '<li class="nav-item dropdown w-100" name="Tip_obor">';
        echo '<a href="#" class="nav-link dropdown-toggle text-light pl-4" id="navbarDropdown" name="Tip_oborudovaniya" role="button" data-toggle="dropdown" aria-expanded="false">';
        echo 'Тип оборудования</a>';
        echo '<ul class="dropdown-menu w-100" data-auto-close="false" style="padding: 10px;" aria-labelledby="navbarDropdown">';
        echo'<input type="hidden" name="Tip_oborudovaniya" value="" />';
        while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
            foreach ($row as $cellValue) {
                if (!empty($cellValue)) {
                    echo '<li class="form-check">';
                    
                    echo '<label class="form-check-label" for="checkbox1_' . htmlspecialchars($cellValue, ENT_QUOTES) . '">';
                    echo '<input class="form-check-input" type="checkbox" name="Tip_oborudovaniya[]" value="' . htmlspecialchars($cellValue, ENT_QUOTES) . '" id="checkbox1_' . htmlspecialchars($cellValue, ENT_QUOTES) . '">';
                    echo htmlspecialchars($cellValue, ENT_QUOTES);
                    echo '</label>';
                    echo '</li>';
                }
            }
        }
        echo '</ul>';
        echo '</li>';
    } 
}



function Strana_proizvoditelQuery($conn, $query) {
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_execute($stmt);
    return mysqli_stmt_get_result($stmt);
}

function renderStrana_proizvoditelDropdown($conn) {
    $query = 'SELECT DISTINCT proizvoditel.Strana_proizvoditel FROM proizvoditel ORDER BY BINARY Strana_proizvoditel ';
    $result = Strana_proizvoditelQuery($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        echo '<li class="nav-item dropdown w-100 "name="Tip_obor">';
        echo '<a href="#" class="nav-link dropdown-toggle text-light pl-4" id="navbarDropdown" name="Strana_proizvoditel" role="button" data-toggle="dropdown" aria-expanded="false">';
        echo 'Страна</a>';
        echo '<ul class="dropdown-menu w-100" data-auto-close="false" style="padding: 10px;" aria-labelledby="navbarDropdown">';
        echo'<input type="hidden" name="Strana_proizvoditel" value="" />';
        while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
            foreach ($row as $cellValue) {
                if (!empty($cellValue)) {
                    echo '<li class="form-check">';
                    
                    echo '<label class="form-check-label" for="checkbox2_' . htmlspecialchars($cellValue, ENT_QUOTES) . '">';
                    echo '<input class="form-check-input" type="checkbox" name="Strana_proizvoditel[]" value="' . htmlspecialchars($cellValue, ENT_QUOTES) . '" id="checkbox2_' . htmlspecialchars($cellValue, ENT_QUOTES) . '">';
                    echo htmlspecialchars($cellValue, ENT_QUOTES);
                    echo '</label>';
                    echo '</li>';
                }
            }
        }
        echo '</ul>';
        echo '</li>';
    } 
}



function proizvoditelQuery($conn, $query) {
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_execute($stmt);
    return mysqli_stmt_get_result($stmt);
}
function renderProizvoditelDropdown($conn) {
    $query = 'SELECT DISTINCT proizvoditel.Imya_proizvoditelya FROM proizvoditel ORDER BY BINARY Imya_proizvoditelya ';
    $result = proizvoditelQuery($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        echo '<li class="nav-item dropdown w-100 "name="Tip_obor">';
        echo '<a href="#" class="nav-link dropdown-toggle text-light pl-4" id="navbarDropdown" name="Imya_proizvoditelya" role="button" data-toggle="dropdown" aria-expanded="false">';
        echo 'Имя производителя</a>';
        echo '<ul class="dropdown-menu w-100" data-auto-close="false" style="padding: 10px;" aria-labelledby="navbarDropdown">';
        echo'<input type="hidden" name="Imya_proizvoditelya" value="" />';
        while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
            foreach ($row as $cellValue) {
                if (!empty($cellValue)) {
                    echo '<li class="form-check">';
                    
                    echo '<label class="form-check-label" for="checkbox3_' . htmlspecialchars($cellValue, ENT_QUOTES) . '">';
                    echo '<input class="form-check-input" type="checkbox" name="Imya_proizvoditelya[]" value="' . htmlspecialchars($cellValue, ENT_QUOTES) . '" id="checkbox3_' . htmlspecialchars($cellValue, ENT_QUOTES) . '">';
                    echo htmlspecialchars($cellValue, ENT_QUOTES);
                    echo '</label>';
                    echo '</li>';
                }
            }
        }
        echo '</ul>';
        echo '</li>';
    } 
}


function presejlQuery($conn, $query) {
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_execute($stmt);
    return mysqli_stmt_get_result($stmt);
}

function renderpresejlDropdown($conn) {
    $query = 'SELECT DISTINCT presejl.Postavshik FROM presejl ORDER BY BINARY Postavshik ';
    $result = presejlQuery($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        echo '<li class="nav-item dropdown w-100" name="Tip_obor">';
        echo '<a href="#" class="nav-link dropdown-toggle text-light pl-4" id="navbarDropdown" name="Postavshik" role="button" data-toggle="dropdown" aria-expanded="false">';
        echo 'Поставщик</a>';
        echo '<ul class="dropdown-menu w-100" data-auto-close="false" style="padding: 10px;" aria-labelledby="navbarDropdown">';
        echo'<input type="hidden" name="Postavshik" value="" />';
        while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
            foreach ($row as $cellValue) {
                if (!empty($cellValue)) {
                    echo '<li class="form-check">';
                    
                    echo '<label class="form-check-label" for="checkbox4_' . htmlspecialchars($cellValue, ENT_QUOTES) . '">';
                    echo '<input class="form-check-input" type="checkbox" name="Postavshik[]" value="' . htmlspecialchars($cellValue, ENT_QUOTES) . '" id="checkbox4_' . htmlspecialchars($cellValue, ENT_QUOTES) . '">';
                    echo htmlspecialchars($cellValue, ENT_QUOTES);
                    echo '</label>';
                    echo '</li>';
                }
            }
        }
        echo '</ul>';
        echo '</li>';
    } 
}


renderTip_oborudovaniyaDropdown($conn);

renderStrana_proizvoditelDropdown($conn);

renderProizvoditelDropdown($conn);

renderpresejlDropdown($conn);
?>
            
            
            <li class="nav-item dropdown w-100" name="Tip_obor">
    <a href="#" class="nav-link dropdown-toggle text-light pl-4" name="Nalichie_zashchity_sdelki" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
        Защита сделки
    </a>
    <ul class="dropdown-menu w-100" data-auto-close="false" style="padding: 10px;"  aria-labelledby="navbarDropdown">
        <li class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="Nalichie_zashchity_sdelki" id="inlineRadioAll" value="" checked>
            <label class="form-check-label" for="inlineRadioAll">Все</label>
        </li>
        
        <?php
        // Используем prepared statements для защиты от SQL-инъекций
        $query = 'SELECT DISTINCT presejl.Nalichie_zashchity_sdelki FROM presejl ORDER BY BINARY  Nalichie_zashchity_sdelki ';
        $statement = mysqli_prepare($conn, $query);
        mysqli_stmt_execute($statement);
        $result = mysqli_stmt_get_result($statement);

        // Генерируем опции типов оборудования из результатов запроса к базе данных
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                foreach ($row as $key => $cellValue) {
                    // Добавляем уникальное значение для каждого типа оборудования
                    if (!empty($cellValue)) {
                        echo "<li class='form-check form-check-inline'><input class='form-check-input' type='radio' name='Nalichie_zashchity_sdelki' value='$cellValue' id='inlineRadio12_$cellValue'>
                        <label class='form-check-label' for='inlineRadio12_$cellValue'>$cellValue</label></li>";
                    }
                }
            }
        }
        ?>
    </ul>
</li>
            <li class="nav-item dropdown w-100" name="Tip_obor">
            <a href="#" class="nav-link dropdown-toggle text-light pl-4" name="Rebate" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
            Rebate
            </a>
            <ul class="dropdown-menu w-100" data-auto-close="false" style="padding: 10px;"  aria-labelledby="navbarDropdown">
                
                <li class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="Rebate" id="inlineRadioAll" value="" checked>
            <label class="form-check-label" for="inlineRadioAll">Все</label>
                        </li>
                <?php
                // Используем prepared statements для защиты от SQL-инъекций
                $query = 'SELECT DISTINCT  proizvoditel.Rebate FROM proizvoditel ORDER BY BINARY Rebate';
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
                            echo"<li class='form-check form-check-inline'><input class='form-check-input' type='radio' name='Rebate' value='$cellValue' id='inlineRadio11_$cellValue' >
                            <label class='form-check-label' for='inlineRadio11_$cellValue'>$cellValue</li>";}
                        }
                    }
                } 
                ?>
            </ul>
            </li>
            <li class="nav-item dropdown w-100" name="Tip_obor">
            <a href="#" class="nav-link dropdown-toggle text-light pl-4" name="Osushchestvlyaet_li_postavki_v_Rossiyu" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
            Поставки в Россию
            </a>
            <ul class="dropdown-menu w-100" data-auto-close="false" style="padding: 10px;"  aria-labelledby="navbarDropdown">
                
                <li class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Osushchestvlyaet_li_postavki_v_Rossiyu" id="inlineRadioAll" value="" checked>
                            <label class="form-check-label" for="inlineRadioAll">Все</label>
                        </li>
                <?php
                // Используем prepared statements для защиты от SQL-инъекций
                $query = 'SELECT DISTINCT  proizvoditel.Osushchestvlyaet_li_postavki_v_Rossiyu FROM proizvoditel ORDER BY BINARY Osushchestvlyaet_li_postavki_v_Rossiyu';
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
                            echo"<li class='form-check form-check-inline'><input class='form-check-input' type='radio' name='Osushchestvlyaet_li_postavki_v_Rossiyu' value='$cellValue' id='inlineRadio0_$cellValue' >
                            <label class='form-check-label' for='inlineRadio0_$cellValue'>$cellValue</li>";}
                        }
                    }
                } 
                ?>
            </ul>
            </li>
            <li class="nav-item dropdown w-100" name="Tip_obor">
            <a href="#" class="nav-link dropdown-toggle text-light pl-4" name="Nahozhdenie_v_reestr_Minpromtorg" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
            Наличие в Минпромторге
            </a>
            <ul class="dropdown-menu w-100" data-auto-close="false" style="padding: 10px;"  aria-labelledby="navbarDropdown">
            <li class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="Nahozhdenie_v_reestr_Minpromtorg" id="inlineRadioAll" value="" checked> 
                        <label class="form-check-label" for="inlineRadioAll">Все</label>
                    </li>
                <?php
                // Используем prepared statements для защиты от SQL-инъекций
                $query = 'SELECT DISTINCT  proizvoditel.Nahozhdenie_v_reestr_Minpromtorg FROM proizvoditel ORDER BY BINARY Nahozhdenie_v_reestr_Minpromtorg';
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
                            echo"<li class='form-check form-check-inline'><input class='form-check-input' type='radio' name='Nahozhdenie_v_reestr_Minpromtorg' value='$cellValue' id='inlineRadio9_$cellValue' >
                            <label class='form-check-label' for='inlineRadio9_$cellValue'>$cellValue</li>";}
                        }
                    }
                }
                ?>
            </ul>
            </li>
            
            <li class="nav-item dropdown w-100" name="Tip_obor">
            <a href="#" class="nav-link dropdown-toggle text-light pl-4" name="Za_kem_presejl" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
            Осуществление пресейла
            </a>
            <ul class="dropdown-menu w-100" data-auto-close="false" style="padding: 10px;"  aria-labelledby="navbarDropdown">
                <li class="form-check form-check">
                        <input class="form-check-input" type="radio" name="Za_kem_presejl" id="inlineRadioAll" value="" checked>
                        <label class="form-check-label" for="inlineRadioAll">все</label>
                </li>
                <?php
                // Используем prepared statements для защиты от SQL-инъекций
                $query = 'SELECT DISTINCT  presejl.Za_kem_presejl FROM presejl ORDER BY BINARY Za_kem_presejl ';
                $statement = mysqli_prepare($conn, $query);
                mysqli_stmt_execute($statement);
                $result = mysqli_stmt_get_result($statement);

                // Генерируем опции типов оборудования из результатов запроса к базе данных
                if(mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                    foreach ($row as $key => $cellValue) {
                        // Добавляем уникальное значение для каждого типа оборудования
                        if (!empty($cellValue)) {
                        echo "<li class='form-check form-check'><input class='form-check-input' type='radio' name='Za_kem_presejl' value='$cellValue' id='inlineRadio8_$cellValue' >
                        <label class='form-check-label' for='inlineRadio8_$cellValue'>$cellValue</li>";}
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
            <li class="nav-item dropdown w-100" name="Tip_obor">
            <a href="#" class="nav-link dropdown-toggle text-light pl-4" name="za_kem_nastrojka" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
            Осуществление настроек
            </a>
            <ul class="dropdown-menu w-100" data-auto-close="false" style="padding: 10px;"   aria-labelledby="navbarDropdown">
                <li class="form-check form-check">
                        <input class="form-check-input" type="radio" name="za_kem_nastrojka" id="inlineRadioAll" value="" checked>
                        <label class="form-check-label" for="inlineRadioAll">Все</label>
                </li>
                <?php
                // Используем prepared statements для защиты от SQL-инъекций
                $query = 'SELECT DISTINCT servisnaya_model_oborudovanie.za_kem_nastrojka FROM servisnaya_model_oborudovanie ORDER BY BINARY  za_kem_nastrojka ';
                $statement = mysqli_prepare($conn, $query);
                mysqli_stmt_execute($statement);
                $result = mysqli_stmt_get_result($statement);

                // Генерируем опции типов оборудования из результатов запроса к базе данных
                if(mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                    foreach ($row as $key => $cellValue) {
                        // Добавляем уникальное значение для каждого типа оборудования
                        if (!empty($cellValue)) {
                        echo"<li class='form-check form-check'>
                            <input class='form-check-input' type='radio' name='za_kem_nastrojka' value='$cellValue' id='inlineRadio7_$cellValue' >
                            <label class='form-check-label' for='inlineRadio7_$cellValue'>$cellValue</li>";}
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
            
            <li class="nav-item dropdown w-100" name="Tip_obor">
            <a href="#" class="nav-link dropdown-toggle text-light pl-4" name="za_kem_servis" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
            Осуществление сервиса
            </a>
            <ul class="dropdown-menu w-100" data-auto-close="false" style="padding: 10px;"  aria-labelledby="navbarDropdown">
                <li class="form-check form-check">
                        <input class="form-check-input" type="radio" name="za_kem_servis" id="inlineRadioAll" value="" checked>
                        <label class="form-check-label" for="inlineRadioAll">Все</label>
                </li>
                <?php
                // Используем prepared statements для защиты от SQL-инъекций
                $query = 'SELECT DISTINCT servisnaya_model_oborudovanie.za_kem_servis FROM servisnaya_model_oborudovanie ORDER BY BINARY za_kem_servis';
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
                            echo"<li class='form-check form-check'><input class='form-check-input' type='radio' name='za_kem_servis' value='$cellValue' id='inlineRadio6_$cellValue' >
                            <label class='form-check-label' for='inlineRadio6_$cellValue'>$cellValue</li>";}
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
            <li class="nav-item dropdown w-100" name="Tip_obor">
            <a href="#" class="nav-link dropdown-toggle text-light pl-4" name="za_kem_ZIP" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
            Поставшик ЗИП
            </a>
            <ul class="dropdown-menu w-100" data-auto-close="false" style="padding: 10px;"  aria-labelledby="navbarDropdown">
                <li class="form-check form-check">
                        <input class="form-check-input" type="radio" name="za_kem_ZIP" id="inlineRadioAll" value="" checked>
                        <label class="form-check-label" for="inlineRadioAll">Все</label>
                </li>
                <?php
                // Используем prepared statements для защиты от SQL-инъекций
                $query = 'SELECT DISTINCT servisnaya_model_oborudovanie.za_kem_ZIP FROM servisnaya_model_oborudovanie ORDER BY BINARY za_kem_ZIP ';
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
                            echo"<li class='form-check form-check'><input class='form-check-input' type='radio' name='za_kem_ZIP' value='$cellValue' id='inlineRadio5_$cellValue' >
                            <label class='form-check-label' for='inlineRadio5_$cellValue'>$cellValue</li>";}
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
            <li class="nav-item dropdown w-100" name="Tip_obor">
                    <a href="#" class="nav-link dropdown-toggle text-light pl-4" id="navbarDropdown" role="button" aria-haspopup="true" name="Data_vneseniya_izmenenij[]" data-toggle="dropdown" aria-expanded="false">
                        Дата внесения изменений
                    </a>
                    <div class="dropdown-menu w-100" aria-labelledby="navbarDropdown" role="menu">
                        <label for="date3" class="sr-only">Выберите дату</label>
                        <input type="date" id="date3" name="Data_vneseniya_izmenenij[]" class="form-control">
                   
                        <label for="date4" class="sr-only">Выберите вторую дату для создание периода</label>
                        <input type="date" id="date4" name="Data_vneseniya_izmenenij[]" class="form-control">
                    </div>
                </li>
            <li class="nav-item dropdown w-100" name="Tip_obor">
            <a href="#" class="nav-link dropdown-toggle text-light pl-4" name="za_kem_predostavlenie_proshivok" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
            Поставшик прошивки
            </a>
            <ul class="dropdown-menu w-100" data-auto-close="false" style="padding: 10px;"  aria-labelledby="navbarDropdown">
                <!-- Добавляем опцию "Все" для всех типов оборудования -->
                <li class="form-check form-check">
                        <input class="form-check-input" type="radio" name="za_kem_predostavlenie_proshivok" id="inlineRadioAll" value="" checked>
                        <label class="form-check-label" for="inlineRadioAll">Все</label>
                    </li>
                <?php
                // Используем prepared statements для защиты от SQL-инъекций
                $query = 'SELECT DISTINCT servisnaya_model_oborudovanie.za_kem_predostavlenie_proshivok FROM servisnaya_model_oborudovanie ORDER BY BINARY za_kem_predostavlenie_proshivok ';
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
                            echo"<li class='form-check form-check'><input class='form-check-input' type='radio' name='za_kem_predostavlenie_proshivok' value='$cellValue' id='inlineRadio_$cellValue' >
                            <label class='form-check-label' for='inlineRadio4_$cellValue'>$cellValue</li>";}
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
            <li class="nav-item dropdown w-100" name="Tip_obor">
            <a href="#" class="nav-link dropdown-toggle text-light pl-4" name="Kanal_postavki" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
            Канал поставки
            </a>
            <ul class="dropdown-menu w-100" data-auto-close="false" style="padding: 10px;"  aria-labelledby="navbarDropdown">
                <!-- Добавляем опцию "Все" для всех типов оборудования -->
                <li class="form-check form-check">
                        <input class="form-check-input" type="radio" name="Kanal_postavki" id="inlineRadioAll" value="" checked>
                        <label class="form-check-label" for="inlineRadioAll">Все</label>
                    </li>

                <?php
                // Используем prepared statements для защиты от SQL-инъекций
                $query = 'SELECT DISTINCT  presejl.Kanal_postavki FROM presejl ORDER BY BINARY Kanal_postavki ';
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
                            echo"<li class='form-check form-check'><input class='form-check-input' type='radio' name='Kanal_postavki' value='$cellValue' id='inlineRadio3_$cellValue' >
                            <label class='form-check-label' for='inlineRadio3_$cellValue'>$cellValue</li>";}
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
            <li class="nav-item dropdown w-100" name="Tip_obor">
            <a href="#" class="nav-link dropdown-toggle text-light pl-4" name="Status_Infocell" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
            Статус Инфосэл
            </a>
            <ul class="dropdown-menu w-100" data-auto-close="false" style="padding: 10px;"  aria-labelledby="navbarDropdown">
                <!-- Добавляем опцию "Все" для всех типов оборудования -->
                <li class="form-check form-check">
                        <input class="form-check-input" type="radio" name="Status_Infocell" id="inlineRadioAll" value="" checked>
                        <label class="form-check-label" for="inlineRadioAll">Все</label>
                    </li>

                <?php
                // Используем prepared statements для защиты от SQL-инъекций
                $query = 'SELECT DISTINCT proizvoditel.Status_Infocell FROM proizvoditel ORDER BY BINARY Status_Infocell ';
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
                            echo"<li class='form-check form-check'><input class='form-check-input' type='radio' name='Status_Infocell' value='$cellValue' id='inlineRadio2_$cellValue' >
                            <label class='form-check-label' for='inlineRadio2_$cellValue'>$cellValue</li>";}
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
            
            
            <li class="nav-item dropdown w-100"name="Tip_obor">
                <a href="#" class="nav-link dropdown-toggle text-light pl-4" id="navbarDropdown" name="Status_SMART" role="button" data-toggle="dropdown" aria-expanded="false">
                    Статус СМАРТ</a>
                <ul class="dropdown-menu w-100" data-auto-close="false" style="padding: 10px;"  aria-labelledby="navbarDropdown">
                    <li class="form-check form-check">
                        <input class="form-check-input" type="radio" name="Status_SMART" id="inlineRadioAll" value="" checked>
                        <label class="form-check-label" for="inlineRadioAll">Все</label>
                    </li>
                    <?php
                            $query = 'SELECT DISTINCT proizvoditel.Status_SMART FROM proizvoditel  ORDER BY BINARY  Status_SMART ';
                            $data  = mysqli_query($conn, $query) or die('<br>Ошибка выполнения запроса');
                            if(mysqli_num_rows($data) > 0)
                            {
                                // $numrows=mysqli_num_rows($data);// Для отладки
                                while($row = mysqli_fetch_assoc($data))
                                {// Формируем таблицу
                                        foreach ($row as $key => $cellValue) {
                                            if (!empty($cellValue)) {
                                            echo"<li class='form-check form-check'><input class='form-check-input' type='radio' name='Status_SMART' value='$cellValue' id='inlineRadio1_$cellValue' >
                                            <label class='form-check-label' for='inlineRadio1_$cellValue'>$cellValue</li>";}
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
            <a href="meneger.php?page=meneg" class="nav-link active">Менеджерам</a>
            <a href="meneger.php?page=ingener" class="nav-link">Инженерам</a>
            <a href="meneger.php?page=servic" class="nav-link">Сервис</a>
            <a href="index.php" class="nav-link" aria-current="page" >Новости</a>
            <a  class="nav-link" href="doci.php">Документация</a>
        </ul>
        </header>
        <div class="d-flex flex-wrap justify-content-center  mb-4 border-bottom">
        <a  class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <button class="btn my-0 " id="menu-btn" >Выберите фильтры</button>
        </a>
        <h4 >Страница для Менеджеров</h4>
        </div>
    
        <!-- здесь расположена таблица -->
        <table id="mytable" class="table table-striped table-hover table-responsive table-bordered table-sm"   >
        <thead>
            <tr>
                <th>Производитель</th>
                <th>Ссылка на сайт</th>
                <th>Страна производителя</th>
                <th>Поставки в Россию</th>
                <th>Тип оборудованию</th>
                <th>Реестр Минпромторг</th>
                <th>Канал поставки</th>
                <th>Защита сделка</th>
                <th>Пресейл</th>
                <th>Настройка</th>
                <th>Сервис</th>
                <th>ZIP</th>
                <th>Прошивка</th>
                <th>Поставщик</th>
                <th>Статус Инфосэл</th>
                <th>Статус СМАРТ</th>
                <th>Rebate</th>
                <th>Дата внесения</th>
            </tr>
        </thead>
        <tbody>
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
                // if(!$conn)
                // {
                //     die("connection Failed!" . mysqli_connect_error());
                // }
                // else{
                //     echo "Connection Established";
                // }

                // echo " DEBUG - Начало кода для запроса ";
                $query = 'SELECT
                proizvoditel.Imya_proizvoditelya,
                proizvoditel.Ssylka_na_sajt_proizvoditelya,
                proizvoditel.Strana_proizvoditel,
                proizvoditel.Osushchestvlyaet_li_postavki_v_Rossiyu,
                proizvoditel.Tip_oborudovaniya,
                proizvoditel.Nahozhdenie_v_reestr_Minpromtorg,
                presejl.Kanal_postavki,
                presejl.Nalichie_zashchity_sdelki,
                presejl.Za_kem_presejl,
                servisnaya_model_oborudovanie.za_kem_nastrojka,
                servisnaya_model_oborudovanie.za_kem_servis,
                servisnaya_model_oborudovanie.za_kem_ZIP,
                servisnaya_model_oborudovanie.za_kem_predostavlenie_proshivok,
                GROUP_CONCAT(presejl.Postavshik) AS Postavshiky,
                proizvoditel.Status_SMART,
                proizvoditel.Status_Infocell,
                proizvoditel.Rebate,
                proizvoditel.Data_vneseniya_izmenenij
            FROM for_manager_oborudovanie
            JOIN presejl ON for_manager_oborudovanie.id_prisejla = presejl.id_prisejla
            JOIN servisnaya_model_oborudovanie ON for_manager_oborudovanie.id_servisnoj_modeli_oborudovaniya = servisnaya_model_oborudovanie.id_servisnoj_modeli_oborudovaniya
            JOIN proizvoditel ON for_manager_oborudovanie.Imya_proizvoditelya = proizvoditel.Imya_proizvoditelya
                AND for_manager_oborudovanie.Tip_oborudovaniya = proizvoditel.Tip_oborudovaniya
                AND for_manager_oborudovanie.Nahozhdenie_v_reestr_Minpromtorg = proizvoditel.Nahozhdenie_v_reestr_Minpromtorg  GROUP BY 
                proizvoditel.Imya_proizvoditelya,
                proizvoditel.Ssylka_na_sajt_proizvoditelya,
                proizvoditel.Strana_proizvoditel,
                proizvoditel.Osushchestvlyaet_li_postavki_v_Rossiyu,
                proizvoditel.Tip_oborudovaniya,
                proizvoditel.Nahozhdenie_v_reestr_Minpromtorg,
                presejl.Kanal_postavki,
                presejl.Nalichie_zashchity_sdelki,
                presejl.Za_kem_presejl,
                servisnaya_model_oborudovanie.za_kem_nastrojka,
                servisnaya_model_oborudovanie.za_kem_servis,
                servisnaya_model_oborudovanie.za_kem_ZIP,
                servisnaya_model_oborudovanie.za_kem_predostavlenie_proshivok,
                proizvoditel.Status_SMART,
                proizvoditel.Status_Infocell,
                proizvoditel.Rebate,
                proizvoditel.Data_vneseniya_izmenenij'; //Типа запрос делаем все равно, вначале для всей таблицы
                    $Imya_proizvoditelya = "";
                    $Strana_proizvoditel = "";
                    $Osushchestvlyaet_li_postavki_v_Rossiyu = "";
                    $Tip_oborudovaniya = "";
                    $Nahozhdenie_v_reestr_Minpromtorg = "";
                    $Status_Infocell = "";
                    $Status_SMART = "";
                    $Rebate = "";
                    $Postavshik = "";
                    $Kanal_postavki = "";
                    $Za_kem_presejl = "";
                    $Nalichie_zashchity_sdelki = "";
                    $za_kem_nastrojka = "";
                    $za_kem_servis = "";
                    $za_kem_ZIP = "";
                    $za_kem_predostavlenie_proshivok = "";
                    $Data_vneseniya_izmenenij = "";
                if(isset($_POST['Применить']))
                {//проверяем формы на заполнение
                    //  echo "DEBUG - Есть POST";
                    // также точка с запятой отсутствовала
                    
                    $Imya_proizvoditelya = $_POST['Imya_proizvoditelya'];
                    $Strana_proizvoditel = $_POST['Strana_proizvoditel'];
                    $Osushchestvlyaet_li_postavki_v_Rossiyu = $_POST['Osushchestvlyaet_li_postavki_v_Rossiyu'];
                    $Tip_oborudovaniya = $_POST['Tip_oborudovaniya'];
                    $Nahozhdenie_v_reestr_Minpromtorg = $_POST['Nahozhdenie_v_reestr_Minpromtorg'];
                    $Status_Infocell = $_POST['Status_Infocell'];
                    $Nalichie_zashchity_sdelki = $_POST['Nalichie_zashchity_sdelki'];
                    $Status_SMART = $_POST['Status_SMART'];
                    $Rebate = $_POST['Rebate'];
                    $Postavshik = $_POST['Postavshik'];
                    $Kanal_postavki = $_POST['Kanal_postavki'];
                    $Za_kem_presejl = $_POST['Za_kem_presejl'];
                    $za_kem_nastrojka = $_POST['za_kem_nastrojka'];
                    $za_kem_servis = $_POST['za_kem_servis'];
                    $za_kem_ZIP = $_POST['za_kem_ZIP'];
                    $za_kem_predostavlenie_proshivok = $_POST['za_kem_predostavlenie_proshivok'];
                    $start_date = isset($_POST['Data_vneseniya_izmenenij'][0]) ? $_POST['Data_vneseniya_izmenenij'][0] : '';
                    $end_date = isset($_POST['Data_vneseniya_izmenenij'][1]) ? $_POST['Data_vneseniya_izmenenij'][1] : '';
                    
                    $fData_vneseniya_izmenenij = array(); // Создаем пустой массив для преобразованных дат

                    // print_r($Data_vneseniya_izmenenij);
                    $mass3 = array();

                   
                        if (!empty($start_date) && !empty($end_date)) { // Проверка, что есть начальная и конечная дата
                          
                            $start_timestamp = strtotime($start_date);
                            $end_timestamp = strtotime($end_date);
                            
                            $start_datetime = new DateTime(date("Y-m-d", $start_timestamp));
                            $end_datetime = new DateTime(date("Y-m-d", $end_timestamp));
                            
                            $interval = new DateInterval('P1D');
                            
                            $period = new DatePeriod($start_datetime, $interval, $end_datetime);
                            
                            foreach ($period as $date123) {
                                $formatted_date = $date123->format('Y-m-d');
                                // echo $formatted_date . "<br>";
                                
                                // Добавляем дату в массив $mass3
                                $mass3[] = $formatted_date;
                                $formatted_date=[];
                            }
                        } else {
                            // Выводите или обрабатывайте сообщение для одиночной даты
                            // echo "Форма содержит одну дату: $start_date<br>";
                            $mass3[] = $start_date;
                            $start_date=[];
                        }

                    // Вывод содержимого массива $mass3
                    // Ниже ваш другой код...

                }
                //создаем условие для выборки
                if ($Imya_proizvoditelya !="" || $Strana_proizvoditel !="" || $Osushchestvlyaet_li_postavki_v_Rossiyu !="" || $Tip_oborudovaniya !="" || $Nahozhdenie_v_reestr_Minpromtorg !="" 
                || $Status_Infocell !="" || $Nalichie_zashchity_sdelki !="" || $Status_SMART !="" || $Rebate !="" || $Postavshik !="" ||!empty($mass3) && !in_array('', $mass3, true)
                || $Kanal_postavki !="" ||  $Za_kem_presejl !="" || $za_kem_nastrojka !=""
                || $za_kem_servis !="" || $za_kem_ZIP !="" || $za_kem_predostavlenie_proshivok !="")
            {
                
                $mass = array(
                    "0" => "$za_kem_predostavlenie_proshivok",
                    "1" => "$za_kem_nastrojka",
                    "2" => "$Osushchestvlyaet_li_postavki_v_Rossiyu",
                    "3" => "$za_kem_servis",
                    "4" => "$Nahozhdenie_v_reestr_Minpromtorg",
                    "5" => "$Status_Infocell",
                    "6" => "$Nalichie_zashchity_sdelki",
                    "7" => "$Status_SMART",
                    "8" => "$Rebate",
                    "9" => "$za_kem_ZIP",
                    "10" => "$Kanal_postavki",
                    "11" => "$Za_kem_presejl",
                );
                $mass1 = array(
                
                    "0" => "servisnaya_model_oborudovanie.za_kem_predostavlenie_proshivok",
                    "1" => "servisnaya_model_oborudovanie.za_kem_nastrojka",
                    "2" => "proizvoditel.Osushchestvlyaet_li_postavki_v_Rossiyu",
                    "3" => "servisnaya_model_oborudovanie.za_kem_servis",
                    "4" => "proizvoditel.Nahozhdenie_v_reestr_Minpromtorg",
                    "5" => "proizvoditel.Status_Infocell",
                    "6" => "presejl.Nalichie_zashchity_sdelki",
                    "7" => "proizvoditel.Status_SMART",
                    "8" => "proizvoditel.Rebate",
                    "9" => "servisnaya_model_oborudovanie.za_kem_ZIP",
                    "10" => "presejl.Kanal_postavki",
                    "11" => "presejl.Za_kem_presejl",
                );
                // echo " DEBUG - Прошли условие ";
                $a="";
                $SQLCond="";
                $SQLCond4="";
                $SQLCond3="";
                $SQLCond1="";
                $SQLCond5="";
                for($i=0; $i<12; $i++)
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
               
                if (!in_array('', $mass3, true)) {
                    $str = "";
                    $first5 = true;
                    foreach ($mass3 as $formatted_date1) {
                       
                        if ($first5) {
                            $first5 = false;
                          
                            $str = "(proizvoditel.Data_vneseniya_izmenenij = '$formatted_date1')" ;
                        } else {
                           
                            $str =  "(".$str . " OR (proizvoditel.Data_vneseniya_izmenenij = '$formatted_date1'))";
                        }
                        
                    }
                    
                    $SQLCond5 = $str . $SQLCond5;
                    
                    // Выводим содержимое SQLCond5
                    // echo "чебурек" . $SQLCond5 . "<br>";
                    
                    if (($SQLCond5 != "" and $a != "")) {
                        $a = $a . ' AND ' . $SQLCond5;
                    } else {
                        $a = $a . $SQLCond5;
                    }
                }
                
                if (!($Strana_proizvoditel == "")) {
                    $str = "";
                    $first = true;
                    foreach ($Strana_proizvoditel as $Strana_proizvoditelNum => $value) {
                        if ($first) {
                            $first = false;
                            $str = "(proizvoditel.Strana_proizvoditel = '$value')" ;
                        } else {
                            $str =  "(".$str . " OR (proizvoditel.Strana_proizvoditel = '$value'))";
                        }
                    }
                    $SQLCond = $str . $SQLCond;
                    if (($SQLCond != "" and $a != "")) {
                        $a = $a . ' AND ' . $SQLCond;
                    } else {
                        $a = $a . $SQLCond;
                    }
                }
                
                // echo "Strana_proizvoditel = $Strana_proizvoditel";
                //SELECT * FROM users WHERE strana ='Китай' OR strana='Россия'
                if(!($Tip_oborudovaniya==""))
                {
                    $str="";
                    $first1=true;
                    foreach ($Tip_oborudovaniya as $Tip_oborudovaniyaNum=>$value) {
                        if ($first1) {
                            $first1 = false;
                            $str = "(proizvoditel.Tip_oborudovaniya = '$value')" ;
                        } else {
                            $str =  "(".$str . " OR (proizvoditel.Tip_oborudovaniya = '$value'))";
                        }
                        // echo "Страна : ".$Tip_oborudovaniyaNum." Значение ".$value."<br />";
                    }
                    // echo "<br> str=$str";
                    $SQLCond3=$str.$SQLCond3;
                    // echo $SQLCond;
                    if(($SQLCond3!="" and $a!=""))
                    {
                        $a = $a . ' AND ' . $SQLCond3;
                    }
                    else 
                    {
                        $a = $a . $SQLCond3;
                    }
                }
                // echo "Imya_proizvoditelya = $Imya_proizvoditelya";
                if(!($Imya_proizvoditelya==""))
                {   
                    $str="";
                    $first2=true;
                    $SQLCond1="";
                    foreach ($Imya_proizvoditelya as $Imya_proizvoditelyaNum=>$value) {
                        if ($first2) {
                            $first2 = false;
                            $str = "(proizvoditel.Imya_proizvoditelya = '$value')" ;
                        } else {
                            $str = "(".$str . " OR (proizvoditel.Imya_proizvoditelya = '$value'))";
                        }
                        // echo "Производители : ".$proizvoditel.$Imya_proizvoditelyaNum." Значение ".$value."<br />";
                    }
                    // echo "<br> str1=$str1";
                    $SQLCond1=$str.$SQLCond1;
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
                $Postavshik=$_POST['Postavshik'];
            //  echo "Postavshik = $Postavshik";
                //SELECT * FROM users WHERE strana ='Китай' OR strana='Россия'
                if(!($Postavshik==""))
                {
                    $str="";
                    $first3=true;
                    foreach ($Postavshik as $PostavshikNum=>$value) {
                        if ($first3) {
                            $first3 = false;
                            $str = "(presejl.Postavshik  = '$value')" ;
                        } else {
                            $str = "(".$str . " OR (proizvoditel.Postavshik = '$value'))";
                        }
                        // echo "Страна : ".$PostavshikNum." Значение ".$value."<br />";
                    }
                    // echo "<br> str=$str";
                    $SQLCond4=$str.$SQLCond4;
                    // echo $SQLCond2;
                    if(($SQLCond4!="" and $a!=""))
                    {
                        $a = $a . ' AND ' . $SQLCond4;
                    }
                    else 
                    {
                        $a = $a . $SQLCond4;
                    }
                }
                $query = 'SELECT
                proizvoditel.Imya_proizvoditelya,
                proizvoditel.Ssylka_na_sajt_proizvoditelya,
                proizvoditel.Strana_proizvoditel,
                proizvoditel.Osushchestvlyaet_li_postavki_v_Rossiyu,
                proizvoditel.Tip_oborudovaniya,
                proizvoditel.Nahozhdenie_v_reestr_Minpromtorg,
                presejl.Kanal_postavki,
                presejl.Nalichie_zashchity_sdelki,
                presejl.Za_kem_presejl,
                servisnaya_model_oborudovanie.za_kem_nastrojka,
                servisnaya_model_oborudovanie.za_kem_servis,
                servisnaya_model_oborudovanie.za_kem_ZIP,
                servisnaya_model_oborudovanie.za_kem_predostavlenie_proshivok,
                GROUP_CONCAT(presejl.Postavshik) AS Postavshiky,
                proizvoditel.Status_SMART,
                proizvoditel.Status_Infocell,
                proizvoditel.Rebate,
                proizvoditel.Data_vneseniya_izmenenij
            FROM for_manager_oborudovanie
            JOIN presejl ON for_manager_oborudovanie.id_prisejla = presejl.id_prisejla
            JOIN servisnaya_model_oborudovanie ON for_manager_oborudovanie.id_servisnoj_modeli_oborudovaniya = servisnaya_model_oborudovanie.id_servisnoj_modeli_oborudovaniya
            JOIN proizvoditel ON for_manager_oborudovanie.Imya_proizvoditelya = proizvoditel.Imya_proizvoditelya
                AND for_manager_oborudovanie.Tip_oborudovaniya = proizvoditel.Tip_oborudovaniya
                AND for_manager_oborudovanie.Nahozhdenie_v_reestr_Minpromtorg = proizvoditel.Nahozhdenie_v_reestr_Minpromtorg  WHERE '. ($a) . ' GROUP BY 
                proizvoditel.Imya_proizvoditelya,
                proizvoditel.Ssylka_na_sajt_proizvoditelya,
                proizvoditel.Strana_proizvoditel,
                proizvoditel.Osushchestvlyaet_li_postavki_v_Rossiyu,
                proizvoditel.Tip_oborudovaniya,
                proizvoditel.Nahozhdenie_v_reestr_Minpromtorg,
                presejl.Kanal_postavki,
                presejl.Nalichie_zashchity_sdelki,
                presejl.Za_kem_presejl,
                servisnaya_model_oborudovanie.za_kem_nastrojka,
                servisnaya_model_oborudovanie.za_kem_servis,
                servisnaya_model_oborudovanie.za_kem_ZIP,
                servisnaya_model_oborudovanie.za_kem_predostavlenie_proshivok,
                proizvoditel.Status_SMART,
                proizvoditel.Status_Infocell,
                proizvoditel.Rebate,
                proizvoditel.Data_vneseniya_izmenenij
                '; // Переписали $query если есть дополнит. условия
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
                                if ($key=="id_prisejla")continue;
                                if ($key == "Data_vneseniya_izmenenij") {
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