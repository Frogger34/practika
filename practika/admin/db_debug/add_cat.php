<?php
    include("../../config/config.php");
    if(isset($_POST['catName']) && $_POST['catName']) {
        $name = $_POST['catName'];
        $sql = "INSERT INTO categories(id, category) VALUES (NULL, '$name')";
        if (mysqli_query($conn, $sql)) {
            echo json_encode(array('success' => "1"));
        } else {
            echo json_encode(array('success' => "0"));
        }
    }
    else {
        echo json_encode(array('success' => "0"));
    }
?>