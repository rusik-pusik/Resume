<?php
session_start();
            $server = "127.0.0.1";
            $user = "root";
            $pass = "1";
            $dbname = "bd_infocell_docs";
            $dbtable ="doc";
            $dbtable1 ="doc_tag";
            $dbtable2 ="tag1";
            // Подключение к базе данных
            $conn = mysqli_connect($server, $user, $pass, $dbname);
            // Проверка соединения
            if (!$conn) {
                die("Ошибка подключения: " . mysqli_connect_error());
            }
            //Типа запрос делаем все равно, вначале для всей таблицы

            //   foreach ($_POST as $value) {
            //     echo $value . "<br>";
            // }
            //  echo "DEBUG - Есть POST";
            // // также точка с запятой отсутствовала
            // foreach ($_POST as $value) {
            //     echo $value . "<br>";
            // }
            function linkify($text) 
            {
                // Regular expression to detect URLs
                $pattern = '/\b((?:https?:\/\/|www\.)[^\s<]+[^\s<\.)])\b/';
                // Replace URLs with clickable links
                $text = preg_replace($pattern, '<a href="$1" target="_blank">$1</a>', $text);
                return $text;
            }
            
            // file_put_contents('request_log.txt', print_r($_POST, true));
            // Respond to the request
            // echo "Request received successfully!";
            // Sanitize and validate the input data
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $id1 = $id2 = $id3 = $id4 = $id5 = null;
                $folder_level_1 = $folder_level_2 = $folder_level_3 = $folder_level_4 = $folder_level_5 = null;
                if (isset($_POST['folder_level_1'])) {
                    $combinedValue = $_POST['folder_level_1'];
                    list($id1, $folder_level_1, $uni1) = explode('|', $combinedValue);
            
                    // Теперь у вас есть и id, и folder_level_1
                    // echo "ID: " . htmlspecialchars($id1) . "<br>";
                    // echo "Folder Level 1: " . htmlspecialchars($folder_level_1) . "<br>";
                }
                if (isset($_POST['folder_level_2'])) {
                    $combinedValue = $_POST['folder_level_2'];
                    list($id2, $folder_level_2, $uni2) = explode('|', $combinedValue);
            
                    // Теперь у вас есть и id2, и folder_level_2
                    // echo "ID: " . htmlspecialchars($id2) . "<br>";
                    // echo "Folder Level 2: " . htmlspecialchars($folder_level_2) . "<br>";
                }
                if (isset($_POST['folder_level_3'])) {
                    $combinedValue = $_POST['folder_level_3'];
                    list($id3, $folder_level_3, $uni3) = explode('|', $combinedValue);
            
                    // Теперь у вас есть и id3, и folder_level_3
                    // echo "ID: " . htmlspecialchars($id3) . "<br>";
                    // echo "Folder Level 3: " . htmlspecialchars($folder_level_3) . "<br>";
                }
                if (isset($_POST['folder_level_4'])) {
                    $combinedValue = $_POST['folder_level_4'];
                    list($id4, $folder_level_4, $uni4) = explode('|', $combinedValue);
            
                    // Теперь у вас есть и id4, и folder_level_4
                    // echo "ID: " . htmlspecialchars($id4) . "<br>";
                    // echo "Folder Level 4: " . htmlspecialchars($folder_level_4) . "<br>";
                }
                if (isset($_POST['folder_level_5'])) {
                    $combinedValue = $_POST['folder_level_5'];
                    list($id5, $folder_level_5, $uni5) = explode('|', $combinedValue);
            
                    // Теперь у вас есть и id5, и folder_level_5
                    // echo "ID: " . htmlspecialchars($id5) . "<br>";
                    // echo "Folder Level 5: " . htmlspecialchars($folder_level_5) . "<br>";
                }
            }
            
            $about_doc = isset($_POST['name_new']) ? $_POST['name_new'] : "";                
            $Dep_name = isset($_POST['Dep_name']) ? $_POST['Dep_name'] : "";
            $file_link = isset($_POST['file_link']) ? $_POST['file_link'] : "";
            $type = isset($_POST['type']) ? $_POST['type'] : "";
            $doc_date = isset($_POST['doc_date']) ? $_POST['doc_date'] : '';
            // echo "Значения переменных about_doc $about_doc folder_level_1 $folder_level_1 folder_level_2 $folder_level_2 doc_date $doc_date";
            $mass3 = array();
            if (is_array($doc_date) || is_object($doc_date)) {
                    
                foreach ($doc_date as $date_range) 
                {
                    $dates = explode(" - ", $date_range);

                    if (count($dates) === 2) { // Проверка, что есть начальная и конечная дата
                        $start_date = $dates[0];
                        $end_date = $dates[1];

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
                        }
                    } else {
                        // Преобразование одиночной даты в формат 'Y-m-d' и добавление ее в массив $mass3
                        if (!empty($date_range)) {
                            $formatted_date = date_format(date_create($date_range), 'Y-m-d');
                        } else {
                            // Обработка случая, когда $date_range пустая
                            $formatted_date = ''; // Или любое другое значение, которое вам нужно
                        }
                        $mass3[] = $formatted_date;
                    
                    }
                }
            }
           if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                header('Content-Type: application/json');
                $response = [];
                if (isset($_POST['action'])) {
                    $conn->begin_transaction();
                    try {
                        switch ($_POST['action']) {
                            case 'delete':
                                $name_doc = $_POST['name_doc'] ?? '';
                                $ID_tag = $_POST['ID_tag'] ?? '';
                                $Dep_name = $_POST['Dep_name'] ?? '';
                                
                                $query = "DELETE FROM `doc_tag` WHERE `name_doc` = ? AND `ID_tag` = ? AND `Dep_name` = ?";
                                if ($stmt = $conn->prepare($query)) {
                                    $stmt->bind_param('sss', $name_doc, $ID_tag, $Dep_name);
                                    $stmt->execute();
                                    if ($stmt->affected_rows > 0) {
                                        echo "Запись удалена в папке";
                                    } else {
                                        echo "Ошибка: запись не найдена или не удалена";
                                    }
                                    $stmt->close();
                                    // Подтверждаем транзакцию
                                    $conn->commit();
                                } else {
                                    // Откатываем транзакцию, если запрос не был подготовлен
                                    $conn->rollback();
                                    echo "Ошибка при подготовке запроса: " . $conn->error;
                                }
                                break;
                            
                            case 'update':
                                // Значения полученные из POST
                                $name_doc = $_POST['name_doc'] ?? '';
                                $old_name_doc = $_POST['old_name_doc'] ?? '';
                                $doc_date = $_POST['doc_date'] ?? '';
                                $file_link = $_POST['file_link'] ?? '';
                                $type = $_POST['type'] ?? '';
                                
                                $updateDocQuery = "UPDATE `doc` SET `name_doc` = ?, `doc_date` = ?, `file_link` = ?, `type` = ? WHERE `name_doc` = ?";
                                
                                $stmt = $conn->prepare($updateDocQuery);
                                if (!$stmt) {
                                    throw new Exception("Ошибка при подготовке запроса к `doc`: " . $conn->error);
                                }
                                $stmt->bind_param('sssss', $name_doc, $doc_date, $file_link, $type, $old_name_doc);
                                if (!$stmt->execute()) {
                                    throw new Exception("Ошибка при обновлении строки в `doc`: " . $stmt->error);
                                }
                                $stmt->close();
                                
                                // Подтверждение транзакции
                                $conn->commit();
                                echo "Запись и связанные данные были успешно обновлены.";
                                break;
                                // Здесь могут быть другие операции (case)

                                case 'deleteall':
                                    $name_doc = $_POST['name_doc'] ?? '';
                                    $ID_tag = $_POST['ID_tag'] ?? '';
                                    $Dep_name = $_POST['Dep_name'] ?? '';
                
                                    // Вывод значений для отладки
                                    $response[] = "name_doc: " . $name_doc;
                                    $response[] = "ID_tag: " . $ID_tag;
                                    $response[] = "Dep_name: " . $Dep_name;
                
                                    // Получение расширения файла
                                    $queryGetType = "SELECT `type` FROM `doc` WHERE `name_doc` = ?";
                                    if ($stmtGetType = $conn->prepare($queryGetType)) {
                                        $stmtGetType->bind_param('s', $name_doc);
                                        $stmtGetType->execute();
                                        $stmtGetType->bind_result($fileType);
                                        if ($stmtGetType->fetch()) {
                                            $name_doc_with_extension = $name_doc . '.' . $fileType;
                                            $response[] = "name_doc_with_extension: " . $name_doc_with_extension;
                                        } else {
                                            $response[] = "Ошибка: файл не найден";
                                            echo json_encode($response);
                                            exit();
                                        }
                                        $stmtGetType->close();
                                    } else {
                                        $response[] = "Ошибка при подготовке запроса для получения типа файла: " . $conn->error;
                                        echo json_encode($response);
                                        exit();
                                    }
                
                                    // Первый запрос на удаление
                                    $query = "DELETE FROM `doc_tag` WHERE `name_doc` = ? AND `ID_tag` = ? AND `Dep_name` = ?";
                                    if ($stmt = $conn->prepare($query)) {
                                        $stmt->bind_param('sss', $name_doc, $ID_tag, $Dep_name);
                                        $stmt->execute();
                                        if ($stmt->affected_rows > 0) {
                                            // $response[] = "Запись удалена";
                                        } else {
                                            $response[] = "Ошибка: запись не найдена или не удалена";
                                        }
                                        $stmt->close();
                                    } else {
                                        $conn->rollback();
                                        $response[] = "Ошибка при подготовке запроса: " . $conn->error;
                                        echo json_encode($response);
                                        exit();
                                    }
                
                                    // Второй запрос на удаление
                                    $query100 = "DELETE FROM `doc` WHERE `name_doc` = ?";
                                    if ($stmt1 = $conn->prepare($query100)) {
                                        $stmt1->bind_param('s', $name_doc);
                                        $stmt1->execute();
                                        if ($stmt1->affected_rows > 0) {
                                            $response[] = "Запись удалена c сайта";
                                        } else {
                                            $response[] = "Ошибка: запись не найдена или не удалена из сайта";
                                        }
                                        $stmt1->close();
                                    } else {
                                        $conn->rollback();
                                        $response[] = "Ошибка при подготовке второго запроса: " . $conn->error;
                                        echo json_encode($response);
                                        exit();
                                    }
                
                                    // Найти и удалить файл из папки doci
                                    $uploadDirectory = $_SERVER['DOCUMENT_ROOT'] . "/doci/";
                                    // $response[] = "uploadDirectory: " . $uploadDirectory;
                                    
                                    $files = glob($uploadDirectory . '*' . $name_doc . '*.*');
                                    // $response[] = "files: " . json_encode($files);
                
                                    $fileDeleted = false;
                                    foreach ($files as $file) {
                                        if (unlink($file)) {
                                            // $response[] = "Файл успешно удален: " . $file;
                                            $fileDeleted = true;
                                            break;
                                        } else {
                                            // $response[] = "Ошибка при удалении файла: " . $file;
                                        }
                                    }
                
                                    if (!$fileDeleted) {
                                        $response[] = "Файл не найден для удаления.";
                                    }
                
                                    // Подтверждаем транзакцию
                                    $conn->commit();
                                    break;
            
                        }
                    } catch (Exception $e) {
                        // Откатываем транзакцию при ошибке
                        $conn->rollback();
                        $response[] = "Ошибка: " . $e->getMessage();
                    } finally {
                        // Всегда закрываем соединение с базой данных
                        $conn->close();
                    }

                    echo json_encode($response);
                    exit();
                }
            }

                //    echo "Name: " . $folder_level_1 . "<br>";
                //     echo "About: " . $about_doc . "<br>";
                //     echo "folder_level_1: " . $folder_level_1 . "<br>";
                // В массиве $mass3 теперь хранятся все даты в формате 'Y-m-d'
                // Вывод содержимого массива $mass3
                // print_r($massdoc_date);
                // error_log(print_r($_POST, true));
        //создаем условие для выборки
        if (empty($about_doc) )
        {
    
    if ($Dep_name !="" ||!empty($mass3) && !in_array('', $mass3, true)|| $folder_level_1 !="" || $folder_level_2 !="" || $folder_level_3 !="" || $folder_level_4 !="" || $file_link !="" || $folder_level_5 !="" || $type !="")
        {
        
            $mass = array(
                "0" => "$folder_level_5",
                "1" => "$folder_level_4",
                "2" => "$folder_level_3",
                "3" => "$folder_level_2",
                "4" => "$folder_level_1",
                "5" => "$Dep_name",
            );
            $mass1 = array(
                "0" => "t.folder_level_5",
                "1" => "t.folder_level_4",
                "2" => "t.folder_level_3",
                "3" => "t.folder_level_2",
                "4" => "t.folder_level_1",
                "5" => "dt.Dep_name",
            );
 
            // echo " DEBUG - Прошли условие ";
            $a="";
            $b ="";
            $about_doc = "";
            $qwote = "";
            $SQLCond="";
            $SQLCond1="";
            $SQLCond2="";
            $SQLCond3="";
            $SQLCond4="";
            $SQLCond5="";
            $SQLCond6="";
            $SQLCond7="";
            // Цикл для создания условий
            for ($i = 0; $i < count($mass); $i++) {
                if (!empty($mass[$i])) {
                    // Добавляем условие совпадения значения из $mass
                    if (!empty($a)) {
                        $a .= " AND ";
                    }else{
                        $a .= "($mass1[$i] = '{$mass[$i]}')";
                    }
                
                }

                // Добавляем условия исключения
                if (!empty($mass[$i])) {
                    if (!empty($qwote)) {
                        $qwote .= " AND ";
                    }
                    $qwote .= " ( {$mass1[$i - 1]} IS NULL OR {$mass1[$i - 1]} ='')";
                }
            }
            $mass10 = array(
                "0" => "$id1",
                "1" => "$id4",
                "2" => "$id3",
                "3" => "$id2",
                "4" => "$id1",
            );
            $mass11 = array(
                "0" => "t.ID",
                "1" => "t.ID",
                "2" => "t.ID",
                "3" => "t.ID",
                "4" => "t.ID",
            );
            
            // Объединяем все условия
            $whereClause = "";
            if (!empty($a)) {
                $whereClause = $a;
            }
            if (!empty($qwote)) {
                if (!empty($whereClause)) {
                    $whereClause .= " AND "; // Добавляем к WHERE-части
                }
                $whereClause .= $qwote;
            }
            
            // Добавляем последнее условие без оператора AND в конце

            
            // Объединяем условия запроса с условиями для каждого тега
            if (!empty($a)) { // Если переменная $a содержит условия
                $a   .= " AND ($whereClause)";
            }else{
            $a .=$whereClause;
            }

            // Поиск по тексту новости
            if(!($about_doc=="")) {
                // Нет необходимости добавлять "$text_news" здесь
                // echo "\n\rSQLCond = $SQLCond";
            
                $SQLCond2 = $about_doc . $SQLCond2;
                if(($SQLCond2!=""))
                    {
                        $b = $b . $SQLCond2;
                        
                    }
                    $b = "MATCH (name_doc) AGAINST('*$b*' IN BOOLEAN MODE)";
                    if(($b!="" and $a!=""))
                    {
                        $a = $a . ' AND      ' . $b;
                    }
                    else 
                    {
                        $a = $a . $b;
                    }
            
    
            }
            if (!in_array('', $mass3, true)) {
                $str = "";
                $first5 = true;
                foreach ($mass3 as $formatted_date1) {
                
                    if ($first5) {
                        $first5 = false;
                    
                        $str = "(doc.doc_date = '$formatted_date1')" ;
                    } else {
                    
                        $str =  "(".$str . " OR (doc.doc_date = '$formatted_date1'))";
                    }
                    
                }
            
                $SQLCond5 = $str . $SQLCond5;
                
                // Выводим содержимое SQLCond5
                
                if (($SQLCond5 != "" and $a != "")) {
                    $a = $a . ' AND ' . $SQLCond5;
                } else {
                    $a = $a . $SQLCond5;
                }
            }
            if (!($type == "")) {
                $str = "";
                $first = true;
                foreach ($type as $typeNum => $value) {
                    if ($first) {
                        $first = false;
                        $str = "(doc.type = '$value')" ;
                    } else {
                        $str =  "(".$str . " OR (doc.type = '$value'))";
                    }
                }
                $SQLCond3 = $str . $SQLCond3;
                if (($SQLCond3 != "" and $a != "")) {
                    $a = $a . ' AND ' . $SQLCond3;
                } else {
                    $a = $a . $SQLCond3;
                }
            }
            for($i=0; $i<5; $i++)
                {
                    if(!($mass[$i]==""))
                    {
                        $SQLCond011="";
                        $SQLCond011="$mass11[$i]= '$mass10[$i]'".$SQLCond011;
                        // echo $SQLCond0;
                        if(($SQLCond011!="" and $a!=""))
                        {
                            $a = $a . ' AND ' . $SQLCond011;
                        }
                        else 
                        {
                            $a = $a . $SQLCond011;
                        }
                    }
                }
               
            $query = " SELECT doc.name_doc, doc.type, doc.doc_date, doc.file_link, t.folder_level_1, t.folder_level_2, t.folder_level_3, t.folder_level_4, t.folder_level_5, dt.ID_tag, dt.Dep_name  FROM doc 
            LEFT JOIN doc_tag dt ON doc.name_doc = dt.name_doc 
            LEFT JOIN tag1 t ON dt.ID_tag = t.ID 
            WHERE  ($a) 
            ORDER BY doc.name_doc" ; // Переписали $query если есть дополнит. условия
        }

    } else {

        $a="";
        $b ="";
        $SQLCond="";
        $SQLCond1="";
        $SQLCond2="";
        $SQLCond3="";
        $SQLCond4="";
        $SQLCond5="";
        $SQLCond6="";
        $SQLCond7="";
        if(!($about_doc=="")) {
            // Нет необходимости добавлять "$text_news" здесь
            // echo "\n\rSQLCond = $SQLCond";
        
            $SQLCond2 = $about_doc . $SQLCond2;
            if(($SQLCond2!=""))
                {
                    $b = $b . $SQLCond2;
                    
                }
                $b = "  MATCH (doc.name_doc) AGAINST('*$b*' IN BOOLEAN MODE)";
                if(($b!="" and $a!=""))
                {
                    $a = $a . ' AND      ' . $b;
                }
                else 
                {
                    $a = $a . $b;
                }
        

        }
        $query = " SELECT doc.name_doc, doc.type, doc.doc_date, doc.file_link, t.folder_level_1, t.folder_level_2, t.folder_level_3, t.folder_level_4, t.folder_level_5, dt.ID_tag, dt.Dep_name  FROM doc 
        LEFT JOIN doc_tag dt ON doc.name_doc = dt.name_doc 
        LEFT JOIN tag1 t ON dt.ID_tag = t.ID 
        WHERE  ($a) 
        ORDER BY doc.name_doc" ; // Переписали $query если есть дополнит. условия
    }
