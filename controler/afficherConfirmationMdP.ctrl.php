<?php

include_once("../model/DAO.class.php");

////////////////////////////////////////////////////
//// RECUPERATION DES DONNEES
///////////////////////////////////////////////////

//Pour le header
$categories = $dao->getCategories();
session_start();

////////////////////////////////////////////////////
//// REALISATION DES CALCULS
///////////////////////////////////////////////////

//L'utilisateur veut enregistrer son nouveau mdp
if (!empty($_POST['enregistrer'])) {
  $action = "enregistrer";

  //shal permet d'encoder les mots de passes
  $mdp = sha1($_POST['ajzt']);
  $mdp2 = sha1($_POST['pdsf']);

  if ($mdp!=$mdp2) {
    $msgErreur = 'Vos mots de passe sont différents';
    $id = $_SESSION['id'];

    if($id == 'A'){ //On vérifie si l'utilisateur est l'administrateur
      $admin = $dao->getAdminID($id);
    } else{
      $client = $dao->getClientID($id);
    }

  }

} //L'utilisateur veut supprimer son compte
else {
  $action = "supprimer";
}

////////////////////////////////////////////////////



//// DECLANCHEMENT DE LA VUE
///////////////////////////////////////////////////
if (isset($msgErreur)) {
  include('../view/compte.view.php');
} else include('../view/modifCompte.view.php');

?>
