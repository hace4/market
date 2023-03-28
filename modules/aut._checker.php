<?php 

class aut{
    public function autit(){
        header('Location: /');
        exit();
    }
    public function aut_checker(){
        require_once '../modules/db.php';
        $answer = new database();
        $result=$answer->get_logi_pass($_POST['login']);
        if($_POST['login'] && $_POST['password'] != ''){
            echo 'a';
            if($result[0] == $_POST['login']){
                    if($result[1]==$_POST['password']){
                        return "ok";
                        exit();
                    }
                    else{
                        return "password_erorr";
                        echo "<a href='../index.php'>lol</a>";
                        exit();
                    }
                }
                else{
                    return "login_erorr";
                    exit();
                }
            }
    }
}
?>