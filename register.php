<?php
require "Database.php";
require "key.php";

$name = $_POST['username'];
if (UserInDB($name)) echo "the username has been occupied.";

$password=$_POST['password1'];
$password_hash=password_hash($password, PASSWORD_DEFAULT).

Generat($name,$pkeyout,$certout);

InsertToDB($name,$password,$pkeyout,$certout);
echo file_get_contents("Succ.html");
