<?php
// Test de la classe DAO
require_once('DAO.class.php');
//require_once('Categorie.class.php');

$categories = $dao->getCategories();

foreach($categorie as $key => $value) {
  print($key." => ".$value."\n");
}

?>
