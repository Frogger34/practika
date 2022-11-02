<?php
    if (isset($_POST['login']) && $_POST['login'] && isset($_POST['pass']) && $_POST['pass']) {
        require "../auth/login.php";
        echo json_encode(array('success' => 1));
    }
    else {
        echo json_encode(array('success' => 0));
    }
?>