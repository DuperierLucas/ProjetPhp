4<?php
include_once('../model/DAO.class.php');
////////////////////////////////////////////////////
//// RECUPERATION DES DONNEES
///////////////////////////////////////////////////

//Pour le header
$categories = $dao->getCategories();



////////////////////////////////////////////////////
//// REALISATION DES CALCULS
///////////////////////////////////////////////////

//Si l'utilisateur ajoute un article
if(!empty($_POST['enregistrer'])) {
  $dao->ajouterArticle($_POST['libelle'], $_POST['description'], $_POST['pourcentageAlcool'], $_POST['annee'], $_POST['categorie'], $_POST['prix'], $_POST['image']);
  $msg = '"'.$_POST['libelle'].'" bien ajouté';
}





////////////////////////////////////////////////////
//// DECLANCHEMENT DE LA VUE
///////////////////////////////////////////////////

include('../view/ajoutArticle.view.php');




?>
