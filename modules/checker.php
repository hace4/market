<?php
session_start();
require_once '../modules/db.php';
$db = new database();

$login = $_POST["login"];
$password = $_POST["password"];
$name = $_POST["name"];

echo(strlen($login) < 6 || strlen($password)  < 6 .'p');
if (($password || $name || $login)){
    if(strlen($password)>= 6 && strlen($login)>= 6){
            if(empty($db->get_logi_pass($login))){
                $_SESSION["message"] = 'регестрация прошла успешно';
                $db->set_users($login, $password, $name);
                header('Location: ../verstka/aut.php');
            }else{
                $_SESSION["message"] = 'Вы зарегстрированы';
                header('Location: ../verstka/register.php');     
            } 
    }
    else if(strlen($login) < 6 || strlen($password) < 6){
        $_SESSION["message"] = 'Логин должен быть <br> больше 6 символов';
        header('Location: ../verstka/register.php');
}
}
else{
    $_SESSION["message"] = ' Заполните все поля';
    header('Location: ../verstka/register.php');
    exit();
}


?>