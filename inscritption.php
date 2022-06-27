<?php

try{
  $database = new PDO("mysql:host=localhost;dbname=projetblog;charset=utf8","root","");
}catch(Exception $e){
  die("Error : ".$e->getMessage());
}

$req = $database->prepare("INSERT INTO `user` (`id`, `mail`, `name`, `firstname`, `birthday`, `password`, `is_admin`) 
VALUES (NULL, ? , ? , ? , ? , ? , '0');");


var_dump($_POST) ;

$name = htmlspecialchars($_POST["name"]) ;
$firstname =htmlspecialchars($_POST["firstname"]) ;
$mail = htmlspecialchars($_POST["mail"]) ;
$birthday = htmlspecialchars($_POST["birthday"]) ;
$password = password_hash(htmlspecialchars($_POST["password"]),PASSWORD_DEFAULT) ;

var_dump($password);

$req->execute([
  $name,
  $firstname,
  $mail,
  $birthday,
  $password
]);


header('Location: ./index.php');