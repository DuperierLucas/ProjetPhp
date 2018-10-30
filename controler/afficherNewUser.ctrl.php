<?php

include_once("../model/DAO.class.php");

////////////////////////////////////////////////////
//// RECUPERATION DES DONNEES
///////////////////////////////////////////////////

//Pour le header
$categories = $dao->getCategories();

//Si l'utilisateur n'a pas appuyé sur le bouton s'inscrire ...
//... donc qu'il vient de la page inscription et non de la page connexion
if(!(isset($_POST['inscrire']))) {
  //shal permet d'encoder les mots de passes
  $mdp = sha1($_POST['ajzt']);
  $mdp2 = sha1($_POST['pdsf']);

  //htmlspecialchars permet de gérer les caractères spéciaux
  $mel = htmlspecialchars($_POST['mel1']);
  $mel2  =htmlspecialchars($_POST['mel2']);
}

////////////////////////////////////////////////////
//// REALISATION DES CALCULS
///////////////////////////////////////////////////

if (!(isset($_POST['inscrire']))) {
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
}

//S'il n'y a pas eu d'erreur alors on enregistre le client
if(!(isset($_POST['inscrire'])) && !(isset($msgErreur))) {
  $id = $dao->getId();
  $nom = $_POST['nm'];
  $prenom = $_POST['pr'];
  $adresse = $_POST['adr'];
  $telephone = $_POST['tel'];

//NE FONCTIONNE PAS, LORSQUE GETID : NE RENVOIE PAS LE Client
//CLIENT NON AJOUTER ?
  $dao->inscrireClient($id, $nom, $prenom, $adresse, $telephone, $mel, $mdp);
  $client = $dao->getClientID($id);
}

////////////////////////////////////////////////////
//// DECLANCHEMENT DE LA VUE
///////////////////////////////////////////////////

if (isset($msgErreur) || isset($_POST['inscrire'])) {
  include('../view/inscription.view.php');
} else {
  include('../view/compte.view.php');
}


?>
