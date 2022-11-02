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
    <title>Контакты</title>
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
                            <a class="nav-link active" aria-current="page" href="#">Где нас найти?</a>
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

    <!-- Контейнео "Где нас найти" -->
    <div class="container py-4">
        <h4><strong>Где нас найти?</strong></h4>
        <div class="card">
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-md-6 col-12">
                        <h3 class="mb-5"><strong>Адрес: </strong>1-й Волконский пер., 9 строение 3</h3>
                    </div>
                    <div class="col-md-6 col-12">
                        <h3><strong>Контакты:</strong></h3>
                        <div class="px-3">
                            <h4><strong>Номер телефона:</strong> +7 (984) 33-54-965</h4>
                            <h4><strong>Телеграмм:</strong> t.me/music_house</h4>
                            <h4><strong>Вконтакте:</strong> https://vk.com/page-9656652_43435435</h4>
                            <h4><strong>Инстаграмм:</strong> instagram.com/music_house_IG</h4>
                        </div>
                    </div>
                </div>
                <div class="ratio ratio-16x9">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d727.5473117803136!2d37.616532362439486!3d55.774792069648505!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46b54a14a9c07045%3A0xf45360f28fe5fa01!2zMS3QuSDQktC-0LvQutC-0L3RgdC60LjQuSDQv9C10YAuLCA5INGB0YLRgNC-0LXQvdC40LUgMywg0JzQvtGB0LrQstCwLCAxMjc0NzM!5e0!3m2!1sru!2sru!4v1667204379374!5m2!1sru!2sru" style="border:0;" referrerpolicy="no-referrer-when-downgrade" class="border rounded"></iframe>
                </div>
            </div>
        </div>
    </div>

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
                <li class="nav-item"><a href="../index.php" class="nav-link px-2 text-muted">Каталог</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Где нас найти?</a></li>
            </ul>
        </footer>
    </div>

    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/jquery-3.6.1.min.js"></script>
    <script src="../reg/reg.js"></script>
    <script src="../auth/log.js"></script>
</body>

</html>