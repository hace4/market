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
<link rel = 'stylesheet' href = 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'>
<link rel="shortcut icon" href="../../faviconico" type="image/x-icon">
<link rel = 'stylesheet' href = 'static/style.css'>
<script src = 'https://unpkg.com/swup@3'></script>
<script>const swup = new Swup();
</script>
<title>Document</title>
</head>

<body>
<header>
<div class = 'top-info'>
<a class = 'logo' href = '../index.php'>Magazin</a>
<nav class = 'reg'>
<a href = 'aut.php'>signup</a>
<a href = 'register.php'>signin</a>
</nav>
</div>
</header>
<div class = 'bg'></div>
<div class = 'bg bg2'></div>
<div class = 'bg bg3'></div>
<main id = 'swup' class = 'transition-fade'>
<div class = 'regist'>
<h1><b>Регистрация</b></h1>
<form action = '..\modules\reg_checker.php' method = 'post'>

<input class = 'form-control' type = 'text' name = 'name' placeholder = 'your name'> <br>

<input class = 'form-control' type = 'text' name = 'login' placeholder = 'login'><br>

<input class = 'form-control' type = 'text' name = 'password' placeholder = 'password'><br>

<button class = 'btn' type = 'submit'><b>Зарегистрироваться</b></button>
<p>
<?php echo $_SESSION[ 'message' ];
$_SESSION[ 'message' ] = '' ?>
</p>
</form>
</div>

</main>
</body>

</html>