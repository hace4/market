<?php
require_once "verstka/register.html";

$db = new SQLite3("MARKET_db.db");

$login = $_POST["login"];
$password = $_POST["password"];
$name = $_POST["name"];
$db->query("INSERT INTO `users` (`login`, `password`, `F.I.O`) VALUES('$login', '$password', '$name')")

?>  