<?php

include_once("../model/DAO.class.php");

////////////////////////////////////////////////////
//// RECUPERATION DES DONNEES
///////////////////////////////////////////////////

//Pour le header
$categories = $dao->getCategories();

if (isset($_GET['action'])) {
  $action = $_GET['action'];
}

////////////////////////////////////////////////////
//// REALISATION DES CALCULS
///////////////////////////////////////////////////
session_start();

if(isset($_SESSION['id']) && isset($_POST['ajzt'])) {
  $id = $_SESSION['id'];
  $mdp = sha1($_POST['ajzt']);
  $client = $dao->getClientID($id);

  if ($client->motDePasse == $mdp) {
    if ($action = 'supprimer') {
      $dao->suppressionCompteClient($client->id);
      $msg = "Votre compte a bien été supprimé";
    } else {
      $dao->modifierMdP($client->id, $mdp);
      $msgConfirmation = "Votre mot de passe a bien été modifié";
    }
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
} else if (isset($msgConfimation)) {
  include('../view/compte.view.php');
}
else include('../view/connexion.view.php');

?>
