<?php
session_start();
$username=$_SESSION["username"];
$psw=$_SESSION["psw"];

require "key.php";
require "Database.php";

  #$filename = $_POST["filename"];
  $filename="a.txt";
  $Deadtime="2020-1-1";
  $count=10;

  $info="filename=".$filename."&Deadtime=".$requesttime."&count=".$count;

  $hmac=hash_hmac("sha256",$info,$psw);

  $hmac2=hash_hmac("sha256",$info,$psw);
  
 
  $url = "localhost:2000/FileShare.php?filename=".$filename."&Deadtime=".$requesttime."&count=".$count."&hmac=".$hmac;
  echo $url;


  




