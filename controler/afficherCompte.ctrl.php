<?php

include_once("../model/DAO.class.php");
session_start();

////////////////////////////////////////////////////
//// RECUPERATION DES DONNEES
///////////////////////////////////////////////////

//Pour le header
$categories = $dao->getCategories();

////////////////////////////////////////////////////
//// REALISATION DES CALCULS
///////////////////////////////////////////////////

/*if(isset($_GET['id'])) {
  $id = $_GET['id'];
  $client = $dao->getClientID($id);
}*/

if(isset($_SESSION['id'])) {
  $id = $_SESSION['id'];
  $client = $dao->getClientID($id);
}


////////////////////////////////////////////////////
//// DECLANCHEMENT DE LA VUE
///////////////////////////////////////////////////

if(isset($client)) {
  include('../view/compte.view.php');
} else include('../view/connexion.view.php');

?>
