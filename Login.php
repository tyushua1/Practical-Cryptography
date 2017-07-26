<?php
require "Database.php";

$name = $_POST['username'];
if (!UserInDB($name)) 
  echo '<script language="JavaScript"> alert("User not in DB"); location.href="Login.html"; </script>';

$password=$_POST['password'];
$psw_hash=PasswordOfAUser($name);

if (!password_verify($password,$psw_hash)) 
  echo '<script language="JavaScript"> alert("password wrong"); location.href="Login.html"; </script>';
else 
  echo '<script language="JavaScript"> alert("success"); location.href="home.html"; </script>';

