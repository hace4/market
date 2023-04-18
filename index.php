<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href = 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css'>
    <link rel="stylesheet" href="verstka\static\main.css">
    <title>Document</title>
</head>
<body>
    <div class="bg"></div>
    <div class="bg bg2"></div>
    <div class="bg bg3"></div>
    <main>
        <header>
        <div class="top-info">
            <H1 class="logo">Magazin</H1>
            <nav class='reg'>
            <a href="">В корзине</a>
                    <a href="verstka\aut.php">signup</a>
                    <a href="verstka\register.php">signin</a>
            </nav>


        </div>
        </header>
        <h2 class=typing>Главная страница</h2>
        <div class="conten1">
            <?php
            require_once 'modules/index_view.php';
            $show = new show_products();
            $show->show();
            ?>
         </div>
    </main>
</body>
</html>