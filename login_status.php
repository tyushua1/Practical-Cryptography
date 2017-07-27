<?php

//在用户登录后将用户名写入session
function SetLoginStatus($username){
  $_SESSION['UserInfo']=['uid'=$username,'username'=$username];
}

//检测用户是否处于登录状态，是返回ture,否则返回flase
function UserState(){
  if(empty($_SESSION['UserInfo'])||empty($_SESSION['UserInfo']['uid'])||empty($_SESSION['UserInfo']['uid']['username'])){
    return flase;
  }
  else return true;
}

function logout($username){
  $_SESSION['UserInfo']=['uid'=$username,'username'=NULL];
}
