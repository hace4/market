<?php
class database{
    public $db;
    public function __construct()
    {
        $this->db = new PDO("sqlite:../MARKET_db.db");
    }
    public function get_logi_pass($login){
       $result = $this->db->query("SELECT * FROM `users` WHERE `login` = '$login'")->fetchAll(PDO::FETCH_ASSOC);
       foreach ($result as $key ) {
            return [$key['login'], $key['password']];
       }
    }
    public function get_product(){
        
    }
}
?>