<?php

function display(){
  $dir="/home/han/Downloads/Practical-Cryptography-master/upload/";
  $resultArray=array(0=>"1.txt",1=>"2.odt");
  //$resultArray=FilesBelongToTheUser();
  //$returnArray=array();
  //记录该用户上传的文件个数
  //$num=0;
  if($handler=opendir($dir)){
    while(($filename=readdir($handler))!=false){
      //echo "$filename"."<br>";
      for($i=0;$i<count($resultArray);$i++){
        if($filename==$resultArray[$i]){
          //$returnArray[$num]=$resultArray[$i];
          //$num++;
          //echo "$filename";
          //echo "<script><a href='./upload/1.txt',Downloads='file1'>llalala</a></script>";
          echo "<a href='./upload/";
          echo $filename;
          echo "'>";
          echo $filename;
          echo "</a>                                                            " ;
          echo '<form method="post" action="register.php">';
          echo '<input type="submit" name="filename" value="分享">';
          //echo '<button type="submit" formaction="register.html">分享</button>';
          echo "</br>";

        }
      }
    }
  }
            //echo "$num";
            //for($i=0;$i<$num;$i++){
              //echo $returnArray[$i];
    closedir($handler);
            //return $returnArray;
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
 id="login_form" method="post" action="Sharelink.php" top:27px >
            <?php  display();  ?>

            </form>
        </div>
   </body>
</html>
