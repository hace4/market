<?php
session_start();
require_once '../config.php';
?>
<!DOCTYPE html>
<html lang = 'en'>

<head>
<meta charset = 'UTF-8'>
<meta http-equiv = 'X-UA-Compatible' content = 'IE=edge'>
<meta name = 'viewport' content = 'width=device-width, initial-scale=1.0'>
<link rel = 'stylesheet' href = 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css'>
<link rel = 'stylesheet' href = 'static\main.css'>
<link rel="shortcut icon" href="../../faviconico" type="image/x-icon">

<title>корзина</title>
</head>

<body>
<div class = 'bg'></div>
<div class = 'bg bg2'></div>
<div class = 'bg bg3'></div>
<div class = 'top-info'>
<a class = 'logo' href = '../index.php'>Magazin</a>
<nav class = 'reg'>

<?php
if ( isset( $_SESSION[ 'login' ] ) ) {
    if ( $_SESSION[ 'login' ] == 'root' ) {
        echo "<a href='../root.php'> админка <a/>";
    }
}
?> <?php

if ( !isset( $_SESSION[ 'login' ] ) ) {
    echo '<a href="aut.php">signup</a>';
    echo '<a href="register.php">signin</a>';
} else {
    echo "<a href='../index.php' class=exit> главная</a>";
    echo "<div class=exit><a class=exit href=aut.php>$_SESSION[login]</a><form action=''method='post' ><input  type=submit name=exit value=выйти></form></div>";
}
if ( isset( $_POST[ 'exit' ] ) ) {
    unset( $_SESSION[ 'login' ] );
}
?>
<form class = 'btn' method = 'POST' action = 'basket.php'><input class = 'btn' type = 'submit' name = 'submit' value = 'Заказать'></input></form>
</nav>

</div>

</header>
<main>

<div class = 'conten4'>
<?php
require_once '../modules\show_basket.php';
$view = new show_basket( $_SESSION[ 'login' ] );
require_once '../modules\send_product_on_email.php';
$send = new send_product_on_email( $_SESSION[ 'login' ] );
preg_match_all( '!\d+!', stristr( $_SERVER[ 'REQUEST_URI' ], '%', false ), $numbers );
$number = $numbers[ 0 ];
if ( isset( $_POST[ 'submit' ] ) ) {
    $send->send();
}
/*переделать на ajax постояные обновления страницы бесят */
if ( isset( $_SESSION[ 'login' ] ) ) {
    if ( is_numeric( $_SERVER[ 'REQUEST_URI' ][ -1 ] ) ) {
        $view->delete( $number[ 0 ], $_SESSION[ 'login' ] );
        header( 'Location: ../verstka/basket.php' );
    }
    if ( $_SERVER[ 'REQUEST_URI' ][ -1 ] == '+' ) {
        $view->plus( $number[ 0 ], $_SESSION[ 'login' ] );
        header( 'Location: ../verstka/basket.php' );
    }
    if ( $_SERVER[ 'REQUEST_URI' ][ -1 ] == '-' ) {
        $view->minus( $number[ 0 ], $_SESSION[ 'login' ] );
        header( 'Location: ../verstka/basket.php' );
    }
    $view->show();
    preg_match_all( '!\d+!', stristr( $_SERVER[ 'REQUEST_URI' ], '%', false ), $numbers );
    $number = $numbers[ 0 ];
}
?>

</div>

</main>
</body>

</html>