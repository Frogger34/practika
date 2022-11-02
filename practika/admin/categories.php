<?php
    include("../config/config.php");
    session_start();
    include("user_chk.php");
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body class="bg-light">

    <aside class="d-none d-md-block">
        <div class="d-flex flex-column flex-shrink-0 p-3 h-100" style="width: 280px; background-color: #417cbf;">
            <a href="index.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                <svg class="bi pe-none me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
                <span class="fs-4">Copy Star</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="#" class="nav-link text-white" aria-current="page">
                        Заказы <span class="badge text-bg-primary">0</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="items.php" class="nav-link text-white">
                        Товары
                    </a>
                </li>
                <li class="nav-item">
                    <a href="categories.php" class="nav-link text-white">
                        Категории
                    </a>
                </li>
            </ul>
        </div>
    </aside>

    <header class="d-md-none d-sm-block">
        <nav class="navbar navbar-dark navbar-expand-lg" style="background-color: #417cbf;">
            <div class="container">
                <a class="navbar-brand" href="index.php">Copy Star</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav m-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a href="#" class="nav-link text-white" aria-current="page">
                                Заказы <span class="badge text-bg-primary">0</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="items.php" class="nav-link text-white">
                                Товары
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="categories.php" class="nav-link text-white">
                                Категории
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Добавление категорий через модальное окно -->
    <div class="modal fade" id="addCategory" tabindex="-1" aria-labelledby="cat_add" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" id="cat_form" class="needs-validation" novalidate>
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Добавление категории</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-2">
                            <input type="text" name="catName" id="catInput" placeholder="Название категории" class="form-control" required>
                        </div>
                        <div class="invalid-feedback" id='catError'>
                                Добавьте название категории
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                        <button type="submit" class="btn btn-primary">Добавить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <main class="orders py-4">
        <div class="container">
            <div class="row">
                <div class="col-1">
                    <h3>Список категорий</h3>
                </div>
                <div class="col-10 align-self-center ms-5">
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addCategory">Добавить</button>
                </div>
            </div>
            <div class="bg-white shadow-sm rounded p-4">
                <div class="scroll-table">
                    <div class="row mb-3 align-items-center">
                        <div class="col-4 text-center">
                            <strong>№</strong>
                        </div>

                        <div class="col-4">
                            <strong>Название категории</strong>
                        </div>

                    </div>

                    <!-- Добавляет карточку категории -->
                    <? include("../shop/db_interact/cat_list.php"); ?>

                </div>
            </div>
        </div>
    </main>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/jquery-3.6.1.min.js"></script>
    <script src="db_debug/cat_add.js"></script>
</body>
</html>