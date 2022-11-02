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
                    <h2>Заказ №1 от <span class="badge text-bg-primary">26.10.2022 12:45</span></h2>
                </div>
            </div>

            <div class="bg-white shadow-sm rounded p-4">
                <div class="row">
                    <div class="col-6">
                        <p class="mb-2"><strong>Тип оплаты: </strong> Банковская карта</p>
                        <p class="mb-2"><strong>Тип получения: </strong> Доставка</p>
                        <p><strong>Адрес доставки: </strong> Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis consequatur nisi odit eum. Tempora laborum vero accusantium officiis hic voluptatem cupiditate sit asperiores, amet rem fugit, maiores nam! Molestiae, facilis.</p>
                        <p class="mb-2"><strong>Статус: </strong></p>
                        <div class="row">
                            <div class="col-8">
                                <select class="form-select">
                                    <option value="new" selected>Новый</option>
                                    <option value="confirmed">Потвержден</option>
                                    <option value="denied">Отклонен</option>
                                </select>
                            </div>
                            <div class="col-4">
                                <button type="button" class="btn btn-primary">Сменить</button>
                            </div>
                        </div>
                    </div>

                    <div class="col-6">
                            <div class="bg-primary bg-opacity-25 p-4 rounded">
                                <div class="row align-items-center mb-3">
                                    <div class="col-sm-2 text-center"><strong>№</strong></div>
                                    <div class="col-sm-4 text-center"><strong>Название</strong></div>
                                    <div class="col-sm-3 text-center"><strong>Кол-во</strong></div>
                                    <div class="col-sm-3 text-center"><strong>Сумма</strong></div>
                                </div>
        
                                <div class="row align-items-center mb-3">
                                    <div class="col-sm-2 text-center">1</div>
                                    <div class="col-sm-4 text-center"><strong>NEWART GC-20</strong></div>
                                    <div class="col-sm-3 text-center"><strong>2</strong></div>
                                    <div class="col-sm-3 text-center"><strong>10 000 руб.</strong></div>
                                </div>
                                <div class="row align-items-center mb-3">
                                    <div class="col-sm-2 text-center">1</div>
                                    <div class="col-sm-4 text-center"><strong>NEWART GC-20</strong></div>
                                    <div class="col-sm-3 text-center"><strong>2</strong></div>
                                    <div class="col-sm-3 text-center"><strong>10 000 руб.</strong></div>
                                </div>
                                <div class="row align-items-center mb-3">
                                    <div class="col-sm-2 text-center">1</div>
                                    <div class="col-sm-4 text-center"><strong>NEWART GC-20</strong></div>
                                    <div class="col-sm-3 text-center"><strong>2</strong></div>
                                    <div class="col-sm-3 text-center"><strong>10 000 руб.</strong></div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-12 text-end"><h4>Общая сумма: <span class="badge bg-primary bg-opacity-50 ms-2">30 000 руб.</span></h4></div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>