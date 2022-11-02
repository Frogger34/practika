<?php
include("../config/config.php");
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form
    if (isset($_POST['loginLog']) && $_POST['loginLog'] && isset($_POST['passLog']) && $_POST['passLog'] ) {
        // Экранизирует строки      
        $user = mysqli_real_escape_string($conn, $_POST['loginLog']);
        $usr_pass = mysqli_real_escape_string($conn, md5($_POST['passLog']));
        
        // Подготавливает команду SELECT(?)
        $sql = "SELECT login, pass, user_type FROM users WHERE login = '$user' AND pass = '$usr_pass'";

        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        // Получает кол-во строк
        $count = mysqli_num_rows($result);

        $usr_type = $row['user_type'];

        if($count == 1) {          
            $_SESSION['user_type'] = $usr_type;
            $_SESSION['login_user'] = $user;
            echo json_encode(array('success' => "1"));
        }
        else {
            echo json_encode(array('success' => "2"));
        }
    }
    else {
        echo json_encode(array('success' => "2"));
    }
}
else {
    echo json_encode(array('success' => "0"));
}
?>