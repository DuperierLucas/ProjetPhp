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

//S'il y a une ref dans l'URL, cela signifi que ...
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

//Création tableau d'article venant des cookie enregistrés
foreach ($_COOKIE as $key => $value) {
  $article = $dao->getArticle((int)$key);
  $article = ($article => $value);
  array_push($articles, $article);
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
