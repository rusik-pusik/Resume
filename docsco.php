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
                                        <div class="col-md-4 row1">
                                            <section class="mb-5">
                                                <div class="container">
                                                    <div class="mb-4">
                                                        <div class="position-sticky">
                                                            <nav id="sidebar" class="bg-primary text-white">
                                                                <div class="text_hide_wrap">
                                                                    <div class="p-3 chess mb-2">
                                                                        <h4 class="mb-3 otstupmen overtext">Как пользоваться?</h4>
                                                                        <p class="mb-3 otstupmen overtext">Чтобы добавить новый документ на страницу, необходимо совершить 3 действия:</p>
                                                                        <ol class="overtext otstupmen">
                                                                            <li>Заполнить карточку документа выбрав документ (если документ есть, введите название)</li>
                                                                            <li>Выберите департамент</li>
                                                                            <li>Выберите папки</li>
                                                                            <li>Если необходимо добавить подпапку, то выполните действие (1), введите имя подпапки и выполните действие (3). Также прошу заметить, что введенный документ будет добавлен в подпапку и никуда больше, а подпапка разместится в папках, что были выбраны</li>
                                                                        </ol>
                                                                    </div>
                                                                </div>
                                                            </nav>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>
                                        <div class="col-md-8 row1">
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
                                                                        <h4 class="overtext otstupmen">Добавьте документ на сайт</h4>
                                                                        <!-- Post meta content-->
                                                                        <a class="badge bg-secondary text-decoration-none link-light" href="#!"></a>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-6"style="border: 2px solid white; padding: 10px;border-radius: 15px;">
                                                                            <div class="form-group" style="overflow: hidden;"> <!-- или auto, если хотите прокрутку -->
                                                                                <label for="fileInput" class="overtext otstupmen">Внесите данные файла</label>
                                                                                <input type="file" class="form-control-file mb-3 overtext" style="font-weight: bold; display: inline-block; max-width: 100%; box-sizing: border-box;" id="fileInput" onchange="showFileInfo()">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <input type="text" class="form-control mb-3" id="fileName" placeholder="Имя файла" name="name_doc">
                                                                            </div>
                                                                            <div class="form-group hidden">
                                                                                <input type="text" class="form-control mb-3" id="fileExtension" placeholder="Расширение файла" name="type" readonly>
                                                                            </div>
                                                                            <p class="mb-3 overtext otstupmen hidden">Файл должен находиться в папке doci перед тем как быть добавлен на сайт</p>
                                                                            <div class="form-group hidden">
                                                                                <input type="text" class="form-control mb-3" id="filePath" placeholder="Путь к файлу" name="file_link" readonly>
                                                                            </div>
                                                                            <div class="form-group hidden">
                                                                                <label for="exampleDataLi151" class="form-label">Дата ввода</label>
                                                                                <input class="form-control mb-3" id="exampleDataLi151" name="doc_date" value="<?php echo date('Y-m-d'); ?>" required placeholder="дата" readonly>
                                                                            </div>
                                                                            </div>
                                                                            <div class="col-md-6 "style="border: 2px solid white; padding: 10px;border-radius: 15px;">
                                                                                <div class="mb-1">
                                                                                    <div class="" style="height:50%">
                                                                                        <div class="dropdown-border pb-1">
                                                                                            <ul class="list-unstyled components overtext">
                                                                                                <li>
                                                                                                    <label class="nav-link text-black tag-checkbox tag-checkbox-label"  for="myCheckbox">
                                                                                                        <input class="form-check-input" type="checkbox" id="myCheckbox"  style="height:50%" onclick="activateForm()">
                                                                                                        Добавить подпапку
                                                                                                    </label>
                                                                                                </li>
                                                                                            </ul>
                                                                                        </div>
                                                                                        <div class="form-group mb-2">
                                                                                            <input type="text" class="form-control" id="myInput" name='Down_folder' placeholder="Введите имя папки" disabled>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <h5 class="overtext otstupmen">Выберите имя департамента </h5>
                                                                                
                                                                            </div>
                                                                        </div>
                                                                        <h5 class="overtext otstupmen">Выберите папку куда будет добавлен документ</h5>
                                                                        <?php
                                                                        
                                                                        function Dep_name1Query($conn, $query0) {
                                                                            $stmt0 = mysqli_prepare($conn, $query0);
                                                                            mysqli_stmt_execute($stmt0);
                                                                            return mysqli_stmt_get_result($stmt0);
                                                                        }
                                                                        function Dep_name1Dropdown($conn) {
                                                                            $query0 = "SELECT 
                                                                                           doc_tag.Dep_name, 
                                                                                           MIN(t.ID) AS ID
                                                                                       FROM 
                                                                                           doc_tag
                                                                                       JOIN 
                                                                                           doc ON doc_tag.name_doc = doc.name_doc
                                                                                       LEFT JOIN 
                                                                                           tag1 t ON doc_tag.ID_tag = t.ID
                                                                              
                                                                                       GROUP BY 
                                                                                           doc_tag.Dep_name
                                                                                       ORDER BY 
                                                                                           BINARY doc_tag.Dep_name
                                                                                       LIMIT 0, 300";
                                                                            $result0 = Dep_name1Query($conn, $query0);
                                                                        
                                                                            if (mysqli_num_rows($result0) > 0) {
                                                                                $counter0 = time(); // Используйте текущее время для генерации уникального ID
                                                                                while ($row0 = mysqli_fetch_assoc($result0)) {
                                                                                    $cellValue0 = $row0['Dep_name'];
                                                                                    if (!empty($cellValue0) && $cellValue0 !== '-') {
                                                                                        $uni01 = 'dep_name_dropdown_' . $counter0; // Используйте префикс для ID, чтобы увеличить уникальность
                                                                                        $cellValueHtml = htmlspecialchars($cellValue0, ENT_QUOTES);
                                                                        
                                                                                        $dropdownItem = <<<HTML
                                                                                                        <div class="dropdown-border" style="padding: 1px 1px;">
                                                                                                            <div class="p-0">
                                                                                                                <ul class="list-unstyled components overtext">
                                                                                                                    <li>
                                                                                                                        <div class="nav-link text-black" name="Dep_name[]">
                                                                                                                            <label class="tag-checkbox tag-checkbox-label" id="Dep_name11_$counter0" data-toggle="collapse" aria-expanded="false" data-target="#$uni01" for="checkbox0_$uni01">
                                                                                                                                <ion-icon name="person"></ion-icon>&nbsp;
                                                                                                                                <input class="checkbox" type="checkbox" name="Dep_name[]" value="$cellValueHtml" id="checkbox0_$uni01">$cellValueHtml
                                                                                                                            </label>
                                                                                                                        </div>
                                                                                                                    </li>
                                                                                                                </ul>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <ul class="collapse list-unstyled pageSubmenu1" id="$uni01" style="margin-bottom: 0px;">
                                                                                                        HTML;
                                                                                                        
                                                                                        echo $dropdownItem;
                                                                                        renderfolder_level_111Dropdown($conn, $cellValue0);
                                                                                        echo '</ul>';
                                                                                        $counter0++; // Инкремент для последующего уникального ID
                                                                                    }
                                                                                }
                                                                            }
                                                                        }
                                                                        function folder_level_111Query($conn, $query01) {
                                                                            $stmt01 = mysqli_prepare($conn, $query01);
                                                                            mysqli_stmt_execute($stmt01);
                                                                            return mysqli_stmt_get_result($stmt01);
                                                                        }
                                                                        
                                                                        function renderfolder_level_111Dropdown($conn, $cellValue0) {
                                                                            $query01 = "SELECT 
                                                                            folder_level_1, 
                                                                            MIN(ID) AS ID 
                                                                            FROM doc
                                                                            LEFT JOIN doc_tag dt ON doc.name_doc = dt.name_doc
                                                                            LEFT JOIN tag1 t ON dt.ID_tag = t.ID
                                                                          WHERE 
                                                                                COALESCE(folder_level_2, '') = '' 
                                                                            AND COALESCE(folder_level_3, '') = '' 
                                                                            AND COALESCE(folder_level_4, '') = '' 
                                                                            AND COALESCE(folder_level_5, '') = '' 
                                                                            AND Dep_name = '$cellValue0'
                                                                          GROUP BY 
                                                                            folder_level_1 
                                                                          ORDER BY 
                                                                            folder_level_1";
                                                                            
                                                                            $result01 = folder_level_111Query($conn, $query01);
                                                                            // echo $query01;
                                                                      
                                                                            if (mysqli_num_rows($result01) > 0) {
                                                                                $counter01 = 1;
                                                                        
                                                                                while ($row01 = mysqli_fetch_assoc($result01)) {
                                                                                    // Теперь $row01['folder_level_1'] и $row01['ID'] содержат нужные значения
                                                                                    $folderLevel1 = $row01['folder_level_1'];
                                                                                    $id01 = $row01['ID'];
                                                                                    // Проверяем, что folder_level_1 не пустой и не равен '-'
                                                                                    if (!empty($folderLevel1) && $folderLevel1 !== '-') {
                                                                                        $checkboxId01 = 'checkbox11_' . $counter01 . '_' . uniqid();
                                                                        
                                                                                        // В атрибуте value input теперь будет значение ID
                                                                                        echo <<<HTML
                                                                                            <div class="dropdown-border" style="padding: 1px 1px;">
                                                                                                <div class="p-0">
                                                                                                    <ul class="list-unstyled components overtext">
                                                                                                        <li>
                                                                                                            <div class="nav-link text-black " name="folder_level_1[]">
                                                                                                                <label class="tag-checkbox tag-checkbox-label" id="folder_level_111" aria-expanded="false" data-target="#{$checkboxId01}" for="checkbox11_{$checkboxId01}">
                                                                                                                    <ion-icon name="folder"></ion-icon>&nbsp;
                                                                                                                    <input class="checkbox" type="checkbox" name="folder_level_1[]" value="{$id01}" id="checkbox11_{$checkboxId01}">
                                                                                                                    {$folderLevel1}
                                                                                                                </label>
                                                                                                            </div>
                                                                                                        </li>
                                                                                                    </ul>
                                                                                                </div>
                                                                                            </div>
                                                                                        HTML;
                                                                                        echo '<ul class="list-unstyled pageSubmenu1" id="' . $checkboxId01 . '" style="margin-bottom: 0px;">';
                                                                                        // Добвляем $id как параметр следующей функции
                                                                                        renderfolder_level_22Dropdown($conn, $folderLevel1);
                                                                                        echo '</ul>';
                                                                                        $counter01++;
                                                                                    }
                                                                                }
                                                                            }
                                                                        }
                                                                        
                                                                        function folder_level_22Query($conn, $query11) {
                                                                            $stmt11 = mysqli_prepare($conn, $query11);
                                                                            mysqli_stmt_execute($stmt11);
                                                                            return mysqli_stmt_get_result($stmt11);
                                                                        }
                                                                            function renderfolder_level_22Dropdown($conn, $folderLevel1) {
                                                                            // Обратите внимание, что теперь фильтрация идет через ID родительской папки, предположим что $cellValue01 это ID.
                                                                            $folderLevel1 = mysqli_real_escape_string($conn, $folderLevel1);
                                                                            $query11 = "SELECT 
                                                                            folder_level_2, 
                                                                            MIN(ID) AS ID 
                                                                          FROM 
                                                                            tag1 
                                                                          WHERE 
                                                                            folder_level_1 = '{$folderLevel1}' 
                                                                            AND COALESCE(folder_level_3, '') = '' 
                                                                            AND COALESCE(folder_level_4, '') = '' 
                                                                            AND COALESCE(folder_level_5, '') = '' 
                                                                          GROUP BY 
                                                                            folder_level_2 
                                                                          ORDER BY 
                                                                            folder_level_2";
                                                                            $result11 = folder_level_22Query($conn, $query11);
                                                                        
                                                                            if (mysqli_num_rows($result11) > 0) {
                                                                                $counter11 = 1;
                                                                        
                                                                                while ($row11 = mysqli_fetch_assoc($result11)) {
                                                                                    // Извлекаем folder_level_2 и ID из ассоциативного массива
                                                                                    $folderLevel2 = $row11['folder_level_2'];
                                                                                    $id11 = $row11['ID'];
                                                                        
                                                                                    if (!empty($folderLevel2) && $folderLevel2 !== '-') {
                                                                                        $checkboxId11 = 'checkbox22_' . $counter11 . '_' . uniqid();
                                                                        
                                                                                        // Примечание: убедитесь, что `for` метки содержит соответствующий `id` элемента input
                                                                                        echo <<<HTML
                                                                                            <div class="dropdown-border" style="padding: 1px 1px;">
                                                                                                <div class="p-0">
                                                                                                    <ul class="list-unstyled components overtext">
                                                                                                        <li>
                                                                                                            <div class="nav-link text-black" name="folder_level_2[]">
                                                                                                                <label class="tag-checkbox tag-checkbox-label" id="folder_level_222" aria-expanded="false" data-target="#{$checkboxId11}" for="{$checkboxId11}">
                                                                                                                    <ion-icon name="folder"></ion-icon>&nbsp;
                                                                                                                    <input class="checkbox" type="checkbox" name="folder_level_2[]" value="{$id11}" id="{$checkboxId11}">
                                                                                                                    {$folderLevel2}
                                                                                                                </label>
                                                                                                            </div>
                                                                                                        </li>
                                                                                                    </ul>
                                                                                                </div>
                                                                                            </div>
                                                                                            <ul class="list-unstyled pageSubmenu1" id="{$checkboxId11}" style="margin-bottom: 0px;">
                                                                                            HTML;
                                                                                            renderfolder_level_33Dropdown($conn, $folderLevel2,$folderLevel1);
                                                                                        echo '</ul>';
                                                                                        $counter11++;
                                                                                    }
                                                                                }
                                                                            }
                                                                        }
                                                                        function folder_level_33Query($conn, $query22) {
                                                                            $stmt22 = mysqli_prepare($conn, $query22);
                                                                            if (!$stmt22) {
                                                                                die("Ошибка при подготовке запроса: " . mysqli_error($conn));
                                                                            }
                                                                            mysqli_stmt_execute($stmt22);
                                                                            return mysqli_stmt_get_result($stmt22);
                                                                        }
                                                                        
                                                                        function renderfolder_level_33Dropdown($conn, $folderLevel2, $folderLevel1) {
                                                                            $escapedValue11 = mysqli_real_escape_string($conn, $folderLevel1);
                                                                            $escapedValue12 = mysqli_real_escape_string($conn, $folderLevel2);
                                                                            $query22 = "SELECT 
                                                                                            folder_level_3, 
                                                                                            MIN(ID) AS ID
                                                                                        FROM 
                                                                                            tag1 
                                                                                        WHERE 
                                                                                            folder_level_1 = '{$escapedValue11}' AND 
                                                                                            folder_level_2 = '{$escapedValue12}' AND 
                                                                                            COALESCE(folder_level_4, '') = '' AND 
                                                                                            COALESCE(folder_level_5, '') = ''
                                                                                        GROUP BY 
                                                                                            folder_level_3 
                                                                                        ORDER BY 
                                                                                            folder_level_3";
                                                                                            
                                                                            $result22 = folder_level_33Query($conn, $query22);
                                                                        
                                                                            if (mysqli_num_rows($result22) > 0) {
                                                                                $counter22 = 1;
                                                                        
                                                                                while ($row2 = mysqli_fetch_assoc($result22)) {
                                                                                    $folderLevel3 = htmlspecialchars($row2['folder_level_3'], ENT_QUOTES);
                                                                                    $id22 = htmlspecialchars($row2['ID'], ENT_QUOTES);
                                                                        
                                                                                    if (!empty($folderLevel3) && $folderLevel3 !== '-') {
                                                                                        $checkboxId22 = 'checkbox33_' . $counter22 . '_' . uniqid();
                                                                                        echo <<<HTML
                                                                                        <div class="dropdown-border" style="padding: 1px 1px;">
                                                                                            <div class="p-0">
                                                                                                <ul class="list-unstyled components overtext">
                                                                                                    <li>
                                                                                                        <div class="nav-link text-black" name="folder_level_3[]">
                                                                                                            <label class="tag-checkbox tag-checkbox-label" for="checkbox33_{$id22}">
                                                                                                                <ion-icon name="folder"></ion-icon>&nbsp;
                                                                                                                <input class="checkbox" type="checkbox" name="folder_level_3[]" value="{$id22}" id="checkbox33_{$id22}">
                                                                                                                {$folderLevel3}
                                                                                                            </label>
                                                                                                        </div>
                                                                                                    </li>
                                                                                                </ul>
                                                                                            </div>
                                                                                            <ul class="collapse list-unstyled pageSubmenu2" id="{$checkboxId22}" style="margin-bottom: 0px;">
                                                                                        HTML;
                                                                                        // Убедитесь, что функция renderfolder_level_44Dropdown существует или замените на соответствующий код.
                                                                                        if (function_exists('renderfolder_level_44Dropdown')) {
                                                                                            renderfolder_level_44Dropdown($conn, $folderLevel3, $escapedValue12, $escapedValue11);
                                                                                        }
                                                                        
                                                                                        echo '</ul>';
                                                                                        echo "</div>"; // закрытие dropdown-border div
                                                                                        $counter22++;
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
                                                                        
                                                                        function renderfolder_level_44Dropdown($conn,$folderLevel3, $escapedValue12, $escapedValue11) {
                                                                            $escapedValue13 = mysqli_real_escape_string($conn, $folderLevel3);
                                                                        
                                                                            // Замените 'ID' на соответствующее поле, которое сопоставляет с ID второго уровня, если требуется.
                                                                            $query33 = "SELECT 
                                                                            folder_level_4, 
                                                                            MIN(ID) AS ID FROM tag1 
                                                                            WHERE folder_level_1 = '{$escapedValue11}' 
                                                                            AND folder_level_2 = '{$escapedValue12}' 
                                                                            AND folder_level_3 = '{$escapedValue13}' 
                                                                            AND COALESCE(folder_level_5, '') = '' 
                                                                            GROUP BY folder_level_4 
                                                                            ORDER BY folder_level_4";
                                                                        
                                                                            $result33 = folder_level_44Query($conn, $query33);
                                                                        
                                                                            if (mysqli_num_rows($result33) > 0) {
                                                                                $counter33 = 1; // Initialize a counter for unique IDs
                                                                        
                                                                                while ($row33 = mysqli_fetch_assoc($result33)) {
                                                                                    $folderLevel4 = htmlspecialchars($row33['folder_level_4']);
                                                                                    $id33 = $row33['ID']; // Получите ID для использования в значении
                                                                                    if (!empty($folderLevel4) && $folderLevel4 !== '-') {
                                                                                        $checkboxId33 = 'checkbox44_' . $counter33 . '_' . uniqid(); // Generate a unique ID for checkbox
                                                                        
                                                                                        echo "<div class=\"dropdown-border\" style=\"padding: 1px 1px;\">";
                                                                                        echo "    <div class=\"p-0\">";
                                                                                        echo "        <ul class=\"list-unstyled components overtext\">";
                                                                                        echo "            <li>";
                                                                                        echo "                <div class=\"nav-link text-black\" name=\"folder_level_4[]\">";
                                                                                        echo "                    <label class=\"tag-checkbox tag-checkbox-label\" id=\"folder_level_444\" data-toggle=\"collapse\" aria-expanded=\"false\" data-target=\"#{$checkboxId33}\">";
                                                                                        echo "                        <ion-icon name=\"folder\"></ion-icon>&nbsp;";
                                                                                        echo "                        <input class=\"checkbox\" type=\"checkbox\" name=\"folder_level_4[]\" value=\"{$id33}\" id=\"checkbox44_{$id33}\">";
                                                                                        echo "                        {$folderLevel4}";
                                                                                        echo "                    </label>";
                                                                                        echo "                </div>";
                                                                                        echo "            </li>";
                                                                                        echo "        </ul>";
                                                                                        echo "    </div>";
                                                                                        echo "    <ul class=\"collapse list-unstyled pageSubmenu2\" id=\"{$checkboxId33}\" style=\"margin-bottom: 0px;\">";
                                                                        
                                                                                        // Убедитесь, что функция renderfolder_level_55Dropdown существует или замените на соответствующий код.
                                                                                        if (function_exists('renderfolder_level_55Dropdown')) {
                                                                                            renderfolder_level_55Dropdown($conn, $escapedValue11, $escapedValue12, $escapedValue13, $folderLevel4); // Pass $folder_level_4 to the next function
                                                                                        }
                                                                        
                                                                                        echo '</ul>';
                                                                                        echo "</div>"; // закрытие dropdown-border div
                                                                                        $counter33++;
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
                                                                        
                                                                        function renderfolder_level_55Dropdown($conn, $id33) {
                                                                            $escapedValue33 = mysqli_real_escape_string($conn, $id33);
                                                                        
                                                                            // Предположим, что у вас есть разные условия WHERE для каждого ID (предположительно связанные с разными уровнями)
                                                                            // Запрос должен отражать реальные связи в вашей БД
                                                                            $query44 = "SELECT DISTINCT folder_level_5, ID FROM tag1 WHERE ID = '{$escapedValue33}' ORDER BY BINARY folder_level_5";
                                                                            $result44 = folder_level_55Query($conn, $query44);
                                                                        
                                                                            if (mysqli_num_rows($result44) > 0) {
                                                                                while ($row4 = mysqli_fetch_assoc($result44)) { // Использование mysqli_fetch_assoc для извлечения ассоциативного массива
                                                                                    $folder_level_5 = $row4['folder_level_5'];
                                                                                    $id44 = $row4['ID']; // Получить ID 
                                                                                    if (!empty($folder_level_5) && $folder_level_5 !== '-') {
                                                                                        $safeCellFolderLevel5 = htmlspecialchars($folder_level_5, ENT_QUOTES);
                                                                                        $safeId = htmlspecialchars($id44, ENT_QUOTES); // Предотвратить XSS-атаки
                                                                                        echo <<<HTML
                                                                                            <div class="row dropdown-border" style="padding: 1px 1px;">
                                                                                                <div class="p-0 col-md-12">
                                                                                                    <ul class="list-unstyled components overtext">
                                                                                                        <li>
                                                                                                            <div class="nav-link text-black" name="folder_level_5[]">
                                                                                                                <label class="tag-checkbox tag-checkbox-label" id="folder_level_555" data-toggle="collapse" aria-expanded="false" for="checkbox55_{$safeId}">
                                                                                                                    <ion-icon name="folder"></ion-icon>&nbsp;
                                                                                                                    <input class="checkbox" type="checkbox" name="folder_level_5[]" value="{$safeId}" id="checkbox55_{$safeId}">
                                                                                                                    {$safeCellFolderLevel5}
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
                                                                        Dep_name1Dropdown($conn);
                                                                        ?>
                                                                        <div class="otstupmen" style="width: 100%;">
                                                                        <input class="btn btn-primary" type="submit"  name="Применить11" id="butt_apply" value="Опубликовать"style="width: 100%;"></input>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </nav>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                        <input class="btn btn-primary" type="submit"  name="Применить11" id="butt_apply" value="Опубликовать"style="width: 100%;"></input>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            // Включить вывод ошибок
            ini_set('display_errors', 1);
            error_reporting(E_ALL);


            // Конфигурация подключения к БД
            $server = "127.0.0.1";
            $user = "root";
            $pass = "1";
            $dbname = "bd_infocell_docs";
            $dbtable ="doc";
            $dbtable1 ="doc_tag";
            $dbtable2 ="tag1";
            $conn = mysqli_connect($server, $user, $pass, $dbname);

            // Проверить соединение с БД
            if (!$conn) {
                error_log("Connection failed: " . mysqli_connect_error());
                exit;
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
                $downFolder = isset($_POST['Down_folder']) ? $_POST['Down_folder'] : '';
                $SQLCond="";
                $SQLCond11="";
                $SQLCond22="";
                $SQLCond33="";
                $SQLCond44="";
                $SQLCond55="";
                $SQLCond66="";
                $SQLCond77="";
                    // Используем массив для удержания подключения к DB и таблиц
                    $downFolder = isset($_POST['Down_folder']) ? $_POST['Down_folder'] : '';
                    $Dep_name1_array = array($downFolder); // Теперь это массив с одним элементом
                    $depName = isset($_POST['Dep_name']) ? $_POST['Dep_name'] : '';
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
                        echo "Mass array: \n";
                   
                        echo "\nMass1 array: \n";
                        foreach ($mass1 as $key => $value) {
                            echo "Key: $key, Value: $value\n";
                        }
                        $d_sql = "";
                        $dt_sql = "";
                        $queryCondition = "";
                        $queryCondition1 = "";
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
                       
                        // Подготовка и выполнение запросов
                        if(!($Dep_name==""))
                        {   
                            $str10="";
                            $first10=true;
                            $SQLCond10="";
                            foreach ($Dep_name as $Dep_nameNum=>$value) {
                                if ($first10) {
                                    $first10 = false;
                                    $str10 = "(dt.Dep_name = '$value')" ;
                                } else {
                                    $str10 = "(".$str10 . " OR (dt.Dep_name = '$value'))";
                                }
                                // echo "Производители : ".$proizvoditel.$Imya_proizvoditelyaNum." Значение ".$value."<br />";
                            }
                            // echo "<br> str1=$str1";
                            $SQLCond10=$str10.$SQLCond10;
                             echo $SQLCond10;
                            if(($SQLCond10!="" and $queryCondition1!=""))
                            {
                                $queryCondition1 = $queryCondition1 . ' OR ' . $SQLCond10;
                            }
                            else
                            {
                                $queryCondition1 = $queryCondition1 . $SQLCond10;
                            }
                        }          
                        if(!($folder_level_1==""))
                        {   
                            $str11="";
                            $first11=true;
                            $SQLCond11="";
                            foreach ($folder_level_1 as $folder_level_1Num=>$value) {
                                if ($first11) {
                                    $first11 = false;
                                    $str11 = "(tag1.ID = '$value')" ;
                                } else {
                                    $str11 = "(".$str11 . " OR (tag1.ID = '$value'))";
                                }
                                // echo "Производители : ".$proizvoditel.$Imya_proizvoditelyaNum." Значение ".$value."<br />";
                            }
                            // echo "<br> str1=$str1";
                            $SQLCond11=$str11.$SQLCond11;
                            // echo $SQLCond1;
                            if(($SQLCond11!="" and $queryCondition!=""))
                            {
                                $queryCondition = $queryCondition . ' OR ' . $SQLCond11;
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
                                    $str22 = "(tag1.ID = '$value')" ;
                                } else {
                                    $str22 = "(".$str22 . " OR (tag1.ID = '$value'))";
                                }
                                // echo "Производители : ".$proizvoditel.$Imya_proizvoditelyaNum." Значение ".$value."<br />";
                            }
                            // echo "<br> str1=$str1";
                            $SQLCond22=$str22.$SQLCond22;
                            // echo $SQLCond1;
                            if(($SQLCond22!="" and $queryCondition!=""))
                            {
                                $queryCondition = $queryCondition . ' OR ' . $SQLCond22;
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
                                    $str33 = "(tag1.ID = '$value')" ;
                                } else {
                                    $str33 = "(".$str33 . " OR (tag1.ID = '$value'))";
                                }
                                // echo "Производители : ".$proizvoditel.$Imya_proizvoditelyaNum." Значение ".$value."<br />";
                            }
                            // echo "<br> str1=$str1";
                            $SQLCond33=$str33.$SQLCond33;
                            // echo $SQLCond1;
                            if(($SQLCond33!="" and $queryCondition!=""))
                            {
                                $queryCondition = $queryCondition . ' OR ' . $SQLCond33;
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
                                    $str44 = "(tag1.ID = '$value')" ;
                                } else {
                                    $str44 = "(".$str44 . " OR (tag1.ID = '$value'))";
                                }
                                // echo "Производители : ".$proizvoditel.$Imya_proizvoditelyaNum." Значение ".$value."<br />";
                            }
                            // echo "<br> str1=$str1";
                            $SQLCond44=$str44.$SQLCond44;
                            // echo $SQLCond1;
                            if(($SQLCond44!="" and $queryCondition!=""))
                            {
                                $queryCondition = $queryCondition . ' OR ' . $SQLCond44;
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
                                    $str55 = "(tag1.ID = '$value')" ;
                                } else {
                                    $str55 = "(".$str55 . " OR (tag1.ID = '$value'))";
                                }
                                // echo "Производители : ".$proizvoditel.$Imya_proizvoditelyaNum." Значение ".$value."<br />";
                            }
                            // echo "<br> str1=$str1";
                            $SQLCond55=$str55.$SQLCond55;
                            // echo $SQLCond1;
                            if(($SQLCond55!="" and $queryCondition!=""))
                            {
                                $queryCondition = $queryCondition . ' OR ' . $SQLCond55;
                            }
                            else
                            {
                                $queryCondition = $queryCondition . $SQLCond55;
                            }
                        }
                        // Строим запрос на основе условий
                    try {
                        if (empty($downFolder))
                        {
                            if (!empty($queryCondition)) {
                                // Формируем SQL запрос для выборки ID из таблицы tag1, используя условие $queryCondition
                                // Исправление: Изначально было указано "doc.name_doc" в JOIN, что некорректно,
                                // так как мы не джойним таблицу doc. Мы джойним doc_tag (dt) и tag1 (t).
                                $query001 = "SELECT tag1.ID  FROM tag1 WHERE" . $queryCondition;
                                echo $query001; // Выводим запрос для дебага
                                $result = mysqli_query($conn, $query001);
                            
                                // Если запрос не выполнен, генерируем исключение с описанием ошибки
                                if (!$result) {
                                    throw new Exception("Ошибка выполения запроса: " . mysqli_error($conn));
                                }
                            
                                $id_tags = []; // Инициализируем массив для ID тегов
                            
                                // Считываем результаты запроса в массив $id_tags
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $id_tags[] = $row['ID']; // Добавляем ID в массив
                                }
                            
                                // Выводим все ID тегов, полученные из запроса
                                foreach ($id_tags as $value) {
                                    echo 'ID тега: ' . $value . '<br>'; // Исправление: Добавил тег <br> для лучшей читаемости
                                }
                            
                                // Подготавливаем запрос для проверки существования документа в таблице doc
                                $query111 = "SELECT name_doc FROM doc WHERE name_doc = ?";
                                $stmt1 = mysqli_prepare($conn, $query111);
                            
                                // Если подготовленный запрос выполнен успешно
                                if ($stmt1) {
                                    mysqli_stmt_bind_param($stmt1, 's', $name_doc); // связываем параметр
                                    mysqli_stmt_execute($stmt1); // выполняем запрос
                                    mysqli_stmt_store_result($stmt1); // сохраняем результат для подсчета строк
                            
                                    // Проверяем, существует ли уже такой документ
                                    $docExists = mysqli_stmt_num_rows($stmt1) > 0;
                                    mysqli_stmt_close($stmt1);
                            
                                    if (!$docExists) {
                                        // Если документа не существует, вставляем информацию о новом документе в таблицу doc
                                        $insertQuery = "INSERT INTO doc (name_doc, file_link, type, doc_date) VALUES (?, ?, ?, ?)";
                                        $stmt = mysqli_prepare($conn, $insertQuery);
                            
                                        if ($stmt) {
                                            // Связываем параметры запроса с переменными
                                            mysqli_stmt_bind_param($stmt, 'ssss', $name_doc, $file_link, $type, $doc_date);
                                            // Выполняем запрос и обрабатываем возможную ошибку
                                            if (!mysqli_stmt_execute($stmt)) {
                                                throw new Exception("Ошибка при добавлении данных в таблицу doc: " . mysqli_stmt_error($stmt));
                                            }
                                            // Сообщаем об успешном добавлении документа
                                            echo "Документ с именем $name_doc успешно вложен.";
                                            // Закрываем запрос
                                            mysqli_stmt_close($stmt);
                                        } else {
                                            // Если подготовка запроса не удалась, генерируем исключение
                                            throw new Exception("Ошибка при подготовке запроса в таблицу doc: " . mysqli_error($conn));
                                        }
                                    }
                                } else {
                                    throw new Exception("Ошибка при подготовке запроса на проверку существования документа: " . mysqli_error($conn));
                                }
                                // Проверяем, не пустой ли массив $id_tags
                                if (!empty($id_tags) && !empty($depName)) {
                                    // Вставляем связку тега с документом для каждого департамента в таблицу doc_tag
                                    foreach ($depName as $Dep_name_item) {
                                        if (!is_string($Dep_name_item)) {
                                            throw new Exception('Все элементы массива $depName должны быть строками.');
                                        }
                                
                                        foreach ($id_tags as $ID_tag) {
                                            $insertQuery2 = "INSERT INTO doc_tag (name_doc, ID_tag, Dep_name) VALUES (?, ?, ?)";
                                            $stmt2 = mysqli_prepare($conn, $insertQuery2);
                                
                                            if ($stmt2) {
                                                mysqli_stmt_bind_param($stmt2, 'sis', $name_doc, $ID_tag, $Dep_name_item);
                                
                                                if (mysqli_stmt_execute($stmt2)) {
                                                    echo "Информация о департаменте '{$Dep_name_item}' и теге ID = {$ID_tag} успешно добавлена.<br>";
                                                } else {
                                                    throw new Exception("Ошибка при добавлении данных в таблицу doc_tag: " . mysqli_stmt_error($stmt2));
                                                }
                                
                                                mysqli_stmt_close($stmt2);
                                            } else {
                                                throw new Exception("Ошибка при подготовке запроса для вставки данных в таблицу doc_tag: " . mysqli_error($conn));
                                            }
                                        }
                                    }
                                } else {
                                    echo "Один из массивов \$id_tags или \$depName пуст.";
                                }

                            }
                        }
                        else
                        {
                        if (!empty($depName)) {
                            if (!empty($id_tags)){
                                // Формируем SQL запрос для выборки ID из таблицы tag1, используя условие $queryCondition
                                $query001 = "SELECT tag1.ID  FROM tag1 WHERE" . $queryCondition;
                                $result = mysqli_query($conn, $query001);
                                // Если запрос не выполнен, генерируем исключение с описанием ошибки
                                if (!$result) {
                                    throw new Exception("Ошибка выполения запроса: " . mysqli_error($conn));
                                }
                                // Выводим на экран SQL запрос для проверки
                                echo ' id здесь  ' . $query001;
                                $id_tags = array();
                                // Считываем результаты запроса в массив $id_tags
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $id_tags[] = $row['ID']; // Добавляем ID в массив
                                }
                                // Выводим все ID тегов, полученные из запроса
                                foreach ($id_tags as $value) {
                                    echo ' id здесь  ' . $value;
                                }
                            }else{
                                $queryCondition = array();
                                $id_tags = $queryCondition;
                            }
                            // Подготавливаем запрос для проверки существования документа в таблице doc
                            $query111 = "SELECT name_doc FROM doc WHERE name_doc = ?";
                            $stmt1 = mysqli_prepare($conn, $query111);
                            // Если подготовленный запрос не удался, выводим ошибку
                            if ($stmt1) {
                                // Связываем параметры запроса с переменными
                                mysqli_stmt_bind_param($stmt1, 's', $name_doc);
                                // Выполняем запрос
                                mysqli_stmt_execute($stmt1);
                                // Сохраняем результат выполнения запроса для подсчёта строк
                                mysqli_stmt_store_result($stmt1);
                        
                                // Проверяем, существует ли уже такая запись в таблице doc
                                $docExists = mysqli_stmt_num_rows($stmt1) > 0;
                                // Закрываем запрос
                                mysqli_stmt_close($stmt1);
                        
                                if (!$docExists) {
                                    // Если документа не существует, вставляем информацию о новом документе в таблицу doc
                                    $insertQuery = "INSERT INTO doc (name_doc, file_link, type, doc_date) VALUES (?, ?, ?, ?)";
                                    $stmt = mysqli_prepare($conn, $insertQuery);
                        
                                    if ($stmt) {
                                        // Связываем параметры запроса с переменными
                                        mysqli_stmt_bind_param($stmt, 'ssss', $name_doc, $file_link, $type, $doc_date);
                        
                                        // Выполняем запрос и обрабатываем возможную ошибку
                                        if (!mysqli_stmt_execute($stmt)) {
                                            throw new Exception("Ошибка при добавлении данных в таблицу doc: " . mysqli_stmt_error($stmt));
                                        }
                                        // Сообщаем об успешном добавлении документа
                                        echo "Документ с именем $name_doc успешно вложен.";
                                        // Закрываем запрос
                                        mysqli_stmt_close($stmt);
                                    } else {
                                        // Если подготовка запроса не удалась, генерируем исключение
                                        throw new Exception("Ошибка при подготовке запроса в таблицу doc: " . mysqli_error($conn));
                                    }
                                } else {
                                    // Если документ с таким именем уже существует, выводим сообщение
                                    echo "Документ с именем $name_doc уже существует.";
                                    $query112 = "SELECT name_doc FROM doc WHERE ". $d_sql;
                                    $result112 = mysqli_query($conn, $query112);
                                    // Если запрос не выполнен, генерируем исключение с описанием ошибки
                                    if (!$result112) {
                                        throw new Exception("Ошибка выполения запроса: " . mysqli_error($conn));
                                    }
                            
                                    // Считываем результаты запроса в массив $id_tags
                                    while ($row112 = mysqli_fetch_assoc($result112)) {
                                        $name_doc = $row112['name_doc']; // Добавляем ID в массив
                                    }
                                }
                            } else {
                                // Если подготовка запроса на проверку существования документа не удалась, генерируем исключение
                                throw new Exception("Ошибка при подготовке запроса на проверку существования документа: " . mysqli_error($conn));
                            }
                        
                            // Вставляем связки тега с документом в таблицу doc_tag
                            if (!empty($id_tags)){
                                foreach ($id_tags as $ID_tag) {
                                    // Получаем текущие уровни папок
                                        $query = "SELECT folder_level_1, folder_level_2, folder_level_3, folder_level_4, folder_level_5 FROM tag1 WHERE ID = ?";
                                        $stmt = mysqli_prepare($conn, $query);
                                        mysqli_stmt_bind_param($stmt, 'i', $ID_tag);
                                        mysqli_stmt_execute($stmt);
                                        $result = mysqli_stmt_get_result($stmt);
                                        $folderLevels = mysqli_fetch_assoc($result);
                                        mysqli_stmt_close($stmt);
                                        
                                        // Определяем, на каком уровне нужно вставить новую папку
                                        $insertParams = ['', '', '', '', ''];
                                        $foundEmpty = false;
                                        for ($i = 1; $i <= 5; $i++) {
                                            $levelKey = 'folder_level_' . $i;
                                            if (!$foundEmpty && empty($folderLevels[$levelKey])) {
                                                $insertParams[$i - 1] = $downFolder;
                                                $foundEmpty = true;
                                            } elseif (!empty($folderLevels[$levelKey])) {
                                                $insertParams[$i - 1] = $folderLevels[$levelKey];
                                            }
                                        }
                                        if (!$foundEmpty) {
                                            // Все уровни папок заполнены, переходим к следующему ID
                                            echo "Ошибка: для этого ID все уровни папок заполнены.\n";
                                            continue;
                                        }
                                    // Вставляем новую строку с обновленными путями папок
                                    $insertQuery = "INSERT INTO tag1 (folder_level_1, folder_level_2, folder_level_3, folder_level_4, folder_level_5) VALUES (?, ?, ?, ?, ?)";
                                    $stmt = mysqli_prepare($conn, $insertQuery);
                                    mysqli_stmt_bind_param($stmt, 'sssss', ...$insertParams);
                                    mysqli_stmt_execute($stmt);
                                    $newID = mysqli_insert_id($conn);
                                    mysqli_stmt_close($stmt);
                                    
                                    if ($newID > 0) {
                                        echo "Новый ID: {$newID} добавлен с папкой на уровне {$downFolder}\n";
                                        
                                        // Вставляем данные в doc_tag только если $newID валиден
                                        $insertQuery2 = "INSERT INTO doc_tag (name_doc, ID_tag, Dep_name) VALUES (?, ?, ?)";
                                        $stmt2 = mysqli_prepare($conn, $insertQuery2);
                                        
                                        if ($stmt2) {
                                            mysqli_stmt_bind_param($stmt2, 'sis', $name_doc, $newID, $Dep_name);
                                            
                                            // Предполагаем, что вывод отладочного запроса больше не требуется,
                                            // поскольку мы исправили исходные проблемы
                                            
                                            if (!mysqli_stmt_execute($stmt2)) {
                                                echo "Ошибка выполнения подготовленного выражения в таблицу doc_tag для ID = {$newID}: " . mysqli_stmt_error($stmt2) . "\n";
                                            }
                                            
                                            mysqli_stmt_close($stmt2);
                                            echo "Информация в doc_tag успешно добавлена для ID_tag = {$newID}.\n";
                                        } else {
                                            echo "Ошибка при подготовке выражения в таблицу doc_tag для ID = {$newID}: " . mysqli_error($conn) . "\n";
                                        }
                                    } else {
                                        echo "Ошибка при вставке новой папки: Не удалось получить новый ID.\n";
                                    }
                                }
                            }else{
                                foreach ($Dep_name1_array as $Dep_Name_array1) {
                                            // Предоставляем данные для всех NOT NULL колонок
                                            $insertQuery = "INSERT INTO tag1 (folder_level_1, folder_level_2, folder_level_3, folder_level_4, folder_level_5) VALUES (?, '', '', '', '')";
                                            $stmt = mysqli_prepare($conn, $insertQuery);
                                            mysqli_stmt_bind_param($stmt, 's', $Dep_Name_array1);
                                            if (mysqli_stmt_execute($stmt)) {
                                                $newID = mysqli_insert_id($conn);
                                                mysqli_stmt_close($stmt);

                                                if ($newID > 0) {
                                            echo "Новый ID: {$newID} добавлен с папкой на уровне {$downFolder}\n";
                                            
                                            // Вставляем данные в doc_tag только если $newID валиден
                                            $insertQuery2 = "INSERT INTO doc_tag (name_doc, ID_tag, Dep_name) VALUES (?, ?, ?)";
                                            $stmt2 = mysqli_prepare($conn, $insertQuery2);
                                            
                                            if ($stmt2) {
                                                mysqli_stmt_bind_param($stmt2, 'sis', $name_doc, $newID, $Dep_name_item);
                                                
                                                // Предполагаем, что вывод отладочного запроса больше не требуется,
                                                // поскольку мы исправили исходные проблемы
                                                
                                                if (!mysqli_stmt_execute($stmt2)) {
                                                    echo "Ошибка выполнения подготовленного выражения в таблицу doc_tag для ID = {$newID}: " . mysqli_stmt_error($stmt2) . "\n";
                                                }
                                                
                                                mysqli_stmt_close($stmt2);
                                                echo "Информация в doc_tag успешно добавлена для ID_tag = {$newID}.\n";
                                            } else {
                                                echo "Ошибка при подготовке выражения в таблицу doc_tag для ID = {$newID}: " . mysqli_error($conn) . "\n";
                                            }
                                        } else {
                                            echo "Ошибка при вставке новой папки: Не удалось получить новый ID.\n";
                                        }
                                    } else {
                                        echo "Ошибка в запросе: " . mysqli_stmt_error($stmt) . "\n";
                                        mysqli_stmt_close($stmt);
                                    }
                                }
                            }
                        }
                    }
                    } catch (Exception $e) {
                        // Обработка исключения: выводим сообщение об ошибке
                        echo $e->getMessage();
                    }
                        // Закрытие соединения с БД
                        mysqli_close($conn);
                        // Ставим отметку в сессии о том, что форма была обработана
                        $_SESSION['form_submitted'] = true;
                    }
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
                                    <?php
                                    echo '<div class="dropdown-border" style="padding: 1px 1px;">';
                                        echo '<div class="p-0">';
                                            echo '<ul class="list-unstyled components overtext">';
                                                echo '<li>';
                                                    echo '<div class="nav-link text-black" name="Dep_name">';
                                                        echo '<label class="tag-checkbox tag-checkbox-label checked" for="checkbox1_">';
                                                        echo '<ion-icon name="business"></ion-icon>&nbsp;'; 
                                                            echo '<input class="radio" type="radio" name="Dep_name" value="" id="checkbox1_" >';
                                                            echo "Выберите отдел и папку с документами";
                                                        echo '</label>';
                                                    echo '</div>';
                                                echo '</li>';
                                            echo '</ul>';
                                        echo '</div>';
                                    echo '</div>';
                                    function Dep_nameQuery($conn, $query0) {
                                        $stmt0 = mysqli_prepare($conn, $query0);
                                        mysqli_stmt_execute($stmt0);
                                        return mysqli_stmt_get_result($stmt0);
                                    }
                                    function Dep_nameDropdown($conn) {
                                        $query0 = "SELECT DISTINCT doc_tag.Dep_name
                                        FROM doc_tag
                                        JOIN doc ON doc_tag.name_doc = doc.name_doc
                                        WHERE (doc.name_doc IS NOT NULL AND doc.name_doc <> '')
                                        ORDER BY BINARY doc_tag.Dep_name";
                                        $result0 = Dep_nameQuery($conn, $query0);

                                        if (mysqli_num_rows($result0) > 0) {
                                            $counter0 = 1; // Initialize a counter for unique IDs

                                            while ($row0 = mysqli_fetch_array($result0, MYSQLI_NUM)) {
                                                foreach ($row0 as $cellValue0) {
                                                    if (!empty($cellValue0) && $cellValue0 !== '-') {
                                                        $uni0 = 'checkbox0_'. $counter0; // Generate a unique ID using the counter
                                                        
                                                        echo '<div class="dropdown-border" style="padding: 1px 1px;">';
                                                            echo '<div class="p-0">';
                                                                echo '<ul class="list-unstyled components overtext">';
                                                                    echo '<li>';
                                                                        echo '<div class="nav-link text-black" name="Dep_name">';
                                                                        echo '<label class="tag-checkbox tag-checkbox-label" id="Dep_name" data-toggle="collapse" aria-expanded="false" data-target="#' . $uni0 . '" for="checkbox0_' . htmlspecialchars($cellValue0, ENT_QUOTES) . '">'; 
                                                                        echo '<ion-icon name="person"></ion-icon>&nbsp;'; 
                                                                        echo '<input class="radio" type="radio" name="Dep_name" value="' . htmlspecialchars($cellValue0, ENT_QUOTES) . '" id="checkbox0_' . htmlspecialchars($cellValue0, ENT_QUOTES) . '">'; 
                                                                        echo htmlspecialchars($cellValue0, ENT_QUOTES); 
                                                                        echo '</label>'; 
                                                                        
                                                                        echo '</div>';
                                                                    echo '</li>';
                                                                echo '</ul>';
                                                            echo '</div>';
                                                        echo '</div>';

                                                        // Increment the counter0 for the next iteration
                                                    
                                                        echo '<ul class="collapse list-unstyled pageSubmenu1" id="' . $uni0 . '" style="margin-bottom: 0px;">';
                                                        renderfolder_level_1Dropdown($conn, $cellValue0); // Pass $cellValue to the next function
                                                        echo '</ul>';
                                                        $counter0++;
                                                    }
                                                }
                                            }
                                        }
                                    }
                                    function folder_level_1Query($conn, $query) {
                                        $stmt = mysqli_prepare($conn, $query);
                                        mysqli_stmt_execute($stmt);
                                        return mysqli_stmt_get_result($stmt);
                                    }
                                    
                                    function renderfolder_level_1Dropdown($conn, $cellValue0) {
                                        $query = "SELECT folder_level_1, MIN(ID) as min_id
                                                FROM doc
                                                LEFT JOIN doc_tag dt ON doc.name_doc = dt.name_doc
                                                LEFT JOIN tag1 t ON dt.ID_tag = t.ID
                                                WHERE dt.Dep_name = ? AND (doc.name_doc IS NOT NULL AND doc.name_doc <> '')
                                                GROUP BY folder_level_1
                                                ORDER BY BINARY folder_level_1";
                                        
                                        if($stmt = mysqli_prepare($conn, $query)){
                                            // Биндим параметры для подготовленного выражения
                                            mysqli_stmt_bind_param($stmt, "s", $cellValue0);
                                    
                                            // Выполняем SQL запрос с подготовленным выражением
                                            mysqli_stmt_execute($stmt);
                                            $result = mysqli_stmt_get_result($stmt);
                                    
                                            if (mysqli_num_rows($result) > 0) {
                                                $counter = 1;
                                                
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    $folderLevel1 = $row['folder_level_1'];
                                                    $folderLevel1Id = $row['min_id'];
                                    
                                                    if (!empty($folderLevel1) && $folderLevel1 !== '-') {
                                                        $uniqueId = 'checkbox1_' . $counter . '_' . uniqid();
                                                        
                                                        echo <<<HTML
                                                            <div class="dropdown-border" style="padding: 1px 1px;">
                                                                <div class="p-0">
                                                                    <ul class="list-unstyled components overtext">
                                                                        <li>
                                                                            <div class="nav-link text-black " name="folder_level_1">
                                                                                <label class="tag-checkbox tag-checkbox-label" aria-expanded="false" data-target="#{$uniqueId}" for="checkbox1_{$folderLevel1Id}">
                                                                                    <ion-icon name="folder"></ion-icon>&nbsp;
                                                                                    <input class="radio" type="radio" name="folder_level_1" value="{$folderLevel1}" id="checkbox1_{$folderLevel1Id}">
                                                                                    {$folderLevel1}
                                                                                </label>
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        HTML;
                                                        echo '<ul class="list-unstyled pageSubmenu1" id="' . $uniqueId . '" style="margin-bottom: 0px;">';
                                                        // Следующая функция представляет собой заглушку. По условию задачи не ясно, что она делает.
                                                        renderfolder_level_2Dropdown($conn, $folderLevel1); // Placeholder function
                                                        echo '</ul>';
                                                        $counter++;
                                                    }
                                                }
                                            }
                                    
                                            // Закрываем statement
                                            mysqli_stmt_close($stmt);
                                        }
                                    }
                                 
                                    function folder_level_2Query($conn, $query1) {
                                        $stmt1 = mysqli_prepare($conn, $query1);
                                        mysqli_stmt_execute($stmt1);
                                        return mysqli_stmt_get_result($stmt1);
                                    }
                                    
                                    function renderfolder_level_2Dropdown($conn, $cellValue) {
                                        $query1 = 'SELECT DISTINCT folder_level_2 FROM doc
                                        LEFT JOIN doc_tag dt ON doc.name_doc = dt.name_doc
                                        LEFT JOIN  tag1 ON dt.ID_tag = tag1.ID WHERE (folder_level_1 = "' . $cellValue . '") ORDER BY BINARY folder_level_2 ';
                                        $result1 = folder_level_2Query($conn, $query1);
                                        
                                        if (mysqli_num_rows($result1) > 0) {
                                            $counter1 = 1; // Initialize a counter for unique IDs
                                    
                                            while ($row1 = mysqli_fetch_array($result1, MYSQLI_NUM)) {
                                                foreach ($row1 as $cellValue1) {
                                                    if (!empty($cellValue1) && $cellValue1 !== '-') {
                                                        $checkboxId = 'checkbox2_' . $counter1. '_' .  uniqid(); // Generate a unique ID for checkbox
                                                        echo '<div class=" dropdown-border" style="padding: 1px 1px;">';
                                                            echo '<div class="p-0 ">';
                                                                echo '<ul class="list-unstyled components overtext">';
                                                                    echo '<li>';
                                                                        echo '<div class="nav-link text-black " name="folder_level_2">';
                                                                            echo '<label class="tag-checkbox  tag-checkbox-label" id="folder_level_22" data-toggle="collapse" aria-expanded="false" data-target="#' . $checkboxId . '" for="checkbox2_' . htmlspecialchars($cellValue1, ENT_QUOTES) . '">';
                                                                            echo '<ion-icon name="folder"></ion-icon>&nbsp;';
                                                                            echo '<input class="radio" type="radio" name="folder_level_2" value="' . htmlspecialchars($cellValue1, ENT_QUOTES) . '" id="checkbox2_' . htmlspecialchars($cellValue1, ENT_QUOTES) . '">';
                                                                            echo htmlspecialchars($cellValue1, ENT_QUOTES);
                                                                            echo '</label>';
                                                                        echo '</div>';
                                                                    echo '</li>';
                                                                echo '</ul>';
                                                            echo '</div>';
                                                        echo '</div>';
                                                        echo '<ul class="collapse list-unstyled pageSubmenu1" id="' . $checkboxId . '" style="margin-bottom: 0px;">';
                                                        renderfolder_level_3Dropdown($conn, $cellValue1); // Pass $cellValue to the next function
                                                        echo '</ul>';
                                                        $counter1++;
                                                    }
                                                }
                                            }
                                        }
                                    }
                                    function folder_level_3Query($conn, $query2) {
                                        $stmt2 = mysqli_prepare($conn, $query2);
                                        mysqli_stmt_execute($stmt2);
                                        return mysqli_stmt_get_result($stmt2);
                                    }

                                    function renderfolder_level_3Dropdown($conn, $cellValue1) {
                                        $query2 = 'SELECT DISTINCT folder_level_3 FROM doc
                                        LEFT JOIN doc_tag dt ON doc.name_doc = dt.name_doc
                                        LEFT JOIN tag1 ON dt.ID_tag = tag1.ID WHERE (folder_level_2 = "' . $cellValue1 . '") ORDER BY BINARY folder_level_3';
                                        $result2 = folder_level_3Query($conn, $query2);
                                        
                                        if (mysqli_num_rows($result2) > 0) {
                                            $counter2 = 1; // Initialize a counter for unique IDs

                                            while ($row2 = mysqli_fetch_array($result2, MYSQLI_NUM)) {
                                                foreach ($row2 as $cellValue2) {
                                                    if (!empty($cellValue2) && $cellValue2 !== '-') {
                                                        $checkboxId1 = 'checkbox3_' . $counter2. '_' .  uniqid(); // Generate a unique ID for checkbox
                                                        echo '<div class="dropdown-border" style="padding: 1px 1px;">';
                                                            echo '<div class="p-0 ">';
                                                                echo '<ul class="list-unstyled components overtext">';
                                                                    echo '<li>';
                                                                        echo '<div class=" nav-link text-black "  name="folder_level_3">';
                                                                            echo '<label class="tag-checkbox tag-checkbox-label" id="folder_level_33" data-toggle="collapse" aria-expanded="false" data-target="#' . $checkboxId1 . '" for="checkbox3_' . htmlspecialchars($cellValue2, ENT_QUOTES) . '">';
                                                                            echo '<ion-icon name="folder"></ion-icon>&nbsp;';
                                                                            echo '<input class="radio" type="radio" name="folder_level_3" value="' . htmlspecialchars($cellValue2, ENT_QUOTES) . '" id="checkbox3_' . htmlspecialchars($cellValue2, ENT_QUOTES) . '">';
                                                                            echo htmlspecialchars($cellValue2, ENT_QUOTES);
                                                                            echo '</label>';
                                                                        echo '</div>';
                                                                    echo '</li>';
                                                                echo '</ul>';
                                                            echo '</div>';
                                                        echo '</div>';
                                                        $counter2++;
                                                        echo '<ul class="collapse list-unstyled pageSubmenu2" id="' . $checkboxId1 . '" style="margin-bottom: 0px;">';
                                                        renderfolder_level_4Dropdown($conn, $cellValue2); // Pass $cellValue to the next function
                                                        echo '</ul>';
                                                    }
                                                }
                                            }
                                        }
                                    }
                                    function folder_level_4Query($conn, $query3) {
                                        $stmt3 = mysqli_prepare($conn, $query3);
                                        mysqli_stmt_execute($stmt3);
                                        return mysqli_stmt_get_result($stmt3);
                                    }
                                    
                                    function renderfolder_level_4Dropdown($conn, $cellValue2) {
                                        $query3 = 'SELECT DISTINCT folder_level_4 FROM doc
                                        LEFT JOIN doc_tag dt ON doc.name_doc = dt.name_doc
                                        LEFT JOIN tag1  ON dt.ID_tag = tag1.ID WHERE (folder_level_3 = "' . $cellValue2 . '") ORDER BY BINARY folder_level_4';
                                        $result3 = folder_level_4Query($conn, $query3);
                                        
                                        if (mysqli_num_rows($result3) > 0) {
                                            $counter3 = 1; // Initialize a counter for unique IDs
                                    
                                            while ($row3 = mysqli_fetch_array($result3, MYSQLI_NUM)) {
                                                foreach ($row3 as $cellValue3) {
                                                    if (!empty($cellValue3) && $cellValue3 !== '-') {
                                                        $checkboxId2 = 'checkbox4_' . $counter3. '_' .  uniqid(); // Generate a unique ID for checkbox
                                                        
                                                    echo '<div class="dropdown-border" style="padding: 1px 1px;">';
                                                        echo '<div class="p-0">';
                                                            echo '<ul class="list-unstyled components overtext">';
                                                                echo '<li>';
                                                                    echo '<div class=" nav-link text-black "  name="folder_level_4">';
                                                                        echo '<label class="tag-checkbox tag-checkbox-label" id="folder_level_44" data-toggle="collapse" aria-expanded="false" for="checkbox4_' . htmlspecialchars($cellValue3, ENT_QUOTES) . '">';
                                                                        echo '<ion-icon name="folder"></ion-icon>&nbsp;';
                                                                        echo '<input class="radio" type="radio" name="folder_level_4" value="' . htmlspecialchars($cellValue3, ENT_QUOTES) . '" id="checkbox4_' . htmlspecialchars($cellValue3, ENT_QUOTES) . '">';
                                                                        echo htmlspecialchars($cellValue3, ENT_QUOTES);
                                                                        echo '</label>';
                                                                    echo '</div>';
                                                                echo '</li>';
                                                            echo '</ul>';
                                                        echo '</div>';
                                                    echo '</div>';
                                                    $counter3++;
                                                    echo "<ul class='collapse list-unstyled pageSubmenu2' id=' . $checkboxId2 . ' style='margin-bottom: 0px;'>";
                                                    renderfolder_level_5Dropdown($conn, $cellValue3); // Pass $cellValue to the next function
                                                    echo '</ul>';
                                                    }
                                                }
                                            }
                                        }
                                    }
                                    function folder_level_5Query($conn, $query4) {
                                        $stmt4 = mysqli_prepare($conn, $query4);
                                        mysqli_stmt_execute($stmt4);
                                        return mysqli_stmt_get_result($stmt4);
                                    }
                                    
                                    function renderfolder_level_5Dropdown($conn, $cellValue3) {
                                        $query4 = 'SELECT DISTINCT tag1.folder_level_5 FROM doc
                                        LEFT JOIN doc_tag dt ON doc.name_doc = dt.name_doc
                                        LEFT JOIN tag1  ON dt.ID_tag = tag1.ID WHERE (folder_level_4 = "' . $cellValue3 . '") ORDER BY BINARY folder_level_5';
                                        $result4 = folder_level_5Query($conn, $query4);
                                         echo  "Сформировали запрос $query4";
                                        if (mysqli_num_rows($result4) > 0) {
                                    
                                            while ($row4 = mysqli_fetch_array($result4, MYSQLI_NUM)) {
                                                foreach ($row4 as $cellValue4) {
                                                    if (!empty($cellValue4) && $cellValue4 !== '-') {
                                                        echo  "Сформировали запрос $cellValue4";
                                                    echo '<div class="row dropdown-border" style="padding: 1px 1px;">';
                                                        echo '<div class="p-0 col-md-12">';
                                                            echo '<ul class="list-unstyled components overtext">';
                                                                echo '<li>';
                                                                    echo '<div class=" nav-link text-black "  name="folder_level_5">';
                                                                        echo '<label class="tag-checkbox tag-checkbox-label" id="folder_level_55" data-toggle="collapse" aria-expanded="false" for="checkbox5_' . htmlspecialchars($cellValue4, ENT_QUOTES) . '">';
                                                                        echo '<ion-icon name="folder"></ion-icon>&nbsp;';
                                                                        echo '<input class="radio" type="radio" name="folder_level_5" value="' . htmlspecialchars($cellValue4, ENT_QUOTES) . '" id="checkbox5_' . htmlspecialchars($cellValue4, ENT_QUOTES) . '">';
                                                                        echo htmlspecialchars($cellValue4, ENT_QUOTES);
                                                                        echo '</label>';
                                                                    echo '</div>';
                                                                echo '</li>';
                                                            echo '</ul>';
                                                        echo '</div>';
                                                    echo '</div>';
                                                    }
                                                }
                                            }
                                        }
                                    }
                                    Dep_nameDropdown($conn);
                                    ?>
                                </div>
                                <div class=" p-3 mb-2 chess">
                                    <h5 class="overtext mb-2 mt-2 otstupmen">Расширение</h5>
                                    <?php
                                    function typeQuery($conn, $query) {
                                        $stmt5 = mysqli_prepare($conn, $query);
                                        mysqli_stmt_execute($stmt5);
                                        return mysqli_stmt_get_result($stmt5);
                                    }

                                    function rendertypeDropdown($conn) {
                                        $query = 'SELECT doc.type FROM doc ';
                                        $result = typeQuery($conn, $query);
                                        if (mysqli_num_rows($result) > 0) {
                                            echo'<input type="hidden" name="type" value="" />';
                                            $displayedValues = array(); // Array to store displayed values
                                            while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
                                                foreach ($row as $cellValue) {
                                                    if (!empty($cellValue) && !in_array($cellValue, $displayedValues)) {
                                                        echo '<label class="tag-checkbox mb-2  ms-2 me-2" for="checkbox_' . htmlspecialchars($cellValue, ENT_QUOTES) . '">';
                                                        echo '<input class="checkbox" type="checkbox" name="type[]" value="' . htmlspecialchars($cellValue, ENT_QUOTES) . '" id="checkbox_' . htmlspecialchars($cellValue, ENT_QUOTES) . '">';
                                                        echo '<label for="checkbox_' . htmlspecialchars($cellValue, ENT_QUOTES) . '">';
                                                        echo htmlspecialchars($cellValue, ENT_QUOTES);
                                                        echo '</label>';
                                                        echo '</label>';
                                                        $displayedValues[] = $cellValue; // Add the displayed value to the array
                                                    }
                                                }
                                            }
                                        } 
                                    }
                                    rendertypeDropdown($conn);
                                    ?>
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
                                        Добавить документ 
                                        </button>
                                    </div>
                                    <!-- Модальное окно -->
                                 
                                </div>
                            </form>
                        </div>
                    </nav>
                </div>
            </div>
   
            <div class="col-md-9 mb-4">
                <div style="padding-right: calc(var(--bs-gutter-x) * .5); padding-left: calc(var(--bs-gutter-x) * .5);">
                    <div class="row ajaxout p-1 bg-light"  style=" border-radius: 15px;">
                    
                    
                     <script>
                        // Асинхронная функция для отправки формы
                        async function requestr() {
                            try {
                                const formName = getFormName(); // Получаем имя активной формы
                                radioclear(event, formName); // Перемещаем вызов функции сюда
                                var formData = new FormData(document.getElementById("myForm"));
                                for (var pair of formData.entries()) { // Проверка formData, если это необходимо
                                    console.log(pair[0] + ', ' + pair[1]);
                                }
                                let res = await fetch("doci_scr.php", {
                                    method: 'POST',
                                    body: formData,
                                });
                                if (res.ok) {
                                    let text = await res.text();
                                    console.log("Успешный ответ:", text);
                                    let block = document.querySelector(".ajaxout");
                                    block.innerHTML = text;
                                    updateClassBasedOnScreenSize();
                                    saveFormData();
                                    loadFormData();
                                    ClearFormData1();
                                    adddeleteCard(block);
                                    добавитьСлушателейОбновления(block);
                                } else {
                                    console.error("Ошибка запроса:", res.status, res.statusText);
                                }
                            } catch (error) {
                                console.error("Ошибка:", error);
                            }
                        }
                        function adddeleteCard(block) {
                            block.querySelectorAll('.btn-danger').forEach(button => {
                                button.onclick = function () {
                                    let name_doc = button.getAttribute('data-name-doc');
                                    let ID_tag = button.getAttribute('data-id-tag');
                                    let Dep_name = button.getAttribute('data-dep-name'); // Добавляем атрибут для получения Dep_name
                                    deleteCard(this, name_doc, ID_tag, Dep_name);
                                };
                            });
                        }
                        // Функция для добавления слушателей событий удаления
                        async function deleteCard(buttonElement, name_doc, ID_tag, Dep_name) {
                            if (!confirm('Вы уверены, что хотите удалить этот документ?')) {
                                return; // Остановка, если пользователь отменил действие
                            }
                            const formData = new FormData();
                            formData.append('name_doc', name_doc);
                            formData.append('ID_tag', ID_tag);
                            formData.append('Dep_name', Dep_name); // Убедитесь, что 'Dep_name' добавлен
                            formData.append('action', 'delete'); // Дополнительный параметр для определения действия серверного скрипта

                            try {
                                let response = await fetch("doci_scr.php", {
                                    method: 'POST',
                                    body: formData
                                });
                                if (response.ok) {
                                    let text = await response.text();
                                    console.log("Успешный ответ:", text);
                                    buttonElement.closest('.myDiv').remove();
                                } else {
                                    console.error("Ошибка запроса:", response.status, response.statusText);
                                }
                            } catch (error) {
                                console.error("Ошибка:", error);
                            }
                        }

                        // Функция для добавления слушателей событий обновления
                        // Функция для добавления слушателей событий обновления
                        function добавитьСлушателейОбновления(block) {
                            block.querySelectorAll('.btn-update').forEach(button => {
                                button.onclick = function() {
                                    // Получаем доступ к форме внутри того же модального окна
                                    const form = button.closest('.modal').querySelector('form');
                        
                                    // Получаем значения из полей в контексте этой формы
                                    let old_name_Doc = form.querySelector('input[name="old_name_doc"]').value;
                                    let nameDoc = form.querySelector('input[name="name_doc"]').value;
                                    let docDate = form.querySelector('input[name="doc_date"]').value; // Используем атрибут name
                                    let fileLink = form.querySelector('input[name="file_link"]').value;
                                    let fileType = form.querySelector('input[name="type"]').value;

                                    // Обновляем data-атрибуты кнопки
                                    button.dataset.updateold_name_Doc = old_name_Doc;
                                    button.dataset.updateNameDoc = nameDoc;
                                    button.dataset.updateDocDate = docDate;
                                    button.dataset.updateFileLink = fileLink;
                                    button.dataset.updateType = fileType;

                                    // Отображаем окно подтверждения
                                    if (confirm('Вы уверены, что хотите обновить этот документ?')) {
                                        обновитьКарточку(old_name_Doc, nameDoc, docDate, fileLink, fileType);
                                    }
                                };
                            });
                        }

                        async function обновитьКарточку(old_name_Doc, nameDoc, docDate, fileLink, fileType) {
                            const formData1 = new FormData();
                            formData1.append('old_name_doc', old_name_Doc);
                            formData1.append('name_doc', nameDoc);
                            formData1.append('doc_date', docDate);
                            formData1.append('file_link', fileLink);
                            formData1.append('type', fileType);
                            formData1.append('action', 'update');

                            try {
                                let response = await fetch("doci_scr.php", {
                                    method: 'POST',
                                    body: formData1
                                });
                                if (response.ok) {
                                    let text = await response.text();
                                    console.log("Успешный ответ:", text);
                                    // Можно добавить логику для обновления интерфейса пользователя
                                } else {
                                    console.error("Ошибка запроса:", response.status, response.statusText);
                                }
                            } catch (error) {
                                console.error("Ошибка:", error);
                            }
                        }
                        // При готовности документа
                        $(document).ready(function() {
                            requestr();
                            $("#myForm").on("input", "input", requestr);
                        });
                    </script>
                    </div>
                   
                    <script async src="./js/scripts.js?vers=99" ></script>
                </div>
            </div>
        </div>
    </div>
</main>
