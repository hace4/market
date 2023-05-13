<?php
require_once "basket_db.php";
class send_product_on_email{
private $prod;
private $prod_mail;
private $from;
private $to;
private $subject;
private $message;
private $headers;

public function __construct($login)
{
    $this->prod = new basket_db();
    $this->prod_mail = $this->prod->get_product($login);
    $this->from = "shmelkov03012006@gmail.com";
    $this->to = "mai.shmelkovda@gmail.com";
    $this->subject = "Checking PHP mail";
    $this->message = "PHP mail works just fine ";
    $this->headers = "From:" . $this->from;
}
public function send(){
    if(mail($this->to,$this->subject,$this->message, $this->headers)){
        echo "ok";
    }else{
        echo'no';    }
}
}
?>