<?php
session_start();
 $bdd = new PDO('mysql:host=localhost;dbname=artotheque;charset=utf8', 'root', '');

 if(isset($_GET['id']) and $_GET['id']>0)
 {
 	$getid= intval($_GET['id']);
 	$req= $bdd->prepare('select* from users where id = ?');
 	$req-> execute(array($getid));
 	$userinfo=$req-> fetch();

 
?>




<!DOCTYPE html>
<html lang="fr">
<head>
  
  <br/><br/>
  <title>Bootstrap Example</title>
  <h2 style=" text-align: right; color:#f44265">Bienvenue <?php echo $userinfo['username']; ?></h2>
  <!--<SPAN style="color: red ,text-decoration:underline">
<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
<p>Bonjour<SPAN><?php echo $_POST['pseudo']; ?></SPAN> !-->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../styles">
</head>
<body>

<!--Menu du site-->
    <div id="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav">
                <li class="nav-item active">
                  <a class="nav-link" href="../index.html">Accueil <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="../Pages/catalogue.html">Catalogue</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="register.php">Infos pratiques</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link disabled" href="login.php">Mon compte</a>
                </li>
              </ul>
            </div>
          </nav>
    <nav class="navbar fixed-top navbar-light bg-light"> 
  </div>

<!--Titre page-->
<section class="jumbotron text-center">
        <div class="container">
          <h1 class="jumbotron-heading">Catalogue</h1>
        </div>
</section>

<div class="container">
<div class="card-columns">
  <?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=artotheque;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
$reponse = $bdd->query('SELECT * FROM artotheque');
while ($donnees = $reponse->fetch())
{
    echo '<div class="card">';
    echo '<img class="card-img-top" src="'.$donnees['liens'] .'" alt="Card image cap">';
    echo'<div class="card-body">';
    echo' <h5 class="card-title">'.$donnees['titre_oeuvre'].'</h5>';
    echo'<p class="card-text">'.$donnees['description'].'</p>';
    echo'  <p class="card-text"><small class="text-muted">'.$donnees['auteur'].'</small></p>
    </div>';
    if ($donnees['emprunt']==0)
      {
         echo'<form method="post" action="booked.php?id='. $donnees['id'] . '">
         <input type="submit" class="bouton btn btn-secondary float-right" value="Emprunter" /></form>';
      }
      else // SINON
      {
          echo' <p id="ond" class="float-right text-danger"> oeuvre non disponible</p>';
      }
    echo'</div>';
  
    echo '<br />';
}

$reponse->closeCursor();
?>

</div>
</div>
</body>
<!-- Footer -->
<footer class="page-footer font-small bg-light">
    <div class="text-sm-center py-3"><h6>Projet Artotheque UDEV - IPI 2018<h6><BR>Claire MERCAT<BR>Chantal ROUKA<BR>Stéphane DEMEULEMEESTER
    </div>
</footer>
</html>
<?php

}
else
{
  echo "hello";
}
?>
