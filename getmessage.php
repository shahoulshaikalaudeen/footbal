<?php


session_start ();


if (isset($_SESSION['mydata']) ) {

	// On teste pour voir si nos variables ont bien été enregistrées
  $var = $_SESSION['mydata'];
 
  $bdd = new PDO('mysql:host=localhost;dbname=djibson;charset=utf8', 'root', '');
  
  $id = $var[5];
  $req =$bdd->query("SELECT `expediteur`,`id_membres`,`destinataire`,`message`,`prenom`,`heure` FROM `message_recu`,`membre` WHERE message_recu.expediteur = '$id' AND membre.id_membres = message_recu.expediteur AND heure <= NOW()");
	$datases= $req->fetchAll(PDO::FETCH_ASSOC);

  
 



    $myArr = array($datases);
  
    $json = json_encode($myArr);

    
  
   echo $json;
   

   


}


?>