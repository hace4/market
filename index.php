<?php
session_start();
require_once 'config.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href='https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css'>
    <link rel="stylesheet" href="verstka\static\main.css">
    <link rel="shortcut icon" href="../faviconico" type="image/x-icon">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <title>SHMSHOP</title>
</head>

<body>
    <div class="bg"></div>
    <div class="bg bg2"></div>
    <div class="bg bg3"></div><header>
            <div class="top-info">


                <H1 class="logo">Magazin</H1>

                <nav class='reg'>

                    <?php
                    if ($_SESSION['login'] == 'root') {
                        echo "<a href='root.php'> админка <a/>";
                    }
                    ?> <?php

                    if (!isset($_SESSION['login'])) {
                        echo '<a href="verstka\aut.php">signup</a>';
                        echo '<a href="verstka\register.php">signin</a>';
                    }else {
                        echo "<a href='verstka\basket.php'>корзина</a>";
                        echo "<div class=exit><a class=exit href=verstka\aut.php>$_SESSION[login]</a><form action=''method='post' ><input  type=submit name=exit value=выйти></form></div>";
                    }
                    if (isset($_POST['exit'])) {
                        unset($_SESSION['login']); 
                        header('Location: index.php');
                    } ?>

                </nav>




            </div>    
            <h2 class=typing>Главная страница</h2>
        </header>
    <main>
        

        <div class="live_search">
            <input type="text" id="get_name" placeholder="search">
        </div>    

        <div class="conten1" id='main'>
            <?php
            require_once 'modules/show_products.php';
            require_once 'modules/basket_db.php';
            $bask = new basket_db_in_index();
            $show = new show_products($_SESSION['login']);
            $show->show();                
            preg_match_all('!\d+!', stristr($_SERVER['REQUEST_URI'], '%', false), $numbers);
            $number = $numbers[0];

            if(is_numeric($_SERVER['REQUEST_URI'][-1])){
                $bask->add_products_to($number[0], $_SESSION['login']);      
                header('Location: index.php');        
            }
            ?>
        </div>
    </main>   
          <script>
            $(document).ready(function(){
                $("#get_name").keypress(function(){
                    $.ajax({
                        type:'POST',
                        url:'searchajax.php',
                        data:{
                            name:$("#get_name").val(),
                        },
                        success:function(data){
                            $('#main').html(data);
                        }
                    })
                });
            });
            </script>
</body>

</html>