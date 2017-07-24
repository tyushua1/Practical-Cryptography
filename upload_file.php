<?php

if ($_FILES["file"]["error"]>0)
{
  echo "Error:".$_FILES["file"]["error"]."</br>";
}
else
{
  echo "Upload: ".$_FILES["file"]["name"]."</br>";
  echo "Type: ".$_FILES["file"]["type"]."</br>";
  echo "Size: ".$_FILES["file"]["size"]."kb"."</br>";
  echo "Stored in ".$_FILES["file"]["tmp_name"]."</br>";
  var_dump($_FILES);
}

echo file_get_contents("register.html");
?>
