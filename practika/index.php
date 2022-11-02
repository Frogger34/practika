<?php
    include("config/config.php");
    session_start();

    include("config/session.php");
    if (isset($_SESSION['user_type']) && $_SESSION['user_type'] && $_SESSION['adminTrue']) {
        include("admin/user_chk.php");
    }
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Copy Star - Главная</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
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
            if ($_SESSION['user_type'] == '1') {
                $show_opt = "d-inline-block";
                $show_opt_unregUser = "d-none";
            }
        }
        else {
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
                            <a class="nav-link active" aria-current="page" href="shop/about_us.php">О нас</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Каталог</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="shop/find_us.php">Где нас найти?</a>
                        </li>
                    </ul>
                    <a href="shop/cart.php" class="btn btn-primary me-2 <?= $show_opt ?>">Корзина</a>
                    <a href="shop/my_orders.php" class="btn btn-primary me-2 <?= $show_opt ?>">Мои заказы</a>
                    <a href="../auth/logout.php" class="btn btn-outline-dark text-white <?= $show_opt ?>">Выход</a>
                    <button type="button" class="btn btn-primary me-2 <?= $show_opt_unregUser ?>" data-bs-toggle="modal" data-bs-target="#auth">Вход</button>
                    <button type="button" class="btn btn-primary <?= $show_opt_unregUser ?>" data-bs-toggle="modal" data-bs-target="#reg">Регистрация</button>
                </div>
            </div>
        </nav>
    </header>


    <!-- Слайдер -->
    <section id="home" class="bg-light py-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div id="carouselExampleIndicators" class="carousel carousel-dark slide" data-bs-ride="true">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                                class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                                aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                                aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <h1>Тема сайта 1</h1>
                                <p class="fs-5 col-md-8">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptate earum, provident ad aperiam, inventore excepturi repellendus quis odio facere dolores laboriosam molestiae quos nobis unde ipsam dignissimos architecto accusamus iure.</p>
                                <div class="mb-5">
                                    <a href="shop/find_us.php" class="btn btn-primary btn-lg">Где нас найти?</a>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <h1>Тема сайта 2</h1>
                                <p class="fs-5 col-md-8">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptate earum, provident ad aperiam, inventore excepturi repellendus quis odio facere dolores laboriosam molestiae quos nobis unde ipsam dignissimos architecto accusamus iure.</p>
                                <div class="mb-5">
                                    <a href="shop/find_us.php" class="btn btn-primary btn-lg">Где нас найти?</a>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <h1>Тема сайта 3</h1>
                                <p class="fs-5 col-md-8">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptate earum, provident ad aperiam, inventore excepturi repellendus quis odio facere dolores laboriosam molestiae quos nobis unde ipsam dignissimos architecto accusamus iure.</p>
                                <div class="mb-5">
                                    <a href="shop/find_us.php" class="btn btn-primary btn-lg">Где нас найти?</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Товары и категории -->
    <section id="catalog" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-12 mb-md-3">
                    <h5>Категории</h5>
                    <ul class="list-group mb-md-1">
                        <li class="list-group-item"><a href="#" class="text-dark text-decoration-none">Струйные</a></li>
                        <li class="list-group-item"><a href="#" class="text-dark text-decoration-none">Лазерные</a>
                        </li>
                        <li class="list-group-item"><a href="#" class="text-dark text-decoration-none">МФУ</a>
                        </li>
                    </ul>

                    <h5 class="py-2">Сортировать</h5>
                    <select class="form-select" id="sort">
                        <option value="year">По году производства</option>
                        <option value="name">По имени</option>
                        <option value="price">По цене</option>
                    </select>
                </div>
                <div class="col-lg-9 col-md-12 mt-sm-2">
                    <h5>Все товары</h5>
                    <div class="row">
                        <!-- Карточка товара -->
                        <?php
                            include("shop/db_interact/item_card.php");
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Футер сайта -->
    <div class="container">
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
            <p class="col-md-4 mb-0 text-muted">© 2022 Copy Star</p>

            <a href="/"
                class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
                <svg class="bi me-2" width="40" height="32">
                    <use xlink:href="#bootstrap"></use>
                </svg>
            </a>

            <ul class="nav col-md-4 justify-content-end">
                <li class="nav-item"><a href="shop/about_us.php" class="nav-link px-2 text-muted">О нас</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Каталог</a></li>
                <li class="nav-item"><a href="shop/find_us.php" class="nav-link px-2 text-muted">Где нас найти?</a></li>
            </ul>
        </footer>
    </div>


    <!-- Подключение библиотек -->
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.6.1.min.js"></script>
    <script src="reg/reg.js"></script>
    <script src="auth/log.js"></script>
</body>

</html>