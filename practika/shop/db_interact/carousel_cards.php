<?php
    $sql_q = "SELECT * FROM items";
    $res = mysqli_query($conn, $sql_q);
    $output = "";
    $id = 0;

    while ($rec = mysqli_fetch_assoc($res)) {
        ++$id;
        $name = $rec['item_name'];
        $cost = $rec['cost'];
        $img = $rec['item_img'];
        // Если первый элем. слайдера не выведен, выводит его с классом "carousel-item active"
        if ($id == 1) {
            $output.= "
        <div class='carousel-item active'>
        <div class='card mb-3' style='max-width: fit-content;'>
        <div class='row g-0'>
            <div class='col-md-3 d-flex justify-content-center m-md-3 m-sm-0'>
                <img src='$img' class='rounded-start' height='200' width='200'>
            </div>
            <div class='col-md-8'>
                <div class='card-body'>
                    <h5 class='card-title'>$name</h5>
                    <p class='card-text'>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Adipisci optio ipsam,
                        vero at, consequuntur nostrum recusandae molestiae odit officia culpa iusto, asperiores alias
                        assumenda? Molestias rem pariatur facilis ex exercitationem.</p>
                    <p class='card-text'><small class='text-muted'><strong>$cost руб.</strong></small></p>
                    <div>
                        <form method='GET'>
                            <a href='item.php?id=$id' target='_blank' class='btn btn-sm btn-outline-primary'>Купить</a>
                            <a href='item.php?id=$id' target='_blank' class='btn btn-sm btn-primary'>В корзину</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>";
        }
        // Иначе выводит без класса "active"
        else {
            $output.= "
        <div class='carousel-item'>
        <div class='card mb-3' style='max-width: fit-content;'>
        <div class='row g-0'>
            <div class='col-md-3 d-flex justify-content-center m-md-3 m-sm-0'>
                <img src='$img' class='rounded-start' height='200' width='200'>
            </div>
            <div class='col-md-8'>
                <div class='card-body'>
                    <h5 class='card-title'>$name</h5>
                    <p class='card-text'>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Adipisci optio ipsam,
                        vero at, consequuntur nostrum recusandae molestiae odit officia culpa iusto, asperiores alias
                        assumenda? Molestias rem pariatur facilis ex exercitationem.</p>
                    <p class='card-text'><small class='text-muted'><strong>$cost руб.</strong></small></p>
                    <div>
                        <form method='GET'>
                            <a href='item.php?id=$id' target='_blank' class='btn btn-sm btn-outline-primary'>Купить</a>
                            <a href='item.php?id=$id' target='_blank' class='btn btn-sm btn-primary'>В корзину</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>";
        }
    }
    echo $output;
?>