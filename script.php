<?php
// Отслеживание текущей страницы
$currentPagePath = $_SERVER['REQUEST_URI'];

// Отслеживание времени входа на сайт
$currentTime = date('Y-m-d H:i:s');

// Параметры для соединения с базой данных
$server = "127.0.0.1";
$user = "root";
$pass = "1";
$dbname = "bd_infocell_tracking";
$dbtable = "tracking_data";

// Создаем соединение с базой данных
$conn = new mysqli($server, $user, $pass, $dbname);

// Проверяем соединение на ошибки
if ($conn->connect_error) {
    die("Ошибка соединения: " . $conn->connect_error);
}

// Подготавливаем SQL-запрос для вставки данных в таблицу
$sql = "INSERT INTO tracking_data (pagePath, entryTime) VALUES (?, ?)";

// Подготавливаем запрос
if ($stmt = $conn->prepare($sql)) {
    // Привязываем параметры
    $stmt->bind_param("ss", $currentPagePath, $currentTime);

    // Выполняем запрос
    if ($stmt->execute()) {
        // Данные успешно добавлены
        echo "";
    } else {
        // Ошибка при выполнении запроса
        echo "" . $stmt->error;
    }

    // Закрываем запрос
    $stmt->close();
} else {
    // Ошибка при подготовке запроса
    echo "Ошибка при подготовке запроса: " . $conn->error;
}

// Закрываем соединение с базой данных
$conn->close();
?>