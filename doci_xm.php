<script> // Этот скрипт при запуске формы сохраняет имя активной формы в LocalStorage
      const LS= localStorage;
      form = {name:"doci_ok"}
      LS.setItem('form',JSON.stringify(form));
    //   ClearFormData1();
    //   updateCheckboxState(checkbox);
</script>
<main class="container">
    <div class="col-md-12">
        <div class="row">
            <div class="position-sticky" style="top:2rem;">
            </div>
            <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Карточка Документа</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
            </div>
            <div class="modal-body">
            <form action="doci.php?page=doci_ok" method="POST" id="doc">
                <div class="container">
                    <div class="row row1" id="row1">

                        <div class="col-md-4">
                            <h4 class="mb-3">Как пользоваться?</h4>
                            <p class="mb-3">Чтобы добавить новый документ на страницу, необходимо совершить 3 действия:</p>
                            <ol>
                            <li class="mb-3 ">Заполнить карточку документа (если его нет)</li>
                            <li class="mb-3 ">Заполнить необходимый файловый путь (если его нет)</li>
                            <li class="mb-3 ">Если документ и файловый путь уже есть в базе данных, то просто заполните данные в 3 окне</li>
                            </ol>
                        </div>
                       
                        <div class="col-md-4 row1">
                            <section class="mb-5">
                                <div class="container">
                                    <div class="mb-4">
                                            <!-- <div class="block">
                                                <div class="mb-3">
                                                    <div class="text_hide_wrap">
                                                        <div class="item_text">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> -->
                                        <div class="position-sticky" style="top:-100rem;">
                                            <nav id="sidebar"class=" bg-primary text-white">
                                                <div class="text_hide_wrap">
                                                    <div class="p-3 chess mb-2">
                                <div class="form-group">
                                    <label for="fileInput" class="mb-3 overtext otstupmen">Внесите данные файла</label>
                                    <h5 class="mb-3 overtext otstupmen">(прошу будьте внимательны, браузер скрывает путь файла, поэтому прошу указывать его самостоятельно)</h5>
                                    <p class="mb-3 overtext otstupmen">Путь файла вы можете найти в свойствах файла</p>
                                    <input type="file" class="form-control-file mb-3 overtext otstupmen" id="fileInput" onchange="showFileInfo()">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control mb-3" id="fileName" placeholder="Имя файла" name="name_doc" readonly>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control mb-3" id="fileExtension" placeholder="Расширение файла" name="type" readonly>
                                </div>
                                <p class="mb-3 overtext otstupmen">Файл должен находиться в папке doci перед тем как быть добавлен на сайт</p>
                                <div class="form-group">
                                    <input type="text" class="form-control mb-3" id="filePath" placeholder="Путь к файлу" name="file_link">
                                </div>
                                <div class="form-group">
                                    <label for="exampleDataLi151" class="form-label">Дата ввода</label>
                                    <input class="form-control mb-3" id="exampleDataLi151" name="doc_date" value="<?php echo date('Y-m-d'); ?>" required placeholder="Введите дату">
                                </div>
                                </div>
                                                </div>
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                        <div class="col-md-4 row1">
                            <section class="mb-5">
                                <div class="container">
                                    <div class="mb-4">
                                            <!-- <div class="block">
                                                <div class="mb-3">
                                                    <div class="text_hide_wrap">
                                                        <div class="item_text">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> -->
                                        <div class="position-sticky" style="top:-100rem;">
                                            <nav id="sidebar"class=" bg-primary text-white">
                                                <div class="text_hide_wrap">
                                                    <div class="p-3 chess mb-2">
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
                                                        <div class="mb-3">
                                                            <h1 class="fw-bolder mb-1 overtext otstupmen">Добавление документа на сайт </h1>
                                                        <!-- Post meta content-->
                                                        <a class="badge bg-secondary text-decoration-none link-light" href="#!"></a>
                                                        </div>
                                                        <div class="mb-1">
                                                        <div class="" style="height:50%">
                                                            <div class="dropdown-border pb-1">
                                                                <ul class="list-unstyled components overtext">
                                                                    <li>
                                                                        <label class="nav-link text-black tag-checkbox tag-checkbox-label"  for="myCheckbox">
                                                                            <input class="form-check-input" type="checkbox" id="myCheckbox"  style="height:50%" onclick="activateForm()">
                                                                            
                                                                        </label>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="form-group mb-2">
                                                                <input type="text" class="form-control" id="myInput" disabled>
                                                            </div>
                                                        </div>

                                                        
                                                     
                                                        </div>
                                                      
                                                        <h5 class="overtext otstupmen">Выберите имя департамента </h5>
                                                        <div class="mb-1">
                                                        <?php
                                                            $query = 'SELECT DISTINCT doc_tag.Dep_name FROM doc_tag';
                                                            $data = mysqli_query($conn, $query) or die('<br>Ошибка выполнения запроса');
                                                            if(mysqli_num_rows($data) > 0) {
                                                                $numrows = mysqli_num_rows($data);
                                                                echo "<label for='exampleDataLi17' class='form-label'style='display: block;'></label>
                                                                    <input class='form-control' list='datalistOptions17' id='exampleDataLi17' name='Dep_name' required placeholder='Введите имя департамента'>
                                                                    <datalist id='datalistOptions17'>";  
                                                                while($row = mysqli_fetch_assoc($data)) {
                                                                    foreach ($row as $cellValue) {
                                                                        echo "<option value='$cellValue'>";
                                                                    }
                                                                }
                                                                echo "</datalist>";
                                                            }
                                                            else {
                                                                echo "<label for='exampleDataLi17' class='form-label'>имя департамента</label>
                                                                    <input class='form-control' id='exampleDataLi17' name='Dep_name' required placeholder='Введите имя департамента'>
                                                                    <span class='text-danger'>Данные не доступны</span>";
                                                            }
                                                        ?>
                                                        </div>
                                                        <h5 class="overtext otstupmen">Выберите папку куда будет добавлен документ</h5>
                                                        <?php
                                                        echo '<div class="dropdown-border" style="padding: 1px 1px;">';
                                                            echo '<div class="p-0">';
                                                                echo '<ul class="list-unstyled components overtext">';
                                                                    echo '<li>';
                                                                        echo '<div class="nav-link text-black" name="Dep_name">';
                                                                            echo '<label class="tag-checkbox tag-checkbox-label checked" for="checkbox12_">';
                                                                            echo '<ion-icon name="business"></ion-icon>&nbsp;'; 
                                                                                echo '<input class="checkbox" type="checkbox" name="Dep_name" value="" id="checkbox12_" >';
                                                                                    echo "Выберите отдел и папку с документами";
                                                                            echo '</label>';
                                                                        echo '</div>';
                                                                    echo '</li>';
                                                                echo '</ul>';
                                                            echo '</div>';
                                                        echo '</div>';
                                                     
                                                        function folder_level_111Query($conn, $query01) {
                                                            $stmt01 = mysqli_prepare($conn, $query01);
                                                            mysqli_stmt_execute($stmt01);
                                                            return mysqli_stmt_get_result($stmt01);
                                                        }
                                                        
                                                        function renderfolder_level_111Dropdown($conn) {
                                                            $query01 = 'SELECT DISTINCT tag1.folder_level_1 FROM tag1 ORDER BY BINARY folder_level_1';
                                                            $result01 = folder_level_111Query($conn, $query01);
                                                        
                                                            if (mysqli_num_rows($result01) > 0) {
                                                                $counter01 = 1; // Initialize a counter for unique IDs
                                                        
                                                                while ($row01 = mysqli_fetch_array($result01, MYSQLI_NUM)) {
                                                                    foreach ($row01 as $cellValue01) {
                                                                        if (!empty($cellValue01) && $cellValue01 !== '-') {
                                                                            $checkboxId01 = 'checkbox11_' . $counter01 . '_' . uniqid(); // Generate a unique ID using the counter
                                                                            echo <<<HTML
                                                                                <div class="dropdown-border" style="padding: 1px 1px;">
                                                                                    <div class="p-0">
                                                                                        <ul class="list-unstyled components overtext">
                                                                                            <li>
                                                                                                <div class="nav-link text-black " name="folder_level_1[]">
                                                                                                    <label class="tag-checkbox tag-checkbox-label" id="folder_level_111" aria-expanded="false" data-target="#{$checkboxId01}" for="checkbox11_{$cellValue01}">
                                                                                                        <ion-icon name="folder"></ion-icon>&nbsp;
                                                                                                        <input class="checkbox" type="checkbox" name="folder_level_1[]" value="{$cellValue01}" id="checkbox11_{$cellValue01}">
                                                                                                        {$cellValue01}
                                                                                                    </label>
                                                                                                </div>
                                                                                            </li>
                                                                                        </ul>
                                                                                    </div>
                                                                                </div>
                                                                            HTML;
                                                                            // Increment the counter for the next iteration
                                                        
                                                                            echo '<ul class="list-unstyled pageSubmenu1" id="' . $checkboxId01 . '" style="margin-bottom: 0px;">';
                                                                            renderfolder_level_22Dropdown($conn, $cellValue01); // Pass $cellValue to the next function
                                                                            echo '</ul>';
                                                                            $counter01++;
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                        }
                                                        function folder_level_22Query($conn, $query11) {
                                                            $stmt11 = mysqli_prepare($conn, $query11);
                                                            mysqli_stmt_execute($stmt11);
                                                            return mysqli_stmt_get_result($stmt11);
                                                        }
                                                        
                                                        function renderfolder_level_22Dropdown($conn, $cellValue01) {
                                                            $query11 = 'SELECT DISTINCT folder_level_2 FROM tag1 WHERE (folder_level_1 = "' . mysqli_real_escape_string($conn, $cellValue01) . '") ORDER BY BINARY folder_level_2';
                                                            $result11 = folder_level_22Query($conn, $query11);
                                                            
                                                            if (mysqli_num_rows($result11) > 0) {
                                                                $counter11 = 1; // Initialize a counter for unique IDs
                                                                
                                                                while ($row11 = mysqli_fetch_array($result11, MYSQLI_NUM)) {
                                                                    foreach ($row11 as $cellValue11) {
                                                                        if (!empty($cellValue11) && $cellValue11 !== '-') {
                                                                            $checkboxId11 = 'checkbox22_' . $counter11 . '_' . uniqid(); // Generate a unique ID for checkbox
                                                                            echo <<<HTML
                                                                                <div class="dropdown-border" style="padding: 1px 1px;">
                                                                                    <div class="p-0">
                                                                                        <ul class="list-unstyled components overtext">
                                                                                            <li>
                                                                                                <div class="nav-link text-black" name="folder_level_2[]">
                                                                                                    <label class="tag-checkbox tag-checkbox-label" id="folder_level_222" aria-expanded="false" data-target="#{$checkboxId11}" for="checkbox22_{$cellValue11}">
                                                                                                        <ion-icon name="folder"></ion-icon>&nbsp;
                                                                                                        <input class="checkbox" type="checkbox" name="folder_level_2[]" value="{$cellValue11}" id="checkbox22_{$cellValue11}">
                                                                                                        {$cellValue11}
                                                                                                    </label>
                                                                                                </div>
                                                                                            </li>
                                                                                        </ul>
                                                                                    </div>
                                                                                </div>
                                                                                <ul class="list-unstyled pageSubmenu1" id="{$checkboxId11}" style="margin-bottom: 0px;">
                                                                            HTML;
                                                                            renderfolder_level_33Dropdown($conn, $cellValue11, $cellValue01); // Pass $cellValue to the next function
                                                                            echo '</ul>';
                                                                            $counter11++;
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                        }
                                                        function folder_level_33Query($conn, $query22) {
                                                            $stmt22 = mysqli_prepare($conn, $query22);
                                                            mysqli_stmt_execute($stmt22);
                                                            return mysqli_stmt_get_result($stmt22);
                                                        }
                                                        
                                                        function renderfolder_level_33Dropdown($conn, $cellValue11, $cellValue01) {
                                                            $escapedValue11 = mysqli_real_escape_string($conn, $cellValue11);
                                                            $escapedValue01 = mysqli_real_escape_string($conn, $cellValue01);
                                                        
                                                            $query22 = "SELECT DISTINCT folder_level_3 FROM tag1 WHERE (folder_level_2 = '{$escapedValue11}') AND (folder_level_1 = '{$escapedValue01}') ORDER BY BINARY folder_level_3";
                                                            $result22 = folder_level_33Query($conn, $query22);
                                                            
                                                            if (mysqli_num_rows($result22) > 0) {
                                                                $counter22 = 1; // Initialize a counter for unique IDs
                                                        
                                                                while ($row2 = mysqli_fetch_array($result22, MYSQLI_NUM)) {
                                                                    foreach ($row2 as $cellValue22) {
                                                                        if (!empty($cellValue22) && $cellValue22 !== '-') {
                                                                            $checkboxId22 = 'checkbox33_' . $counter22 . '_' . uniqid(); // Generate a unique ID for checkbox
                                                                            echo <<<HTML
                                                                                <div class="dropdown-border" style="padding: 1px 1px;">
                                                                                    <div class="p-0">
                                                                                        <ul class="list-unstyled components overtext">
                                                                                            <li>
                                                                                                <div class="nav-link text-black" name="folder_level_3[]">
                                                                                                    <label class="tag-checkbox tag-checkbox-label" id="folder_level_333" data-toggle="collapse" aria-expanded="false" data-target="#{$checkboxId22}" for="checkbox33_{$cellValue22}">
                                                                                                        <ion-icon name="folder"></ion-icon>&nbsp;
                                                                                                        <input class="checkbox" type="checkbox" name="folder_level_3[]" value="{$cellValue22}" id="checkbox33_{$cellValue22}">
                                                                                                        {$cellValue22}
                                                                                                    </label>
                                                                                                </div>
                                                                                            </li>
                                                                                        </ul>
                                                                                    </div>
                                                                                </div>
                                                                                <ul class="collapse list-unstyled pageSubmenu2" id="{$checkboxId22}" style="margin-bottom: 0px;">
                                                                            HTML;
                                                                            renderfolder_level_44Dropdown($conn, $cellValue22, $cellValue11, $cellValue01);
                                                                            echo '</ul>';
                                                                            $counter22++;
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                        }
                                                        function folder_level_44Query($conn, $query33) {
                                                            $stmt33 = mysqli_prepare($conn, $query33);
                                                            if (!$stmt33) {
                                                                // обработка ошибок
                                                                die("Ошибка при подготовке запроса: " . mysqli_error($conn));
                                                            }
                                                            mysqli_stmt_execute($stmt33);
                                                            return mysqli_stmt_get_result($stmt33);
                                                        }
                                                        
                                                        function renderfolder_level_44Dropdown($conn, $cellValue22, $cellValue11, $cellValue01) {
                                                            $escapedValue22 = mysqli_real_escape_string($conn, $cellValue22);
                                                            $escapedValue11 = mysqli_real_escape_string($conn, $cellValue11);
                                                            $escapedValue01 = mysqli_real_escape_string($conn, $cellValue01);
                                                        
                                                            $query33 = "SELECT DISTINCT folder_level_4 FROM tag1 WHERE folder_level_3 = '{$escapedValue22}' AND folder_level_2 = '{$escapedValue11}' AND folder_level_1 = '{$escapedValue01}' ORDER BY BINARY folder_level_4";
                                                            $result33 = folder_level_44Query($conn, $query33);
                                                            
                                                            if (mysqli_num_rows($result33) > 0) {
                                                                $counter33 = 1; // Initialize a counter for unique IDs
                                                        
                                                                while ($row33 = mysqli_fetch_array($result33, MYSQLI_NUM)) {
                                                                    foreach ($row33 as $cellValue33) {
                                                                        if (!empty($cellValue33) && $cellValue33 !== '-') {
                                                                            $checkboxId33 = 'checkbox44_' . $counter33 . '_' . uniqid(); // Generate a unique ID for checkbox
                                                                            
                                                                            echo <<<HTML
                                                                                <div class="dropdown-border" style="padding: 1px 1px;">
                                                                                    <div class="p-0">
                                                                                        <ul class="list-unstyled components overtext">
                                                                                            <li>
                                                                                                <div class="nav-link text-black"  name="folder_level_4[]">
                                                                                                    <label class="tag-checkbox tag-checkbox-label" id="folder_level_444" data-toggle="collapse" aria-expanded="false" for="{$checkboxId33}">
                                                                                                        <ion-icon name="folder"></ion-icon>&nbsp;
                                                                                                        <input class="checkbox" type="checkbox" name="folder_level_4[]" value="{$cellValue33}" id="{$checkboxId33}">
                                                                                                        {$cellValue33}
                                                                                                    </label>
                                                                                                </div>
                                                                                            </li>
                                                                                        </ul>
                                                                                    </div>
                                                                                </div>
                                                                                <ul class="collapse list-unstyled pageSubmenu2" id="{$checkboxId33}" style="margin-bottom: 0px;">
                                                                            HTML;
                                                                            
                                                                            renderfolder_level_55Dropdown($conn, $cellValue33, $cellValue22, $cellValue11, $cellValue01); // Pass $cellValue to the next function
                                                                            echo '</ul>';
                                                                            $counter33++;
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                        }
                                                        function folder_level_55Query($conn, $query44) {
                                                            $stmt44 = mysqli_prepare($conn, $query44);
                                                            if (!$stmt44) {
                                                                // Обработка ошибок, возможно запись в лог или выброс исключения
                                                                die("Ошибка при подготовке запроса: " . mysqli_error($conn));
                                                            }
                                                            mysqli_stmt_execute($stmt44);
                                                            return mysqli_stmt_get_result($stmt44);
                                                        }
                                                        
                                                        function renderfolder_level_55Dropdown($conn, $cellValue33, $cellValue22, $cellValue11, $cellValue01) {
                                                            $escapedValue33 = mysqli_real_escape_string($conn, $cellValue33);
                                                            $escapedValue22 = mysqli_real_escape_string($conn, $cellValue22);
                                                            $escapedValue11 = mysqli_real_escape_string($conn, $cellValue11);
                                                            $escapedValue01 = mysqli_real_escape_string($conn, $cellValue01);
                                                        
                                                            $query44 = "SELECT DISTINCT folder_level_5 FROM tag1 WHERE folder_level_4 = '{$escapedValue33}' AND folder_level_3 = '{$escapedValue22}' AND folder_level_2 = '{$escapedValue11}' AND folder_level_1 = '{$escapedValue01}' ORDER BY BINARY folder_level_5";
                                                            $result44 = folder_level_55Query($conn, $query44);
                                                            
                                                            if (mysqli_num_rows($result44) > 0) {
                                                                while ($row4 = mysqli_fetch_array($result44, MYSQLI_NUM)) {
                                                                    foreach ($row4 as $cellValue44) {
                                                                        if (!empty($cellValue44) && $cellValue44 !== '-') {
                                                                            $safeCellValue44 = htmlspecialchars($cellValue44, ENT_QUOTES);
                                                                            echo <<<HTML
                                                                                <div class="row dropdown-border" style="padding: 1px 1px;">
                                                                                    <div class="p-0 col-md-12">
                                                                                        <ul class="list-unstyled components overtext">
                                                                                            <li>
                                                                                                <div class="nav-link text-black" name="folder_level_5[]">
                                                                                                    <label class="tag-checkbox tag-checkbox-label" id="folder_level_555" data-toggle="collapse" aria-expanded="false" for="checkbox55_{$safeCellValue44}">
                                                                                                        <ion-icon name="folder"></ion-icon>&nbsp;
                                                                                                        <input class="checkbox" type="checkbox" name="folder_level_5[]" value="{$safeCellValue44}" id="checkbox55_{$safeCellValue44}">
                                                                                                        {$safeCellValue44}
                                                                                                    </label>
                                                                                                </div>
                                                                                            </li>
                                                                                        </ul>
                                                                                    </div>
                                                                                </div>
                                                                            HTML;
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                        }
                                                        
                                                        renderfolder_level_111Dropdown($conn);
                                                        renderfolder_level_111Dropdown($conn);
                                                        ?>
                                                          <input class="btn btn-secondary" type="submit"  name="Применить11" id="butt_apply" value="Опубликовать"></input>
                                                    </div>
                                                </div>
                                            </nav>
                                        </div>
                                    </div>
                                  
                                </div>
                            </section>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" data-bs-target="#exampleModalToggle3" data-bs-toggle="modal">Открыть второе  окно</button>
            </div>
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
if (isset($_POST['Применить1'])) {
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
// Включить вывод ошибок
ini_set('display_errors', 1);
error_reporting(E_ALL);


// Конфигурация подключения к БД
$server = "127.0.0.1";
$user = "root";
$pass = "1";
$dbname = "bd_infocell_docs";
$conn = mysqli_connect($server, $user, $pass, $dbname);

// Проверить соединение с БД
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
    $name_doc = isset($_POST['name_doc']) ? $_POST['name_doc'] : '';
    $file_link = isset($_POST['file_link']) ? $_POST['file_link'] : '';
    $type = isset($_POST['type']) ? $_POST['type'] : '';
    $doc_date = isset($_POST['doc_date']) ? $_POST['doc_date'] : '';
    $Dep_name = isset($_POST['Dep_name']) ? $_POST['Dep_name'] : '';
    $folder_level_1 = isset($_POST['folder_level_1']) ? $_POST['folder_level_1'] : '';
    $folder_level_2 = isset($_POST['folder_level_2']) ? $_POST['folder_level_2'] : '';
    $folder_level_3 = isset($_POST['folder_level_3']) ? $_POST['folder_level_3'] : '';
    $folder_level_4 = isset($_POST['folder_level_4']) ? $_POST['folder_level_4'] : '';
    $folder_level_5 = isset($_POST['folder_level_5']) ? $_POST['folder_level_5'] : '';
    $SQLCond="";
    $SQLCond11="";
    $SQLCond22="";
    $SQLCond33="";
    $SQLCond44="";
    $SQLCond55="";
    $SQLCond66="";
    $SQLCond77="";
        // Используем массив для удержания подключения к DB и таблиц
   

     
        // И т.д. для всех входных данных
        if ( $folder_level_1 !="" || $folder_level_2 !="" || $folder_level_3 !="" || $folder_level_4 !="" || $name_doc !="" || $folder_level_5 !="" ) {
            $mass = array(
                "0" => "$name_doc",
                "1" => "$file_link",
                "2" => "$type",
                "3" => "$doc_date",
            );
            $mass1 = array(
                "0" => "doc.name_doc",
                "1" => "doc.file_link",
                "2" => "doc.type",
                "3" => "doc.doc_date",
            );
            $d_sql = "";
            $dt_sql = "";
            $queryCondition = "";
            for ($i = 0; $i < 4; $i++) {
                if (!($mass[$i] == "")) {
                    $SQLCond0 = "";
                    $SQLCond0 = "$mass1[$i] = '$mass[$i]'" . $SQLCond0;
                    if (($SQLCond0 != "") && ($d_sql != "")) {
                        $d_sql = $d_sql . ' AND ' . $SQLCond0;
                    } else {
                        $d_sql = $d_sql . $SQLCond0;
                    }
                }
            }
            $mass2 = array(
                "0" => "$Dep_name",
            );
            $mass3 = array(
                "0" => "doc_tag.Dep_name",
            );
            $dt_sql = "";
            for ($i = 0; $i < 1; $i++) {
                if (!($mass2[$i] == "")) {
                    $SQLCond09 = "";
                    $SQLCond09 = "$mass3[$i] = '$mass2[$i]'" . $SQLCond09;
                    if (($SQLCond09 != "") && ($dt_sql != "")) {
                        $dt_sql = $dt_sql . ' AND ' . $SQLCond09;
                    } else {
                        $dt_sql = $dt_sql . $SQLCond09;
                    }
                }
            }
            // Подготовка и выполнение запросов
                            
                            if(!($folder_level_1==""))
                            {   
                                $str11="";
                                $first11=true;
                                $SQLCond11="";
                                foreach ($folder_level_1 as $folder_level_1Num=>$value) {
                                    if ($first11) {
                                        $first11 = false;
                                        $str11 = "(tag1.folder_level_1 = '$value')" ;
                                    } else {
                                        $str11 = "(".$str11 . " OR (tag1.folder_level_1 = '$value'))";
                                    }
                                    // echo "Производители : ".$proizvoditel.$Imya_proizvoditelyaNum." Значение ".$value."<br />";
                                }
                                // echo "<br> str1=$str1";
                                $SQLCond11=$str11.$SQLCond11;
                                // echo $SQLCond1;
                                if(($SQLCond11!="" and $queryCondition!=""))
                                {
                                    $queryCondition = $queryCondition . ' AND ' . $SQLCond11;
                                }
                                else
                                {
                                    $queryCondition = $queryCondition . $SQLCond11;
                                }
                            }
                            if(!($folder_level_2==""))
                            {   
                                $str22="";
                                $first22=true;
                                $SQLCond22="";
                                foreach ($folder_level_2 as $folder_level_2Num=>$value) {
                                    if ($first22) {
                                        $first22 = false;
                                        $str22 = "(tag1.folder_level_2 = '$value')" ;
                                    } else {
                                        $str22 = "(".$str22 . " OR (tag1.folder_level_2 = '$value'))";
                                    }
                                    // echo "Производители : ".$proizvoditel.$Imya_proizvoditelyaNum." Значение ".$value."<br />";
                                }
                                // echo "<br> str1=$str1";
                                $SQLCond22=$str22.$SQLCond22;
                                // echo $SQLCond1;
                                if(($SQLCond22!="" and $queryCondition!=""))
                                {
                                    $queryCondition = $queryCondition . ' AND ' . $SQLCond22;
                                }
                                else
                                {
                                    $queryCondition = $queryCondition . $SQLCond22;
                                }
                            }
                            if(!($folder_level_3==""))
                            {   
                                $str33="";
                                $first33=true;
                                $SQLCond33="";
                                foreach ($folder_level_3 as $folder_level_3Num=>$value) {
                                    if ($first33) {
                                        $first33 = false;
                                        $str33 = "(tag1.folder_level_3 = '$value')" ;
                                    } else {
                                        $str33 = "(".$str33 . " OR (tag1.folder_level_3 = '$value'))";
                                    }
                                    // echo "Производители : ".$proizvoditel.$Imya_proizvoditelyaNum." Значение ".$value."<br />";
                                }
                                // echo "<br> str1=$str1";
                                $SQLCond33=$str33.$SQLCond33;
                                // echo $SQLCond1;
                                if(($SQLCond33!="" and $queryCondition!=""))
                                {
                                    $queryCondition = $queryCondition . ' AND ' . $SQLCond33;
                                }
                                else
                                {
                                    $queryCondition = $queryCondition . $SQLCond33;
                                }
                            }
                            if(!($folder_level_4==""))
                            {   
                                $str44="";
                                $first44=true;
                                $SQLCond44="";
                                foreach ($folder_level_4 as $folder_level_4Num=>$value) {
                                    if ($first44) {
                                        $first44 = false;
                                        $str44 = "(tag1.folder_level_4 = '$value')" ;
                                    } else {
                                        $str44 = "(".$str44 . " OR (tag1.folder_level_4 = '$value'))";
                                    }
                                    // echo "Производители : ".$proizvoditel.$Imya_proizvoditelyaNum." Значение ".$value."<br />";
                                }
                                // echo "<br> str1=$str1";
                                $SQLCond44=$str44.$SQLCond44;
                                // echo $SQLCond1;
                                if(($SQLCond44!="" and $queryCondition!=""))
                                {
                                    $queryCondition = $queryCondition . ' AND ' . $SQLCond44;
                                }
                                else
                                {
                                    $queryCondition = $queryCondition . $SQLCond44;
                                }
                            }
                            if(!($folder_level_5==""))
                            {   
                                $str55="";
                                $first55=true;
                                $SQLCond55="";
                                foreach ($folder_level_5 as $folder_level_5Num=>$value) {
                                    if ($first55) {
                                        $first55 = false;
                                        $str55 = "(tag1.folder_level_5 = '$value')" ;
                                    } else {
                                        $str55 = "(".$str55 . " OR (tag1.folder_level_5 = '$value'))";
                                    }
                                    // echo "Производители : ".$proizvoditel.$Imya_proizvoditelyaNum." Значение ".$value."<br />";
                                }
                                // echo "<br> str1=$str1";
                                $SQLCond55=$str55.$SQLCond55;
                                // echo $SQLCond1;
                                if(($SQLCond55!="" and $queryCondition!=""))
                                {
                                    $queryCondition = $queryCondition . ' AND ' . $SQLCond55;
                                }
                                else
                                {
                                    $queryCondition = $queryCondition . $SQLCond55;
                                }
                            }
            // Строим запрос на основе условий
            if (!empty($queryCondition)) {
                $query = "SELECT tag1.ID FROM tag1 WHERE ID " . $queryCondition;
                $stmt = mysqli_prepare($conn, $query);
                while ($row = mysqli_fetch_assoc($data)):
                echo $row['ID'];
                 endwhile; 
                return $stmt;
           
             
                    if (isset($name_doc, $file_link, $type, $doc_date) && $name_doc !== "" && $file_link !== "" && $type !== "" && $doc_date !== "") {
                        $insertQuery = "INSERT INTO doc (name_doc, file_link, type, doc_date) VALUES (?, ?, ?, ?)";
                        $stmt40 = mysqli_prepare($conn, $insertQuery);
                        if ($stmt40) {
                            mysqli_stmt_bind_param($stmt40, 'ssss', $name_doc, $file_link, $type, $doc_date);
                            if (mysqli_stmt_execute($stmt40)) {
                                echo "Данные успешно добавлены в таблицу doc";
                            } else {
                                echo "Ошибка при добавлении данных в таблицу doc: " . mysqli_stmt_error($stmt40);
                            }
                            mysqli_stmt_close($stmt40);
                        } else {
                            echo "Ошибка при подготовке запроса в таблицу doc: " . mysqli_error($conn);
                        }
                    } else {
                        echo "Не все данные для таблицы doc предоставлены или валидны.";
                    }
                    
                    // Проверка переменных перед вставкой в таблицу `doc_tag`
                    // Предполагается, что вы уже получили результат запроса в $result
                    while ($row = mysqli_fetch_assoc($result)) {
                        // Теперь $ID извлекается из текущей строки результатов
                        $ID = $row['ID'];
        
                        // Проверка переменных перед вставкой в таблицу doc_tag
                        if (isset($name_doc, $ID, $Dep_name) && $name_doc !== "" && is_numeric($ID) && $Dep_name !== "") {
                            $insertQuery2 = "INSERT INTO doc_tag (name_doc, ID_tag, Dep_name) VALUES (?, ?, ?)";
                            $stmt30 = mysqli_prepare($conn, $insertQuery2);
                            if ($stmt30) {
                                mysqli_stmt_bind_param($stmt30, 'sis', $name_doc, $ID, $Dep_name);
                                if (mysqli_stmt_execute($stmt30)) {
                                    echo "Данные успешно добавлены в таблицу doc_tag с ID = {$ID}!";
                                } else {
                                    echo "Ошибка выполнения подготовленного выражения в таблицу doc_tag для ID = {$ID}: " . mysqli_stmt_error($stmt30);
                                }
                                mysqli_stmt_close($stmt30);
                            } else {
                                echo "Ошибка при подготовке выражения в таблицу doc_tag для ID = {$ID}: " . mysqli_error($conn);
                            }
                        } else {
                            echo "Не все данные для таблицы doc_tag предоставлены или валидны для ID = {$ID}.";
                        }
                    }
                    // Чтение результатов, если они есть
                    mysqli_stmt_store_result($stmt);
                    if (mysqli_stmt_num_rows($stmt) > 0) {
                        // Связываем результаты запроса с переменными
                        mysqli_stmt_bind_result($stmt, $name_doc);
                        while (mysqli_stmt_fetch($stmt)) {
                            // Обработка полученных данных
                        }
                    }
                    mysqli_stmt_close($stmt);
                }
            }
        
            // Обозначаем, что форма была обработана, чтобы избежать повторной отправки данных
            $_SESSION['form_submitted'] = true;


                ?>
               
            <div class="col-md-3 mb-4">
                <div class="position-sticky" style="top:-100rem;">
                    <nav id="sidebar"class=" bg-primary text-white">
                        <div class="text_hide_wrap">
                            <form  method="POST" id="myForm" action="doci.php?page=doci_ok">
                                <div class="p-3 mb-2 chess" style="border-top-right-radius: 5px;"> 
                                    <h5 class="overtext otstupmen">Поиск по названию документа</h5>
                                    <ol class="list-unstyled mb-0 overtext">
                                        <input type="text"  id="input" class="form-control mb-3" name="name_new" placeholder="Что искать?"	v-model="name_new">
                                    </ol>
                                </div>
                                <div class="p-3 chess mb-2">
                                    <h5 class="overtext otstupmen">Выберите папку с документами</h5>
                                 
                                </div>
                                <div class="chess mb-2">
                                    <label for="airdatepicker" class="sr-only" style="display:block;" onchange ="requestr()">
                                        <h5 class="mb-2 otstupmen">Дата</h5>
                                        <div class="btn-group-vertical position-sticky" style="width: 100%;height: 100%;   display: block;top: 2rem;">
                                            <input type="text" id="airdatepicker" style="padding: 10px 20px;"name="doc_date[]" class="form-control mb-2" placeholder="Выберите дату внесения информации" onchange ='alert("changed");'>
                                        </div>
                                    </label>
                                    <div class="chess mb-2">
                                        <div class="btn-group-vertical position-sticky" style="width: 100%;height: 100%;   display: block;top: 2rem;">
                                            <input class="btn btn-primary" type="submit"  name="Сброс настроек" id="buttonClear" value="Сброс настроек"  onClick="window.location.reload();"></input>
                                        </div>
                                    </div>
                                    <div class="chess mb-2">
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"href="#exampleModalToggle" data-bs-target="#exampleModalToggle" style="width: 100%;height: 100%;   display: block;top: 2rem;">
                                        Запустите демо модального окна
                                        </button>
                                    </div>
                                    <!-- Модальное окно -->
                                 
                                </div>
                            </form>
                        </div>
                    </nav>
                </div>
            </div>
          
        </div>
    </div>
</main>