//  echo  "Сформировали запрос $query";
function makeValidId($name) {
    // Удаление недопустимых символов и замена пробелов на подчеркивания
    return preg_replace('/[^\w-]/', '_', $name);
}
?>

<?php if (isset($query) && !empty($query)): ?>
    <?php 
    $data = mysqli_query($conn, $query) or die('<br>Ошибка выполнения запроса');
    $processedLinks = []; // Массив для хранения уже обработанных ссылок
    ?>
    <?php if (mysqli_num_rows($data) > 0): ?>
        <?php while ($row = mysqli_fetch_assoc($data)): ?>
            <?php
            $latestlin1 = isset($row['file_link']) ? explode(',', $row['file_link']) : [];
            $uniqueLatestlin1 = array_diff($latestlin1, $processedLinks); // Оставим только уникальные ссылки
            $processedLinks = array_merge($processedLinks, $uniqueLatestlin1); // Добавим их в массив обработанных ссылок
            ?>
            <?php if (!empty($uniqueLatestlin1)): ?>
                <?php foreach ($uniqueLatestlin1 as $lin1): ?>
                    <?php if (!empty($lin1)): ?>
                        <div class="col-md-4 tigran myDiv mt-2 mb-2 bg-light" id="myDiv">
                            <div class="custom-container row g-0 border rounded overflow-hidden flex-md-row shadow-sm h-md-200 position-relative" style="height: 100%;">
                                <div class="col p-3 d-flex flex-column position-static">
                                    <div class="col-auto d-none d-lg-block text-center">
                                        <a href="<?php echo $lin1; ?>" target="_blank" class="stretched-link"></a>
                                        <!-- Визуализация SVG или Изображения -->
                                        <svg class="bd-placeholder-img mx-auto" width="120" height="150" role="img" aria-label="Placeholder: Image" preserveAspectRatio="xMidYMid slice" focusable="false">
                                            <?php
                                            $extension = pathinfo($lin1, PATHINFO_EXTENSION);
                                            switch ($extension) {
                                                case 'doc':
                                                case 'docx':
                                                    $image = '/images/1352947.png';
                                                    break;
                                                case 'pdf':
                                                    $image = '/images/pdf.png';
                                                    break;
                                                case 'xlsm':
                                                    $image = '/images/img_261109.png';
                                                    break;
                                                default:
                                                    $image = '/images/logo1.png';
                                                    break;
                                            }
                                            ?>
                                            <image x="0" y="0" width="119" height="150" xlink:href="<?php echo $image; ?>" />
                                        </svg>
                                    </div>
                                    <h5 class="mb-1 overtext">
                                        <strong class="d-inline-block mb-2 text-success"><?php echo htmlentities($row['name_doc']); ?></strong>
                                    </h5>
                                    <div class="mt-auto w-100">
                                    <?php if (isset($_SESSION['user'])): ?>
                                        <button class="btn btn-danger mb-2  w-100 session-btn" data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo $row['ID_tag']; ?>" style="position: relative; z-index: 1;">
                                            Удалить
                                        </button>
                                    <?php endif; ?>

                                        <div class="modal fade" id="deleteModal<?php echo $row['ID_tag']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel<?php echo $row['ID_tag']; ?>" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="deleteModalLabel<?php echo $row['ID_tag']; ?>">Удалить документ</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body text-center">
                                                        <p>Вы уверены, что хотите удалить этот документ?</p>
                                                        <button 
                                                            data-name-doc="<?php echo htmlentities($row['name_doc']); ?>"
                                                            data-id-tag="<?php echo $row['ID_tag']; ?>"
                                                            data-dep-name="<?php echo $row['Dep_name']; ?>"
                                                            class="btn btn-danger btn-danger10 w-100 my-2" style="position: relative; z-index: 1111;" data-bs-dismiss="modal">
                                                            <i class="fas fa-trash-alt"></i> Удалить с сайта
                                                        </button>
                                                        <button 
                                                            data-name-doc="<?php echo htmlentities($row['name_doc']); ?>"
                                                            data-id-tag="<?php echo $row['ID_tag']; ?>"
                                                            data-dep-name="<?php echo $row['Dep_name']; ?>"
                                                            class="btn btn-warning btn-danger1 w-100 my-2" style="position: relative; z-index: 1111;" data-bs-dismiss="modal">
                                                            <i class="fas fa-folder-minus"></i> Удалить с папки
                                                        </button>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Кнопка для открытия модального окна редактирования -->
                                        <?php
                                            $validId = makeValidId($row['name_doc']);
                                            $modalId = "editDocModal{$validId}";
                                            $formId = "editDocForm{$validId}";
                                        ?>
                                        <?php if (isset($_SESSION['user'])): ?>
                                            <button class="btn w-100 session-btn btn-secondary" data-bs-toggle="modal" data-bs-target="#<?= $modalId ?>" style="position: relative; z-index: 1111;">
                                                Редактировать
                                            </button>
                                        <?php endif; ?>
                                        <!-- Delete Button -->
                                  
                                        <!-- Delete Modal -->
                                      
                                        <!-- Модальное окно Bootstrap для редактирования документа -->
                                        <div class="modal fade" id="<?= $modalId ?>" tabindex="-1" aria-labelledby="<?= $modalId ?>Label" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="<?= $modalId ?>Label">Редактировать документ</h5>
                                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- Форма в модальном окне -->
                                                        <form id="<?= $formId ?>" enctype="multipart/form-data">
                                                            <div class="form-group">
                                                                <label for="fileName<?= $validId ?>">Имя файла</label>
                                                                <input type="text" class="form-control mb-3" id="fileName<?= $validId ?>" placeholder="Имя файла" value="<?= htmlentities($row['name_doc']); ?>" name="name_doc">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="docDate<?= $validId ?>">Дата документа</label>
                                                                <input class="form-control mb-3" id="docDate<?= $validId ?>" value="<?= htmlentities($row['doc_date']); ?>" name="doc_date" placeholder="Дата">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="filePath<?= $validId ?>">Путь к файлу</label>
                                                                <input type="text" class="form-control mb-3" id="filePath<?= $validId ?>" value="<?= htmlentities($row['file_link']); ?>" name="file_link" placeholder="Путь к файлу">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="fileExtension<?= $validId ?>">Расширение файла</label>
                                                                <input type="text" class="form-control mb-3" id="fileExtension<?= $validId ?>" value="<?= htmlentities($row['type']); ?>" name="type" placeholder="Расширение файла">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="fileInput<?= $validId ?>">Выберите файл</label>
                                                                <input type="file" class="form-control-file mb-3" id="fileInput<?= $validId ?>" onchange="showFileInfo()">
                                                            </div>
                                                            <input type="hidden" name="action" value="update">
                                                            <input type="hidden" value="<?= htmlentities($row['name_doc']); ?>" name="old_name_doc">
                                                            <p class="mb-3 overtext otstupmen hidden">Файл должен находиться в папке doci перед тем, как быть добавлен на сайт</p>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
                                                        <button type="button" class="btn btn-primary btn-update" data-bs-dismiss="modal">Изменить</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php break; ?>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endif; ?>
        <?php endwhile; ?>
        <?php else: ?>
            <div id="content">
                <h1 style="text-align: center;  padding: 10px; display: flex; justify-content: center; align-items: center; height: 100vh;">По данным параметрам ничего не было найдено</h1>
            </div>
        <?php endif; ?>
    <?php else: ?>
    <h1 style="text-align: center;  padding: 10px; display: flex; justify-content: center; align-items: center; height: 100vh;">Выберите фильтры</h1>
<?php endif; ?>
