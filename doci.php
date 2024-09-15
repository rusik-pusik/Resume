<?php
session_start();
ob_start(); // Включение буферизации вывода

// Включить вывод ошибок
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Проверка, если форма уже была отправлена
if (isset($_SESSION['form_submitted']) && $_SESSION['form_submitted'] === true) {
    $_SESSION['form_submitted'] = false; // Сбросить флаг после перенаправления
    header("Location: " . $_SERVER['REQUEST_URI']); // Перенаправление на ту же страницу
    exit;
}
// Включить вывод ошибок
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Конфигурация подключения к БД
$server = "127.0.0.1";
$user = "root";
$pass = "1";
$dbname = "bd_infocell_docs";
$conn = mysqli_connect($server, $user, $pass, $dbname);

if (!$conn) {
    error_log("Connection failed: " . mysqli_connect_error());
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['Применить11'])) {
    if (isset($_FILES['fileInput'])) {
        $fileError = $_FILES['fileInput']['error'];
        if ($fileError != UPLOAD_ERR_OK) {
            switch ($fileError) {
                case UPLOAD_ERR_INI_SIZE:
                    $errorMessage = "Загруженный файл превышает директиву upload_max_filesize в php.ini.";
                    break;
                case UPLOAD_ERR_FORM_SIZE:
                    $errorMessage = "Загруженный файл превышает директиву MAX_FILE_SIZE, указанную в HTML-форме.";
                    break;
                case UPLOAD_ERR_PARTIAL:
                    $errorMessage = "Загруженный файл был загружен только частично.";
                    break;
                case UPLOAD_ERR_NO_FILE:
                    $errorMessage = "Файл не был загружен.";
                    break;
                case UPLOAD_ERR_NO_TMP_DIR:
                    $errorMessage = "Отсутствует временная папка.";
                    break;
                case UPLOAD_ERR_CANT_WRITE:
                    $errorMessage = "Не удалось записать файл на диск.";
                    break;
                case UPLOAD_ERR_EXTENSION:
                    $errorMessage = "PHP-расширение остановило загрузку файла.";
                    break;
                default:
                    $errorMessage = "Неизвестная ошибка загрузки.";
                    break;
            }
            echo "<script>alert('Ошибка при загрузке файла: $errorMessage');</script>";
            mysqli_close($conn);
            $_SESSION['form_submitted'] = true;
        } else {
            $selectedFolders = [];
            $folderLevels = ['folder_level_1', 'folder_level_2', 'folder_level_3', 'folder_level_4', 'folder_level_5'];
            $downFolder = isset($_POST['Down_folder']) ? $_POST['Down_folder'] : '';
            $Dep_name1_array = array($downFolder); // Теперь это массив с одним элементом

            if (empty($folderLevels) && empty($downFolder)) {
                echo "<script>alert('Ошибка: Все уровни папок и папка Down_folder пустые. Файл не будет загружен.');</script>";
            } else {
                echo "<script>alert('Файл загружен успешно. Переходим к следующему шагу...');</script>";
                $uploadDirectory = $_SERVER['DOCUMENT_ROOT'] . "/doci/";
                $fileName = basename($_FILES['fileInput']['name']);
                $filePath = $uploadDirectory . $fileName;
                $fileExtension = pathinfo($filePath, PATHINFO_EXTENSION);

                $name_doc = isset($_POST['name_doc']) ? $_POST['name_doc'] : '';
                $file_link = "/doci/" . $fileName;
                $type = $fileExtension;
                $doc_date = isset($_POST['doc_date']) ? $_POST['doc_date'] : '';
                $Dep_name = isset($_POST['Dep_name']) ? $_POST['Dep_name'] : '';

                if ($name_doc != "") {
                    foreach ($folderLevels as $level) {
                        if (isset($_POST[$level])) {
                            foreach ($_POST[$level] as $combinedValue) {
                                list($id, $depName) = explode('|', $combinedValue);
                                if (!empty($id)) {
                                    $selectedFolders[$depName][] = $id;
                                }
                            }
                        }
                    }

                    if (empty($selectedFolders) && !empty($Dep_name)) {
                        foreach ($Dep_name as $depName) {
                            $selectedFolders[$depName] = [];
                        }
                    }

                    try {
                        foreach ($selectedFolders as $Dep_name_item => $ids) {
                            echo "<ul>";

                            foreach ($ids as $id) {
                                $mass = [$name_doc, $file_link, $type, $doc_date];
                                $mass1 = ["doc.name_doc", "doc.file_link", "doc.type", "doc.doc_date"];

                                $d_sql = "";
                                $queryCondition = "";
                                for ($i = 0; $i < 4; $i++) {
                                    if (!empty($mass[$i])) {
                                        $SQLCond0 = "{$mass1[$i]} = '{$mass[$i]}'";
                                        $d_sql .= empty($d_sql) ? $SQLCond0 : ' AND ' . $SQLCond0;
                                    }
                                }

                                $SQLCond = "(tag1.ID = '$id')";
                                $queryCondition .= empty($queryCondition) ? $SQLCond : ' OR ' . $SQLCond;

                                if (empty($downFolder)) {
                                    if (!empty($queryCondition)) {
                                        try {
                                            if (file_exists($filePath)) {
                                                echo "<script>alert('Файл с именем $fileName уже существует в директории.');</script>";
                                            } else {
                                                if (move_uploaded_file($_FILES['fileInput']['tmp_name'], $filePath)) {
                                                    echo "<script>alert('Файл успешно перемещен в директорию.');</script>";
                                                } else {
                                                    throw new Exception("Ошибка при перемещении загруженного файла.");
                                                }
                                            }

                                            $query111 = "SELECT name_doc FROM doc WHERE name_doc = ?";
                                            $stmt1 = mysqli_prepare($conn, $query111);

                                            if ($stmt1) {
                                                mysqli_stmt_bind_param($stmt1, 's', $name_doc);
                                                mysqli_stmt_execute($stmt1);
                                                mysqli_stmt_store_result($stmt1);

                                                $docExists = mysqli_stmt_num_rows($stmt1) > 0;
                                                mysqli_stmt_close($stmt1);

                                                if (!$docExists) {
                                                    $insertQuery = "INSERT INTO doc (name_doc, file_link, type, doc_date) VALUES (?, ?, ?, ?)";
                                                    $stmt = mysqli_prepare($conn, $insertQuery);

                                                    if ($stmt) {
                                                        mysqli_stmt_bind_param($stmt, 'ssss', $name_doc, $file_link, $type, $doc_date);

                                                        if (!mysqli_stmt_execute($stmt)) {
                                                            throw new Exception("Ошибка при добавлении данных в таблицу doc: " . mysqli_stmt_error($stmt));
                                                        }

                                                        echo "<script>alert('Документ с именем $name_doc успешно вложен.');</script>";
                                                        mysqli_stmt_close($stmt);
                                                    } else {
                                                        throw new Exception("Ошибка при подготовке запроса в таблицу doc: " . mysqli_error($conn));
                                                    }
                                                } else {
                                                    $query114 = "SELECT name_doc FROM doc WHERE " . $d_sql;
                                                    $result114 = mysqli_query($conn, $query114);
                                                    if (!$result114) {
                                                        throw new Exception("Ошибка выполнения запроса: " . mysqli_error($conn));
                                                    }

                                                    while ($row114 = mysqli_fetch_assoc($result114)) {
                                                        $name_doc = $row114['name_doc'];
                                                    }
                                                }
                                            } else {
                                                throw new Exception("Ошибка при подготовке запроса на проверку существования документа: " . mysqli_error($conn));
                                            }

                                            $query001 = "SELECT tag1.ID FROM tag1 WHERE $queryCondition";
                                            $result = mysqli_query($conn, $query001);
                                            if (!$result) {
                                                throw new Exception("Ошибка выполнения запроса: " . mysqli_error($conn));
                                            }

                                            $id_tags = [];
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $id_tags[] = $row['ID'];
                                            }

                                            if (!empty($id_tags) && !empty($Dep_name_item)) {
                                                if (!is_string($Dep_name_item)) {
                                                    throw new Exception('Все элементы массива $depName должны быть строками.');
                                                }

                                                foreach ($id_tags as $ID_tag) {
                                                    $insertQuery2 = "INSERT INTO doc_tag (name_doc, ID_tag, Dep_name) VALUES (?, ?, ?)";
                                                    $stmt2 = mysqli_prepare($conn, $insertQuery2);

                                                    if ($stmt2) {
                                                        mysqli_stmt_bind_param($stmt2, 'sis', $name_doc, $ID_tag, $Dep_name_item);

                                                        if (mysqli_stmt_execute($stmt2)) {
                                                            // echo "<script>alert('Информация о департаменте {$Dep_name_item} и теге ID = {$ID_tag} успешно добавлена.');</script>";
                                                        } else {
                                                            throw new Exception("Ошибка при добавлении данных в таблицу doc_tag: " . mysqli_stmt_error($stmt2));
                                                        }

                                                        mysqli_stmt_close($stmt2);
                                                    } else {
                                                        throw new Exception("Ошибка при подготовке запроса для вставки данных в таблицу doc_tag: " . mysqli_error($conn));
                                                    }
                                                }
                                            }
                                        } catch (Exception $e) {
                                            echo "<script>alert('Ошибка: " . $e->getMessage() . "');</script>";
                                        }
                                    }
                                } else {
                                    if (!empty($depName)) {
                                        try {
                                            if (file_exists($filePath)) {
                                                echo "<script>alert('Файл с именем $fileName уже существует в директории.');</script>";
                                            } else {
                                                if (move_uploaded_file($_FILES['fileInput']['tmp_name'], $filePath)) {
                                                    // echo "<script>alert('Файл успешно перемещен в директорию.');</script>";
                                                } else {
                                                    throw new Exception("Ошибка при перемещении загруженного файла.");
                                                }
                                            }

                                            $query111 = "SELECT name_doc FROM doc WHERE name_doc = ?";
                                            $stmt1 = mysqli_prepare($conn, $query111);

                                            if ($stmt1) {
                                                mysqli_stmt_bind_param($stmt1, 's', $name_doc);
                                                mysqli_stmt_execute($stmt1);
                                                mysqli_stmt_store_result($stmt1);

                                                $docExists = mysqli_stmt_num_rows($stmt1) > 0;
                                                mysqli_stmt_close($stmt1);

                                                if (!$docExists) {
                                                    $insertQuery = "INSERT INTO doc (name_doc, file_link, type, doc_date) VALUES (?, ?, ?, ?)";
                                                    $stmt = mysqli_prepare($conn, $insertQuery);

                                                    if ($stmt) {
                                                        mysqli_stmt_bind_param($stmt, 'ssss', $name_doc, $file_link, $type, $doc_date);

                                                        if (!mysqli_stmt_execute($stmt)) {
                                                            throw new Exception("Ошибка при добавлении данных в таблицу doc: " . mysqli_stmt_error($stmt));
                                                        }

                                                        echo "<script>alert('Документ с именем $name_doc успешно вложен.');</script>";
                                                        mysqli_stmt_close($stmt);
                                                    } else {
                                                        throw new Exception("Ошибка при подготовке запроса в таблицу doc: " . mysqli_error($conn));
                                                    }
                                                } else {
                                                    $query114 = "SELECT name_doc FROM doc WHERE " . $d_sql;
                                                    $result114 = mysqli_query($conn, $query114);
                                                    if (!$result114) {
                                                        throw new Exception("Ошибка выполнения запроса: " . mysqli_error($conn));
                                                    }

                                                    while ($row114 = mysqli_fetch_assoc($result114)) {
                                                        $name_doc = $row114['name_doc'];
                                                    }
                                                }
                                            } else {
                                                throw new Exception("Ошибка при подготовке запроса на проверку существования документа: " . mysqli_error($conn));
                                            }

                                            if (!empty($queryCondition)) {
                                                $query001 = "SELECT tag1.ID FROM tag1 WHERE " . $queryCondition;
                                                $result = mysqli_query($conn, $query001);
                                                if (!$result) {
                                                    throw new Exception("Ошибка выполнения запроса: " . mysqli_error($conn));
                                                }

                                                // echo "<script>alert('id здесь $query001');</script>";
                                                $id_tags = [];
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    $id_tags[] = $row['ID'];
                                                }
                                            } else {
                                                $queryCondition = [];
                                                $id_tags = $queryCondition;
                                            }

                                            if (!empty($id_tags)) {
                                                foreach ($id_tags as $ID_tag) {
                                                    $query = "SELECT folder_level_1, folder_level_2, folder_level_3, folder_level_4, folder_level_5 FROM tag1 WHERE ID = ?";
                                                    $stmt = mysqli_prepare($conn, $query);
                                                    mysqli_stmt_bind_param($stmt, 'i', $ID_tag);
                                                    mysqli_stmt_execute($stmt);
                                                    $result = mysqli_stmt_get_result($stmt);
                                                    $folderLevels = mysqli_fetch_assoc($result);
                                                    mysqli_stmt_close($stmt);

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
                                                        echo "<script>alert('Ошибка: для этого ID все уровни папок заполнены.');</script>";
                                                        continue;
                                                    }

                                                    $insertQuery = "INSERT INTO tag1 (folder_level_1, folder_level_2, folder_level_3, folder_level_4, folder_level_5) VALUES (?, ?, ?, ?, ?)";
                                                    $stmt = mysqli_prepare($conn, $insertQuery);
                                                    mysqli_stmt_bind_param($stmt, 'sssss', ...$insertParams);
                                                    mysqli_stmt_execute($stmt);
                                                    $newID = mysqli_insert_id($conn);
                                                    mysqli_stmt_close($stmt);

                                                    if ($newID > 0) {
                                                        // echo "<script>alert('Новый ID: {$newID} добавлен с папкой на уровне {$downFolder}');</script>";

                                                        $insertQuery2 = "INSERT INTO doc_tag (name_doc, ID_tag, Dep_name) VALUES (?, ?, ?)";
                                                        $stmt2 = mysqli_prepare($conn, $insertQuery2);

                                                        if ($stmt2) {
                                                            mysqli_stmt_bind_param($stmt2, 'sis', $name_doc, $newID, $Dep_name_item);

                                                            if (!mysqli_stmt_execute($stmt2)) {
                                                                echo "<script>alert('Ошибка выполнения подготовленного выражения в таблицу doc_tag для ID = {$newID}: " . mysqli_stmt_error($stmt2) . "');</script>";
                                                            } else {
                                                                echo "<script>alert('Информация успешно добавлена ');</script>";
                                                            }

                                                            mysqli_stmt_close($stmt2);
                                                        } else {
                                                            echo "<script>alert('Ошибка при подготовке выражения в таблицу doc_tag для ID = {$newID}: " . mysqli_error($conn) . "');</script>";
                                                        }
                                                    } else {
                                                        echo "<script>alert('Ошибка при вставке новой папки: Не удалось получить новый ID.');</script>";

                                                        $checkQuery = "SELECT ID FROM tag1 WHERE folder_level_1 = ? AND folder_level_2 = ? AND folder_level_3 = ? AND folder_level_4 = ? AND folder_level_5 = ?";
                                                        $stmt = mysqli_prepare($conn, $checkQuery);
                                                        mysqli_stmt_bind_param($stmt, 'sssss', ...$insertParams);
                                                        mysqli_stmt_execute($stmt);
                                                        $result = mysqli_stmt_get_result($stmt);
                                                        $existingID = mysqli_fetch_assoc($result)['ID'];
                                                        mysqli_stmt_close($stmt);

                                                        if ($existingID) {
                                                            echo "<script>alert('Существующий ID: {$existingID} найден для вставки в doc_tag');</script>";

                                                            $insertQuery2 = "INSERT INTO doc_tag (name_doc, ID_tag, Dep_name) VALUES (?, ?, ?)";
                                                            $stmt2 = mysqli_prepare($conn, $insertQuery2);

                                                            if ($stmt2) {
                                                                mysqli_stmt_bind_param($stmt2, 'sis', $name_doc, $existingID, $Dep_name_item);

                                                                if (!mysqli_stmt_execute($stmt2)) {
                                                                    echo "<script>alert('Ошибка выполнения подготовленного выражения в таблицу doc_tag для ID = {$existingID}: " . mysqli_stmt_error($stmt2) . "');</script>";
                                                                } else {
                                                                    echo "<script>alert('Информация успешно добавлена ');</script>";
                                                                }

                                                                mysqli_stmt_close($stmt2);
                                                            } else {
                                                                echo "<script>alert('Ошибка при подготовке выражения в таблицу doc_tag для ID = {$existingID}: " . mysqli_error($conn) . "');</script>";
                                                            }
                                                        } else {
                                                            echo "<script>alert('Ошибка: Не удалось найти существующий ID для аналогичной записи.');</script>";
                                                        }
                                                    }
                                                }
                                            }
                                        } catch (Exception $e) {
                                            echo "<script>alert('Произошла ошибка: " . $e->getMessage() . "');</script>";
                                        }
                                    }
                                }
                            }
                        }
                    } catch (Exception $e) {
                        echo "<script>alert('{$e->getMessage()}');</script>";
                    }
                    try {
                        $mass0 = [$name_doc, $file_link, $type, $doc_date];
                        $mass1 = ["doc.name_doc", "doc.file_link", "doc.type", "doc.doc_date"];

                        $d_sql = "";
                        for ($i = 0; $i < 4; $i++) {
                            if (!empty($mass0[$i])) {
                                $SQLCond0 = "{$mass1[$i]} = '{$mass0[$i]}'";
                                $d_sql .= empty($d_sql) ? $SQLCond0 : ' AND ' . $SQLCond0;
                            }
                        }

                        if (!empty($downFolder) && !empty($Dep_name)) {
                            try {
                                if (file_exists($filePath)) {
                                    echo "<script>alert('Файл с именем $fileName уже существует в директории.');</script>";
                                } else {
                                    if (move_uploaded_file($_FILES['fileInput']['tmp_name'], $filePath)) {
                                        echo "<script>alert('Файл успешно перемещен в директорию.');</script>";
                                    } else {
                                        throw new Exception("Ошибка при перемещении загруженного файла.");
                                    }
                                }

                                $query111 = "SELECT name_doc FROM doc WHERE name_doc = ?";
                                $stmt1 = mysqli_prepare($conn, $query111);

                                if ($stmt1) {
                                    mysqli_stmt_bind_param($stmt1, 's', $name_doc);
                                    mysqli_stmt_execute($stmt1);
                                    mysqli_stmt_store_result($stmt1);

                                    $docExists = mysqli_stmt_num_rows($stmt1) > 0;
                                    mysqli_stmt_close($stmt1);

                                    if (!$docExists) {
                                        $insertQuery = "INSERT INTO doc (name_doc, file_link, type, doc_date) VALUES (?, ?, ?, ?)";
                                        $stmt = mysqli_prepare($conn, $insertQuery);

                                        if ($stmt) {
                                            mysqli_stmt_bind_param($stmt, 'ssss', $name_doc, $file_link, $type, $doc_date);

                                            if (!mysqli_stmt_execute($stmt)) {
                                                throw new Exception("Ошибка при добавлении данных в таблицу doc: " . mysqli_stmt_error($stmt));
                                            }

                                            // echo "<script>alert('Документ с именем $name_doc успешно вложен.');</script>";
                                            mysqli_stmt_close($stmt);
                                        } else {
                                            throw new Exception("Ошибка при подготовке запроса в таблицу doc: " . mysqli_error($conn));
                                        }
                                    } else {
                                        $query114 = "SELECT name_doc FROM doc WHERE " . $d_sql;
                                        $result114 = mysqli_query($conn, $query114);
                                        if (!$result114) {
                                            throw new Exception("Ошибка выполнения запроса: " . mysqli_error($conn));
                                        }

                                        while ($row114 = mysqli_fetch_assoc($result114)) {
                                            $name_doc = $row114['name_doc'];
                                        }
                                    }
                                } else {
                                    throw new Exception("Ошибка при подготовке запроса на проверку существования документа: " . mysqli_error($conn));
                                }

                                foreach ($Dep_name as $depName) {
                                    $checkQuery = "SELECT ID FROM tag1 WHERE folder_level_1 = '$downFolder' AND folder_level_2 = '' AND folder_level_3 = '' AND folder_level_4 = '' AND folder_level_5 = ''";
                                    $result = mysqli_query($conn, $checkQuery);
                                    $existingID = $result && mysqli_num_rows($result) > 0 ? mysqli_fetch_assoc($result)['ID'] : null;

                                    if ($existingID) {
                                        // echo "<script>alert('Существующий ID: {$existingID} найден для вставки в doc_tag');</script>";

                                        $insertQuery2 = "INSERT INTO doc_tag (name_doc, ID_tag, Dep_name) VALUES ('$name_doc', $existingID, '$depName')";

                                        if (mysqli_query($conn, $insertQuery2)) {
                                            echo "<script>alert('Информация успешно добавлена ');</script>";
                                        } else {
                                            echo "<script>alert('Ошибка выполнения запроса в таблицу doc_tag для ID = {$existingID}: " . mysqli_error($conn) . "');</script>";
                                        }
                                    } else {
                                        $insertQuery = "INSERT INTO tag1 (folder_level_1, folder_level_2, folder_level_3, folder_level_4, folder_level_5) VALUES ('$downFolder', '', '', '', '')";

                                        if (mysqli_query($conn, $insertQuery)) {
                                            $newID = mysqli_insert_id($conn);

                                            if ($newID > 0) {
                                                // echo "<script>alert('Новый ID: {$newID} добавлен с папкой на уровне {$downFolder} для департамента {$depName}');</script>";

                                                $insertQuery2 = "INSERT INTO doc_tag (name_doc, ID_tag, Dep_name) VALUES ('$name_doc', $newID, '$depName')";

                                                if (mysqli_query($conn, $insertQuery2)) {
                                                    echo "<script>alert('Информация успешно добавлена');</script>";
                                                } else {
                                                    echo "<script>alert('Ошибка выполнения запроса в таблицу doc_tag для ID = {$newID}: " . mysqli_error($conn) . "');</script>";
                                                }
                                            } else {
                                                echo "<script>alert('Ошибка при вставке новой папки: Не удалось получить новый ID.');</script>";
                                            }
                                        } else {
                                            echo "<script>alert('Ошибка в запросе: " . mysqli_error($conn) . "');</script>";
                                        }
                                    }
                                }
                            } catch (Exception $e) {
                                echo "<script>alert('Произошла ошибка: " . $e->getMessage() . "');</script>";
                            }
                        }
                    } catch (Exception $e) {
                        echo "<script>alert('{$e->getMessage()}');</script>";
                    }

                    mysqli_close($conn);
                    $_SESSION['form_submitted'] = true;
                }
            }
        }
    } else {
        echo "<script>alert('Файл не был загружен. Проверьте выбранный файл и повторите попытку.');</script>";
    }
}
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Инфосэл</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/air-datepicker.css">
    <link href="css/role.css?vers=94" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900&display=swap" rel="stylesheet">

    <!-- jQuery and JS libraries -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="./js/scripts.js?vers=99" defer></script>
    <script src="js/popper.js" defer></script>
    <script src="js/bootstrap.min.js" defer></script>
    <script src="js/air-datepicker.js"></script>
    <script src="js/rome.js" defer></script>
    <script src="./js/forma1.js?vers=123" defer></script>
    <script src="./js/forma.js?vers=224" defer></script>
    <script src="./js/forma_radio.js?vers=259" defer></script>
    <script src="./js/doci_script.js?vers=12" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous" defer></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js" defer></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js" defer></script>

    <!-- Custom styles -->
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        ol.overtext {
            counter-reset: item;
        }

        .hidden {
            display: none;
        }

        #sidebar {
            background-color: #f8f9fa;
            border-radius: 15px;
        }

        .animated-dropdown {
            transition: all 0.3s ease;
        }

        .dropdown-toggle {
            white-space: wrap;
        }

        .animated-dropdown.collapsed {
            transform: rotate(180deg);
        }

        .row1 {
            padding: 0;
        }

        .list-unstyled {
            padding-left: 0;
            list-style: none;
        }

        .subSubmenu2,
        .pageSubmenu1,
        .pageSubmenu2,
        .pageSubmenu3 {
            padding-left: 5%;
            list-style: none;
        }

        .dropdown {
            position: relative;
            padding-left: 1.5em;
        }

        .dropdown-toggle {
            color: black;
            padding: 10px 16px;
            text-decoration: none;
            display: block;
        }

        .modal {
            z-index: 105000000;
        }

        .dropdown-border {
            border-radius: 5px;
        }

        .dropdown-toggle:hover {
            background-color: #f1f1f1;
        }

        .collapse {
            display: none;
        }

        .collapse.show {
            display: block;
        }

        .collapse .dropdown {
            position: relative;
            top: 0;
            left: 100%;
            display: none;
            background-color: #f9f9f9;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .collapse .dropdown .dropdown-toggle {
            border-bottom: none;
        }

        .collapse .dropdown .collapse {
            display: none;
        }

        .collapse .dropdown:hover .collapse {
            display: block;
        }

        .list-unstyled li a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            border-bottom: 1px solid #ddd;
            transition: background-color 0.3s;
        }

        .list-unstyled li a:last-child {
            border-bottom: none;
        }

        .list-unstyled li a:hover {
            background-color: #e9ecef;
        }

        .btn-group {
            position: relative;
            display: inline-block;
        }

        .btn-group>.btn {
            position: relative;
            z-index: 2;
        }

        .btn-group>.btn+.btn {
            margin-left: -1px;
        }

        .btn-group>.btn:hover,
        .btn-group>.btn:focus {
            z-index: 3;
        }

        .btn-group>.btn.dropdown-toggle-split {
            padding-right: 1.75rem;
            padding-left: 1.75rem;
        }

        .btn-group>.btn.dropdown-toggle-split::after,
        .btn-group>.btn.dropdown-toggle-split::before {
            display: none;
        }

        .btn-group>.btn+.dropdown-menu {
            margin-top: 0;
        }

        .div1 {
            padding: 12px 16px;
        }

        .chess {
            overflow: hidden;
        }

        .custom-row {
            margin-left: 0;
            margin-right: 0;
        }
        .logout-button {
            font-size: 1.5em;
            color: #ffffff;
            background-color: #0d6efd;
            border: 1px solid transparent;
            border-radius: .25rem;
            padding: .5rem 1rem;
            text-decoration: none;
            transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out;
            cursor: pointer;
        }

        .logout-button:hover {
            color: #ffffff;
            background-color: #495057;
            border-color: #dee2e6;
        }
        
        .navbar-brand {
            position: relative;
        }

        .navbar-brand::after {
            content: '';
            display: block;
            width: 100%;
            height: 2px;
            background-color: #007bff;
            position: absolute;
            bottom: -10px;
            left: 0;
        }

        .nav-link {
            position: relative;
            padding: 0.5rem 1rem;
        }

        .nav-link::before,
        .nav-link::after {
            content: '';
            display: block;
            position: absolute;
            height: 2px;
            background-color: #007bff;
            transition: width 0.3s ease;
        }

        .nav-link::before {
            width: 0;
            top: 0;
            left: 0;
        }

        .nav-link::after {
            width: 0;
            bottom: 0;
            right: 0;
        }

        .nav-link:hover::before,
        .nav-link:hover::after {
            width: 100%;
        }

        /* Custom styles for modal */
        .modal-header {
            background-color: #007bff;
            color: white;
            border-bottom: none;
        }

        .modal-footer {
            border-top: none;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-control {
            border-radius: 0.25rem;
            box-shadow: none;
            border: 1px solid #ced4da;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-link {
            color: #007bff;
        }

        .btn {
            color: #fff; /* White text color for buttons */
        }
        .btn-outline-primary {
            color: #007bff;
            background-color: #ffffff;
            border-color: #007bff;
        }

        .btn-outline-primary:hover {
            color: #ffffff;
            background-color: #007bff;
            border-color: #007bff;
        }

        .navbar-brand::after {
            content: none;
        }
        .session-btn {
    display: none;
}

<?php if (isset($_SESSION['user'])): ?>
    .session-btn {
        display: block;
    }
<?php endif; ?>
    </style>
</head>
<body>
<div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
        <div class="col-md-3 mb-2 mb-md-0">
            <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none navbar-brand text-primary">
                <div class="display-5 font-weight-bold">INFOCELL</div>
            </a>
        </div>
        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            <li class="nav-item"><a href="meneger.php?page=meneg" class="nav-link px-2 link-secondary">Менеджерам</a></li>
            <li class="nav-item"><a href="meneger.php?page=ingener" class="nav-link px-2">Инженерам</a></li>
            <li class="nav-item"><a href="meneger.php?page=servic" class="nav-link px-2">Сервис</a></li>
            <li class="nav-item"><a href="index.php" class="nav-link px-2">Новости</a></li>
            <li class="nav-item"><a href="doci.php" class="nav-link px-2 active" aria-current="page">Документация</a></li>
        </ul>
        <div class="col-md-3 text-end">
            <?php if (isset($_SESSION['user'])): ?>
                <div class="d-inline-flex align-items-center">
                    <i class="fas fa-user-circle fa-2x"></i>
                    <form action="logout.php" method="post" class="ml-2">
                        <button type="submit" class="btn btn-outline-primary ml-2 logout-button">Выйти</button>
                    </form>
                </div>
            <?php else: ?>
                <button type="button" class="btn btn-outline-primary me-2" data-bs-toggle="modal" data-bs-target="#loginModal">Авторизация</button>
            <?php endif; ?>
        </div>
    </header>
    <?php if (isset($login_error)): ?>
        <div class="alert alert-danger" role="alert">
            <?= htmlspecialchars($login_error) ?>
        </div>
    <?php endif; ?>
    <!-- Модальное окно авторизации -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Авторизация</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="loginForm" method="POST" action="login.php">
                        <div class="form-group">
                            <label for="username">Логин</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Введите логин" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Пароль</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Пароль" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Войти</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    <?php
            require_once "doci_ok.php";
    ?>

    <script>
        new AirDatepicker('#airdatepicker', {
            onSelect({ date, formattedDate, datepicker }) {
                requestr();
            },
            isMobile: true,
            autoClose: false,
            position: 'right top',
            multipleDates: true,
            range: true,
            multipleDatesSeparator: ' - ',
            buttons: ['today', 'clear'],
            locale: {
                days: ['воскресенье', 'понедельник', 'вторник', 'среда', 'четверг', 'пятница', 'суббота'],
                daysShort: ['вск', 'пнд', 'втр', 'срд', 'чтв', 'птн', 'сбт'],
                daysMin: ['Вс', 'Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб'],
                months: ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'],
                monthsShort: ['Янв', 'Фев', 'Мар', 'Апр', 'Май', 'Июн', 'Июл', 'Авг', 'Сен', 'Окт', 'Ноя', 'Дек'],
                today: 'Сегодня',
                clear: 'Очистить',
                dateFormat: 'dd.MM.yyyy',
                timeFormat: 'hh:mm aa',
                firstDay: 0
            }
        });
    </script>

    <script>
        if (localStorage.getItem('reloaded') === null) {
            localStorage.setItem('reloaded', 'true');
            setTimeout(function () {
                location.reload(); // Перезагрузка страницы через небольшую задержку
            }, 10);
        } else {
            localStorage.removeItem('reloaded'); // Удаляем элемент, чтобы сбросить состояние
        }
    </script>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>

    <!-- Password matching script -->
    <script>
        function checkPasswords() {
            var password = document.getElementById("reg_password").value;
            var confirmPassword = document.getElementById("confirm_password").value;
            if (password !== confirmPassword) {
                alert("Пароли не совпадают.");
                return false;
            }
            return true;
        }
    </script>
    <script>
        function activateForm() {
            var checkBox = document.getElementById("myCheckbox");
            var text = document.getElementById("myInput");
            var label = document.getElementById("labelMyCheckbox");

            if (checkBox.checked == true) {
                // Если чекбокс отмечен, включить поле ввода и изменить цвет фона label
                text.disabled = false;
                label.classList.add('bg-primary1'); // Добавить класс bg-primary
                label.classList.remove('text-black'); // Удалить класс text-black чтобы текст стал виден на фоне bg-primary
            } else {
                // Если чекбокс не отмечен, отключить поле ввода, очистить его и вернуть цвет фона обратно
                text.disabled = true;
                text.value = ""; // Очистить поле ввода, когда чекбокс снимается
                label.classList.remove('bg-primary1'); // Удалить класс bg-primary
                label.classList.add('text-black'); // Добавить класс text-black
                resetAndDisableDepCheckboxes(); // Отключить и сбросить зависимые чекбоксы
            }
        }

        function checkInput() {
            var text = document.getElementById("myInput");
            if (text.value.trim() !== "") {
                // Если поле ввода не пустое, включить зависимые чекбоксы
                enableDepCheckboxes();
            } else {
                // Если поле ввода пустое, отключить и сбросить зависимые чекбоксы
                resetAndDisableDepCheckboxes();
            }
        }

        function enableDepCheckboxes() {
            var depCheckboxes = document.querySelectorAll('.dep-checkbox');
            depCheckboxes.forEach(function (checkbox) {
                // Включить каждый зависимый чекбокс
                checkbox.disabled = false;
            });
        }

        function resetAndDisableDepCheckboxes() {
            var depCheckboxes = document.querySelectorAll('.dep-checkbox');
            depCheckboxes.forEach(function (checkbox) {
                // Снять отметку и отключить каждый зависимый чекбокс
                checkbox.checked = false; // Снять отметку с каждого чекбокса
                checkbox.disabled = true; // Отключить каждый чекбокс
            });
            resetLabelClasses(); // Сбросить класс 'checked' у всех label
        }

        function resetLabelClasses() {
            var labels = document.querySelectorAll('label.tag-checkbox-label');
            labels.forEach(function (label) {
                label.classList.remove('checked'); // Снять класс 'checked' у каждого label
            });
        }
    </script>
    <footer class="py-5 blog-footer">
        <div class="container">
            <p class="m-0 text-center text-black"> &copy; Инфосэл Все права защищены</p>
        </div>
    </footer>
</body>
</html>