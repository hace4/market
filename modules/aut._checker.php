<?php 
session_start();
require_once '../modules/db.php';
$answer = new database();
$login = $_POST["login"];
$password = $_POST["password"];
if($login && $password != null){
    $result=$answer->get_logi_pass($login);
    if($result[0] == $login){
         if($result[1]==$password){
                header('Location: ../root2.php');
                $_SESSION['login'] == $login;
                exit();
        }
        if($result[1]==$password){
            $_SESSION['login'] == $login;
            header('Location: /');
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

        define('MyConst', TRUE);
        
   
?>