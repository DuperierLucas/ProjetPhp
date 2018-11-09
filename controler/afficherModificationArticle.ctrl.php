<?php
include_once('../model/DAO.class.php');
////////////////////////////////////////////////////
//// RECUPERATION DES DONNEES
///////////////////////////////////////////////////

//Pour le header
$categories = $dao->getCategories();

//On récupère la référence de l'article que l'on souhaite modifier
if (isset($_POST['ref'])) {
  $ref = $_POST['ref'];
} else {
  $ref = $_GET['ref'];
  $msg = "L'article a bien été modifié";
}

////////////////////////////////////////////////////
//// REALISATION DES CALCULS
///////////////////////////////////////////////////

//on récupère l'article
$article = $dao->getArticle($ref);

//Si l'utilisateur a modifier l'article
if(!empty($_POST['enregistrer'])) {
  $dao->modifierArticle($_POST['ref'], $_POST['libelle'], $_POST['description'], $_POST['pourcentageAlcool'], $_POST['annee'], $_POST['categorie'], $_POST['prix'], $_POST['image']);
}

////////////////////////////////////////////////////
//// DECLANCHEMENT DE LA VUE
///////////////////////////////////////////////////

if (!empty($_POST['enregistrer'])) {
  header('Location: afficherModificationArticle.ctrl.php?ref='.$ref);
} else {
  include('../view/modificationArticle.view.php');
}




?>
