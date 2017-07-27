<?php
require "Database.php";
require "key.php";
require "register_detect.php";

$name = $_POST['username'];
username_detect($name);
if (UserInDB($name)) echo "the username has been occupied.";

$password=$_POST['password1'];
$password_result=password_strength($password);
for($i=0;$i<count($password_result);$i++){
  echo "$password_result[$i]<br>";
}
$password_hash=password_hash($password, PASSWORD_DEFAULT).

Generat($name,$pkeyout,$certout);

InsertToDB($name,$password,$pkeyout,$certout);
echo file_get_contents("Succ.html");
