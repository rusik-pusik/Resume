<?php
session_start();

// Подключение класса AdLdap
require_once 'AdLdap.php';

// Параметры подключения к AD
$ldap_server = "ldap://127.0.0.1";
$ldap_port = 389;
$ldap_user = "cn=username,cn=Users,dc=domain,dc=ru"; 
$ldap_password = "Пароль";

// Добавление отладочной информации
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Проверка значений переменных
    if (!$ldap_server || !$ldap_port || !$username || !$password) {
        die('Ошибка: отсутствуют необходимые параметры.');
    }

    // Параметры для создания объекта AdLdap
    $options = array(
        "domain_controllers" => array($ldap_server),
        "ad_username" => $username,
        "ad_password" => $password,
        "use_ssl" => false, // Измените на true, если используете SSL
        "port" => $ldap_port
    );

    try {
        // Создание объекта AdLdap
        $ldap = new AdLdap($options);

        // Поиск пользователя в AD
        $filter = "(sAMAccountName={$username})";
        $entries = $ldap->searchUser($filter);

        if ($entries && $entries["count"] > 0) {
            // Успешная авторизация, сохранение логина пользователя в сессии
            $_SESSION['user'] = $username;
            header("Location: doci.php");
            exit();
        } else {
            echo "<script>alert('Ошибка: Пользователь с таким логином не найден.');</script>";
        }

        $ldap->close();
    } catch (Exception $e) {
        echo "Ошибка: " . $e->getMessage();
    }
}
?>
