<?php
require "Database.php";

$name = $_POST['username'];
$password=$_POST['password'];

if (!UserInDB($name)) echo "the User is not in DB.";
else {
   $password_hash=PasswordOfAUser($name);
   if (password_verify($password,$password_hash))  echo "Login successfully";
   else echo "the password is wrong";
}


