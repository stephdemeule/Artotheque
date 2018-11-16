<?php
session_start();
 $bdd = new PDO('mysql:host=localhost;dbname=phpmembre;charset=utf8', 'root', '');

 if(isset($_GET['id']) and $_GET['id']>0)
 {
 	$getid= intval($_GET['id']);
 	$req= $bdd->prepare('select* from users where id = ?');
 	$req-> execute(array($getid));
 	$userinfo=$req-> fetch();

 
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<h2 style=" text-align: center">Bienvenue <?php echo $userinfo['username']; ?></h2>
	<br/><br/>
	


</head>
<body>




</body>
</html>
<?php

}
?>