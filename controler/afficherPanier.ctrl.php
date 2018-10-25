<?php

include_once("../model/DAO.class.php");

////////////////////////////////////////////////////
//// RECUPERATION DES DONNEES
///////////////////////////////////////////////////
//Pour le header
$categories = $dao->getCategories();

$articles = array();

////////////////////////////////////////////////////
//// REALISATION DES CALCULS
///////////////////////////////////////////////////

//Création tableau d'article venant des cookie enregistrés
foreach ($_COOKIE as $key => $value) {
  $article = $dao->getArticle((int)$key);
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

include('../view/panier.view.php');

?>
