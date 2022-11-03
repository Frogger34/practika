<?php
    include("../config/config.php");
    session_start();
      
    include("../config/session.php");
    if (isset($_SESSION['user_type']) && $_SESSION['user_type'] && $_SESSION['adminTrue']) {
        include("../admin/user_chk.php");
    }

    // Выводит данные согласно БД с помощью foreach()
    include("db_interact/items.php");
    foreach($data as $res) :
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $res['item_name'], " - ", $res['country'] ?></title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>

    <!-- Регистрация -->
    <div class="modal fade" id="reg" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" id="reg_form" class="needs-validation" novalidate>
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Регистрация</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-2">
                            <input type="text" name="name" id="nameInput" placeholder="Имя*" class="form-control"
                                required>
                            <div class="invalid-feedback">
                                Заполните поле имени
                            </div>
                        </div>

                        <div class="mb-2">
                            <input type="text" name="surname" id="surnameInput" placeholder="Фамилия*"
                                class="form-control" required>
                            <div class="invalid-feedback">
                                Заполните поле фамилии
                            </div>
                        </div>

                        <div class="mb-2">
                            <input type="text" name="patronymic" id="patronymicInput" placeholder="Отчество"
                                class="form-control">
                            <div class="invalid-feedback">
                                тест
                            </div>
                        </div>

                        <div class="mb-2">
                            <input type="text" name="login" id="loginInput" placeholder="Логин*" class="form-control"
                                required>
                            <div class="invalid-feedback">
                                Заполните поле логина
                            </div>
                        </div>

                        <div class="mb-2">
                            <input type="email" name="email" id="emailInput" placeholder="Почта*" class="form-control"
                                required>
                            <div class="invalid-feedback">
                                Заполните поле почты
                            </div>
                        </div>

                        <div class="mb-2">
                            <input type="password" name="pass" id="passInput" placeholder="Пароль*" class="form-control"
                                required>
                            <div class="invalid-feedback">
                                Заполните поле пароля!
                            </div>
                        </div>

                        <div class="mb-2">
                            <input type="password" name="pass_repeat" id="pass_repeatInput" placeholder="Повтор пароля*"
                                class="form-control" required>
                            <div class="invalid-feedback">
                                Сначала пароль напиши...
                            </div>
                        </div>

                        <div class="mb-2">
                            <input type="checkbox" name="rules" id="rulesInput" class="form-check-input me-2" required>
                            <label for="rulesInput">
                                Я согласен с правилами регистрации.*
                            </label>
                            <div class="invalid-feedback" id="rulesError">
                                Вы должны согласиться с правилами!
                            </div>
                        </div>

                        <div class="mb-2 d-flex justify-content-center">
                            <div class="invalid-feedback" id="overallError">

                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                        <button type="submit" class="btn btn-primary">Регистрация</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Вход -->
    <div class="modal fade" id="auth" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" id="log_form" class="needs-validation" novalidate>
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Аутентификация</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-2">
                            <input type="text" name="loginLog" id="loginInput" placeholder="Логин" class="form-control"
                                required>
                            <div class="invalid-feedback">
                                Незаполнено поле логина!
                            </div>
                        </div>

                        <div class="mb-2">
                            <input type="password" name="passLog" id="passwordInput" placeholder="Пароль"
                                class="form-control" required>
                            <div class="invalid-feedback">
                                Не заполнено поле пароля!
                            </div>
                        </div>

                        <div class="mb-2">
                            <div class="invalid-feedback" id="overall1Error">

                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                        <button type="submit" class="btn btn-primary">Авторизироваться</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

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
                    <a href="cart.php" class="btn btn-primary me-2 <?= $_SESSION['adminTrue'] ? $show_opt_admin : $show_opt ?>">Корзина</a>
                    <a href="my_orders.php" class="btn btn-primary me-2 <?= $_SESSION['adminTrue'] ? $show_opt_admin : $show_opt ?>">Мои заказы</a>
                    <a href="../auth/logout.php" class="btn btn-outline-dark text-white <?= $_SESSION['adminTrue'] ? $show_opt_admin : $show_opt ?>">Выход</a>
                    <button type="button" class="btn btn-primary me-2 <?= $show_opt_unregUser ?>" data-bs-toggle="modal" data-bs-target="#auth">Вход</button>
                    <button type="button" class="btn btn-primary <?= $show_opt_unregUser ?>" data-bs-toggle="modal" data-bs-target="#reg">Регистрация</button>
                </div>
            </div>
        </nav>
    </header>

    <!-- Карточка товара -->
    <section id="item" class="py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-sm-12">
                    <div class="w-100 border p-4">
                        <img src="<?= $res['item_img'] ?>" width="100%">
                    </div>
                </div>

                <div class="col-md-7 col-sm-12">
                    <h1 class="d-flex align-items-center mb-3 mt-md-0 mt-3"><?= $res['item_name'] ?><span class="badge bg-danger ms-2"><?= $res['country'] ?></span></h1>

                    <p class="mb-1"><strong>Страна-производитель: </strong><?= $res['country'] ?></p>
                    <p class="mb-1"><strong>Год выпуска: </strong><?= $res['year'] ?></p>                 
                    <p><strong>Модель: </strong><?= $res['model'] ?></p>

                    <h2 class="my-2"><?= $res['cost'] ?> руб.</h2>
                    <p class="mt-0"><strong>Количество: </strong><?= $res['cout'] ?> шт.</p>

                    <p class="ms-3 m-0 <?= $show_opt_unregUser ?>"><b>Вам нужно войти или зарегистрироваться, чтобы добавить товар в коризну</b></p>

                    <div class="row <?= $show_opt_unregUser ?>">
                        <div class="col-3 ms-2">
                            <button type="button" class="btn btn-primary btn-lg mt-2" data-bs-toggle="modal" data-bs-target="#auth">Вход</button>
                        </div>
                        <div class="col-1">
                            <button type="button" class="btn btn-primary btn-lg mt-2 ms-2 " data-bs-toggle="modal" data-bs-target="#reg">Регистрация</button>
                        </div>                       
                    </div>

                    <a href="cart.php" class="btn btn-primary btn-lg <?= $_SESSION['adminTrue'] ? $show_opt_admin : $show_opt ?>">Добавить в корзину</a>
                    
                </div>
            </div>
        </div>
    </section>
    <?php endforeach; ?>

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
                <li class="nav-item"><a href="about_us.php" class="nav-link px-2 text-muted">О нас</a></li>
                <li class="nav-item"><a href="../admin/index.php" class="nav-link px-2 text-muted">Каталог</a></li>
                <li class="nav-item"><a href="find_us.php" class="nav-link px-2 text-muted">Где нас найти?</a></li>
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