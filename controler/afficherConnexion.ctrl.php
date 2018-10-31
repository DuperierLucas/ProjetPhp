<?php

include_once("../model/DAO.class.php");

////////////////////////////////////////////////////
//// RECUPERATION DES DONNEES
///////////////////////////////////////////////////

//Pour le header
$categories = $dao->getCategories();

if (isset($_POST['mail'])) {
  $mail = htmlspecialchars($_POST['mail']);
}

if (isset($_POST['ajzt'])) {
  $mdp = sha1($_POST['ajzt']);
}

////////////////////////////////////////////////////
//// REALISATION DES CALCULS
///////////////////////////////////////////////////

if($dao->connexion($mail, $mdp)) {
  $client = $dao->getClientMail($mail);
  //On ouvre une nouvelle session car l'utilisateur est connecté
  session_start();
  $_SESSION['id'] = $client->id;
}

if(!(isset($client)) && (isset($_POST['mail']) || isset($_POST['ajzt']))) {
  $msgErreur = 'E-mail ou mot de passe incorrect';
}

////////////////////////////////////////////////////
//// DECLANCHEMENT DE LA VUE
///////////////////////////////////////////////////

if (isset($client)) {
  include('../view/compte.view.php');
} else {
  include('../view/connexion.view.php');
}

?>
