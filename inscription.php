<?php


if (isset($_POST['nom']) && isset($_POST['prenom'])&& isset($_POST['mail']) && isset($_POST['passe']) && isset($_POST['phone'])  ) {
$bdd = new PDO('mysql:host=localhost;dbname=djibson;charset=utf8', 'root', '');
$cryptogramme = password_hash($_POST['passe'] , PASSWORD_DEFAULT);
$passe = $_POST['phone'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$mail = $_POST['mail'];
$bdd->query("INSERT INTO `membre` (`id_membres` ,`login`,`mot_passes`,`nom`,`prenom`,`phone`) VALUES (NULL,'$mail','$cryptogramme','$nom','$prenom','$passe')");
$envoie = array("Vous êtes inscrit",1);
$jsons =  json_encode($envoie);
echo $jsons;

}



?>