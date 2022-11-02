<?php
    // Включает файл конфига
    include("../config/config.php");

    // Элементы почты, которые должны включаться
    $pattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^";

    // Проверка на введенные данные
    if (isset($_POST['login']) && $_POST['login'] && isset($_POST['pass']) && $_POST['pass'] && isset($_POST['email']) && $_POST['email'] && isset($_POST['pass_repeat']) && $_POST['pass_repeat'] && isset($_POST['name']) && $_POST['name'] && isset($_POST['surname']) && $_POST['surname'] && isset($_POST['rules'])) {
        
        // Длина введенного пароля
        $length = $_POST['pass'];

        // Проверка на правильность ввода имени
        if (!preg_match ("/^[а-яА-я]/", $_POST['name'])) {      
            echo json_encode(array('success' => 2));
            return 0;
        }
        else {
            $name = $_POST['name'];
        }

        // Проверка на правильность ввода фамилии
        if (!preg_match ("/^[а-яА-я]/", $_POST['surname'])) {      
            echo json_encode(array('success' => 2));
            return 0;
        }
        else {
            $lastname = $_POST['surname'];
        }

        // Проверка на правильность ввода отчества (если введен)
        if (isset($_POST['patronymic']) && $_POST['patronymic']) {
            if (!preg_match ("/^[а-яА-я]/", $_POST['patronymic'])) {      
                echo json_encode(array('success' => 2));
                return 0;
            }
            else {
                $patronymic = $_POST['patronymic'];
            }
        }     

        // Проверка на правильность ввода логина
        if (!preg_match ("/^[a-zA-z]/", $_POST['login'])) {      
            echo json_encode(array('success' => 2));
            return 0;
        }
        else {
            $login = $_POST['login'];
        }
    
        // Проверка на правильность ввода почты
        if (!preg_match ($pattern, $_POST['email'])) {
            echo json_encode(array('success' => 2));
            return 0;
        } 
        else {
            $email = $_POST['email'];
        }

        // Проверка длины пароля
        if ($length < 6) {
            echo json_encode(array('success' => 2));
            return 0;
        }
        else {
            $pass = $_POST['pass'];
            $passRep = $_POST['pass_repeat'];
        }
        
        // Проверка совпадения пароля и после, если все верно, успешная регистрация
        if ($pass == $passRep) {
            $pass = md5($pass);
            $conn->query("INSERT INTO users(name, lastname, patronymic, email, login, pass, user_type) VALUE ('{$name}', '{$lastname}', '{$patronymic}', '{$email}', '{$login}', '{$pass}', '1')");

            session_start();
            $_SESSION['user_type'] = $usr_type;
            $_SESSION['login'] = $user;

            if(!isset($_SESSION['login_user'])){
                header("location: login.php");
                die();
            }
            if ($usr_type == 2) {
                $_SESSION['adminTrue'] = 1;
            }
            else if ($usr_type == 1) {
                $_SESSION['adminTrue'] = 0;
            }

            echo json_encode(array('success' => 1));
        }
        else {
            echo json_encode(array('success' => 3.7));
            return 0;
        }
    }
    else {
        echo json_encode(array('success' => '0'));
    }
        

?>