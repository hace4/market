<?php
class basket_db_in_index{
    protected $db;
    public function __construct()
    {
        $this->db = new PDO("sqlite:MARKET_db.db");
    }
    public function get_product($login)
    {
        $result = $this->db->query("SELECT * FROM `basket` WHERE `login` ='$login'")->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    
    public function add_products_to($id_prod,$login)
    {
        $this->db->query("INSERT INTO `basket` (`id_prod`, `login`) VALUES ('$id_prod', '$login')");
    }
    public function deleteProdutts($id_prod)
    {
        $sql = "DELETE FROM `basket`  WHERE `id_prod` = '$id_prod'";
        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        return $stmt->rowCount();
    }
    public function get_product_with_id($id)
    {
        $result = $this->db->query("SELECT * FROM `products` WHERE `id`='$id'")->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}
class basket_db extends basket_db_in_index{
    public function __construct()
    {
        $this->db = new PDO("sqlite:../MARKET_db.db");;
    }
    public function deleteProducts($id, $login)
    {
        $sql = "DELETE FROM `basket`  WHERE `id_prod` = '$id' AND `login` ='$login'" ;
        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        return $stmt->rowCount();
    }
} ?>