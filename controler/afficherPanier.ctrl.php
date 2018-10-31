<?php

include_once("../model/DAO.class.php");

////////////////////////////////////////////////////
//// RECUPERATION DES DONNEES
///////////////////////////////////////////////////
//Pour le header
$categories = $dao->getCategories();

$articles = array();

$valider = isset($_GET['action']);

////////////////////////////////////////////////////
//// REALISATION DES CALCULS
///////////////////////////////////////////////////

//S'il y a une ref dans l'URL, cela signifie que ...
// ... l'utilisateur veut supprimer cet article de son panier
if(isset($_GET['article'])) {
  $article = $_GET['article'];
  //On supprime l'article des cookies
  unset($_COOKIE[$article->ref]);
}

//Si $valider est vrai selon signifie que l'utilisateur ...
// ... a validé son panier ET été connecté
if($valider) {
  foreach($_COOKIE as $key){
   // Suppression du cookie
   unset($_COOKIE[$key]);
 }
}

//Suprression de cookie en trop
if (isset($_COOKIE['PHPSESSID'])) {
   unset($_COOKIE['PHPSESSID']);
}

//Cela signifie que le client a cliquer sur supprimer
if (isset($_GET['supprimer'])) {
  $ref = $_GET['supprimer'];
  //L'article avait été commandé 1 fois
  if ($_COOKIE[$ref] == 1) {
    unset($_COOKIE[$ref]);
    //On le supprime des cookies
  } else $_COOKIE[$ref] = $_COOKIE[$ref]-1;
  //On reduit le nombre de commande de 1
}

//Création tableau d'article venant des cookies enregistrés
foreach ($_COOKIE as $key => $value) {
  $a = $dao->getArticle((int)$key); // On récurère l'article
  $a->nbCommande = $value; //ajoute un attribut nbCommande

  array_push($articles, $a);
}

$prixTotal = 0;

//Pour calculer le prix total
foreach ($articles as $value) {
  $prixTotal = $prixTotal + $value->prix;
}

////////////////////////////////////////////////////
//// DECLANCHEMENT DE LA VUE
///////////////////////////////////////////////////

//Le client est connecté
$connecte = isset($_GET['id']);

include('../view/panier.view.php');

?>
