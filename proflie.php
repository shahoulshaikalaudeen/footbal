<?php
// On démarre la session (ceci est indispensable dans toutes les pages de notre section membre)
session_start ();

// On récupère nos variables de session
if (isset($_SESSION['mydata']) ) {

	// On teste pour voir si nos variables ont bien été enregistrées
  $var = $_SESSION['mydata'];
  

  
 



    $myArr = array($var[0],$var[1],$var[2],$var[3],$var[4],$var[5]);
  
    $json = json_encode($myArr);

    
  
   echo $json;
   

   


}
else {
  $myArrs = array(0);
  $jsons = json_encode($myArrs);
echo $jsons;
}

