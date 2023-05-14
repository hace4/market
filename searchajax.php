<?php

    require_once 'modules/index_view.php';
    require_once 'modules/basket_db.php';
    session_start();

    $show = new show_products($_SESSION['login']);
    $show->search_result($_POST['name']);
    if(is_numeric($_SERVER['REQUEST_URI'][-1])){
        $bask->add_products_to($_SERVER['REQUEST_URI'][-1], $_SESSION['login']); 
        header('Location: index.php');               
    }
?>