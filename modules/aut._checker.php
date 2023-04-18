<?php
session_start();
require_once '../modules/db.php';
$answer = new database();
$login = $_POST["login"];
$password = $_POST["password"];
if ($login && $password) {

    $result = $answer->get_logi_pass($login);

    if ($result[0] == $login) {

        if ($result[1] == $password) {
            $_SESSION['login'] = $login;

            if ($login == 'root') {
                header('Location: ../root.php');
            } else {
                header('Location: /');}

        } else {
            $_SESSION['message'] = 'Логин или пароль неверны';
            header('Location: ../verstka/aut.php');}

    } else {
        $_SESSION['message'] = 'Логин или пароль неверны';
        header('Location: ../verstka/aut.php');}

} else {
    $_SESSION['message'] = "Заполните все поля";
    header('Location: ../verstka/aut.php');
    header("HTTP/1.0 302 Moved Temporarily", true, 302);
    header("Location: " . $_SERVER['REQUEST_URI'], true);
    exit();}
class aut_checker
{
    private $login;
    private $password;
    private $answer;
    private $result;
    public function __construct()
    {
        require_once '../modules/db.php';
        $this->answer = new database();
        $this->login = $_POST["login"];
        $this->password = $_POST["password"];
    }
    private function Availability_check()
    {
        if (!empty($this->login) && !empty($this->password)) {
            return true;
        } else {
            return false;
        }
    }
    private function correctness_login_check()
    {
        if ($this->Availability_check()) {
            $this->result = $this->answer->get_logi_pass($this->login);
            if ($this->result[0] == $this->login) {
                return true;
            } else {
                return false;
            }
        }
    }
    private function correctness_password_check()
    {
        if ($this->result[1] == $this->password) {
            return true;
        }else{
            return false;
        }
    }
}
?>