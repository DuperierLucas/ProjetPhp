<?php
//Affiche les résultats d'une Recherche
include_once("../model/DAO.class.php");


////////////////////////////////////////////////////
//// RECUPERATION DES DONNEES
///////////////////////////////////////////////////

//Pour le header
$categories = $dao->getCategories();

//Pour le nombre d'articles à afficher
$n = 8;

if (isset($_GET['article'])) {
  //Le client à cliquer sur un article pour le commander
  setcookie($_GET['article'], "commande");
  $commande = true;
}
$categorie = 1;

$recherche = $_GET['recherche'];
////////////////////////////////////////////////////
//// REALISATION DES CALCULS
///////////////////////////////////////////////////

$articles = $dao->getResRecherche($recherche);

// ref de article suivant sinon garde les mêmes articles
$nextRef = $dao->next(end($articles)->ref);

// Les articles précédents sinon garde les mêmes articles
$prev = $dao->prevN($articles[0]->ref,$n);

////////////////////////////////////////////////////
//// DECLANCHEMENT DE LA VUE
///////////////////////////////////////////////////

include('../view/articles.view.php');
?>
