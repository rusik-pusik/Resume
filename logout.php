<?php
session_start();
session_unset();
session_destroy();
header("Location: doci.php"); // Перенаправление на главную страницу после выхода
exit();
?>