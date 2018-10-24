<?php
////////////////////////////////////////////////////
//// RECUPERATION DES DONNEES
///////////////////////////////////////////////////
$mdp=sha1($_POST['ajzt']);
$mdp2=sha1($_POST['pdsf']);
$mel=htmlspecialchars($_POST['mel1']);
$mel2=htmlspecialchars($_POST['mel2']);



////////////////////////////////////////////////////
//// REALISATION DES CALCULS
///////////////////////////////////////////////////

if($mel!=$mel2){
  $msgErreur = 'Vos adresses Email sont différentes , réessayer !';
} elseif ($mdp!=$mdp2) {
  $msgErreur = 'Vos mots de passe sont différents , réessayer !';
}else {
    include_once('../model/DAO.class.php');
    if ($dao->getClient($_POST['mel1'] == NULL)){// Vérifie que le client qui a l'adresse mel1 existe dans la bd
      echo'Ok';
    }
}


$mauvaisMail = $mel!=$mel2;





////////////////////////////////////////////////////
//// DECLANCHEMENT DE LA VUE
///////////////////////////////////////////////////
if (isset($msgErreur)) {
  include('../view/inscription.view.php');
}





?>
