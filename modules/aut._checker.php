<?php 

class aut{
    protected $db;
    public function __construct()
    {
        $this->db = new SQLite3("../MARKET_db.db");
    }
    public function aut_checker(){
        require_once '../modules/db.php';
        $answer = new database();
        $result=$answer->get_logi_pass($_POST['login']);
        if($result[0] == $_POST['login']){
            if($result[1]==$_POST['password']){
                header('Location: /');
                exit();
            }
            else{
                return "wrong password";
            }
            }
            else{
            return "wrong login";
        }
        
    }
}


?>