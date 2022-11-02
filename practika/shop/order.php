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
    <title>Оформление заказа</title>
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
                <a class="navbar-brand" href="#">Copy Star</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav m-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../shop/about_us.php">О нас</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Каталог</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../shop/find_us.php">Где нас найти?</a>
                        </li>
                    </ul>
                    <a href="../admin/panel_main.php" target="_blank" class="btn btn-success me-2 <?= $show_opt_admin ?>">Панель админа</a>
                    <a href="cart.php" class="btn btn-primary me-2 <?= $_SESSION['adminTrue'] ? $show_opt_admin : $show_opt ?>">Корзина</a>
                    <a href="my_orders.php" class="btn btn-primary me-2 <?= $_SESSION['adminTrue'] ? $show_opt_admin : $show_opt ?>">Мои заказы</a>
                    <a href="../auth/logout.php" class="btn btn-outline-dark text-white <?= $_SESSION['adminTrue'] ? $show_opt_admin : $show_opt ?>">Выход</a>
                    <button type="button" class="btn btn-primary me-2 <?= $show_opt_unregUser ?>" data-bs-toggle="modal" data-bs-target="#auth">Вход</button>
                    <button type="button" class="btn btn-primary <?= $show_opt_unregUser ?>" data-bs-toggle="modal" data-bs-target="#reg">Регистрация</button>
                </div>
            </div>
        </nav>
    </header>

    

    <!-- Форма оформления заказа -->
    <section id="order" class="py-4">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Оформление заказа</h2>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-lg-6 col-md-5 col-sm-12">
                    <div class="row">
                        <div class="col-sm-6 col-12">
                            <form method="post" class="mb-2">
                                <label for="pay" class="mb-1"><strong>Тип оплаты</strong></label>
                                <select id="pay" class="form-select">
                                    <option value="bank">Банковская карта</option>
                                    <option value="nal">Наличными</option>
                                </select>
                            </form>
                        </div>

                        <div class="col-sm-6 col-12">
                            <form method="post">
                                <label for="deliver" class="mb-1"><strong>Тип получения</strong></label>
                                <select id="deliver" class="form-select">
                                    <option value="self">Самовывоз</option>
                                    <option value="delivery">Доставка</option>
                                    <option value="ros">Почта России</option>
                                </select>
                            </form>
                        </div>
                    </div>

                    <textarea class="form-control mt-3" cols="30" rows="1" placeholder="Укажите Ваш адрес"></textarea>
                    <div class="row">
                        <div class="col-xxl-8 col-lg-6 col-12">
                            <input type="password" placeholder="Введите пароль для потверждения заказа" class="form-control mt-3">
                        </div>
                        <div class="col-xxl-4 col-lg-6 col-12 d-grid">
                            <button type="submit" class="btn btn-primary mt-3">Сформировать заказ</button>
                        </div>
                    </div>                   
                </div>

                <div class="col-lg-6 col-md-7 col-sm-12 mt-md-0 mt-sm-3 mt-3">
                    <div class="bg-primary bg-opacity-25 p-4 rounded">
                        <!-- Табличная сетка -->
                        <div class="row align-items-center mb-3 p-1">
                            <div class="col-sm-2 col-1 text-center"><strong>№</strong></div>
                            <div class="col-sm-4 col-5 text-center"><strong>Название</strong></div>
                            <div class="col-sm-3 col-3 text-center"><strong>Кол-во</strong></div>
                            <div class="col-sm-3 col-3 text-center"><strong>Сумма</strong></div>
                        </div>

                        <!-- Товар в табличном представлении -->
                        <div class="row align-items-center mb-3 border border-primary border-opacity-25 rounded p-1">
                            <div class="col-sm-2 col-1 text-center">1</div>
                            <div class="col-sm-4 col-5 text-center"><strong>NEWART GC-20</strong></div>
                            <div class="col-sm-3 col-3 text-center"><strong>2</strong></div>
                            <div class="col-sm-3 col-3 text-center"><strong>10 000 руб.</strong></div>
                        </div>
                        <div class="row align-items-center mb-3 border border-primary border-opacity-25 rounded p-1">
                            <div class="col-sm-2 col-1 text-center">1</div>
                            <div class="col-sm-4 col-5 text-center"><strong>NEWART GC-20</strong></div>
                            <div class="col-sm-3 col-3 text-center"><strong>2</strong></div>
                            <div class="col-sm-3 col-3 text-center"><strong>10 000 руб.</strong></div>
                        </div>
                        <div class="row align-items-center mb-3 border border-primary border-opacity-25 rounded p-1">
                            <div class="col-sm-2 col-1 text-center">1</div>
                            <div class="col-sm-4 col-5 text-center"><strong>NEWART GC-20</strong></div>
                            <div class="col-sm-3 col-3 text-center"><strong>2</strong></div>
                            <div class="col-sm-3 col-3 text-center"><strong>10 000 руб.</strong></div>
                        </div>
                        <div class="row">
                            <div class="col-12 text-end">
                                <h4>Общая сумма: <span class="badge bg-primary bg-opacity-50 ms-2">30 000 руб.</span></h4>
                            </div>
                        </div>
                    </div>
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
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">О нас</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Каталог</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Где нас найти?</a></li>
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