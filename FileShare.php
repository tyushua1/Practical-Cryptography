<?php
session_start();
require "Database.php";

$filename=$_GET["filename"];
$deadtime=$_GET["Deadtime"];
$count=$_GET["count"];
$hmac=$_GET["hmac"];

$downloadtimes=GetFileDownloadTimes($filename);
$info="filename=".$filename."&Deadtime=".$requesttime."&count=".$count;

$hmac2=hash_hmac("sha256",$info,$_SESSION['psw']);

if($hmac!=$hmac2)
{
  $msg = '该链接无效！';
  echo "<script>alert('".$msg."');location='home.html';</script>";
  exit();

}
else
{
    if(time()<$deadtime)
    {
        $msg = '该链接已过期！';
        echo "<script>alert('".$msg."');location='../html/index.php';</script>";
        exit();
    }
    else if ($downloadtimes>$count)
    {
        $msg = '该链接分享次数已达上限！';
        echo "<script>alert('".$msg."');location='../html/index.php';</script>";
        exit();
    }
    else {
       echo "<a href='/upload/";
       echo $filename;
       echo "'>";
       echo $filename;
       echo "</a>";
    }
}
?>



<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title></title>

        <link href="http://apps.bdimg.com/libs/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">

        <link href="http://cdn.bootcss.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

        <script src="http://apps.bdimg.com/libs/jquery/2.0.0/jquery.min.js"></script>

        <script src="http://apps.bdimg.com/libs/bootstrap/3.3.0/js/bootstrap.min.js"></script>


        <style type="text/css">
             body{background: url(9.jpg) no-repeat;background-size:cover;font-size: 16px;}
             .form{background: rgba(255,255,255,0.3);width:500px;margin:100px auto;white-space:nowrap;}
.fa{display: inline-block;top: 27px;left: 6px;position: relative;color:#ccc;}
            #login_form{display: block;}
            #register_form{display: none;}
            input[type="text"],input[type="text"]{padding-left:26px;}
        </style>
    </head>
    <body>
    <div class="container">
<div class="form row">
          
            </form>
        </div>
   </body>
</html>


