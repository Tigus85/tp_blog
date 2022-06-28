<?php

try{
  $database = new PDO("mysql:host=localhost;dbname=projetblog;charset=utf8","root","");
}catch(Exception $e){
  die("Error : ".$e->getMessage());
}

$req = $database->prepare("INSERT INTO `user` (`id`, `mail`, `name`, `firstname`, `birthday`, `password`, `is_admin`) 
VALUES (NULL, ? , ? , ? , ? , ? , 0);");


var_dump($_POST) ;

$name = htmlspecialchars($_POST["name"]) ;
$firstname =htmlspecialchars($_POST["firstname"]) ;
$mail = htmlspecialchars($_POST["mail"]) ;
$birthday = htmlspecialchars($_POST["birthday"]) ;


// gestion du hash password

$pwd = $_POST['password'];

$pwd_hashed = password_hash($pwd, PASSWORD_DEFAULT );



var_dump($pwd_hashed);

$req->execute([
  $mail,
  $name,
  $firstname,
  $birthday,
  $pwd_hashed
]);


header('Location: ./index.php');