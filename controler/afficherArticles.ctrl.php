<?php

include_once('../model/DAO.class.php');

////////////////////////////////////////////////////
//// RECUPERATION DES DONNEES
///////////////////////////////////////////////////

//Pour le header
$categories = $dao->getCategories();

$categorie = $_GET['categorie'];

if (isset($_GET['article'])) {
  //Le client à cliquer sur un article pour le commander
  setcookie($_GET['article'], "commande");
  $commande = true;
}

////////////////////////////////////////////////////
//// REALISATION DES CALCULS
///////////////////////////////////////////////////

if ($categorie != 'tout') {
  $articles = $dao->getArticles($categorie);
} else $articles = $dao->getAllArticles();

////////////////////////////////////////////////////
//// DECLANCHEMENT DE LA VUE
///////////////////////////////////////////////////

include('../view/articles.view.php');

?>
