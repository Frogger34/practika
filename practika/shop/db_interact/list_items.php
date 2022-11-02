<?php
    $sql_q = "SELECT * FROM items";
    $res = mysqli_query($conn, $sql_q);
    $output = "";
    $id = 0;
    session_start();

    while ($rec = mysqli_fetch_assoc($res)) {
        ++$id;
        $item_id = $rec['id'];
        $name = $rec['item_name'];
        $category = $rec['item_cat'];
        $country = $rec['country'];
        $cost = $rec['cost'];
        $cout = $rec['cout'];
        $img = $rec['item_img'];
        // Переменная является целым блоком html, выводит карточку товара из БД
        $output.= "
        <div class='row mb-3 align-items-center' id='ids'>
                        <div class='col-1 text-center'>
                            $item_id
                        </div>

                        <div class='col-2 d-lg-flex d-none text-center'>
                            <img src='$img' height='80' alt=''>
                        </div>

                        <div class='col-4 col-sm-3 text-center'>
                           <strong>$name<span class='badge bg-danger ms-2'>$country</span></strong>
                        </div>

                        <div class='col-xxl-3 col-sm-2 col-3 text-center'>
                            $cout
                        </div>

                        <div class='col-md-2 col-sm-3 d-sm-grid d-none text-center'>
                            <strong>$cost</strong> руб/шт.
                        </div>

                        <div class='col-1'>
                            <a href='items_edit.php' class='btn btn-primary btn-sm'>Изменить</a>
                        </div>
        </div>";        
    }
    echo $output;
?>