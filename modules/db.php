<?php
class database{
    private $db;
    private $db1;
    public $list;
    public function __construct()
    {
        $this->db = new PDO("sqlite:../MARKET_db.db");
        $this->db1 = new PDO("sqlite:MARKET_db.db");
    }
    public function get_logi_pass($login){
       $result = $this->db->query("SELECT * FROM `users` WHERE `login` = '$login'")->fetchAll(PDO::FETCH_ASSOC);
       foreach ($result as $key ) {
            return [$key['login'], $key['password']];
       }
    }
    public function get_product(){
        $result = $this->db1->query("SELECT * FROM `products`")->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}
?>