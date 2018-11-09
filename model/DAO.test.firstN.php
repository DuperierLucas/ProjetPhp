<?php
// Test de la classe DAO
require_once('DAO.class.php');

// Recupère les n premiers articles
$list = $dao->firstN(5);

// Affiche les 5 premiers articles
foreach ($list as  $a) {
  print($a->ref.' => ('.$a->categorie.') '.$a->libelle.' : '.$a->description.' - '.$a->pourcentageAlcool.' % d\'alcool - '.$a->annee.' - '.$a->prix.' € | '.$a->image."\n");
}

 ?>
