<?php

include_once("../model/DAO.class.php");

////////////////////////////////////////////////////
//// RECUPERATION DES DONNEES
///////////////////////////////////////////////////
//Pour le header
$categories = $dao->getCategories();

$articles = array();

$valider = isset($_GET['action']);

//Le client est connecté
session_start();
$connecte = isset($_SESSION['id']);

////////////////////////////////////////////////////
//// REALISATION DES CALCULS
///////////////////////////////////////////////////

//Suprression de cookie en trop
if (isset($_COOKIE['PHPSESSID'])) {
   unset($_COOKIE['PHPSESSID']);
}

//Si $valider est vrai selon signifie que l'utilisateur ...
// ... a validé son panier ET été connecté
if($valider) {
  foreach($_COOKIE as $key){
   // Suppression du cookie
   setcookie($key, false, time() - 3600);
  }
  var_dump($_COOKIE);
 $msg = 'Votre commande a bien été prise en compte';
}

//S'il y a "supprimer" dans l'URL, cela signifie que ...
// ... l'utilisateur veut supprimer cet article de son panier
if (isset($_GET['supprimer'])) {
  $ref = $_GET['supprimer'];
  $nbCommande = $_COOKIE[$ref];
  // Suppression du cookie
  setcookie($ref, false, time() - 3600);
  //On reduit le nombre de commande de 1
  $_COOKIE[$ref] = $nbCommande-1;
}

//Création tableau d'article venant des cookies enregistrés
foreach ($_COOKIE as $key => $value) {
  //Si on a au moins une commande
  if ($value > 0) {
    $a = $dao->getArticle((int)$key); // On récurère l'article
    $a->nbCommande = $value; //ajoute un attribut nbCommande

    array_push($articles, $a);
  }
}

$prixTotal = 0;

//Pour calculer le prix total
foreach ($articles as $value) {
  $prixTotal = $prixTotal + $value->prix*$value->nbCommande;
}

////////////////////////////////////////////////////
//// DECLANCHEMENT DE LA VUE
///////////////////////////////////////////////////

include('../view/panier.view.php');

?>
