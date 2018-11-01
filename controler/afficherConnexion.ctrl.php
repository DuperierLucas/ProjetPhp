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

if(isset($_POST['mail']) && isset($_POST['ajzt'])) {
  //On vérifie si c'est un administrateur qui veut se connecter, si oui on vérifie son idnetité et on le connecte
  if(isset($_POST['admin'])){
    if ($dao->connexionAdmin($mail, $mdp)){
      $admin = $dao->getAdminMail($mail);
      //On ouvre une nouvelle session car l'utilisateur est connecté
      session_start();
      $_SESSION['id'] = $admin->id;
    }
  }else if($dao->connexion($mail, $mdp)){
     //connexion pour client normal
    $client = $dao->getClientMail($mail);
    //On ouvre une nouvelle session car l'utilisateur est connecté
    session_start();
    $_SESSION['id'] = $client->id;
  }

}

if(!(isset($client)) && (isset($_POST['mail']) || isset($_POST['ajzt']))) {
  $msgErreur = 'E-mail ou mot de passe incorrect';
}



////////////////////////////////////////////////////
//// DECLANCHEMENT DE LA VUE
///////////////////////////////////////////////////

if (isset($client)) {
  include('../view/compte.view.php');
} else if(isset($admin)){
  include('afficherArticles.ctrl.php');
}else {
  include('../view/connexion.view.php');
}

?>
