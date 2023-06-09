<?php
session_start();
require_once 'config.php';
if ( $_SESSION[ 'login' ] != 'root' ) {
    die( 'Erorr 404' );
}
?>
<!DOCTYPE html>
<html lang = 'en'>

<head>
<meta charset = 'UTF-8'>
<meta http-equiv = 'X-UA-Compatible' content = 'IE=edge'>
<meta name = 'viewport' content = 'width=device-width, initial-scale=1.0'>
<link rel = 'stylesheet' href = 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css'>
<link rel = 'stylesheet' href = 'verstka\static\main.css'>
<link rel="shortcut icon" href="../faviconico" type="image/x-icon">
<title>Document</title>
</head>

<body>
<main>
<header>
<div class = 'top-info'>
<a class = 'logo' href = 'index.php'>Magazin</a>
</div>
</header>
<form action = 'root.php' method = 'post' enctype = 'multipart/form-data'>
<input type = 'text' name = 'name'>
<input type = 'text' name = 'cost'>
<input type = 'text' name = 'about'>
<input type = 'file' name = 'foto'>
<button name = 'submit'>add products</button>
</form>

<?php
require_once 'modules/db.php';

$db = new database_products();
$path = 'img/' . time() . $_FILES[ 'foto' ][ 'name' ];
move_uploaded_file( $_FILES[ 'foto' ][ 'tmp_name' ], $path );

if ( isset( $_POST[ 'submit' ] ) ) {
    $db->add_products( $_POST[ 'name' ] . '^' . time(), $_POST[ 'cost' ], $_POST[ 'about' ], $path );
} else {
    echo 'заполните все поля';
}
?>
<form action = 'root.php' method = 'post' enctype = 'multipart/form-data'>
<input type = 'text' name = 'delete_name' placeholder = 'Имя удаляемого элемента'><br>
<button>delete products</button>
</form>
<?php
$result = $db->deleteProdutts( $_POST[ 'delete_name' ] );
echo $result;

?>
<form method = 'POST'>
<input type = 'submit' name = 'show_tovar_on_page' value = 'показать товары' />
<input type = 'submit' name = 'hide_tovar' value = 'скрыть' />
</form>
<form method = 'POST' align = 'top'>
<input type = 'text' name = 'show_photo' placeholder = 'показать ссылка на фото' />
<input type = 'submit' name = 'show' value = 'показать' />
</form>
<?php

require_once 'modules/index_view.php';
$show = new show_products( $_SESSION[ 'login' ] );
if ( isset( $_POST[ 'show_tovar_on_page' ] ) ) {
    $show->root_show();
} else if ( isset( $_POST[ 'hide_tovar' ] ) ) {
    unset( $show );
}

?>
<br>

<a href = 'index.php'>Вернуться на главную страницу</a>

</main>
</body>

</html>