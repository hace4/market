<?php 
session_start();
require_once '../modules/db.php';
$answer = new database('sqlite:../MARKET_db.db');
$login = $_POST["login"];
$password = $_POST["password"];
if($login && $password != null){
    $result=$answer->get_logi_pass($login);
    if($result[0] == $login){
        if($result[1]==$password){
            $_SESSION['login'] = $login;
            if($login == 'root'){
                header('Location: ../root.php');
            }
            else{
                header('Location: /');
            }

        }
        else{
            $_SESSION['message'] = 'Логин или пароль неверны';
            header('Location: ../verstka/aut.php');
        }
    }else{
        $_SESSION['message'] = 'Логин или пароль неверны';
        header('Location: ../verstka/aut.php');
    }


    }else{
        $_SESSION['message'] = "Заполните все поля";
        
        header('Location: ../verstka/aut.php');
        header("HTTP/1.0 302 Moved Temporarily", true, 302);
        header("Location: ".$_SERVER['REQUEST_URI'], true);
        exit();}

   
?>