<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title></title>

        <link href="http://apps.bdimg.com/libs/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">

        <link href="//cdn.bootcss.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

        <script src="http://apps.bdimg.com/libs/jquery/2.0.0/jquery.min.js"></script>

        <script src="http://apps.bdimg.com/libs/bootstrap/3.3.0/js/bootstrap.min.js"></script>


        <style type="text/css">


             body{background: url(9.jpg) no-repeat;background-size:cover;font-size: 20px;}


        </style>
    </head>


<body>

<nav class="navbar navbar-default  navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">

        </div>
<div>
        <ul class="nav navbar-nav navbar-right">
<ul class="nav navbar-nav">
<li><a href="download.php"><span class="glyphicon glyphicon-cloud-download"></span> 下载</a></li>
<li><a href="upload_file_page.html"><span class="glyphicon glyphicon-cloud-upload"></span> 上传</a></li>
            <li><a href="register-page.html"><span class="glyphicon glyphicon-user"></span> 注册</a></li>
            <li><a href="Login-page.html"><span class="glyphicon glyphicon-log-in"></span> 登录</a></li>
            <?php
            if($_SESSION['username']==NULL){
              $lable1="登录";
              $url1="Login.php";
            }
            else{
              $lable1=$_SESSION['username'];
              $url1="self.php";
            }
             ?>
             <li><a href=<?=$url1?>> <?=$label1?></li>
        </ul>
<div id="text" style="position: absolute; top: 280px; left: 550px;">
                    <p></p>
                </div>

    </div>


</nav>
