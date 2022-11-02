<?php
    if (isset($_SESSION['user_type']) && $_SESSION['user_type']) {
        if ($_SESSION['adminTrue']) {
            return 0;
        }
        else {
            header("Location: ../index.php");
        }
    }
    else {
        header("Location: ../index.php");
    }
?>