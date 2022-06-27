<?php
try{
  $database = new PDO("mysql:host=localhost;dbname=projetblog;charset=utf8","root","");
}catch(Exception $e){
  die("Error : ".$e->getMessage());
}

$req = $database->prepare("SELECT * FROM user");
$req->execute();

var_dump($_POST) ;
?>


<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="">
  <script src="" defer></script>
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  
  <title>Document</title>
</head>
<body>
  <nav class="navbar bg-light">
    <div class="container-fluid">
      <a class="navbar-brand col-10">Blog Jean-Claude Van Damme</a>
      <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalInscription">
        Inscription
      </button>
      <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalConnexion">
        Connexion
      </button>

      <!-- Modal Inscription -->
      <div class="modal fade" id="modalInscription" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Inscription</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="./inscritption.php" method="post">
              <div class="modal-body">
                <div class="mb-3">
                  <label for="name" class="form-label">Nom</label>
                  <input type="text" class="form-control" id="name" aria-describedby="emailHelp" name="name">
                </div>
                <div class="mb-3">
                  <label for="firstname" class="form-label">Prénom</label>
                  <input type="text" class="form-control" id="firstname" aria-describedby="emailHelp" name="firstname">
                </div>
                <div class="mb-3">
                  <label for="email" class="form-label">Adresse Email</label>
                  <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="mail">
                </div>
                <div class="mb-3">
                  <label for="birthday" class="form-label">Date de naissance</label>
                  <input type="date" class="form-control" id="birthday" aria-describedby="emailHelp" name="birthday">
                </div>
                <div class="mb-3">
                  <label for="password" class="form-label">Password</label>
                  <input type="password" class="form-control" id="password" name="password">
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                <button type="submit" class="btn btn-primary">Validation</button>
              </div>
            </form>
          </div>
        </div>
      </div>

      <!-- Modal Connexion -->
      <div class="modal fade" id="modalConnexion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Connexion</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="./connexion.php" method="post">
              <div class="modal-body">
                <div class="mb-3">
                  <label for="connexionMail" class="form-label">Adresse Email</label>
                  <input type="email" class="form-control" id="connexionMail" aria-describedby="emailHelp">
                  
                </div>
                <div class="mb-3">
                  <label for="passwordConnexion" class="form-label">Password</label>
                  <input type="password" class="form-control" id="passwordConnexion">
                </div>
                <div class="mb-3">
                  <label for="passwordConnexionConfirm" class="form-label">Confirmation Password</label>
                  <input type="password" class="form-control" id="passwordConnexionConfirm">
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </nav>
  
</body>
</html>


<?php

var_dump($_POST) ;

?>