<?php

include_once('../model/DAO.class.php');

////////////////////////////////////////////////////
//// RECUPERATION DES DONNEES
///////////////////////////////////////////////////
if(!isset($_SESSION))
  session_start();

//Le nombre d'articles à afficher par page
$n = 8;

//Pour le header
$categories = $dao->getCategories();

//On récupère la catégorie choisie ou on affiche tout les articles
if(isset($_GET['categorie']))
  $categorie = $_GET['categorie'];
else
  $categorie = 'tout';

$articles = array();

////////////////////////////////////////////////////
//// REALISATION DES CALCULS
///////////////////////////////////////////////////

//Definition de $articles selon ref et categorie
if ($categorie == 'tout' && isset($_GET['ref'])) {
  //S'il y a une ref et une catégorie
  $ref = $_GET['ref'];
  //S'il y a une ref on récupere les n articles peut importe la catégorie
  $articles = $dao->getN($ref, $n);
} else if ($categorie == 'tout' && !(isset($_GET['ref']))) {
  //S'il n'y a pas de ref on récupère les n premier articles peut importe la catégorie
  $articles = $dao->firstN($n);
} else if ($categorie != 'tout' && isset($_GET['ref'])) {
  //S'il y a une ref et une catégorie
  $ref = $_GET['ref'];
  //On récupère les articles lié à la catégorie choisie
  $articles = $dao->getNCateg($ref,$n,$categorie);
} else {
  //S'il y a une catégorie mais pas de ref
  $articles = $dao->getCateg($n, $categorie);
}

if (isset($_GET['article'])) {
  //Le client à cliquer sur un article pour le commander
  $ref = $_GET['article'];
  //On ajoute cette article aux cookies
  if(isset($_COOKIE[$ref])) {
    //S'il a déjà été ajouté, on modifie le nombre de commande
    $nbCommande = $_COOKIE[$ref] + 1;
    setcookie($ref, $nbCommande);
  } else setcookie($ref, 1);
  //Sinon on l'ajoute avec 1 commande

  $article = $dao -> getArticle($_GET['article'], $n);
  $commande = true;
}

// ref de article suivant
if ($categorie != 'tout') {
  $nextRef = $dao->nextCat(end($articles)->ref,$categorie);
} else $nextRef = $dao->next(end($articles)->ref);

if($nextRef == end($articles)->ref) {
  $nextRef = $articles[0]->ref;
}

// Les articles précédents
if ($categorie != 'tout') {
  $prev = $dao->prevNCat($articles[0]->ref,$n,$categorie);
} else $prev = $dao->prevN($articles[0]->ref,$n);

if(empty($prev)) {
  $prev = $articles;
}

if (isset($_SESSION['id']) && $_SESSION['id'] == 'A')
  $id = $_SESSION['id'];

////////////////////////////////////////////////////
//// DECLANCHEMENT DE LA VUE
///////////////////////////////////////////////////

include('../view/articles.view.php');


?>
