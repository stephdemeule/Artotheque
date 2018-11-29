<?php $bdd = new PDO('mysql:host=localhost;dbname=artotheque;charset=utf8', 'root', '');?>

<!DOCTYPE html>
<html>
<head>

	<title> Inscription</title>
	<meta charset="utf-8">
	<title>Document</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../styles">


	<?php 

	if (isset($_POST['submit'])) {
		$username=htmlspecialchars(trim($_POST['username']));
		$email=htmlspecialchars(trim($_POST['email']));
		$repeatemail=htmlspecialchars(trim($_POST['repeatemail']));
		$repeatpassword=sha1($_POST['repeatpassword']);
		$password=sha1($_POST['password']);


		
		if ($username && $password && $repeatpassword && $email && $repeatemail)
		{
			$requsername=$bdd->prepare("select * from users where username=?");
					$requsername->execute(array($username));
					$usernameexit= $requsername->rowCount();
					if($usernameexit==0)
					{

			if ($email==$repeatemail)
			{
				if(filter_var($email,FILTER_VALIDATE_EMAIL))
				{

					$reqmail=$bdd->prepare("select * from users where email=?");
					$reqmail->execute(array($email));
					$mailexit= $reqmail->rowCount();
					if($mailexit==0)
					{

					if (strlen($password)>4)
					{			

						if (strlen($password == $repeatpassword))
					{
					try
					{
    // On se connecte à MySQL
   						 $bdd = new PDO('mysql:host=localhost;dbname=phpmembre;charset=utf8', 'root', '');
					}
				catch(Exception $e)
					{
    // En cas d'erreur, on affiche un message et on arrête tout
       				die('Erreur : '.$e->getMessage());
					}

					$req = $bdd->prepare('INSERT INTO users (username,password,email) values (?,?,?)');

				
					$req->execute(array( $username, $password,$email));

				 die('Inscription terminée, vous pouvez vous <a href ="login.php">connecter</a>');
				
			
			}else echo " <span style=\"color:red;\">Les deux mots de passes ne sont pas identiques</span>";



			}else echo "<span style=\"color:red;\"> votre mot de passe est trop court , 6 caractères au minimum</span>";

					}else echo"adressse mail déjà utilisé" ;
		


		}else echo"votre adresse email n'est pas valide";


		}else echo" <span style=\"color:red;\">Vos adresses mails ne sont pas identiques</span>";

			
	} else echo"Nom d'utilisateur déjà utilisé, veuillez en choisir un autre";
	}else echo  "<span style=\"color:red;\">Veuillez saisir tous les champs</span>";
}
		


	?>
	<meta name="viewport" content=" width=device-width, initial-scale=1">
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

  <!--Titre de la page jumbotron bootstrap-->
  <section class="jumbotron text-center">
        <div class="container">
          <h1 class="jumbotron-heading">Inscription</h1>
        </div>
</section>

<div class="container">
<form method ="post" action="register.php">
	<div class="form-group">
		<label for="utilisateur"class="col-sm-10 col-form-label"> Votre nom d'utilisateur</label>
		<input type="text" class="form-control" name="username" placeholder="Votre nom d'utilisateur" required="" value="<?php if (isset($username)){echo $username;} ?>">
	</div>
	<div class="form-group">
		<label for="mail"class="col-sm-10 col-form-label"> Votre adresse mail</label>
		<input type="email" class="form-control" name="email" placeholder="Votre adresse mail" required="" value="<?php if (isset($email)){echo $email;} ?>">
	</div>
	<div class="form-group">
		<label for="mail2"class="col-sm-10 col-form-label"> Confirmez votre adresse mail</label>
		<input type="email" class="form-control" name="repeatemail" placeholder="Votre adresse mail" required="" value="<?php if (isset($repeatemail)){echo $repeatemail;} ?>">
	</div>
	<div class="form-group">
		<label for="password"class="col-sm-10 col-form-label">Votre mot de passe</label>
		<input type="password"class="form-control" name=" password" placeholder="Votre mot de passe" required="">
	</div>
	<div class="form-group">
		<label for="password2"class="col-sm-10 col-form-label">Veuillez repéter votre mot de passe</label>
		<input type="password"class="form-control" name="repeatpassword" placeholder="Votre mot de passe"><br><br>
	</div>
	<div class="col-sm-10">
	<button type="submit" class="btn btn-primary" name="submit" value="Valider">Inscription</button>
	<p>Vous possédez dèjà un compte?<a href="login.php"> connectez vous</p>
</form>
</div>
</div>
</div>


</body>


</html>
