<?php

require_once("../model/Categorie.class.php");
require_once("../model/Article.class.php");

// Creation de l'unique objet DAO
$dao = new DAO();

// Le Data Access Object
// Il représente la base de donnée
class DAO {
  // L'objet local PDO de la base de donnée
  private $db;
  // Le type, le chemin et le nom de la base de donnée
  private $database = 'sqlite:../data/db/AEtA.db';

  // Constructeur chargé d'ouvrir la BD
  function __construct() {
    try {
      $this->db = new PDO($this->database);
    }
    catch (PDOException $e){
      die("erreur de connexion: ".$e->getMessage()."\n");
    }
  }

  //Recupère toutes les catégories
  function getCategories() : array {
    $req = "SELECT * FROM categorie";

    $sth = $this->db->query($req);
    $result = $sth->fetchAll(PDO::FETCH_CLASS, 'Categorie');

    return $result;
  }

  //Recupère l'article selon la référence
  function getArticle(int $ref) : Article {
    $req = "SELECT * FROM article WHERE ref=$ref";

    $sth = $this->db->query($req);
    $result = $sth->fetchAll(PDO::FETCH_CLASS, 'Article');

    return $result[0];
  }

  //Recupère les articles selon la catégorie
  function getArticles(int $categorie) : array {
    $req = "SELECT * FROM article WHERE categorie=$categorie";

    $sth = $this->db->query($req);
    $result = $sth->fetchAll(PDO::FETCH_CLASS, 'Article');

    return $result;
  }

  //Recupère tout les articles
  function getAllArticles() : array {
    $req = "SELECT * FROM article";

    $sth = $this->db->query($req);
    $result = $sth->fetchAll(PDO::FETCH_CLASS, 'Article');

    return $result;
  }

}

?>
