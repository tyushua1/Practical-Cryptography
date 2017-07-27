<?php
session_start();

require "Database.php";
require "key.php";
$psw=$_SESSION['psw'];
#echo $_SESSION['username'];

function decryptfile($file)
{
      $file_handle=fopen($file,'r+');
      $data=fread($file_handle,100);  
                
      $file_handle=fopen($file,'r+');
      fclose($file_handle);  
      $file_handle=fopen($file,'w');
      Decrypt($data,$psw);

      fwrite($file_handle, $data);
      fclose($file_handle); 
}
function display(){
      $resultArray=FilesBelongToTheUser($_SESSION['username']);
     // var_dump( $resultArray);
      foreach ($resultArray as $x =>$i){
          decryptfile($i["filename"]);
   
          echo "<a href='./upload/";
          echo $i["filename"];
          echo "'>";
          echo $i["filename"];
          echo "</a >                                                                                              ";
          echo '<form method="post" action="ShareLink.php">';
          echo '<input type="submit" name="filename" value="分享">';

          echo "</br>";

           
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
             body{background: url() no-repeat;background-size:cover;font-size: 16px;}
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
            <form class="form-horizontal col-sm-offset-3 col-md-offset-3"
 id="login_form" method="post" action="ShareLink.php" >
            <?php  display();  ?>

            </form>
        </div>
   </body>
</html>


