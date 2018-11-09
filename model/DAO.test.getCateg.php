<?php
// Test de la classe DAO
require_once('DAO.class.php');

$list = $dao->getCateg(5, 3);

// Affiche les 5 premiers articles de la catégorie 3
foreach ($list as  $a) {
  print($a->ref.' => ('.$a->categorie.') '.$a->libelle.' : '.$a->description.' - '.$a->pourcentageAlcool.' % d\'alcool - '.$a->annee.' - '.$a->prix.' € | '.$a->image."\n");
}

?>
