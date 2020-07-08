
<?php
session_start ();

if(isset($_GET['vues'])){
$var = $_SESSION['mydata'];
$vars = $_GET['vues'];
$id = $var[5];
$bdd = new PDO('mysql:host=localhost;dbname=djibson;charset=utf8', 'root', '');
$reqs =$bdd->query("UPDATE message_recu SET non_vue = '$vars' WHERE expediteur  =  '$id'");
  

}

?>