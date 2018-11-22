


<!DOCTYPE html>
<html>
<head>

	<title> Inscription</title>
	<meta charset="utf-8">
	<?php 

	if (isset($_POST['submit'])) {
		$username=htmlspecialchars(trim($_POST['username']));
		$email=htmlspecialchars(trim($_POST['email']));
		$repeatemail=htmlspecialchars(trim($_POST['repeatemail']));
		$repeatpassword=sha1($_POST['repeatpassword']);
		$password=sha1($_POST['password']);


		
		if ($username&&$password&&$repeatpassword&&$email&&$repeatemail)
		{
			if ($email==$repeatemail)
			{
				if(filter_var($email,FILTER_VALIDATE_EMAIL))
				{
			
			if (strlen($password)>4)
			{

				if (strlen($password == $repeatpassword))
				{
				try
				{
    // On se connecte à MySQL
   						 $bdd = new PDO('mysql:host=localhost;dbname=artotheque;charset=utf8', 'root', '');
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


		}else echo"votre adresse email n'est pas valide";

		}else echo" <span style=\"color:red;\">Vos adresses mails ne sont pas identiques</span>";

			
			}else echo  "<span style=\"color:red;\">Veuillez saisir tous les champs</span>";
		

	}

	?>
	<meta name="viewport" content=" width=device-width, initial-scale=1">
</head>


<body style =" background-color:#ccbcb3 ">

<div align="center">
<h1>  Inscription</h1>

<form method ="post" action="register.php"> 
<p> Votre nom d'utilisateur</p>
<input type="text" name="username" required="" value="<?php if (isset($username)){echo $username;} ?>">
<p> Votre adresse mail</p>
<input type="email" name="email" required="" value="<?php if (isset($email)){echo $email;} ?>">
<p> Veuillez confirmer votre adresse mail</p>
<input type="email" name="repeatemail" required="" value="<?php if (isset($repeatemail)){echo $repeatemail;} ?>">
<p>Votre mot de passe</p>
<input type="password" name=" password" required="">
<p> Veuillez repéter votre mot de passe</p>
<input type="password" name="repeatpassword"><br><br>
<input type="submit" name="submit" value="Valider">
</form>
<a href="login.php"> connectez vous</a>
</div>


</body>


</html>