<?php
////////////////////////////////////////////////////
//// RECUPERATION DES DONNEES
///////////////////////////////////////////////////
$mdp=sha1($_POST['ajzt']);
$mdp2=sha1($_POST['pdsf']);
$mel=htmlspecialchars($_POST['mail']);
$mel2=htmlspecialchars($_POST['mail2']);



////////////////////////////////////////////////////
//// REALISATION DES CALCULS
///////////////////////////////////////////////////

if($mel!=$mel2){
  $msgErreur = 'Vos adresses Email sont différentes , réessayer !';
} elseif ($mdp!=$mdp2) {
  $msgErreur = 'Vos mots de passe sont différents , réessayer !';
}else {
  // code...
}

$mauvaisMail = $mel!=$mel2;





////////////////////////////////////////////////////
//// DECLANCHEMENT DE LA VUE
///////////////////////////////////////////////////
if ($msgErreur) {
  include('../view/inscription.view.php');
}





?>
