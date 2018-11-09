<?php
// Test de la classe DAO
require_once('DAO.class.php');

$list = $dao->getNCateg(16, 5, 3);

// Affiche les 5 premiers articles de la catégorie 3 à partir de la ref 16
foreach ($list as  $a) {
  print($a->ref.' => ('.$a->categorie.') '.$a->libelle.' : '.$a->description.' - '.$a->pourcentageAlcool.' % d\'alcool - '.$a->annee.' - '.$a->prix.' € | '.$a->image."\n");
}

?>
