
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href = 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'>
    <link rel="stylesheet" href="static/style.css">
    <title>Document</title>
</head>
<body>
    <div class="bg"></div>
    <div class="bg bg2"></div>
    <div class="bg bg3"></div>
        <main>
            <div class="regist">
                <h1><b>Авторизация</b></h1>
                <form action="" method="post">

                    <input class="form-control" type="text" name="login" placeholder="login"><br>

                    <input class="form-control" type="text" name="password" placeholder="password"><br>

                    <button class="btn" type="submit"><b>Войти</b></button>
                </form>
                <?php 
                        require '../modules/aut._checker.php';
                        $result = new  aut();
                        $a=$result->aut_checker();
                ?>
                </div>
        
        </main>