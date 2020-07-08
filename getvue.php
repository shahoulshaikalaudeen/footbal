<?php


session_start ();


if (isset($_SESSION['mydata']) ) {

	// On teste pour voir si nos variables ont bien été enregistrées
  $var = $_SESSION['mydata'];
 
  $bdd = new PDO('mysql:host=localhost;dbname=djibson;charset=utf8', 'root', '');
  
$id = $var[5];
$req =$bdd->query("SELECT COUNT(non_vue) as vuese FROM `message_recu`,`membre` WHERE message_recu.expediteur = '$id' AND membre.id_membres = message_recu.expediteur AND non_vue = 1");
$datases= $req->fetch(PDO::FETCH_ASSOC); 
$vue = $datases['vuese'];

$myArr = array($vue);
$jsons = json_encode($myArr);

    
  echo $jsons;
   

   


}


?>