<?php

include_once("../model/DAO.class.php");

////////////////////////////////////////////////////
//// RECUPERATION DES DONNEES
///////////////////////////////////////////////////

//Pour le header
$categories = $dao->getCategories();

if(isset($_GET['id'])) {
  $id = $_GET['id'];
  $client = $dao->getClientID($id);
}

////////////////////////////////////////////////////
//// REALISATION DES CALCULS
///////////////////////////////////////////////////

////////////////////////////////////////////////////
//// DECLANCHEMENT DE LA VUE
///////////////////////////////////////////////////

include('../view/compte.view.php')

?>
