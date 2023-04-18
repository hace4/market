<?php
require_once 'modules/db.php';
class show_products
{
    private $db;
    private $products_list;
    public function __construct()
    {
        $this->db = new database_products();
        $this->products_list = $this->db->get_product();
    }
    public function show()
    {
        for ($i = 0; $i < count($this->products_list); $i++) {
            $Products_lis_goodview = $this->products_list[$i];
            $name = stristr($Products_lis_goodview['name'], '^', true);
            echo "<div class='content2'>" . " <img src='$Products_lis_goodview[img]'height='200px' align='top'> <p> $name <br> $Products_lis_goodview[cost] rub <br> $Products_lis_goodview[about]</p>" . '<a href="">Добавить в корзину</a>' . ' </div>';
        }
    }
}
?>
