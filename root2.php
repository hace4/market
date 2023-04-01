<?php 
session_start();
if(empty($_SESSION['login'])){
    header('Location: root.php');
}
else{
    header('Location: verstka/aut.php');
}
require_once 'modules/db.php';
$db = new database();
$path='img/' . time(). $_FILES['foto']['name'];
move_uploaded_file($_FILES['foto']['tmp_name'], $path);
$db->add_products($_POST['name'],$_POST['cost'], $_POST['about'], $path);
    ?>