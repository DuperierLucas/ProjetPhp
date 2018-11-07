<?php

include_once("../model/DAO.class.php");

////////////////////////////////////////////////////
//// RECUPERATION DES DONNEES
///////////////////////////////////////////////////

//Pour le header
$categories = $dao->getCategories();

////////////////////////////////////////////////////
//// REALISATION DES CALCULS
///////////////////////////////////////////////////
session_start();

if(isset($_SESSION['id']) && isset($_POST['ajzt'])) {
  $id = $_SESSION['id'];
  $mdp = sha1($_POST['ajzt']);
  $client = $dao->getClientID($id);

  if ($client->motDePasse == $mdp) {
    $dao->suppressionCompteClient($client->id);
    $msg = "Votre compte a bien été supprimé";
  } else {
    $msgErreur = "Mot de passe incorrect";
  }

}

if (!isset($msgErreur)) {
  session_destroy();
}

////////////////////////////////////////////////////
//// DECLANCHEMENT DE LA VUE
///////////////////////////////////////////////////

if (isset($msgErreur)) {
  include('../view/modifCompte.view.php');
} else include('../view/connexion.view.php');

?>
