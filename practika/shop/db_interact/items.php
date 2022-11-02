<?php
    include("../config/config.php");
    $id = $_GET['id'];
    $sql = "SELECT * FROM items WHERE id='$id'";
    $res = mysqli_query($conn, $sql);
    $data[] = mysqli_fetch_assoc($res);
?>