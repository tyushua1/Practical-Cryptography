<?php

//不根据后缀名的检测，检测函数存在问题
//include "file_type.php";

define('ROOT',dirname(__FILE__).'/');

//输出一些信息，后面可以注释掉
  if ($_FILES["file"]["error"] > 0)
  {
		echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
  }
  else
    {
		//echo "Upload: " . $_FILES["file"]["name"] . "<br />";
		//echo "Type: " . $_FILES["file"]["type"] . "<br />";
		//echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
		//echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";
//可以上传的类型校验，利用后缀名
    if($_FILES['file']['type']=="iamge/jpeg"||
      $_FILES['file']['type']=='image/gif'||
      $_FILES['file']['type']=='image/png'||
      $_FILES['file']['type']=='image/pjpeg'||
      $_FILES['file']['type']=='application/vnd.oasis.opendocument.text'||
      $_FILES['file']['type']=='application/vnd.oasis.opendocument.spreadsheet'||
      $_FILES['file']['type']=='text/plain')
      {
        if($_FILES['file']['size']>10485760){
          echo"<script>alert('只能上传小于10M的文件！');self.location='upload_file_page.html';</script>";
        }
        else {
          //检查是否存在重名文件
          if (file_exists("upload/" . $_FILES["file"]["name"]))
          {
            echo"<script>alert('文件已存在');self.location='upload_file_page.html';</script>";
          }
          else
          {
            //将文件上传到服务器文件夹内并检测是否上传成功
            if(is_uploaded_file($_FILES['file']['tmp_name'])){
              $stored_path = ROOT.'upload/'.basename($_FILES['file']['name']);
              if(move_uploaded_file($_FILES['file']['tmp_name'],$stored_path)){
                echo"<script>alert('上传成功！');self.location='upload_file_page.html';</script>";
              }else{
                echo"<script>alert('上传失败1！');self.location='upload_file_page.html';</script>";
              }
            }else{
              echo"<script>alert('上传失败2！');self.location='upload_file_page.html';</script>";
            }
           }
          }
        }
        else echo"<script>alert('只能上传jpg/png/git/ods/odt格式的文件!');self.location='upload_file_page.html';</script>";
      }

//根据文件格式判断文件类型，可以防修改后缀名，但存在问题
    /*if(file_typef("$stored_path".$_FILES['file']['tmpname'])){
      echo "上传文件类型符合要求";
    }
    else {
      echo "上传文件类型不符合要求";
      //unlink("$stored_path".$_FILES['file']['name']);
    }*/
