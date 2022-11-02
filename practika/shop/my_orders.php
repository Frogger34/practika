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
    <title>Мои заказы</title>
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
                <a class="navbar-brand" href="../index.php">Copy Star</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav m-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="about_us.php">О нас</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../index.php">Каталог</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="find_us.php">Где нас найти?</a>
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
    <!-- Карточки заказов -->
    <section id="myOrders" class="py-4">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-4">
                    <h2>Мои заказы</h2>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-3 col-md-4 col-sm-6 mb-2">
                    <div class="bg-white border border-secondary border-opacity-25 rounded shadow-sm p-4">
                        <h5><strong>Заказ №1 от 26.10.2022</strong></h5>
                        <p class="mb-2"><strong>Количество товаров: </strong>3</p>
                        <span class="badge text-bg-primary">Новый</span>
                        <a href="#" class="badge text-bg-danger" style="text-decoration: none;">Удалить</a>
                    </div>
                </div>
                
                <div class="col-xl-3 col-md-4 col-sm-6 mb-2">
                    <div class="bg-white border border-secondary border-opacity-25 rounded shadow-sm p-4">
                        <h5><strong>Заказ №2 от 26.10.2022</strong></h5>
                        <p class="mb-2"><strong>Количество товаров: </strong>3</p>
                        <span class="badge text-bg-warning">Отправлен</span>
                    </div>
                </div>

                <div class="col-xl-3 col-md-4 col-sm-6 mb-2">
                    <div class="bg-white border border-secondary border-opacity-25 rounded shadow-sm p-4">
                        <h5><strong>Заказ №3 от 26.10.2022</strong></h5>
                        <p class="mb-2"><strong>Количество товаров: </strong>3</p>
                        <span class="badge text-bg-success">Выполнен</span>
                    </div>
                </div>

                <div class="col-xl-3 col-md-4 col-sm-6 mb-2">
                    <div class="bg-white border border-secondary border-opacity-25 rounded shadow-sm p-4">
                        <h5><strong>Заказ №4 от 26.10.2022</strong></h5>
                        <p class="mb-2"><strong>Количество товаров: </strong>3</p>
                        <span class="badge text-bg-danger">Отклонен</span>
                    </div>
                </div>

                <div class="col-xl-3 col-md-4 col-sm-6 mb-2">
                    <div class="bg-white border border-secondary border-opacity-25 rounded shadow-sm p-4">
                        <h5><strong>Заказ №5 от 26.10.2022</strong></h5>
                        <p class="mb-2"><strong>Количество товаров: </strong>3</p>
                        <span class="badge text-bg-primary">Новый</span>
                        <a href="#" class="badge text-bg-danger" style="text-decoration: none;">Удалить</a>
                    </div>
                </div>

                <div class="col-xl-3 col-md-4 col-sm-6 mb-2">
                    <div class="bg-white border border-secondary border-opacity-25 rounded shadow-sm p-4">
                        <h5><strong>Заказ №6 от 26.10.2022</strong></h5>
                        <p class="mb-2"><strong>Количество товаров: </strong>3</p>
                        <span class="badge text-bg-primary">Новый</span>
                        <a href="#" class="badge text-bg-danger" style="text-decoration: none;">Удалить</a>
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
    
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>