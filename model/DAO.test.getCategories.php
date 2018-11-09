<?php
// Test de la classe DAO
require_once('DAO.class.php');
//require_once('Categorie.class.php');

$categories = $dao->getCategories();

//Affiche toutes les catégories
foreach($categories as $key => $value) {
  print($value->ref." => ".$value->nom." | ".$value->image."\n");
}

?>
