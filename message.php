<?php


session_start ();


if(  isset($_POST['prenom']) && isset($_POST['nom']) && isset($_SESSION['mydata']) ) {

	// On teste pour voir si nos variables ont bien été enregistrées

$data = $_SESSION['mydata'];
$moi = $data[2];
 $nom= $_POST['nom'];//message
 $messages= $_POST['prenom'];
$local =  date('Y-m-d H:i:s');


$bdd = new PDO('mysql:host=localhost;dbname=djibson;charset=utf8', 'root', '');
$req =$bdd->query("SELECT id_membres FROM membre WHERE prenom = '$nom' ");
$datases= $req->fetch(PDO::FETCH_ASSOC);
$id = $datases['id_membres'];

$reqs =$bdd->query("INSERT INTO `message_recu` (`ids`, `destinataire`, `expediteur`, `message`, `heure`, `vue`, `non_vue`) VALUES (NULL, '$moi', '$id', '$messages', '$local', NULL, 1)");


}