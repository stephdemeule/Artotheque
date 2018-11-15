<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body>
 
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
</body>
</html>