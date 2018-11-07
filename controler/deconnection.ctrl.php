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
  $mdp = $_POST['ajzt'];

  if($id == 'A'){ //On vérifie si l'utilisateur est l'administrateur
    $admin = $dao->getAdminID($id);
    if ($admin->motDePasse == $mdp) {
      $dao->suppressionCompteAdmin($admin->motDePasse);
    }
  } else{
    $client = $dao->getClientID($id);
    if ($client->motDePasse == $mdp) {
      $dao->suppressionCompteAdmin($client->motDePasse);
    }
  }

}

session_destroy();
////////////////////////////////////////////////////
//// DECLANCHEMENT DE LA VUE
///////////////////////////////////////////////////

include('../view/connexion.view.php');

?>
