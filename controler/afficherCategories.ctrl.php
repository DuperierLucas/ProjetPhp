<?php

include_once("../model/DAO.class.php");

////////////////////////////////////////////////////
//// RECUPERATION DES DONNEES
///////////////////////////////////////////////////

$categories = $dao->getCategorie();

////////////////////////////////////////////////////
//// REALISATION DES CALCULS
///////////////////////////////////////////////////

////////////////////////////////////////////////////
//// DECLANCHEMENT DE LA VUE
///////////////////////////////////////////////////

include('../view/accueil.view.php');


?>
