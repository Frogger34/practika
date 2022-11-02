<?php
    $sql_q = "SELECT * FROM items";
    $res = mysqli_query($conn, $sql_q);
    $output = "";
    $id = 0;
    session_start();

    while ($rec = mysqli_fetch_assoc($res)) {
        ++$id;
        $name = $rec['item_name'];
        $category = $rec['item_cat'];
        $cost = $rec['cost'];
        $img = $rec['item_img'];
        // Переменная является целым блоком html, выводит карточку товара из БД
        if ($_SESSION['adminTrue'] == 0) {
            $output.= "
        <div class='col-md-4 col-sm-6 mb-4'>
        <a href='shop/item.php?id=$id' target='_blank' class='text-decoration-none'>
        <div class='card shadow-sm'>
            <div class='p-4'>
                <img src='$img' class='rounded-start' height='211' width='211'>
            </div>
            <div class='card-body'>
                <h5 class='card-title text-dark mb-1'>$name</h5>
                <h6 class='text-muted text-dark mt-0 mb-2'>$category</h6>
                <div class='d-flex justify-content-between align-items-center'>
                    <div><button href='shop/item.php?id=$id' class='btn btn-sm btn-outline-secondary'>Подробнее</button></div>
                    <small class='text-muted'><strong>$cost руб.</strong></small>
                </div>
            </div>
        </div>
        </a>
        </div>";
        }
        else {
            $output.= "
        <div class='col-md-4 col-sm-6 mb-4'>
        <a href='../shop/item.php?id=$id' target='_blank' class='text-decoration-none'>
        <div class='card shadow-sm'>
            <div class='p-4'>
                <img src='$img' class='rounded-start' height='211' width='211'>
            </div>
            <div class='card-body'>
                <h5 class='card-title text-dark mb-1'>$name</h5>
                <h6 class='text-muted text-dark mt-0 mb-2'>$category</h6>
                <div class='d-flex justify-content-between align-items-center'>
                    <div><button href='../shop/item.php?id=$id' class='btn btn-sm btn-outline-secondary'>Подробнее</button></div>
                    <small class='text-muted'><strong>$cost руб.</strong></small>
                </div>
            </div>
        </div>
        </a>
        </div>";
        }
        
    }
    echo $output;
?>