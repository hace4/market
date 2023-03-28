<?php error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', 'Off');
error_reporting(E_ALL) 

?>
<?php
require_once "verstka/register.html";

$db = new SQLite3("MARKET_db.db");

$login = $_POST["login"];
$password = $_POST["password"];
$name = $_POST["name"];
if(strlen($password) <6){
    echo '<div class=regist1><b><p>минимальная длина пароля 6</p></b></div>';
    exit();
} else if(strlen($login) < 5){
    echo '<div class=regist1><b><p>минимальная длина логина 2</p></b></div>';
}
else{
    $db->query("INSERT INTO `users` (`login`, `password`, `F.I.O`) VALUES('$login', '$password', '$name')");
    $db->close();
    header('Location: /');
    exit();
}


  