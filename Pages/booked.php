<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Ma réservation</title>
    
    </head>
        
    <body>
        <h1>page réservation</h1>
        <p><a href="catalogue.php">Retour au catalogue</a></p>
        <?php
         echo '<p> vous avez réservé oeuvre ' . $_GET['id'].'</p>'
        ?>
<?php 
// Connexion à la base de données
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=artotheque;charset=utf8', 'root', '');
// Insertion du message à l'aide d'une requête préparée
$id=$_GET['id'];
$req=$bdd->prepare('UPDATE artotheque SET emprunt=1 WHERE id= :id');
$req->execute(array(
    'id' => $id,
    ));
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
// Redirection du visiteur vers la page du minichat
header('Location: catalogue.php?id=' .$_GET['id']);
?>