<?php
require "Database.php";

$name = $_POST['username'];
$password=$_POST['password'];
$password=password_hash($password,PASSWORD_DEFAULT);

#check
InsertToDB($name,$password);
echo file_get_contents("Succ.html");
