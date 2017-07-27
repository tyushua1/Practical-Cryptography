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

function InsertToDB($name,$password,$privateKey,$publicKey){
  $pdo=ConnectToDB();
  $stmt = $pdo->prepare('INSERT INTO User(Name,Password,PrivateKey,PublicKey) VALUES (:name,:password,:PrivateKey,:PublicKey)');
  $stmt->bindParam(':name', $name);
  $stmt->bindParam(':password',$password);
  $stmt->bindParam(':PrivateKey',$privateKey);
  $stmt->bindParam(':PublicKey',$publicKey);
  $i=$stmt->execute();
}

function InsertToFile($username,$filename,$count)
{
  $pdo=ConnectToDB();
  $stmt = $pdo->prepare('INSERT INTO File(username,filename,count) VALUES (:username,:filename,:count)');
  $stmt->bindParam(':username', $username);
  $stmt->bindParam(':filename',$filename);
  $stmt->bindParam(':count',$count);
  $i=$stmt->execute();
}

function FilesBelongToTheUser($username)
{
  $pdo=ConnectToDB();
  $stmt = $pdo->prepare('SELECT filename FROM File WHERE username=:username');
  $stmt->bindParam(':username', $username);
  $i=$stmt->execute();
  $results = $stmt->fetchall(PDO::FETCH_ASSOC);
  return $results;
}


function GetUserPrivate($username,&$encrypted_key)
{
  $pdo=ConnectToDB();
  $stmt = $pdo->prepare('SELECT * FROM User WHERE Name=:Name');
  $stmt->bindParam(':Name', $username);
  $i=$stmt->execute();
  $results = $stmt->fetch(PDO::FETCH_ASSOC);
  $encrypted_key=$results["PrivateKey"];
}


function GetUserPublic($username,&$public_key)
{
  $pdo=ConnectToDB();
  $stmt = $pdo->prepare('SELECT * FROM User WHERE Name=:Name');
  $stmt->bindParam(':Name', $username);
  $i=$stmt->execute();
  $results = $stmt->fetch(PDO::FETCH_ASSOC);
  $public_key=$results["PublicKey"];
}

function GetFileDownloadTimes($filename)
{
  $pdo=ConnectToDB();
  $stmt = $pdo->prepare('SELECT * FROM File WHERE filename=:filename');
  $stmt->bindParam(':filename', $filename);
  $i=$stmt->execute();
  $results = $stmt->fetch(PDO::FETCH_ASSOC);
  return $results["count"];
}


