<?php
session_start();
require_once "../config.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'>
    <link rel="shortcut icon" href="img/favonic.ico" type="image/x-icon">
    <link rel="stylesheet" href="static/style.css">
    <title>Document</title>
</head>

<body>
    <div class="bg"></div>
    <div class="bg bg2"></div>
    <div class="bg bg3"></div>
    <div class="top-info">
        <a class="logo" href='../index.php'=>Magazin</a>
        <nav class='reg'>
            <a class='reg1' href="aut.php">signup</a>
            <a class='reg1' href="register.php">signin</a>
        </nav>


    </div>
    </header>
    <main>
        <header>

            <div class="regist">
                <h1><b>Авторизация</b></h1>
                <?php echo $_SESSION['message'];
                $_SESSION['message'] = '' ?>
                <form action="../modules/aut._checker.php" method="post">
                    <input class="form-control" type="text" name="login" placeholder="login"><br>

                    <input class="form-control" type="text" name="password" placeholder="password"><br>

                    <button class="btn" type="submit"><b>Войти</b></button>

                </form>

            </div>

    </main>