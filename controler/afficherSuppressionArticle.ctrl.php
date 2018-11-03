<?php

include_once("../model/DAO.class.php");

////////////////////////////////////////////////////
//// RECUPERATION DES DONNEES
///////////////////////////////////////////////////

//Pour le header
$categories = $dao->getCategories();
//Indication pour la vue des articles à afficher
$articles = $dao->getAllArticles();
//Indication pour la vue de la liste d'article à  afficher
$categorie = 'tout';
//Récupération de la référence de l'article à supprimer
$refSuppr = $_POST['ref'];

////////////////////////////////////////////////////
//// REALISATION DES CALCULS
///////////////////////////////////////////////////

$dao->supprimerArticle($refSuppr);


////////////////////////////////////////////////////
//// DECLANCHEMENT DE LA VUE
///////////////////////////////////////////////////

include('../view/articles.view.php');

?>
