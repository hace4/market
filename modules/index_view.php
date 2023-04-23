<?php
session_start();

class show_products
{
    private $db;
    protected $products_list;
    protected $PATH;
    public function __construct()
    {
        $this->PATH='';
        require_once 'modules/db.php';
        $this->db = new database_products();
        $this->products_list = $this->db->get_product();
    }
    public function show()
    {
        for ($i = 0; $i < count($this->products_list); $i++) {
            $Products_lis_goodview = $this->products_list[$i];
            $name = stristr($Products_lis_goodview['name'], '^', true);
            $_SESSION['basket_produxt_id'] = $Products_lis_goodview['id'];
            echo "<div class='content2'>" 
            ." <img src='$this->PATH"."$Products_lis_goodview[img]'height='200px' align='top'> <p> $name </p> <p>$Products_lis_goodview[cost] rub </p> <p>$Products_lis_goodview[about]</p>"
            ."<a href='?cart=add&id=$Products_lis_goodview[id]'data-id=$Products_lis_goodview[id]>Купить</a>"
            ."</div>";

        }
    }

    public function root_show()
    {   
        if($_POST['add']){
        for ($i = count($this->products_list); $i >= 0; $i--) {
            $Products_lis_goodview = $this->products_list[$i];
            echo " <img src='$Products_lis_goodview[img]'height='200px' align='top'><p> $Products_lis_goodview[id] </p><p> $Products_lis_goodview[name] </p> <p>$Products_lis_goodview[cost] rub </p> <p>$Products_lis_goodview[about]</p>";
        }}

    }
}
class show_basket extends show_products{
    private $db;
    public function __construct()
    {        
        $this->PATH='../';
        require_once '../modules/db.php';
        $this->db = new basket_product();
        $this->products_list = $this->db->get_product_with_id($_SESSION['basket_produxt_id']);
    }
}
?>
