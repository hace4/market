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
            echo "<div class='content2'>" . " <img src='$Products_lis_goodview[img]'height='200px' align='top'> <p> $name </p> <p>$Products_lis_goodview[cost] rub </p> <p>$Products_lis_goodview[about]</p>" . ' </div>';
        }
    }
    public function root_show()
    {
        for ($i = count($this->products_list); $i >= 0; $i--) {
            $Products_lis_goodview = $this->products_list[$i];
            echo " <img src='$Products_lis_goodview[img]'height='200px' align='top'><p> $Products_lis_goodview[id] </p><p> $Products_lis_goodview[name] </p> <p>$Products_lis_goodview[cost] rub </p> <p>$Products_lis_goodview[about]</p>";
        }
    }
}
?>
