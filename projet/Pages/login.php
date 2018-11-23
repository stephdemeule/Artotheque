<?php
session_start();
 $bdd = new PDO('mysql:host=localhost;dbname=artotheque;charset=utf8', 'root', '');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
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
                  <a class="nav-link" href="../Artotheque/Pages/catalogue.html">Catalogue</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="infos.php">Infos pratiques</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link disabled" href="moncompte.php">Mon compte</a>
                </li>
              </ul>
            </div>
          </nav>
    <nav class="navbar fixed-top navbar-light bg-light"> 
  </div>
  <section class="jumbotron text-center">
        <div class="container">
          <h1 class="jumbotron-heading">Connexion</h1>
        </div>
</section>


<?php

	if(isset($_POST['submit']))
{

$username=htmlspecialchars(trim($_POST['username']));
$password=sha1($_POST['password']);

if (!empty($username) and !empty($password))
{
	$req=$bdd->prepare("select* from users where username=? and password=? ");
	$req->execute(array($username, $password));
	$userexist= $req-> rowCount();

	if ($userexist==1)
	{	
		$userinfo=$req-> fetch();
		$_SESSION['id'] = $userinfo['id'];
		header("location: profil.php?id=".$_SESSION['id']);
		
	}


	else 
	{

		echo" mot de passe ou identifiant incorrect";
	}		
}
else
{
	echo" veuillez saisir tous les champs";
}

}


?>
<div>
<form method ="post" action="login.php">
<div class="form-group">
	<label for="identifiant"class="col-sm-10 col-form-label">Votre identifiant:</label>
	<div class="col-sm-10">
	<input type=" text" class="form-control" name="username" placeholder="Identifiant"  >
</div>
</div>
<div class="form-group">
<label for="Password"class="col-sm-10 col-form-label">Votre mot de passe</label>
<div class="col-sm-10">
<input type="password" class="form-control" name="password" placeholder="Mot de passe" >
</div>
</div>
<div class="col-sm-10">
<button type="submit" class="btn btn-primary" name="submit" value="Se connecter">Se connecter</button>
<a href="register.php"> pas encore membre?</a></p>
</div>

</div>
	</form>
</div>
</body>
</html>