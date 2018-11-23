<!DOCTYPE html>
<html lang="fr">
<head>
  <title>Bootstrap Example</title>
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
                  <a class="nav-link" href="Pages/catalogue.php">Catalogue</a>
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
    <div class="text-sm-center py-3"><h6> Artotheque UDEV - IPI 2018</h6><BR>Claire MERCAT<BR>Chantal ROUKA<BR>Stéphane DEMEULEMEESTER
    </div>
</footer>
</html>