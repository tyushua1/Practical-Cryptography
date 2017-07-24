<?php
function ConnectToDB(){
    $pdo = new PDO('mysql:host=127.0.0.1;dbname=UserInfo', 'root', '');
    return $pdo;
}


function UserInDB($name,$password){
  $pdo=ConnectToDB();
  $stmt = $pdo->prepare('SELECT * FROM User WHERE Name = :name');
  #filter_input
  $stmt->bindParam(':name', $name,PDO::PARAM_STR);
 
  $stmt->execute();
  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
  if (count($results)>0) return true;
  else return false;
}

function PasswordOfAUser($name){
  $pdo=ConnectToDB();
  $stmt = $pdo->prepare('SELECT Password FROM User WHERE Name = :name');
  #filter_input
  $stmt->bindParam(':name', $name,PDO::PARAM_STR);

  $stmt->execute();
  $results = $stmt->fetch(PDO::FETCH_ASSOC);
  return $results['Password'];
}

function InsertToDB($name,$password){
  $pdo=ConnectToDB();
  $stmt = $pdo->prepare('INSERT INTO User(Name,Password) VALUES (:name,:password)');
  #filter_input
  $stmt->bindParam(':name', $name,PDO::PARAM_STR);
  $stmt->bindParam(':password',$password,PDO::PARAM_STR);
  $stmt->execute();
}
