<!DOCTYPE html>
<?php
session_start();
require_once 'config.php';
?>
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
        <button>add products</button>
        <?php require_once 'modules/db.php';
        $db = new database();
        $path='img/' . time(). $_FILES['foto']['name'];
        move_uploaded_file($_FILES['foto']['tmp_name'], $path);
        $db->add_products($_POST['name'],$_POST['cost'], $_POST['about'], $path);
    ?>
    </form>
</body>
</html>