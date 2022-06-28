<?php
session_start();


try{
  $database = new PDO("mysql:host=localhost;dbname=projetblog;charset=utf8","root","");
}catch(Exception $e){
  die("Error : ".$e->getMessage());
}

$req_article = $database->prepare("SELECT * FROM article 
INNER JOIN category  ON article.category_id = category.id 
INNER JOIN user ON article.owner_id = user.id;");
$req_article->execute();


?>


<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <script src="" defer></script>
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  
  <title>Document</title>
</head>
<body class="d-grid gap-3">
  <nav class="bg-light ">
    <div class="container-fluid">
      <div class="row align-items-center">
        <div class="col-8">Blog Jean-Claude Van Damme</div>
        <?php
          if(empty($_SESSION["name"]) || empty($_SESSION["firstname"])){
        ?>
            <!-- Button Connexion et Inscription -->
            <div class="col ">     
              <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#modalInscription">
                Inscription
              </button>
              <button type="button" class="btn btn-success " data-bs-toggle="modal" data-bs-target="#modalConnexion">
                Connexion
              </button>
            </div>
        <?php
          } else {
            ?>
              <!-- Button Login et déconection -->
              <div class="col"> Bonjour <?=$_SESSION["name"]?> <?=$_SESSION["firstname"]?> </div>
              <form class="col align-self-center" action="./deconnexion.php" method="post">
                <button type="submit" class="btn btn-danger " data-bs-toggle="modal" id="deconnexion">
                  Déconnexion
                </button>
              </form>
            <?php
          }
        ?>




     




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
                    <input type="email" class="form-control" id="connexionMail" aria-describedby="emailHelp" name="connexionMail">
                    
                  </div>
                  <div class="mb-3">
                    <label for="passwordConnexion" class="form-label">Password</label>
                    <input type="password" class="form-control" id="passwordConnexion" name="passwordConnexion">
                  </div>
                  <div class="mb-3">
                    <label for="passwordConnexionConfirm" class="form-label">Confirmation Password</label>
                    <input type="password" class="form-control" id="passwordConnexionConfirm" name="passwordConnexionConfirm">
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                  <button type="submit" class="btn btn-primary">Confirmation</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </nav>

  <main class="d-grid gap-3">


    
    <?php

    if(!empty($_SESSION["invalideEmail"])){
      if($_SESSION["invalideEmail"] ){
        echo '<div class="shadow-lg p-3 mb-5 bg-body rounded text-danger">Merci de verifier l adresse mail</div>';
      }
    };
    

    if(!empty($_SESSION["invalidePassword"])){
      if($_SESSION["invalidePassword"] ){
        echo '<div class="shadow-lg p-3 mb-5 bg-body rounded text-danger">Merci de verifier la saisie de vos Mdp</div>';
      }
    };

      
    ?>
  <!-- article  -->
  <?php

  while($article = $req_article->fetch()){
    
    $htmlRow =
    '
    <article>
      <div class="card mb-6" >
        <div class="row g-0">
          <div class="col-md-4">
            <img src="'.$article[1].'" class="img-fluid rounded-start" alt="...">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title">'.$article[2].'</h5>
              <p class="card-text">'.$article[3].'</p>
              <p class="card-text"><small class="text-muted">Auteur : '.$article["name"].'</small></p>
              <p class="card-text"><small class="text-muted">Catégorie: '.$article[8].'</small></p>
            </div>
          </div>
        </div>
      </div>
    </article>
    ';
    echo $htmlRow;
  }

  ?>
  </main>
  
</body>
</html>


<?php

var_dump($_COOKIE);

?>