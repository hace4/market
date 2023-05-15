<?php

session_start();
require_once '../modules/db.php';

class reg_check
 {
    private $db;
    private $login;
    private $password;
    private $name;

    public function __construct()
 {
        $this->db = new database();
        $this->login = $_POST[ 'login' ];
        $this->password = $_POST[ 'password' ];
        $this->name = $_POST[ 'name' ];
    }

    private function Availability_check()
 {
        if ( ( $this->password || $this->name || $this->login ) ) {
            return true;
        } else {
            return false;
        }
    }

    private function registred_users()
 {
        if ( empty( $this->db->get_logi_pass( $this->login ) ) ) {
            return true;
        } else {
            return false;
        }
    }

    private function correctness_login_password_check()
 {
        if ( strlen( $this->password ) >= 6 && strlen( $this->login ) >= 6 ) {
            return true;
        } else {
            return false;
        }
    }

    public function regist_user()
 {
        if ( $this->Availability_check() && $this->registred_users() && $this->correctness_login_password_check() ) {
            $_SESSION[ 'message' ] = 'регестрация прошла успешно';
            $this->db->set_users( $this->login, $this->password, $this->name );
            header( 'Location: ../verstka/aut.php' );
        } else if ( !$this->registred_users() && $this->correctness_login_password_check()  && $this->Availability_check() ) {
            $_SESSION[ 'message' ] = 'Вы уже зарегстрированы';
            header( 'Location: ../verstka/register.php' );
        } else if ( $this->Availability_check() && $this->registred_users() && !$this->correctness_login_password_check() ) {
            $_SESSION[ 'message' ] = 'Логин должен быть <br> больше 6 символов';
            header( 'Location: ../verstka/register.php' );
        } else if ( !$this->Availability_check() ) {
            $_SESSION[ 'message' ] = ' Заполните все поля';
            header( 'Location: ../verstka/register.php' );
            exit();
        }
    }
}
$regist = new reg_check();
$regist->regist_user();
?>