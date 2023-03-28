<?php
class reg{
    private $login;
    private $password;
    private $name; 
    public function __construct()
    {
        $this->login = $_POST["login"];
        $this->password = $_POST["password"];
        $this->name = $_POST["name"];
    }
    function register_check(){
        if(strlen($this->password) <6){
            return "pass_eror";
        } else if(strlen($this->login) < 5){
            return "login_eror";
        }
    }
    function registr(){
        $db = new SQLite3("../MARKET_db.db");
        $db->query("INSERT INTO `users` (`login`, `password`, `F.I.O`) VALUES('$this->login', '$this->password', '$this->name')");
        $db->close();
        header('Location: /');
        exit();
    }
}
?>