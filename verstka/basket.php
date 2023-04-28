<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href='https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css'>
    <link rel="stylesheet" href="static\main.css">
    <link rel="shortcut icon" href="img/favonic.ico" type="image/x-icon">
    <title>корзина</title>
</head>
<body>
    <div class="bg"></div>
    <div class="bg bg2"></div>
    <div class="bg bg3"></div>
    <div class="top-info">
        <a class="logo" href='../index.php' >Magazin</a>
        <nav class='reg'>

            <?php
            if(isset($_SESSION['login'])){
            if ($_SESSION['login'] == 'root') {
                echo "<a href='root.php'> админка <a/>";
            }}
            ?> <?php

            if (!isset($_SESSION['login'])) {
                echo '<a href="aut.php">signup</a>';
                echo '<a href="register.php">signin</a>';
            }else {
                echo "<a href='..\index.php' class=exit> главная</a>";
                echo "<div class=exit><a class=exit href=aut.php>$_SESSION[login]</a><form action=''method='post' ><input  type=submit name=exit value=выйти></form></div>";
            }
            if (isset($_POST['exit'])) {
                unset($_SESSION['login']);
            } ?>

        </nav>


    </div>
    </header>
    <main>
        <div class="conten4">
            <?php
            if(isset($_SESSION['login'])){
                require_once "../modules\basket_viiew.php";
                $view = new show_basket($_SESSION['login']);
                $view->show();
                if(is_numeric($_SERVER['REQUEST_URI'][-1])){
                    $view->delete($_SERVER['REQUEST_URI'][-1], $_SESSION['login']);
                    header('Location: ../verstka/basket.php');
                    
                }
        }
            ?>
        </div>
    </main>
</body>
</html>
