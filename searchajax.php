<?php

require_once 'modules/show_products.php';
require_once 'modules/basket_db.php';
session_start();
$show = new show_products( $_SESSION[ 'login' ] );
if ( empty( $show->search_result( mb_strtolower( $_POST[ 'name' ] ) ) ) ) {
    echo 'Products not found';
}

if ( is_numeric( $_SERVER[ 'REQUEST_URI' ][ -1 ] ) ) {
    $bask->add_products_to( $_SERVER[ 'REQUEST_URI' ][ -1 ], $_SESSION[ 'login' ] );

    header( 'Location: index.php' );

}
?>