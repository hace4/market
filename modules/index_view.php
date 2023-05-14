<?php


class show_products
{
    private $db;
    protected $products_list;
    protected $PATH;
    private $bas_db;
    private $products_list1;
    private         $id_prod_massive;
    public function __construct($login)
    {
        $this->id_prod_massive = [];
        $login = $login;
        $this->PATH='';
        require_once 'modules/db.php';
        require_once 'modules/basket_db.php';  
        $this->db = new database_products();
        $this->bas_db = new basket_db_in_index();
        $this->products_list = $this->db->get_product(); 
        $this->products_list1 = $this->bas_db->get_product_id($login);    
        
        
        foreach($this->products_list1 as $brand => $massiv)
        {
        foreach($massiv  as  $inner_key => $value)
        {
        if($inner_key=='id_prod'){
            array_push($this->id_prod_massive, $value);
        }
        }
        }
    }
    public function show()
    {


        for ($i = 0; $i < count($this->products_list); $i++) {
            $Products_lis_goodview = $this->products_list[$i];
            $name = stristr($Products_lis_goodview['name'], '^', true);
            $_SESSION['basket_produxt_id'] = $Products_lis_goodview['id'];
            echo "<div class='content2'>" 
            ." <img src='$this->PATH"."$Products_lis_goodview[img]'height='200px' align='top'> <p> $name </p> <p>$Products_lis_goodview[cost] rub </p> <p>$Products_lis_goodview[about]</p>";
            if(empty($this->bas_db->get_product_with_id($this->products_list1[$i]['id_prod']))){
                echo "<a href='?cart=add&id=%$Products_lis_goodview[id]'data-id=%$Products_lis_goodview[id]>Купить</a>";
            }
            else{
                echo "<a>товар в корзине</a>";

            }


            echo"</div>";

        }
    }
    public function search_result($name){
        $search_list = $this->db->get_product_with_name($name); 

        for ($i = 0; $i < count($search_list); $i++) {
            $Products_lis_goodview = $search_list[$i];
            $name = stristr($Products_lis_goodview['name'], '^', true);
            $_SESSION['basket_produxt_id'] = $Products_lis_goodview['id'];
            echo "<div class='content2'>" 
            ." <img src='$this->PATH"."$Products_lis_goodview[img]'height='200px' align='top'> <p> $name </p> <p>$Products_lis_goodview[cost] rub </p> <p>$Products_lis_goodview[about]</p>";

            if(empty($this->products_list1[$i]) or !in_array($search_list[$i]['id'], $this->id_prod_massive)){
                echo "<a href='?cart=add&id=%$Products_lis_goodview[id]'data-id=%$Products_lis_goodview[id]>Купить</a>";
            }
            else{
                echo "<a>товар в корзине</a>";

            }


            echo"</div>";

    }
}
    public function root_show()
    {   
        for ($i = count($this->products_list)-1; $i >= 0; $i--) {
            $Products_lis_goodview = $this->products_list[$i];
            echo " <img src='$Products_lis_goodview[img]'height='200px' align='top'><p> $Products_lis_goodview[id] </p><p> $Products_lis_goodview[name] </p> <p>$Products_lis_goodview[cost] rub </p> <p>$Products_lis_goodview[about]</p>";
        }

    }
}
?>