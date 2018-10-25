<?php

include_once("../model/DAO.class.php");

////////////////////////////////////////////////////
//// RECUPERATION DES DONNEES
///////////////////////////////////////////////////

//Pour le header
$categories = $dao->getCategories();

if (isset($_POST['mail'])) {
  $mail = $_POST['mail'];
}

if(isset($_POST['ajzt'])) {
  $mdp = $_POST['ajzt'];
}

////////////////////////////////////////////////////
//// REALISATION DES CALCULS
///////////////////////////////////////////////////

if(isset($mail) && isset($mdp)){
  $client = $dao->connexion($mail, $mdp);
}

////////////////////////////////////////////////////
//// DECLANCHEMENT DE LA VUE
///////////////////////////////////////////////////

if (isset($client)) {
  include('../view/compte.view.php');
} else {
  $msgErreur = 'E-mail ou mot de passe incorrect';
  include('../view/connexion.view.php');
}


?>
