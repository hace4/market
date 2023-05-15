<?php

class show_basket {
    private $bas_db;

    private $products_list;
    private $PATH;
    public $count;
    private $login;

    public function __construct( $login )
 {

        require_once 'basket_db.php';

        $this->PATH = '../';

        $this->bas_db = new basket_db();
        $this->products_list = $this->bas_db->get_product_id( $login );
        $this->login = $login ;
    }

    public function show()
 {
        for ( $i = 0; $i < count( $this->products_list );
        $i++ ) {
            $Products_lis_goodview = $this->bas_db->get_product_with_id( $this->products_list[ $i ][ 'id_prod' ] )[ 0 ];
            $name = stristr( $Products_lis_goodview[ 'name' ], '^', true );
            $id = $this->products_list[ $i ][ 'id_prod' ];
            $this->count = $this->products_list[ $i ][ 'count' ];
            $this->count_check( $id, $this->count );
            echo "<div class='content3'>"
            ."<img src='$this->PATH"."$Products_lis_goodview[img]'height='200px'>"
            ."<p class='about'> $name </p>"
            ."<p class='about1'>$Products_lis_goodview[cost] rub </p>"
            ."<p class='about'>$Products_lis_goodview[about]</p>"
            ."<a href='?cart=add&id=%$id'data-id=%$id>Удалить</a>"
            ."<a href='?cart=add&id=%$id-'data-id=%->-</a>"
            ."<p class='about1'>$this->count </p>"
            ."<a href='?cart=add&id=%$id+'data-id=%+>+</a>"
            .'</div>';

        }

    }

    private function count_check( $id, $count ) {
        if ( $count == 0 ) {
            $this->delete( $id, $this->login );
            header( 'Location: ../verstka/basket.php' );
        }
    }

    public function delete( $id, $login ) {
        $this->bas_db->deleteProducts( $id, $login );
    }

    public function plus( $id, $login ) {
        $this->bas_db->plus_Products( $id, $login );
    }

    public function minus( $id, $login ) {
        $this->bas_db->minus_Products( $id, $login );
    }
}
?>