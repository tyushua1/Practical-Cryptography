<?php
require "Database.php";
require "key.php";
require "register_detect.php";


$name = $_POST['username'];
$password=$_POST['password1'];
username_detect($name);

$pas_res=password_strength($password);
if ($pas_res){
   for ($i=0; $i<count($pas_res); $i++){
      echo "$pas_res[$i]<br>";
   }
}
else {

if (UserInDB($name)) {
  echo '<script language="JavaScript"> alert("此用户名已为其他人所用"); location.href="home.html"; </script>';
}
else {

$psw_hash=password_hash($password,PASSWORD_DEFAULT);

Generat($name,$pkeyout,$certout);
Encrypt($pkeyout,$password);

InsertToDB($name,$psw_hash,$pkeyout,$certout);
echo '<script language="JavaScript"> alert("注册成功！"); location.href="home.html"; </script>';
}
}
