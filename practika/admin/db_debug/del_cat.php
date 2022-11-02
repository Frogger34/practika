<?php
    include("../../config/config.php");
    $id = $_GET['id'];

    $sql = "DELETE FROM categories WHERE id= '$id'";
    if (mysqli_query($conn, $sql)) {
        header("location: ../categories.php");
        return 0;
    } else {
        die("Error");
    }
?>