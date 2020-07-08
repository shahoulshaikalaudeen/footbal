<?php


session_start ();


if (isset($_SESSION['mydata']) ) {

	// On teste pour voir si nos variables ont bien été enregistrées
  $var = $_SESSION['mydata'];
$bdd = new PDO('mysql:host=localhost;dbname=djibson;charset=utf8', 'root', '');
  
$id = $var[5];
$req =$bdd->query("SELECT id_amis , prenom ,id_membres FROM membre,amis WHERE amis.id_membre = '$id' AND amis.id_amis = membre.id_membres");
$datases= $req->fetchall(PDO::FETCH_ASSOC); 

$myArr = array($datases);
$json = json_encode($myArr);

    
  echo $json;
   

   


}


?>