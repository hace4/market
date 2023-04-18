<?php 
session_start();
require_once '../modules/db.php';
$answer = new database();
$login = $_POST["login"];
$password = $_POST["password"];
if($login && $password){
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
        header('Location: ../verstka/aut.php');}

   
?>