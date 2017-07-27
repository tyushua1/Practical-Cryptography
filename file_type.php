<?php

//函数有一个返回值file_type,当file_type为空时，不符合要求，文件不能上传
//传入参数$filename参照函数内注第一行注释
function file_type($filename){
  //$filename="/home/han/Downloads/2.ods";
  $file=fopen($filename,"rb");
  $bin=fread($file,2);
  fclose($file);
  $strInfo=@unpack("c2chars",$bin);
  $typeCode=intval($strInfo['chars1'].$strInfo['chars2']);
  echo "$typeCode";
  $fileType='';
  switch($typeCode){
    case 255216:
      $fileType='jpg';
      break;
    case 7173:
      $fileType='gif';
      break;
    case 6677:
      $fileType='bmp';
      break;
    case 13780:
      $fileType='png';
      break;
    case 8075:
      $fileType='odt/ods';
      break;
    default:
      break;
  }
  return $file_type;
}
