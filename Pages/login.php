<?php
session_start();
 $bdd = new PDO('mysql:host=localhost;dbname=phpmembre;charset=utf8', 'root', '');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>


</head>
<body>



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

<form method ="post" action="login.php"> 
<p> Votre identifiant</p>
<input type=" text" name="username"  >
<p>Votre mot de passe</p>
<input type="password" name="password" ><br><br>
<input type="submit" name="submit" value="Se connecter">
<p>
<a href="register.php"> pas encore membre?</a></p>
</div>
	</form>
</body>
</html>