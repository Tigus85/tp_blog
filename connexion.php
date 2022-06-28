<?php
session_start();
$_SESSION["invalidePassword"]=false;
$_SESSION["invalideEmail"]=false;

try{
  $database = new PDO("mysql:host=localhost;dbname=projetblog;charset=utf8","root","");
}catch(Exception $e){
  die("Error : ".$e->getMessage());
}

$connexionMail = htmlspecialchars($_POST["connexionMail"]) ;
$passwordConnexion = htmlspecialchars($_POST["passwordConnexion"])  ;
$passwordConnexionConfirm = htmlspecialchars($_POST["passwordConnexionConfirm"]) ;


// verification password identique
if($passwordConnexion !== $passwordConnexionConfirm){
  $_SESSION["invalidePassword"]=true;
  header('Location: ./index.php');
}


//connection a la base pour verifier le password
$req = $database->prepare("SELECT password FROM user WHERE mail = ?");
$req->execute( [$connexionMail]);



$password = $req->fetch();




if(!$password){
  $_SESSION["invalideEmail"]=true;
  echo "invalide Email";
  header('Location: ./index.php');
}else if(!password_verify($passwordConnexion,$password["password"])){
  $_SESSION["invalidePassword"]=true;
  echo "invalide password";
  header('Location: ./index.php');
}else {
  echo "tous est valide";
  $req_user = $database->prepare("SELECT name, firstname FROM `user` WHERE mail = ?;");
  $req_user->execute([$connexionMail]);
  $user= $req_user->fetch();
  var_dump($user);
  $_SESSION["name"]=$user["name"];
  $_SESSION["firstname"]=$user["firstname"];
  header('Location: ./index.php');
}

var_dump($_SESSION);
