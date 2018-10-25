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

////////////////////////////////////////////////////
//// POUR LES CATEGORIES
///////////////////////////////////////////////////

  //Recupère toutes les catégories
  function getCategories() : array {
    $req = "SELECT * FROM categorie";

    $sth = $this->db->query($req);
    $result = $sth->fetchAll(PDO::FETCH_CLASS, 'Categorie');

    return $result;
  }

////////////////////////////////////////////////////
//// POUR LES ARTICLES
///////////////////////////////////////////////////

  //Recupère l'article selon la référence
  function getArticle(int $ref) : Article {
    $req = "SELECT * FROM article WHERE ref=$ref";

    $sth = $this->db->query($req);
    $result = $sth->fetchAll(PDO::FETCH_CLASS, 'Article');

    return $result[0];
  }

  //Recupère les n premiers articles selon la catégorie
  function getArticles(int $categorie, int $n) : array {
    $req = "SELECT * FROM article WHERE categorie=$categorie LIMIT $n";

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

  // Acces à la référence qui suit la référence $ref dans l'ordre des références
  function next(int $ref) : int {
    $req = "SELECT * FROM article WHERE '$ref' < ref LIMIT 1 ";

    $sth = $this->db->query($req);
    $result = $sth->fetchAll(PDO::FETCH_CLASS, 'Article');

    if (empty($result)) {
      return $ref;
    } else return $result[0]->ref;
  }

  // Acces aux n articles qui précèdent de $n la référence $ref dans l'ordre des références
  function prevN(int $ref,int $n): array {
    $req = "SELECT * FROM article WHERE ref in
    (SELECT ref FROM article WHERE '$ref' > ref ORDER BY ref DESC LIMIT '$n')
    ORDER BY ref";

    $sth = $this->db->query($req);
    $result = $sth->fetchAll(PDO::FETCH_CLASS, 'Article');

    return $result;
  }

////////////////////////////////////////////////////
//// POUR LES CLIENTS
///////////////////////////////////////////////////

  function getClient(string $mail) : array {
    $req = "SELECT * FROM client WHERE mail=$mail";

    $sth = $this->db->query($req);
    $result = $sth->fetchAll(PDO::FETCH_CLASS, 'Client');

    return $result;
  }

  function getAllClients() : array {
    $req = "SELECT * FROM client";

    $sth = $this->db->query($req);
    $result = $sth->fetchAll(PDO::FETCH_CLASS, 'Client');

    return $result;
  }

}

?>
