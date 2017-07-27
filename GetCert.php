<?php
session_start();
require "Database.php";

GetUserPublic($_SESSION['username'],$public_key);
echo $public_key;

?>
