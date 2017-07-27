<?php
function ConnectToDB(){
    $pdo = new PDO('mysql:host=127.0.0.1;dbname=UserInfo', 'root', '');
    return $pdo;
}

function UserInDB($name){
  $pdo=ConnectToDB();
  $stmt = $pdo->prepare('SELECT * FROM User WHERE Name = :name');
  $stmt->bindParam(':name', $name);

  $stmt->execute();
  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
  if (count($results)>0) return true;
  else return false;
}

function PasswordOfAUser($name){
  $pdo=ConnectToDB();
  $stmt = $pdo->prepare('SELECT Password FROM User WHERE Name = :name');
  $stmt->bindParam(':name', $name);

  $stmt->execute();
  $results = $stmt->fetch(PDO::FETCH_ASSOC);
  return $results['Password'];
}

function InsertToDB($name,$password,$privateKey,$publicKey,$iv){
  $pdo=ConnectToDB();
  $stmt = $pdo->prepare('INSERT INTO User(Name,Password,PrivateKey,PublicKey,iv) VALUES (:name,:password,:PrivateKey,:PublicKey,:iv)');
  $stmt->bindParam(':name', $name);
  $stmt->bindParam(':password',$password,PDO::PARAM_STR);
  $stmt->bindParam(':PrivateKey',$privateKey);
  $stmt->bindParam(':PublicKey',$publicKey);
  $stmt->bindParam(':iv',$iv);
  $i=$stmt->execute();
  var_dump($i);
}
