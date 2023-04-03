<?php
session_start();
require_once 'config.php' ;
if($_SESSION['login'] != 'root'){
    die('Erorr 404');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="root.php" method="post" enctype="multipart/form-data">
        <input type="text" name="name">
        <input type="text" name="cost">
        <input type="text" name="about">
        <input type="file" name="foto">
        <button name='submit'>add products</button>
    </form>


    <?php 
        require_once 'modules/db.php';

        $db = new database_products();
        $path='img/' . time() . $_FILES['foto']['name'];
        move_uploaded_file($_FILES['foto']['tmp_name'], $path);

        if(isset($_POST['submit'])){
            $db->add_products($_POST['name']. '^' .time() ,$_POST['cost'], $_POST['about'], $path);
        }
        else{
            echo 'заполните все поля';
        }
    ?>
    <form action="root.php" method="post" enctype="multipart/form-data">   
        <input type="text" name="delete_name" placeholder="Имя удаляемого элемента"><br>
        <button>delete products</button>
    </form>
    <?php
    $result = $db->deleteProdutts($_POST['delete_name']);
    echo $result;

    ?>
    <form method="POST">
    <input type="submit" name="TOVAR_SHOW" value="показать товары" />
    </form>
    <pre>
    <?php 
    if( isset( $_POST['TOVAR_SHOW'] ) )
    {
       $tovar_list = $db->get_product();
       print_r($tovar_list);
    }
    ?>
    </pre>
    <br>
    <a href="index.php">Вернуться на главную страницу</a>


</body>
</html>