<?php
$myData = $_POST['myData'];
$mydata = $_POST['mydata'];



if (isset($_POST['myData']) && isset($_POST['mydata'])) {
 
	$bdd = new PDO('mysql:host=localhost;dbname=djibson;charset=utf8', 'root', '');
	
	$req = $bdd->query( "SELECT `id_membres`,`login`,`mot_passes`,`nom`,`prenom`,`equipe`,`poste` FROM `membre` WHERE login ='$mydata'" ); 
	$datases= $req->fetch(PDO::FETCH_ASSOC);
	$login = $datases['login'];
	$nom = $datases['nom'];
	$prenom = $datases['prenom'];
	$equipe =$datases['equipe'];
	$poste = $datases['poste'];
	$id = $datases['id_membres'];

	
	
	$verifier= password_verify($myData, $datases['mot_passes'] );
	// on vérifie les informations du formulaire, à savoir si le pseudo saisi est bien un pseudo autorisé, de même pour le mot de passe
	if ($login == $_POST['mydata'] && $verifier) {
		// dans ce cas, tout est ok, on peut démarrer notre session

		// on la démarre :)
         session_start ();
		 $myArr = array($login,$nom,$prenom,$equipe,$poste,$id);
		$_SESSION['mydata'] = $myArr;


		// on redirige notre visiteur vers une page de notre section membre
		$verification = array("Connexion...",1);
		$json = json_encode($verification);
		echo $json;      

	}
	else {
		// Le visiteur n'a pas été reconnu comme étant membre de notre site. On utilise alors un petit javascript lui signalant ce fait
		$envoie = array("Membre non recconu");
		$jsons =  json_encode($envoie);
		echo $jsons;
		// puis on le redirige vers la page d'accueil
		
	}
}
else  {
	echo "Veuillez remplir les champ";
}
?>
