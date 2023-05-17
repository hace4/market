<?php

class show_products
 {
    private $db;
    protected $products_list;
    protected $PATH;
    private $bas_db;
    private         $id_prod_massive;
    private $login;

    public function __construct( $login )
 {
        $this->id_prod_massive = [];
        $this->login = $login;
        $this->PATH = '';
        require_once 'modules/db.php';
        require_once 'modules/basket_db.php';

        $this->db = new database_products();
        $this->bas_db = new basket_db_in_index();
        $this->products_list = $this->db->get_product();

        foreach ( $this->bas_db->get_product_id( $login ) as $id=> $massiv )
 {
            foreach ( $massiv  as  $inner_key => $value )
 {
                if ( $inner_key == 'id_prod' ) {
                    array_push( $this->id_prod_massive, $value );
                }
            }
        }
    }

    private function mb_ucfirst( $str ) {
        return mb_strtoupper( mb_substr( $str, 0, 1 ) ) . mb_substr( $str, 1 );
    }

    public function show()
 {
        for ( $i = 0; $i < count( $this->products_list );
        $i++ ) {
            $Products_lis_goodview = $this->products_list[ $i ];
            $name = $this->mb_ucfirst( stristr( $Products_lis_goodview[ 'name' ], '^', true ) );
            echo "<div class='content2'>"

            ." <img src='$this->PATH"."$Products_lis_goodview[img]'height='200px' align='top'> <p> $name </p> <p>$Products_lis_goodview[cost] rub </p> <p>$Products_lis_goodview[about]</p>";
            if ( !in_array( $Products_lis_goodview[ 'id' ], $this->id_prod_massive ) and !empty( $this->login ) ) {
                echo "<a href='?cart=add&id=%$Products_lis_goodview[id]'data-id=%$Products_lis_goodview[id]>Купить</a>";
            } else if ( !empty( $this->login ) ){
                echo '<a>товар в корзине</a>';

            }

            echo'</div>';

        }
    }
    /*Создать класс*/

    public function search_result( $name ) {
        $search_list = $this->db->get_product_with_name( $name );

        for ( $i = 0; $i < count( $search_list );
        $i++ ) {
            $Products_lis_goodview = $search_list[ $i ];
            $name = $this->mb_ucfirst( stristr( $Products_lis_goodview[ 'name' ], '^', true ) );
            echo "<div class='content2'>"
            ." <img src='$this->PATH"."$Products_lis_goodview[img]'height='200px' align='top'> <p> $name </p> <p>$Products_lis_goodview[cost] rub </p> <p>$Products_lis_goodview[about]</p>";

            if ( !in_array( $Products_lis_goodview[ 'id' ], $this->id_prod_massive ) and !empty( $this->login ) ) {
                echo "<a href='?cart=add&id=%$Products_lis_goodview[id]'data-id=%$Products_lis_goodview[id]>Купить</a>";
            } else  if ( !empty( $this->login ) ) {
                echo '<a>товар в корзине</a>';

            }

            echo'</div>';

        }
        return $search_list;
    }
    /*Создать класс*/

    public function root_show()
 {

        for ( $i = count( $this->products_list )-1;
        $i >= 0;
        $i-- ) {
            $Products_lis_goodview = $this->products_list[ $i ];
            echo " <img src='$Products_lis_goodview[img]'height='200px' align='top'><p> $Products_lis_goodview[id] </p><p> $Products_lis_goodview[name] </p> <p>$Products_lis_goodview[cost] rub </p> <p>$Products_lis_goodview[about]</p>";
        }

    }
}
?>