<?php
require "Database.php";
require "key.php";

$name = $_POST['username'];
if (UserInDB($name)) echo "the username has been occupied.";

$password=$_POST['password1'];
$psw_hash=password_hash($password,PASSWORD_DEFAULT);

Generat($name,$pkeyout,$certout);
Encrypt($pkeyout,$password,$iv);

InsertToDB($name,$psw_hash,$pkeyout,$certout,$iv);
echo file_get_contents("Succ.html");
