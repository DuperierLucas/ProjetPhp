<?php

include_once("../model/DAO.class.php");

////////////////////////////////////////////////////
//// RECUPERATION DES DONNEES
///////////////////////////////////////////////////

//Pour le header
$categories = $dao->getCategories();

//shal permet d'encoder les mots de passes
$mdp = sha1($_POST['ajzt']);
$mdp2 = sha1($_POST['pdsf']);

//htmlspecialchars permet de gérer les caractères spéciaux
$mel = htmlspecialchars($_POST['mel1']);
$mel2  =htmlspecialchars($_POST['mel2']);

////////////////////////////////////////////////////
//// REALISATION DES CALCULS
///////////////////////////////////////////////////

if($mel!=$mel2){
  $msgErreur = 'Vos adresses e-mail sont différentes';
} elseif ($mdp!=$mdp2) {
  $msgErreur = 'Vos mots de passe sont différents';
} else {
    include_once('../model/DAO.class.php');
    if ($dao->existe($mel)){
      $msgErreur = 'Cette adresse e-mail existe déjà';
    }
}

if(!(isset($msgErreur))) {
  $id = $dao->getId();
  $nom = $_POST['nm'];
  $prenom = $_POST['pr'];
  $adresse = $_POST['adr'];
  $telephone = $_POST['tel'];

  $dao->inscrireClient($id, $nom, $prenom, $adresse, $telephone, $mel, $mdp);
  $client = $dao->getClient($id);
}

////////////////////////////////////////////////////
//// DECLANCHEMENT DE LA VUE
///////////////////////////////////////////////////

if (isset($msgErreur)) {
  include('../view/inscription.view.php');
} else {
  include('../view/compte.view.php');
}


?>
