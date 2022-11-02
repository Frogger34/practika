<?php
    $conn = new mysqli('localhost', 'root', '', 'server_db');
    $conn->set_charset("utf8");

    // Проверка на работу сервера
    if ($conn == false) {
        header("Location: error_site/error.php");
        die();
    }
?>