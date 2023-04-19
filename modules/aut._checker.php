<?php
session_start();
require_once '../modules/db.php';
class aut_checker
{
    public $login;
    public $password;
    public $answer;
    public $result;
    public function __construct()
    {
        $this->answer = new database();
        $this->login = $_POST["login"];
        $this->password = $_POST["password"];
        $this->result = $this->answer->get_logi_pass($this->login);
    }
    private function Availability_check()
    {
        if (!empty($this->login) and !empty($this->password)) {
            return true;
        } else {
            return false;
        }
    }
    private function correctness_login_check()
    {
        if ($this->Availability_check()) {

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
        } else {
            return false;
        }
    }

    public function check()
    {
        if ($this->correctness_password_check() and $this->correctness_login_check() ) {
            header('Location: ../index.php');
            $_SESSION['login'] = $this->result[0];
        } else if (!$this->correctness_password_check() or !$this->correctness_login_check()and $this->Availability_check()) {
            $_SESSION['message'] = 'Логин или пароль неверны';
            header('Location: ../verstka/aut.php');

        }else if (!$this->Availability_check()) {
            $_SESSION['message'] = "Заполните все поля";
            header('Location: ../verstka/aut.php');
        }
    }

}

$access = new aut_checker();
$access->check();
?>