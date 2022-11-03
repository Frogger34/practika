<?php
    include("../config/config.php");
    session_start();
    
    include("../config/session.php");
    if (isset($_SESSION['user_type']) && $_SESSION['user_type'] && $_SESSION['adminTrue']) {
        include("../admin/user_chk.php");
    }
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Корзина</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    
    <!-- Проверяет тип пользователя и выводит соответствующие кнопки -->
    <?php
        if (isset($_SESSION['user_type']) && $_SESSION['user_type']) {
            if ($_SESSION['user_type'] == '2' && $_SESSION['adminTrue'] == '1') {
                $show_opt_admin = "d-inline-block";
                $show_opt = "d-none";
                $show_opt_unregUser = "d-none";
            }
            else if ($_SESSION['user_type'] == '1') {
                $show_opt_admin = "d-none";
                $show_opt = "d-inline-block";
                $show_opt_unregUser = "d-none";
            }
        }
        else {
            $show_opt_admin = "d-none";
            $show_opt = "d-none";
            $show_opt_unregUser = "d-inline-block";
        }
    ?>
    <!-- Навбар -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #417cbf;">
            <div class="container">
                <a class="navbar-brand" href="../admin/index.php">Copy Star</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav m-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="about_us.php">О нас</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../admin/index.php">Каталог</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="find_us.php">Где нас найти?</a>
                        </li>
                    </ul>
                    <a href="../admin/panel_main.php" target="_blank" class="btn btn-success me-2 <?= $show_opt_admin ?>">Панель админа</a>
                    <a href="cart.php" class="btn btn-primary me-2 <?= $show_opt ?>">Корзина</a>
                    <a href="my_orders.php" class="btn btn-primary me-2 <?= $show_opt ?>">Мои заказы</a>
                    <a href="../auth/logout.php" class="btn btn-outline-dark text-white <?= $show_opt || $show_admin ?>">Выход</a>
                    <button type="button" class="btn btn-primary me-2 <?= $show_opt_unregUser ?>" data-bs-toggle="modal" data-bs-target="#auth">Вход</button>
                    <button type="button" class="btn btn-primary <?= $show_opt_unregUser ?>" data-bs-toggle="modal" data-bs-target="#reg">Регистрация</button>
                </div>
            </div>
        </nav>
    </header>

    
    
    <!-- Корзина -->
    <section id="cart" class="py-4">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="d-flex align-items-end">Корзина товаров <span class="badge text-bg-warning ms-2">0</span></h2>
                </div>
            </div>

            <!-- Обозначения таблицы -->
            <div class="row mt-2 mb-3 m-sm-0 m-2">
                <div class="col-xl-1 col-md-1 col-sm-1 col-1 text-center">
                    <strong>№</strong>
                </div>           
                <div class="col-xl-2 col-md-2 d-md-block d-none text-center">
                    <strong>Изображение</strong>
                </div>
                <div class="col-xl-3 col-md-3 col-sm-3 col-3 text-center">
                    <strong>Название товара</strong>
                </div>
                <div class="col-xl-1 col-md-2 col-sm-2 col-3 text-center">
                    <strong>Кол-во</strong>
                </div>
                <div class="col-xl-2 col-md-1 col-sm-2 col-2 text-center">
                    <strong>Цена</strong>
                </div>
                <div class="col-xl-2 col-md-1 col-sm-2 col-2 text-center">
                    <strong>Сумма</strong>
                </div>
            </div>
            
            <!-- Товар в виде табличной строки -->
            <div class="row d-flex align-items-center mb-4 border rounded p-2 m-sm-0 m-2">
                <div class="col-xl-1 col-md-1 col-sm-1 col-1 text-center">1</div>
                <div class="col-xl-2 col-md-2 d-md-block d-none text-center">
                    <img src="../img/printer1.webp" height="80">
                </div>
                <div class="col-xl-3 col-md-3 col-sm-3 col-3 text-center">
                    <strong class="d-flex align-items-center justify-content-center flex-column mb-3" style="font-size: 13px;">NEWART GC-20<span class="d-flex badge bg-danger ms-2">Бельгия</span></strong>
                </div>
                <div class="col-xl-1 col-md-2 col-sm-2 col-3 text-center p-lg-1 pe-md-4">
                    <button type="button" class="count">+</button>
                    <strong id="count">1</strong>
                    <button type="button" class="count ps-md-2">-</button>
                </div>
                <div class="col-xl-2 col-md-1 col-sm-2 col-2 text-center">
                    5000 руб.
                </div>
                <div class="col-xl-2 col-md-1 col-sm-2 col-2 text-center">
                    <strong>5000 руб.</strong> 
                </div>
                <div class="col-xl-1 col-md-2 col-sm-2 col-12 text-center align-items-center mt-sm-0 mt-2">
                    <button type="button" class="btn btn-danger btn-small btn-sm">Удалить</button>
                </div>
            </div>

            <div class="row d-flex align-items-center mb-4 border rounded p-2 m-sm-0 m-2">
                <div class="col-xl-1 col-md-1 col-sm-1 col-1 text-center">1</div>
                <div class="col-xl-2 col-md-2 d-md-block d-none text-center">
                    <img src="../img/MFP1.webp" height="80">
                </div>
                <div class="col-xl-3 col-md-3 col-sm-3 col-3 text-center">
                    <strong class="d-flex align-items-center justify-content-center flex-column mb-3" style="font-size: 13px;">NEWART GC-20<span class="d-flex badge bg-danger ms-2">Бельгия</span></strong>
                </div>
                <div class="col-xl-1 col-md-2 col-sm-2 col-3 text-center p-lg-1 pe-md-4">
                    <button type="button" class="count">+</button>
                    <strong id="count">1</strong>
                    <button type="button" class="count ps-md-2">-</button>
                </div>
                <div class="col-xl-2 col-md-1 col-sm-2 col-2 text-center">
                    5000 руб.
                </div>
                <div class="col-xl-2 col-md-1 col-sm-2 col-2 text-center">
                    <strong>5000 руб.</strong> 
                </div>
                <div class="col-xl-1 col-md-2 col-sm-2 col-12 text-center align-items-center mt-sm-0 mt-2">
                    <button type="button" class="btn btn-danger btn-small btn-sm">Удалить</button>
                </div>
            </div>

            <hr>
            <div class="row">
                <div class="col-12 text-end">
                    <h3>Общая сумма: <span class="badge bg-primary ms-2">15000 руб.</span></h3>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-end mt-3">
                    <a href="order.php" id="order" class="btn btn-outline-primary text-black">Оформить заказ</a>
                </div>
            </div>
        </div>
    </section>


    <!-- Футер сайта -->
    <div class="container">
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
            <p class="col-md-4 mb-0 text-muted">© 2022 Copy Star</p>

            <a href="/" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
                <svg class="bi me-2" width="40" height="32">
                    <use xlink:href="#bootstrap"></use>
                </svg>
            </a>

            <ul class="nav col-md-4 justify-content-end">
                <li class="nav-item"><a href="shop/about_us.php" class="nav-link px-2 text-muted">О нас</a></li>
                <li class="nav-item"><a href="../admin/index.php" class="nav-link px-2 text-muted">Каталог</a></li>
                <li class="nav-item"><a href="shop/find_us.php" class="nav-link px-2 text-muted">Где нас найти?</a></li>
            </ul>
        </footer>
    </div>
    
    <!-- Подключение библиотек -->
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/jquery-3.6.1.min.js"></script>
    <script src="../reg/reg.js"></script>
    <script src="../auth/log.js"></script>
</body>
</html>