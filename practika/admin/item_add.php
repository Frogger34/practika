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
    
    <main class="orders py-4">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3>Изменение товара</h3>
                </div>
            </div>
            <div class="bg-white shadow-sm rounded p-4">
                <div class="scroll-table">
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-12">
                                    <h5><strong>Добавление товара</strong></h5>
                                </div>
                            </div>

                            <form method="post" class="mb-2">
                                <input type="text" class="form-control mb-3" name="nameChange" placeholder="Наименование" required>
                                
                                <div class="row mb-3">
                                    <div class="col-xxl-1 col-lg-2 col-md-3 col-5">
                                        <strong>Изображение</strong>
                                    </div>
                                    <div class="col-xxl-11 col-lg-10 col-md-9 col-7">
                                        <button type="button" class="btn btn-primary btn-sm ms-4">Добавить</button>
                                    </div>
                                </div>
                                
                                <input type="text" class="form-control mb-2" name="countryChange" placeholder="Страна-производитель" required>
                                <input type="text" class="form-control mb-2" name="yearChange" placeholder="Год выпуска" required>
                                <input type="text" class="form-control mb-2" name="modelChange" placeholder="Модель" required>
                                <input type="text" class="form-control mb-2" name="costChange" placeholder="Цена" required>
                                <button type="submit" class="btn btn-primary mt-2">Добавить товар</button>
                            </form>   
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    
    <script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>