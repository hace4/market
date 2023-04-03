<?php
require_once 'config.php' ;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href = 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css'>
    <link rel="stylesheet" href="verstka\static\main.css">
    <title>Document</title>
</head>
<body>
    <div class="bg"></div>
    <div class="bg bg2"></div>
    <div class="bg bg3"></div>
    <main>
        <header>
        <div class="top-info">
            <H1 class="logo">Magazin</H1>
            <nav class='reg'>
                    <a href="verstka\aut.php">signup</a>
                    <a href="verstka\register.php">signin</a>
            </nav>

            
        </div>
        </header>
        <h2 class=typing>Главная страница</h2>
        <div class="conten1">
            <?php 
            require_once 'modules/db.php';
            $db = new database_products();
            $products_list=$db->get_product();
            for($i=0; $i<count($products_list); $i++){          
                $Products_lis_goodview =$products_list[$i];
                $name = stristr($Products_lis_goodview['name'], '^', true);
                echo "<div class='content2'>"." <img src='$Products_lis_goodview[img]'height='200px' align='top'> <p> $name <br> $Products_lis_goodview[cost] rub <br> $Products_lis_goodview[about]</p>" . ' </div>';
            }
                ?>
         </div>
    </main>
</body>
</html>