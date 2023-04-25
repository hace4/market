<?php
class show_basket{
    private $bas_db;  
    protected $products_list;
    protected $PATH;
    public function __construct()
    {          
        require_once 'basket_db.php';     
        $this->PATH='../';

        $this->bas_db = new basket_db();
        $this->products_list = $this->bas_db->get_product();
    }

    public function show()
    {
        for ($i = 0; $i < count($this->products_list); $i++) {
            $Products_lis_goodview = $this->bas_db->get_product_with_id($this->products_list[$i]['id_prod'])[0];
            $name = stristr($Products_lis_goodview['name'], '^', true);
            $_SESSION['basket_produxt_id'] = $Products_lis_goodview['id'];
            echo "<div class='content3'>" 
            ." <img src='$this->PATH"."$Products_lis_goodview[img]'height='200px'> <p class='about'> $name </p> <p class='about1'>$Products_lis_goodview[cost] rub </p> <p class='about'>$Products_lis_goodview[about]</p>"
            ."</div>";

        }
    }
}
?>