<?php

include_once('../model/DAO.class.php');

////////////////////////////////////////////////////
//// RECUPERATION DES DONNEES
///////////////////////////////////////////////////

//Le nombre d'articles à afficher par page
$n = 12;

//Pour le header
$categories = $dao->getCategories();

//On récupère la catégorie choisit
$categorie = $_GET['categorie'];

////////////////////////////////////////////////////
//// REALISATION DES CALCULS
///////////////////////////////////////////////////

    // ref de article suivant sinon garde les mêmes articles
    $nextRef = $dao->next(end($articles)->ref);
    if ($nextRef == end($articles)->ref) {
      $nextRef = $articles[0]->ref;
    }

    // Les articles précédents sinon garde les mêmes articles
    $prev = $dao->prevN($articles[0]->ref,$n);
    if (empty($prev)) {
      $prev = $articles;
    }

if (isset($_GET['article'])) {
  //Le client à cliquer sur un article pour le commander
  //On ajoute cette article aux cookies
  setcookie($_GET['article'], "commande");
  $article = $dao -> getArticle($_GET['article'], $n);
  $commande = true;
}

if ($categorie != 'tout') {
  //On récupère les articles lié à la catégorie choisie
  $articles = $dao->getArticles($categorie, $n);
} else $articles = $dao->getAllArticles();
//Sinon on récupère tout les articles

////////////////////////////////////////////////////
//// DECLANCHEMENT DE LA VUE
///////////////////////////////////////////////////

include('../view/articles.view.php');

?>
