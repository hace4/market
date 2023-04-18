<?php
class database
{
    protected $db;
    public function __construct()
    {
        $this->db = new PDO("sqlite:../MARKET_db.db");
    }
    public function set_users($login, $password, $name)
    {
        $this->db->query("INSERT INTO `users` (`login`, `password`, `F.I.O`) VALUES('$login', '$password', '$name')");
    }
    public function get_logi_pass($login)
    {
        $result = $this->db->query("SELECT * FROM `users` WHERE `login` = '$login'")->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $key) {
            return [$key['login'], $key['password']];

        }
    }
}
class database_products
{
    protected $db;
    public function __construct()
    {
        $this->db = new PDO("sqlite:MARKET_db.db");
    }
    public function get_product()
    {
        $result = $this->db->query("SELECT * FROM `products`")->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function add_products($name, $cost, $about, $foto)
    {
        $this->db->query("INSERT INTO `products` (`name`, `cost`, `about`, `img`) VALUES ('$name', '$cost', '$about', '$foto')");
    }
    public function deleteProdutts($name)
    {
        $sql = "DELETE FROM `products`  WHERE `name` = '$name'";
        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        return $stmt->rowCount();
    }
}
