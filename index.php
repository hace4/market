<?php
session_start();
require_once 'config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href='https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css'>
    <link rel="stylesheet" href="verstka\static\main.css">
    <link rel="shortcut icon" href="img/favonic.ico" type="image/x-icon">
    <title>SHMSHOP</title>
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

                    <?php
                    if ($_SESSION['login'] == 'root') {
                        echo "<a href='root.php'> админка <a/>";
                    }
                    ?> <?php

                    if (!isset($_SESSION['login'])) {
                        echo '<a href="verstka\aut.php">signup</a>';
                        echo '<a href="verstka\register.php">signin</a>';
                    }else {
                        echo "<a href='verstka\basket.php'>корзина</a>";
                        echo "<div class=exit><a class=exit href=verstka\aut.php>$_SESSION[login]</a><form action=''method='post' ><input  type=submit name=exit value=выйти></form></div>";
                    }
                    if (isset($_POST['exit'])) {
                        unset($_SESSION['login']);
                    } ?>

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