<?php

//include "errormsg.php";

function username_detect($username){
  //对用户名使用字符和长度进行验证，用户名必须由字母/数字/汉字组成，长度为6-36位
  //返回值为字符串
  if(!preg_match('/^[\x{4e00}-\x{9fa5}a-zA-Z0-9]{3,36}+$/u',$username)){
    return "用户名只能包括数字/字母/中文";
  }
}

//检测密码强度;参考网址：https://www.ibm.com/support/docview.wss?uid=swg21602488
function password_strength($password){
  //返回值为数组
  //对密码位数进行强度判断

  $error=array(
    0 =>"密码长度应至少为6字节",
    1 =>"密码长度不能超过36字节",
    2 =>"密码中应至少包含一个小写英文字母",
    3 =>"密码中应至少包含一个大写英文字母",
    4 =>"密码中应至少包含一个数字",
    5 =>"密码中应至少包含一个特殊字符"
  );
  $password_len=strlen($password);
  $error_record=array();
  $count=0;
  if($password_len<6){
    $error_record[$count]=$error[0];
    $count++;
  }
  if($password_len>36){
    $error_record[$count]=$error[1];
    $count++;
  }
  //对密码包含类型进行强度判断
  //密码不含小写字母
  if(!preg_match('/^[\s\S]*[a-z]+[\s\S]*$/',$password)){
    $error_record[$count]=$error[2];
    $count++;
  }
  //大写字母
  if(!preg_match('/^[\s\S]*[A-Z]+[\s\S]*$/',$password)){
    $error_record[$count]=$error[3];
    $count++;
  }
  //数字
  if(!preg_match('/^[\s\S]*\d+[\s\S]*+$/u',$password)){
    $error_record[$count]=$error[4];
    $count++;
  }
  //特殊字符
  if(!preg_match('/^[\s\S]*[\W\_]+[\s\S]*$/',$password)){
    $error_record[$count]=$error[5];
    $count++;
  }
  return $error_record;
}

//邮箱格式检测
function email_detect($email){
  if(!preg_match('/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/',$email)){
    exit('错误，修改邮箱格式。<a href="javascript:history.back(-1);">返回</a>');
  }
}
