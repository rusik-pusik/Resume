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
                          <form action="doci.php?page=doci_ok" name="Modal_doci" method="POST" id="doc" enctype="multipart/form-data">
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
                                                        <div class="position-sticky" style="top:-100rem;">
                                                            <nav id="sidebar"class="bg-primary text-white">
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
                                                                            <div class="col-md-6" style="border: 2px solid white; padding: 10px; border-radius: 15px;">
                                                                                <div class="form-group" style="overflow: hidden;">
                                                                                    <label for="fileInput" class="overtext otstupmen">Внесите данные файла</label>
                                                                                    <input type="file" class="form-control-file mb-3 overtext" style="font-weight: bold; display: inline-block; max-width: 100%; box-sizing: border-box;" id="fileInput" name="fileInput" onchange="showFileInfo()">
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
                                                                            <style>
                                                                                .bg-primary1 {
                                                                                    background-color: #007bff !important;
                                                                                    color: white !important;
                                                                                }
                                                                            </style>

                                                                            <div class="mb-1">
                                                                                <div class="" style="height:50%">
                                                                                    <div class="dropdown-border pb-1">
                                                                                        <ul class="list-unstyled components overtext">
                                                                                            <li>
                                                                                                <label class="nav-link text-black tag-checkbox tag-checkbox-label" for="myCheckbox" id="labelMyCheckbox">
                                                                                                    <input class="form-check-input" type="checkbox" id="myCheckbox" style="height:50%" onclick="activateForm()">
                                                                                                    Добавить подпапку
                                                                                                </label>
                                                                                            </li>
                                                                                        </ul>
                                                                                    </div>
                                                                                    <div class="form-group mb-2">
                                                                                        <input type="text" class="form-control" id="myInput" name='Down_folder' placeholder="Введите имя папки" oninput="checkInput()" disabled>
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
                                                                            $counter0 = time(); // Use current time for generating unique ID
                                                                            while ($row0 = mysqli_fetch_assoc($result0)) {
                                                                                $depName = $row0['Dep_name'];
                                                                                if (!empty($depName) && $depName !== '-') {
                                                                                    $uni01 = 'dep_name_dropdown_' . $counter0; // Use prefix for ID to increase uniqueness
                                                                                    $cellValueHtml = htmlspecialchars($depName, ENT_QUOTES);
                                                                    
                                                                                    ob_start();
                                                                                    renderfolder_level_111Dropdown($conn, $depName);
                                                                                    $dropdownContent = ob_get_clean();
                                                                    
                                                                                    $buttonHtml = '';
                                                                                    $colSize = 'col-md-12';
                                                                                    if (trim($dropdownContent) !== '') {
                                                                                        $buttonHtml = <<<HTML
                                                                                            <div class="col-md-2 custom-button-container">
                                                                                                <button class="btn btn-primary dropdown-toggle h-100 tag-checkbox w-100 custom-button" type="button" data-toggle="collapse" data-target="#$uni01" aria-expanded="false">
                                                                                                </button>
                                                                                            </div>
                                                                                        HTML;
                                                                                        $colSize = 'col-md-10';
                                                                                    }
                                                                    
                                                                                    $dropdownItem = <<<HTML
                                                                                        <div class="pr-1 row custom-row w-100">
                                                                                            <div class="dropdown-border dep-container" data-dep-name="$cellValueHtml" style="padding: 1px 1px;">
                                                                                                <div class="pr-1 d-flex align-items-center custom-flex-container">
                                                                                                    <div class="$colSize d-flex align-items-center">
                                                                                                        <label class="tag-checkbox tag-checkbox1 tag-checkbox-label m-0 d-flex align-items-center w-100" id="Dep_name11_$counter0" for="checkbox0_$uni01">
                                                                                                            <input class="checkbox dep-checkbox" type="checkbox" name="Dep_name[]" value="$cellValueHtml" id="checkbox0_$uni01" disabled>
                                                                                                            <span class="ml-2"><ion-icon name="folder"></ion-icon>&nbsp;$cellValueHtml</span>
                                                                                                        </label>
                                                                                                    </div>
                                                                                                    $buttonHtml
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <ul class="collapse list-unstyled pageSubmenu1 dep-forms" id="$uni01" style="margin-bottom: 0px;">
                                                                                            $dropdownContent
                                                                                        </ul>
                                                                                    HTML;
                                                                    
                                                                                    echo $dropdownItem;
                                                                                    $counter0++; // Increment for subsequent unique ID
                                                                                }
                                                                            }
                                                                        }
                                                                    }
                                                                        function folder_level_111Query($conn, $query01) {
                                                                            $stmt01 = mysqli_prepare($conn, $query01);
                                                                            mysqli_stmt_execute($stmt01);
                                                                            return mysqli_stmt_get_result($stmt01);
                                                                        }
                                                                        
                                                                        function renderfolder_level_111Dropdown($conn, $depName) {
                                                                            $query01 = "SELECT 
                                                                                        dt.Dep_name, 
                                                                                        t.folder_level_1, 
                                                                                        MIN(t.ID) AS ID 
                                                                                        FROM doc d
                                                                                        LEFT JOIN doc_tag dt ON d.name_doc = dt.name_doc
                                                                                        LEFT JOIN tag1 t ON dt.ID_tag = t.ID
                                                                                        WHERE 
                                                                                            COALESCE(t.folder_level_2, '') = '' 
                                                                                        AND COALESCE(t.folder_level_3, '') = '' 
                                                                                        AND COALESCE(t.folder_level_4, '') = '' 
                                                                                        AND COALESCE(t.folder_level_5, '') = '' 
                                                                                        AND dt.Dep_name = '$depName'
                                                                                        GROUP BY t.folder_level_1 
                                                                                        ORDER BY t.folder_level_1";
                                                                        
                                                                            $result01 = folder_level_111Query($conn, $query01);
                                                                        
                                                                            if (mysqli_num_rows($result01) > 0) {
                                                                                $counter01 = 1;
                                                                        
                                                                                while ($row01 = mysqli_fetch_assoc($result01)) {
                                                                                    $folderLevel1 = $row01['folder_level_1'];
                                                                                    $id01 = $row01['ID'];
                                                                                    $depName1 = $row01['Dep_name'];
                                                                                    if (!empty($folderLevel1) && $folderLevel1 !== '-') {
                                                                                        $checkboxId01 = 'checkbox11_' . $counter01 . '_' . uniqid();
                                                                                        $combinedValue = $id01 . '|' . $depName1;
                                                                                        $folderLevel1Html = htmlspecialchars($folderLevel1, ENT_QUOTES);
                                                                        
                                                                                        ob_start();
                                                                                        renderfolder_level_22Dropdown($conn, $folderLevel1, $depName);
                                                                                        $dropdownContent = ob_get_clean();
                                                                        
                                                                                        $buttonHtml = '';
                                                                                        $colSize = 'col-md-12';
                                                                                        if (trim($dropdownContent) !== '') {
                                                                                            $buttonHtml = <<<HTML
                                                                                            <div class="col-md-2 p-0">
                                                                                                <button class="btn btn-primary dropdown-toggle tag-checkbox-label tag-checkbox w-100 custom-button" type="button" data-toggle="collapse" data-target="#$checkboxId01" aria-expanded="false">
                                                                                                    <!-- Ваш контент кнопки -->
                                                                                                </button>
                                                                                            </div>
                                                                                            HTML;
                                                                                            $colSize = 'col-md-10';
                                                                                        }
                                                                        
                                                                                        $dropdownItem = <<<HTML
                                                                                            <div class="pr-1 row custom-row w-100">
                                                                                                <div class="dropdown-border folder-container" data-dep-name="$depName" style="padding: 1px 1px;">
                                                                                                    <div class="pr-1 d-flex align-items-center custom-flex-container">
                                                                                                        <div class="$colSize d-flex align-items-center">
                                                                                                            <label class="tag-checkbox tag-checkbox1 tag-checkbox-label m-0 d-flex align-items-center w-100" id="folder_level_111_$counter01" for="checkbox11_$checkboxId01">
                                                                                                                <input class="checkbox" type="checkbox" name="folder_level_1[]" value="$combinedValue" id="checkbox11_$checkboxId01">
                                                                                                                <span class="ml-2"><ion-icon name="folder"></ion-icon>&nbsp;$folderLevel1Html</span>
                                                                                                            </label>
                                                                                                        </div>
                                                                                                        $buttonHtml
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <ul class="collapse list-unstyled pageSubmenu1 dep-forms" id="$checkboxId01" style="margin-bottom: 0px;">
                                                                                                $dropdownContent
                                                                                            </ul>
                                                                                        HTML;
                                                                        
                                                                                        echo $dropdownItem;
                                                                                        $counter01++;
                                                                                    }
                                                                                }
                                                                            }
                                                                        }
                                                                        
                                                                        function folder_level_22Query($conn, $query02) {
                                                                            $stmt02 = mysqli_prepare($conn, $query02);
                                                                            mysqli_stmt_execute($stmt02);
                                                                            return mysqli_stmt_get_result($stmt02);
                                                                        }
                                                                        
                                                                        function renderfolder_level_22Dropdown($conn, $folderLevel1, $depName) {
                                                                            $query02 = "SELECT 
                                                                                        dt.Dep_name, 
                                                                                        t.folder_level_2, 
                                                                                        MIN(t.ID) AS ID 
                                                                                        FROM doc d
                                                                                        LEFT JOIN doc_tag dt ON d.name_doc = dt.name_doc
                                                                                        LEFT JOIN tag1 t ON dt.ID_tag = t.ID
                                                                                        WHERE 
                                                                                            t.folder_level_1 = '$folderLevel1' 
                                                                                        AND COALESCE(t.folder_level_2, '') != '' 
                                                                                        AND COALESCE(t.folder_level_3, '') = '' 
                                                                                        AND COALESCE(t.folder_level_4, '') = '' 
                                                                                        AND COALESCE(t.folder_level_5, '') = '' 
                                                                                        AND dt.Dep_name = '$depName'
                                                                                        GROUP BY t.folder_level_2 
                                                                                        ORDER BY t.folder_level_2";
                                                                        
                                                                            $result02 = folder_level_22Query($conn, $query02);
                                                                        
                                                                            if (mysqli_num_rows($result02) > 0) {
                                                                                $counter02 = 1;
                                                                        
                                                                                while ($row02 = mysqli_fetch_assoc($result02)) {
                                                                                    $folderLevel2 = $row02['folder_level_2'];
                                                                                    $id02 = $row02['ID'];
                                                                                    $depName2 = $row02['Dep_name'];
                                                                                    if (!empty($folderLevel2) && $folderLevel2 !== '-') {
                                                                                        $checkboxId02 = 'checkbox22_' . $counter02 . '_' . uniqid();
                                                                                        $combinedValue = $id02 . '|' . $depName2;
                                                                                        $folderLevel2Html = htmlspecialchars($folderLevel2, ENT_QUOTES);
                                                                        
                                                                                        ob_start();
                                                                                        renderfolder_level_33Dropdown($conn, $folderLevel2, $depName);
                                                                                        $dropdownContent = ob_get_clean();
                                                                        
                                                                                        $buttonHtml = '';
                                                                                        $colSize = 'col-md-12';
                                                                                        if (trim($dropdownContent) !== '') {
                                                                                            $buttonHtml = <<<HTML
                                                                                                <div class="col-md-2 p-0">
                                                                                                    <button class="btn btn-primary dropdown-toggle tag-checkbox-label tag-checkbox w-100 custom-button" type="button" data-toggle="collapse" data-target="#$checkboxId02" aria-expanded="false">
                                                                                                    </button>
                                                                                                </div>
                                                                                            HTML;
                                                                                            $colSize = 'col-md-10';
                                                                                        }
                                                                        
                                                                                        $dropdownItem = <<<HTML
                                                                                            <div class="pr-1 row custom-row w-100">
                                                                                                <div class="dropdown-border folder-container" data-dep-name="$depName" style="padding: 1px 1px;">
                                                                                                    <div class="pr-1 d-flex align-items-center custom-flex-container">
                                                                                                        <div class="$colSize  d-flex align-items-center">
                                                                                                            <label class="tag-checkbox tag-checkbox1 tag-checkbox-label m-0 d-flex align-items-center w-100" id="folder_level_222_$counter02" for="checkbox22_$checkboxId02">
                                                                                                                <input class="checkbox" type="checkbox" name="folder_level_2[]" value="$combinedValue" id="checkbox22_$checkboxId02">
                                                                                                                <span class="ml-2"><ion-icon name="folder"></ion-icon>&nbsp;$folderLevel2Html</span>
                                                                                                            </label>
                                                                                                        </div>
                                                                                                        $buttonHtml
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <ul class="collapse list-unstyled pageSubmenu1 dep-forms" id="$checkboxId02" style="margin-bottom: 0px;">
                                                                                                $dropdownContent
                                                                                            </ul>
                                                                                        HTML;
                                                                        
                                                                                        echo $dropdownItem;
                                                                                        $counter02++;
                                                                                    }
                                                                                }
                                                                            }
                                                                        }
                                                                        function folder_level_33Query($conn, $query22) {
                                                                            $stmt22 = mysqli_prepare($conn, $query22);
                                                                            mysqli_stmt_execute($stmt22);
                                                                            return mysqli_stmt_get_result($stmt22);
                                                                        }
                                                                        
                                                                        function renderfolder_level_33Dropdown($conn, $folderLevel2, $depName) {
                                                                            $folderLevel2 = mysqli_real_escape_string($conn, $folderLevel2);
                                                                            $query22 = "SELECT 
                                                                                        dt.Dep_name, 
                                                                                        folder_level_3, 
                                                                                        MIN(ID) AS ID 
                                                                                        FROM doc
                                                                                        LEFT JOIN doc_tag dt ON doc.name_doc = dt.name_doc
                                                                                        LEFT JOIN tag1 t ON dt.ID_tag = t.ID
                                                                                        WHERE 
                                                                                            folder_level_2 = '{$folderLevel2}' 
                                                                                        AND COALESCE(folder_level_4, '') = '' 
                                                                                        AND COALESCE(folder_level_5, '') = '' 
                                                                                        AND Dep_name = '{$depName}'
                                                                                        GROUP BY 
                                                                                            folder_level_3 
                                                                                        ORDER BY 
                                                                                            folder_level_3";
                                                                            $result22 = folder_level_33Query($conn, $query22);
                                                                        
                                                                            if (mysqli_num_rows($result22) > 0) {
                                                                                $counter22 = 1;
                                                                        
                                                                                while ($row22 = mysqli_fetch_assoc($result22)) {
                                                                                    $folderLevel3 = $row22['folder_level_3'];
                                                                                    $id22 = $row22['ID'];
                                                                                    $depName3 = $row22['Dep_name'];
                                                                                    if (!empty($folderLevel3) && $folderLevel3 !== '-') {
                                                                                        $checkboxId22 = 'checkbox33_' . $counter22 . '_' . uniqid();
                                                                                        $combinedValue2 = $id22 . '|' . $depName3;
                                                                                        $folderLevel3Html = htmlspecialchars($folderLevel3, ENT_QUOTES);
                                                                        
                                                                                        ob_start();
                                                                                        renderfolder_level_44Dropdown($conn, $folderLevel3, $depName);
                                                                                        $dropdownContent = ob_get_clean();
                                                                        
                                                                                        $buttonHtml = '';
                                                                                        $colSize = 'col-md-12';
                                                                                        if (trim($dropdownContent) !== '') {
                                                                                            $buttonHtml = <<<HTML
                                                                                                <div class="col-md-2 p-0">
                                                                                                    <button class="btn btn-primary dropdown-toggle tag-checkbox-label tag-checkbox w-100 custom-button" type="button" data-toggle="collapse" data-target="#$checkboxId22" aria-expanded="false">
                                                                                                    </button>
                                                                                                </div>
                                                                                            HTML;
                                                                                            $colSize = 'col-md-10';
                                                                                        }
                                                                        
                                                                                        $dropdownItem = <<<HTML
                                                                                            <div class="pr-1 row custom-row w-100">
                                                                                                <div class="dropdown-border folder-container" data-dep-name="$depName" style="padding: 1px 1px;">
                                                                                                    <div class="pr-1 d-flex align-items-center custom-flex-container">
                                                                                                        <div class="$colSize d-flex align-items-center">
                                                                                                            <label class="tag-checkbox tag-checkbox1 tag-checkbox-label m-0 d-flex align-items-center w-100" id="folder_level_333_$counter22" for="checkbox33_$checkboxId22">
                                                                                                                <input class="checkbox" type="checkbox" name="folder_level_3[]" value="$combinedValue2" id="checkbox33_$checkboxId22">
                                                                                                                <span class="ml-2"><ion-icon name="folder"></ion-icon>&nbsp;$folderLevel3Html</span>
                                                                                                            </label>
                                                                                                        </div>
                                                                                                        $buttonHtml
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <ul class="collapse list-unstyled pageSubmenu1 dep-forms" id="$checkboxId22" style="margin-bottom: 0px;">
                                                                                                $dropdownContent
                                                                                            </ul>
                                                                                        HTML;
                                                                        
                                                                                        echo $dropdownItem;
                                                                                        $counter22++;
                                                                                    }
                                                                                }
                                                                            }
                                                                        }
                                                                        
                                                                        function folder_level_44Query($conn, $query33) {
                                                                            $stmt33 = mysqli_prepare($conn, $query33);
                                                                            mysqli_stmt_execute($stmt33);
                                                                            return mysqli_stmt_get_result($stmt33);
                                                                        }
                                                                        
                                                                        function renderfolder_level_44Dropdown($conn, $folderLevel3, $depName) {
                                                                            $folderLevel3 = mysqli_real_escape_string($conn, $folderLevel3);
                                                                            $query33 = "SELECT 
                                                                                        dt.Dep_name, 
                                                                                        folder_level_4, 
                                                                                        MIN(ID) AS ID 
                                                                                        FROM doc
                                                                                        LEFT JOIN doc_tag dt ON doc.name_doc = dt.name_doc
                                                                                        LEFT JOIN tag1 t ON dt.ID_tag = t.ID
                                                                                        WHERE 
                                                                                            folder_level_3 = '{$folderLevel3}' 
                                                                                        AND COALESCE(folder_level_5, '') = '' 
                                                                                        AND Dep_name = '{$depName}'
                                                                                        GROUP BY 
                                                                                            folder_level_4 
                                                                                        ORDER BY 
                                                                                            folder_level_4";
                                                                            $result33 = folder_level_44Query($conn, $query33);
                                                                        
                                                                            if (mysqli_num_rows($result33) > 0) {
                                                                                $counter33 = 1;
                                                                        
                                                                                while ($row33 = mysqli_fetch_assoc($result33)) {
                                                                                    $folderLevel4 = $row33['folder_level_4'];
                                                                                    $id33 = $row33['ID'];
                                                                                    $depName4 = $row33['Dep_name'];
                                                                                    if (!empty($folderLevel4) && $folderLevel4 !== '-') {
                                                                                        $checkboxId33 = 'checkbox44_' . $counter33 . '_' . uniqid();
                                                                                        $combinedValue3 = $id33 . '|' . $depName4;
                                                                                        $folderLevel4Html = htmlspecialchars($folderLevel4, ENT_QUOTES);
                                                                        
                                                                                        ob_start();
                                                                                        renderfolder_level_55Dropdown($conn, $folderLevel4, $depName);
                                                                                        $dropdownContent = ob_get_clean();
                                                                        
                                                                                        $buttonHtml = '';
                                                                                        $colSize = 'col-md-12';
                                                                                        if (trim($dropdownContent) !== '') {
                                                                                            $buttonHtml = <<<HTML
                                                                                                <div class="col-md-2 p-0">
                                                                                                    <button class="btn btn-primary dropdown-toggle tag-checkbox-label tag-checkbox w-100 custom-button" type="button" data-toggle="collapse" data-target="#$checkboxId33" aria-expanded="false">
                                                                                                    </button>
                                                                                                </div>
                                                                                            HTML;
                                                                                            $colSize = 'col-md-10';
                                                                                        }
                                                                        
                                                                                        $dropdownItem = <<<HTML
                                                                                            <div class="pr-1 row custom-row w-100">
                                                                                                <div class="dropdown-border folder-container" data-dep-name="$depName" style="padding: 1px 1px;">
                                                                                                    <div class="pr-1 d-flex align-items-center custom-flex-container">
                                                                                                        <div class="$colSize custom-badge1 nav-link1 d-flex align-items-center">
                                                                                                            <label class="tag-checkbox tag-checkbox1 tag-checkbox-label m-0 d-flex align-items-center w-100" id="folder_level_444_$counter33" for="checkbox44_$checkboxId33">
                                                                                                                <input class="checkbox" type="checkbox" name="folder_level_4[]" value="$combinedValue3" id="checkbox44_$checkboxId33">
                                                                                                                <span class="ml-2"><ion-icon name="folder"></ion-icon>&nbsp;$folderLevel4Html</span>
                                                                                                            </label>
                                                                                                        </div>
                                                                                                        $buttonHtml
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <ul class="collapse list-unstyled pageSubmenu1 dep-forms" id="$checkboxId33" style="margin-bottom: 0px;">
                                                                                                $dropdownContent
                                                                                            </ul>
                                                                                        HTML;
                                                                        
                                                                                        echo $dropdownItem;
                                                                                        $counter33++;
                                                                                    }
                                                                                }
                                                                            }
                                                                        }
                                                                
                                                                        function folder_level_55Query($conn, $query44) {
                                                                            $stmt44 = mysqli_prepare($conn, $query44);
                                                                            mysqli_stmt_execute($stmt44);
                                                                            return mysqli_stmt_get_result($stmt44);
                                                                        }
                                                                        
                                                                        function renderfolder_level_55Dropdown($conn, $folderLevel4, $depName) {
                                                                            $folderLevel4 = mysqli_real_escape_string($conn, $folderLevel4);
                                                                            $query44 = "SELECT 
                                                                                        dt.Dep_name, 
                                                                                        folder_level_5, 
                                                                                        MIN(ID) AS ID 
                                                                                        FROM doc
                                                                                        LEFT JOIN doc_tag dt ON doc.name_doc = dt.name_doc
                                                                                        LEFT JOIN tag1 t ON dt.ID_tag = t.ID
                                                                                        WHERE 
                                                                                            folder_level_4 = '{$folderLevel4}' 
                                                                                        AND Dep_name = '{$depName}'
                                                                                        GROUP BY 
                                                                                            folder_level_5 
                                                                                        ORDER BY 
                                                                                            folder_level_5";
                                                                            $result44 = folder_level_55Query($conn, $query44);
                                                                        
                                                                            if (mysqli_num_rows($result44) > 0) {
                                                                                $counter44 = 1;
                                                                        
                                                                                while ($row44 = mysqli_fetch_assoc($result44)) {
                                                                                    $folderLevel5 = $row44['folder_level_5'];
                                                                                    $id44 = $row44['ID'];
                                                                                    $depName5 = $row44['Dep_name'];
                                                                                    if (!empty($folderLevel5) && $folderLevel5 !== '-') {
                                                                                        $checkboxId44 = 'checkbox55_' . $counter44 . '_' . uniqid();
                                                                                        $combinedValue4 = $id44 . '|' . $depName5;
                                                                                        $folderLevel5Html = htmlspecialchars($folderLevel5, ENT_QUOTES);
                                                                        
                                                                                        $buttonHtml = '';
                                                                                        $colSize = 'col-md-12';
                                                                        
                                                                                        $dropdownItem = <<<HTML
                                                                                            <div class="pr-1 row custom-row w-100">
                                                                                                <div class="dropdown-border folder-container" data-dep-name="$depName" style="padding: 1px 1px;">
                                                                                                    <div class="pr-1 d-flex align-items-center custom-flex-container">
                                                                                                        <div class="$colSize nav-link d-flex align-items-center">
                                                                                                            <label class="tag-checkbox tag-checkbox1 tag-checkbox-label m-0 d-flex align-items-center w-100" id="folder_level_555_$counter44" for="checkbox55_$checkboxId44">
                                                                                                                <input class="checkbox" type="checkbox" name="folder_level_5[]" value="$combinedValue4" id="checkbox55_$checkboxId44">
                                                                                                                <span class="ml-2"><ion-icon name="folder"></ion-icon>&nbsp;$folderLevel5Html</span>
                                                                                                            </label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        HTML;
                                                                        
                                                                                        echo $dropdownItem;
                                                                                        $counter44++;
                                                                                    }
                                                                                }
                                                                            }
                                                                        }
                                                                        Dep_name1Dropdown($conn);
                                                                        ?>
                                                                        <div class="otstupmen" style="width: 100%;">
                                                                            <input class="btn btn-primary" type="submit" name="Применить11" id="butt_apply" value="Опубликовать" style="width: 100%;">
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
                            <div class="chess mb-2">
                                <div class="btn-group-vertical position-sticky" style="width: 100%;height: 100%;   display: block;top: 2rem;">
                                    <input class="btn btn-primary" type="submit"  name="Сброс настроек" id="buttonClear" value="Сброс настроек"  onClick="window.location.reload();"></input>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


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
                                                    echo '<div class="nav-link1 text-black" name="Dep_name">';
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
                                                                        echo '<div class="nav-link1 text-black" name="Dep_name">';
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
                                        // echo $query;
                                        if($stmt = mysqli_prepare($conn, $query)){
                                            // Bind parameters for the prepared statement
                                            mysqli_stmt_bind_param($stmt, "s", $cellValue0);
                                            // echo $cellValue0;
                                            // Execute SQL query with the prepared statement
                                            mysqli_stmt_execute($stmt);
                                            $result = mysqli_stmt_get_result($stmt);
                                    
                                            if (mysqli_num_rows($result) > 0) {
                                                $counter = 1;
                                                
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    $folderLevel1 = $row['folder_level_1'];
                                                    $folderLevel1Id = $row['min_id'];
                                    
                                                    if (!empty($folderLevel1) && $folderLevel1 !== '-' && $folderLevel1 !== '') {
                                                        $uniqueId = 'checkbox1_' . $counter . '_' . uniqid();
                                                        
                                                        // Combine id and folderLevel1 in the value attribute
                                                        $combinedValue = $folderLevel1Id . '|' . $folderLevel1 . '|' . $uniqueId;
                                                        
                                                        echo <<<HTML
                                                            <div class="dropdown-border" style="padding: 1px 1px;">
                                                                <div class="p-0">
                                                                    <ul class="list-unstyled components overtext">
                                                                        <li>
                                                                            <div class="nav-link1 text-black " name="folder_level_1">
                                                                                <label class="tag-checkbox tag-checkbox-label" aria-expanded="false" data-target="#{$uniqueId}" for="checkbox1_{$combinedValue}">
                                                                                    <ion-icon name="folder"></ion-icon>&nbsp;
                                                                                    <input class="radio" type="radio" name="folder_level_1" value="{$combinedValue}" id="checkbox1_{$combinedValue}">
                                                                                    {$folderLevel1}
                                                                                </label>
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        HTML;
                                                        echo '<ul class="list-unstyled pageSubmenu1" id="' . $uniqueId . '" style="margin-bottom: 0px;">';
                                                        // The next function is a placeholder. It is not clear what it does from the given task.
                                                        renderfolder_level_2Dropdown($conn, $folderLevel1, $cellValue0); // Placeholder function
                                                        echo '</ul>';
                                                        $counter++;
                                                    }
                                                }
                                            }
                                    
                                            // Close the statement
                                            mysqli_stmt_close($stmt);
                                        }
                                    }
                                    function folder_level_2Query($conn, $query1, $folderLevel1, $cellValue0) {
                                        $stmt1 = mysqli_prepare($conn, $query1);
                                        mysqli_stmt_bind_param($stmt1, 'ss', $folderLevel1, $cellValue0); // Bind parameter
                                        mysqli_stmt_execute($stmt1);
                                        return mysqli_stmt_get_result($stmt1);
                                    }
                                    
                                    function renderfolder_level_2Dropdown($conn, $folderLevel1, $cellValue0) {
                                        $query1 = 'SELECT DISTINCT folder_level_2, MIN(ID) as min_id
                                                FROM doc
                                                LEFT JOIN doc_tag dt ON doc.name_doc = dt.name_doc
                                                LEFT JOIN tag1 ON dt.ID_tag = tag1.ID 
                                                WHERE folder_level_1 = ? AND dt.Dep_name = ? AND doc.name_doc IS NOT NULL AND doc.name_doc <> ""
                                                GROUP BY folder_level_2
                                                ORDER BY BINARY folder_level_2';
                                        $result1 = folder_level_2Query($conn, $query1, $folderLevel1, $cellValue0);
                                    
                                        if (mysqli_num_rows($result1) > 0) {
                                            $counter1 = 1; // Initialize counter for unique IDs
                                    
                                            while ($row1 = mysqli_fetch_assoc($result1)) {
                                                $folderLevel2 = $row1['folder_level_2'];
                                                $folderLevel2Id = $row1['min_id'];
                                    
                                                if (!empty($folderLevel2) && $folderLevel2 !== '-' && $folderLevel2 !== '') {
                                                    $checkboxId = 'checkbox2_' . $counter1 . '_' . uniqid(); // Generate unique ID for checkbox
                                                    
                                                    // Combine id and folderLevel2 in the value attribute
                                                    $combinedValue = $folderLevel2Id . '|' . $folderLevel2 . '|' . $checkboxId;
                                    
                                                    echo <<<HTML
                                                        <div class="dropdown-border" style="padding: 1px 1px;">
                                                            <div class="p-0">
                                                                <ul class="list-unstyled components overtext">
                                                                    <li>
                                                                        <div class="nav-link1 text-black" name="folder_level_2">
                                                                            <label class="tag-checkbox tag-checkbox-label" id="folder_level_22" data-toggle="collapse" aria-expanded="false" data-target="#{$checkboxId}" for="checkbox2_{$combinedValue}">
                                                                                <ion-icon name="folder"></ion-icon>&nbsp;
                                                                                <input class="radio" type="radio" name="folder_level_2" value="{$combinedValue}" id="checkbox2_{$combinedValue}">
                                                                                {$folderLevel2}
                                                                            </label>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    HTML;
                                                    echo '<ul class="collapse list-unstyled pageSubmenu1" id="' . $checkboxId . '" style="margin-bottom: 0px;">';
                                                    renderfolder_level_3Dropdown($conn, $folderLevel2, $cellValue0); // Pass $folderLevel2 to the next function
                                                    echo '</ul>';
                                                    $counter1++;
                                                }
                                            }
                                        }
                                    }
                                    
                                    function folder_level_3Query($conn, $query2, $folderLevel2, $cellValue0) {
                                        $stmt2 = mysqli_prepare($conn, $query2);
                                        mysqli_stmt_bind_param($stmt2, 'ss', $folderLevel2, $cellValue0); // Bind parameter
                                        mysqli_stmt_execute($stmt2);
                                        return mysqli_stmt_get_result($stmt2);
                                    }
                                    
                                    function renderfolder_level_3Dropdown($conn, $folderLevel2, $cellValue0) {
                                        $query2 = 'SELECT DISTINCT folder_level_3, MIN(ID) as min_id
                                                FROM doc
                                                LEFT JOIN doc_tag dt ON doc.name_doc = dt.name_doc
                                                LEFT JOIN tag1 ON dt.ID_tag = tag1.ID 
                                                WHERE folder_level_2 = ? AND dt.Dep_name = ? 
                                                AND doc.name_doc IS NOT NULL 
                                                AND doc.name_doc <> "" 
                                                GROUP BY folder_level_3
                                                ORDER BY BINARY folder_level_3';
                                    
                                        $result2 = folder_level_3Query($conn, $query2, $folderLevel2, $cellValue0);
                                    
                                        if (mysqli_num_rows($result2) > 0) {
                                            $counter2 = 1; // Initialize counter for unique IDs
                                    
                                            while ($row2 = mysqli_fetch_assoc($result2)) {
                                                $folderLevel3 = $row2['folder_level_3'];
                                                $folderLevel3Id = $row2['min_id'];
                                    
                                                if (!empty($folderLevel3) && $folderLevel3 !== '-' && $folderLevel3 !== '') {
                                                    $checkboxId1 = 'checkbox3_' . $counter2 . '_' . uniqid(); // Generate unique ID for checkbox
                                                    
                                                    // Combine id and folderLevel3 in the value attribute
                                                    $combinedValue = $folderLevel3Id . '|' . $folderLevel3 . '|' . $checkboxId1;
                                    
                                                    echo <<<HTML
                                                        <div class="dropdown-border" style="padding: 1px 1px;">
                                                            <div class="p-0">
                                                                <ul class="list-unstyled components overtext">
                                                                    <li>
                                                                        <div class="nav-link1 text-black" name="folder_level_3">
                                                                            <label class="tag-checkbox tag-checkbox-label" id="folder_level_33" data-toggle="collapse" aria-expanded="false" data-target="#{$checkboxId1}" for="checkbox3_{$combinedValue}">
                                                                                <ion-icon name="folder"></ion-icon>&nbsp;
                                                                                <input class="radio" type="radio" name="folder_level_3" value="{$combinedValue}" id="checkbox3_{$combinedValue}">
                                                                                {$folderLevel3}
                                                                            </label>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    HTML;
                                                    echo '<ul class="collapse list-unstyled pageSubmenu2" id="' . $checkboxId1 . '" style="margin-bottom: 0px;">';
                                                    renderfolder_level_4Dropdown($conn, $folderLevel3,  $cellValue0); // Pass $folderLevel3 to the next function
                                                    echo '</ul>';
                                                    $counter2++;
                                                }
                                            }
                                        }
                                    }
                                    

                                    function folder_level_4Query($conn, $query3, $folderLevel3, $cellValue0) {
                                        $stmt3 = mysqli_prepare($conn, $query3);
                                        mysqli_stmt_bind_param($stmt3, 'ss', $folderLevel3, $cellValue0); // Bind parameter
                                        mysqli_stmt_execute($stmt3);
                                        return mysqli_stmt_get_result($stmt3);
                                    }
                                    
                                    function renderfolder_level_4Dropdown($conn, $folderLevel3, $cellValue0) {
                                        $query3 = 'SELECT DISTINCT folder_level_4, MIN(ID) as min_id
                                                FROM doc
                                                LEFT JOIN doc_tag dt ON doc.name_doc = dt.name_doc
                                                LEFT JOIN tag1 ON dt.ID_tag = tag1.ID 
                                                WHERE folder_level_3 = ? AND dt.Dep_name = ? 
                                                AND doc.name_doc IS NOT NULL 
                                                AND doc.name_doc <> "" 
                                                GROUP BY folder_level_4
                                                ORDER BY BINARY folder_level_4';
                                        
                                        $result3 = folder_level_4Query($conn, $query3, $folderLevel3, $cellValue0);
                                        
                                        if (mysqli_num_rows($result3) > 0) {
                                            $counter3 = 1; // Initialize counter for unique IDs
                                    
                                            while ($row3 = mysqli_fetch_assoc($result3)) {
                                                $folderLevel4 = $row3['folder_level_4'];
                                                $folderLevel4Id = $row3['min_id'];
                                    
                                                if (!empty($folderLevel4) && $folderLevel4 !== '' && $folderLevel4 !== '-') {
                                                    $checkboxId2 = 'checkbox4_' . $counter3 . '_' . uniqid(); // Generate unique ID for checkbox
                                                    
                                                    // Combine id and folderLevel4 in the value attribute
                                                    $combinedValue = $folderLevel4Id . '|' . $folderLevel4 . '|' . $checkboxId2;
                                    
                                                    echo <<<HTML
                                                        <div class="dropdown-border" style="padding: 1px 1px;">
                                                            <div class="p-0">
                                                                <ul class="list-unstyled components overtext">
                                                                    <li>
                                                                        <div class="nav-link1 text-black" name="folder_level_4">
                                                                            <label class="tag-checkbox tag-checkbox-label" id="folder_level_44" data-toggle="collapse" aria-expanded="false" data-target="#{$checkboxId2}" for="checkbox4_{$combinedValue}">
                                                                                <ion-icon name="folder"></ion-icon>&nbsp;
                                                                                <input class="radio" type="radio" name="folder_level_4" value="{$combinedValue}" id="checkbox4_{$combinedValue}">
                                                                                {$folderLevel4}
                                                                            </label>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    HTML;
                                                    echo '<ul class="collapse list-unstyled pageSubmenu2" id="' . $checkboxId2 . '" style="margin-bottom: 0px;">';
                                                    renderfolder_level_5Dropdown($conn, $folderLevel4, $cellValue0); // Pass $folderLevel4 to the next function
                                                    echo '</ul>';
                                                    $counter3++;
                                                }
                                            }
                                        }
                                    }
                                    function folder_level_5Query($conn, $query4, $folderLevel4, $cellValue0) {
                                        $stmt4 = mysqli_prepare($conn, $query4);
                                        mysqli_stmt_bind_param($stmt4, 'ss', $folderLevel4, $cellValue0); // Bind parameter
                                        mysqli_stmt_execute($stmt4);
                                        return mysqli_stmt_get_result($stmt4);
                                    }
                                    
                                    function renderfolder_level_5Dropdown($conn, $folderLevel4, $cellValue0) {
                                        $query4 = 'SELECT DISTINCT tag1.folder_level_5, MIN(ID) as min_id
                                                FROM doc
                                                LEFT JOIN doc_tag dt ON doc.name_doc = dt.name_doc
                                                LEFT JOIN tag1 ON dt.ID_tag = tag1.ID 
                                                WHERE folder_level_4 = ? AND dt.Dep_name = ? 
                                                AND doc.name_doc IS NOT NULL 
                                                AND doc.name_doc <> ""  
                                                GROUP BY folder_level_5
                                                ORDER BY BINARY folder_level_5';
                                    
                                        $result4 = folder_level_5Query($conn, $query4, $folderLevel4, $cellValue0);
                                        // echo "Сформировали запрос с folder_level_4 = $cellValue3";
                                    
                                        if (mysqli_num_rows($result4) > 0) {
                                            while ($row4 = mysqli_fetch_assoc($result4)) {
                                                $folderLevel5 = $row4['folder_level_5'];
                                                $folderLevel5Id = $row4['min_id'];
                                    
                                                if (!empty($folderLevel5) && $folderLevel5 !== '-') {
                                                    $escapedValue4 = htmlspecialchars($folderLevel5, ENT_QUOTES);
                                                    // echo "Сформировали запрос $escapedValue4";
                                    
                                                    // Combine id and folderLevel5 in the value attribute
                                                    $combinedValue = $folderLevel5Id . '|' . $folderLevel5 . '|' . $escapedValue4;
                                    
                                                    echo <<<HTML
                                                        <div class="row dropdown-border" style="padding: 1px 1px;">
                                                            <div class="p-0 col-md-12">
                                                                <ul class="list-unstyled components overtext">
                                                                    <li>
                                                                        <div class="nav-link1 text-black" name="folder_level_5">
                                                                            <label class="tag-checkbox tag-checkbox-label" id="folder_level_55" data-toggle="collapse" aria-expanded="false" for="checkbox5_{$combinedValue}">
                                                                                <ion-icon name="folder"></ion-icon>&nbsp;
                                                                                <input class="radio" type="radio" name="folder_level_5" value="{$combinedValue}" id="checkbox5_{$combinedValue}">
                                                                                {$folderLevel5}
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
                                        <div class="btn-group-vertical position-sticky" style="width: 100%;  display: block;top: 2rem;">
                                            <input type="text" id="airdatepicker" style="padding: 10px 20px;"name="doc_date[]" class="form-control mb-2" placeholder="Выберите дату внесения информации" onchange ='alert("changed");'>
                                        </div>
                                    </label>
                                    <div class="chess mb-2">
                                        <div class="btn-group-vertical position-sticky" style="width: 100%;  display: block;top: 2rem;">
                                            <input class="btn btn-primary" type="submit"  name="Сброс настроек" id="buttonClear" value="Сброс настроек"  onClick="window.location.reload();"></input>
                                        </div>
                                    </div>
                                    <?php if (isset($_SESSION['user'])): ?>
                                        <div class="chess mb-2">
                                            <button type="button" class="btn btn-primary session-btn" data-bs-toggle="modal" href="#exampleModalToggle" data-bs-target="#exampleModalToggle" style="width: 100%; display: block;top: 2rem;">
                                                Добавить документ 
                                            </button>
                                        </div>
                                    <?php endif; ?>
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
                                    adddeleteCard1(block);
                                    добавитьСлушателейОбновления(block);
                                } else {
                                    console.error("Ошибка запроса:", res.status, res.statusText);
                                }
                            } catch (error) {
                                console.error("Ошибка:", error);
                            }
                        }   
                        function adddeleteCard(block) {
                            block.querySelectorAll('.btn-danger1').forEach(button => {
                                button.onclick = function () {
                                    let name_doc = button.getAttribute('data-name-doc');
                                    let ID_tag = button.getAttribute('data-id-tag');
                                    let Dep_name = button.getAttribute('data-dep-name'); // Добавляем атрибут для получения Dep_name
                                    deleteCard(this, name_doc, ID_tag, Dep_name);
                                };
                            });
                        }
                        function adddeleteCard1(block) {
                            block.querySelectorAll('.btn-danger10').forEach(button => {
                                button.onclick = function () {
                                    let name_doc = button.getAttribute('data-name-doc');
                                    let ID_tag = button.getAttribute('data-id-tag');
                                    let Dep_name = button.getAttribute('data-dep-name'); // Добавляем атрибут для получения Dep_name
                                    deleteCard1(this, name_doc, ID_tag, Dep_name);
                                };
                            });
                        }
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
                                    const modal = buttonElement.closest('.modal');
                                } else {
                                    console.error("Ошибка запроса:", response.status, response.statusText);
                                }
                            } catch (error) {
                                console.error("Ошибка:", error);
                            }
                            } 


                        // Функция для добавления слушателей событий обновления
                        async function deleteCard1(buttonElement, name_doc, ID_tag, Dep_name) {
                            if (!confirm('Вы уверены, что хотите удалить этот документ?')) {
                                return; // Остановка, если пользователь отменил действие
                            }
                            const formData = new FormData();
                            formData.append('name_doc', name_doc);
                            formData.append('ID_tag', ID_tag);
                            formData.append('Dep_name', Dep_name); // Убедитесь, что 'Dep_name' добавлен
                            formData.append('action', 'deleteall'); // Дополнительный параметр для определения действия серверного скрипта

                            try {
                                let response = await fetch("doci_scr.php", {
                                    method: 'POST',
                                    body: formData
                                });
                                if (response.ok) {
                                    let result = await response.json();
                                    result.forEach(message => alert(message));
                                    buttonElement.closest('.myDiv').remove();
                                    const modal = buttonElement.closest('.modal');
                                } else {
                                    console.error("Ошибка запроса:", response.status, response.statusText);
                                }
                            } catch (error) {
                                console.error("Ошибка:", error);
                            }
                        } 
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
                    <script>
                        document.addEventListener("DOMContentLoaded", function() {
                        const depRadios = document.querySelectorAll('.dep-radio');

                        depRadios.forEach(radio => {
                            radio.addEventListener('change', function() {
                                const selectedDepName = this.value;

                                document.querySelectorAll('.dep-container').forEach(container => {
                                    const depForms = container.nextElementSibling;
                                    if (container.getAttribute('data-dep-name') === selectedDepName) {
                                        depForms.classList.add('show');
                                    } else {
                                        depForms.classList.remove('show');
                                        // Сброс всех входных данных внутри скрытых форм
                                        depForms.querySelectorAll('input').forEach(input => {
                                            if (input.type === 'checkbox' || input.type === 'radio') {
                                                input.checked = false;
                                                // Удаление состояния из localStorage
                                                const storageKey = `${container.getAttribute('data-dep-name')}_${input.id}`;
                                                localStorage.removeItem(storageKey);
                                                updateCheckboxState(input); // Обновление визуального состояния
                                            } else {
                                                input.value = '';
                                            }
                                        });
                                    }
                                });
                            });
                        });

                        // Добавление обработчика события "change" на документ, чтобы отслеживать изменения состояния чекбоксов
                        document.addEventListener("change", function(event) {
                            if (event.target.classList.contains('checkbox')) {
                                const checkbox = event.target;

                                // Обновление визуального состояния чекбокса
                                updateCheckboxState(checkbox);
                            }
                        });

                        // Функция для обновления визуального состояния чекбокса
                        function updateCheckboxState(checkbox) {
                            const checkboxParent = checkbox.parentNode;
                            if (checkbox.checked) {
                                checkboxParent.classList.add('checked');
                            } else {
                                checkboxParent.classList.remove('checked');
                            }
                        }
                    });
                    </script>
                    </div>
                    <script async src="./js/scripts.js?vers=99" ></script>
                </div>
            </div>
        </div>
    </div>
</main>
