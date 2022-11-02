<?php
    $sql_q = "SELECT * FROM categories";
    $res = mysqli_query($conn, $sql_q);
    $output = "";
    $id = 0;
    session_start();

    while ($rec = mysqli_fetch_assoc($res)) {
        ++$id;
        $cat_id = $rec['id'];
        $cat_name = $rec['category'];
        // Переменная является целым блоком html, выводит категории в виде списка из БД
        $output.= "
        <div class='row mb-2 align-items-center' name='$cat_id'>
                        <div class='col-4 text-center'>$cat_id</div>
                        <div class='col-4'><strong>$cat_name</strong></div>
                        <div class='col-1'>
                            <a href='db_debug/del_cat.php?id=$cat_id' class='btn btn-danger'>Удалить</a>
                        </div>
                    </div>";
    }
    echo $output;
?>