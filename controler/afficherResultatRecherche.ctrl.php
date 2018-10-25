<?php
//Affiche les résultats d'une Recherche
include_once("../model/DAO.class.php");


////////////////////////////////////////////////////
//// RECUPERATION DES DONNEES
///////////////////////////////////////////////////

//Pour le header
$categories = $dao->getCategories();

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

////////////////////////////////////////////////////
//// DECLANCHEMENT DE LA VUE
///////////////////////////////////////////////////

include('../view/articles.view.php');
?>
