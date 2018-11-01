<?php

require_once("../model/Categorie.class.php");
require_once("../model/Article.class.php");
require_once("../model/Client.class.php");
require_once("../model/Gestionnaire.class.php");

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

  // Accès aux n premiers articles
  // Cette méthode retourne un tableau contenant les n permier articles de
  // la base sous la forme d'objets de la classe Article.
  function firstN(int $n) : array {
    $req = "SELECT * FROM article LIMIT '$n'";

    $sth = $this->db->query($req);
    $result = $sth->fetchAll(PDO::FETCH_CLASS, 'Article');

    return $result;
  }

  // Acces au n articles à partir de la reférence $ref
  // Cette méthode retourne un tableau contenant n  articles de
  // la base sous la forme d'objets de la classe Article.
  function getN(int $ref,int $n) : array {
    $req = "SELECT * FROM article WHERE $ref <= ref ORDER BY ref LIMIT $n ";

    $sth = $this->db->query($req);
    $result = $sth->fetchAll(PDO::FETCH_CLASS, 'Article');

    return $result;
  }

  // Acces au n articles à partir de la reférence $ref et de la categorie $categorie
  // Retourne une table d'objets de la classe Article
  function getNCateg(int $ref,int $n,string $categorie) : array {
    $req = "SELECT * FROM article WHERE $ref <= ref and $categorie = categorie ORDER BY ref LIMIT $n";

    $sth = $this->db->query($req);
    $result = $sth->fetchAll(PDO::FETCH_CLASS, 'Article');

    return $result;
  }

  // Acces au n articles à partir de la reférence $ref
  // Retourne une table d'objets de la classe Article
  function getCateg(int $n, string $categorie) : array {
    $req = "SELECT * FROM article WHERE $categorie = categorie ORDER BY ref LIMIT $n";

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


  //Recupère l'article selon la ref
  function getArticle($ref) : Article {
    $req = "SELECT * FROM article WHERE ref= '$ref' ";

    $sth = $this->db->query($req);
    $result = $sth->fetchAll(PDO::FETCH_CLASS, 'Article');

    return $result[0];
  }


    //Récupère les résultats d'une recherche
    function getResRecherche($recherche) : array{
      $req="SELECT * FROM article WHERE libelle LIKE '%$recherche%'";
      if($sth = $this->db->query($req)){
        $result = $sth->fetchAll(PDO::FETCH_CLASS,'Article');
        return $result;
      }

    }

    // Acces à la référence qui suit la référence $ref dans l'ordre des références
    function next(int $ref) : int {
      $req = "SELECT * FROM article WHERE $ref < ref LIMIT 1 ";

      $sth = $this->db->query($req);
      $result = $sth->fetchAll(PDO::FETCH_CLASS, 'Article');

      if (empty($result)) {
        return $ref;
      } else return $result[0]->ref;
    }

    // Acces aux n articles qui précèdent de $n la référence $ref dans l'ordre des références
    function prevN(int $ref,int $n): array {
      $req = "SELECT * FROM article WHERE ref in
      (SELECT ref FROM article WHERE $ref > ref ORDER BY ref DESC LIMIT $n)
      ORDER BY ref";

      $sth = $this->db->query($req);
      $result = $sth->fetchAll(PDO::FETCH_CLASS, 'Article');

      return $result;
    }

    // Acces à la référence qui suit la référence $ref dans l'ordre des références
    function nextCat(int $ref, int $categorie) : int {
      $req = "SELECT * FROM article WHERE $ref < ref and $categorie = categorie LIMIT 1 ";

      $sth = $this->db->query($req);
      $result = $sth->fetchAll(PDO::FETCH_CLASS, 'Article');

      if (empty($result)) {
        return $ref;
      } else return $result[0]->ref;
    }

    // Acces aux n articles qui précèdent de $n la référence $ref dans l'ordre des références
    function prevNCat(int $ref,int $n,int $categorie): array {
      $req = "SELECT * FROM article WHERE ref in
      (SELECT ref FROM article WHERE $ref > ref and $categorie = categorie ORDER BY ref DESC LIMIT $n)
      ORDER BY ref";

      $sth = $this->db->query($req);
      $result = $sth->fetchAll(PDO::FETCH_CLASS, 'Article');

      return $result;
    }

    //Modification d'un article
    function modifierArticle($ref, $libelle, $description, $pourcentageAlcool, $annee, $categorie, $prix, $image){
      $req = $this->db->prepare('UPDATE article SET libelle = "'.$libelle.'", description = "'.$description.'", pourcentageAlcool = '.$pourcentageAlcool.', annee = '.$annee.', categorie = '.$categorie.', prix = '.$prix.', image = "'.$image.'" WHERE ref = '.$ref.'');

      $req ->execute();
    }

    ////////////////////////////////////////////////////
    //// POUR LES CLIENTS
    ///////////////////////////////////////////////////

    function getClientID(string $id) : Client {
      $req = "SELECT * FROM client WHERE id=$id";

      $sth = $this->db->query($req);
      $result = $sth->fetchAll(PDO::FETCH_CLASS, 'Client');
      return $result[0];
    }

    function getClientMail(string $mail) : Client {
      $req = 'SELECT * FROM client WHERE mail="'.$mail.'"';

      $sth = $this->db->query($req);
      $result = $sth->fetchAll(PDO::FETCH_CLASS, 'Client');

      return $result[0];
    }

    function getAdminMail(string $mail) : Gestionnaire {
      $req = 'SELECT * FROM gestionnaire WHERE mail="'.$mail.'"';

      $sth = $this->db->query($req);
      $result = $sth->fetchAll(PDO::FETCH_CLASS, 'Gestionnaire');
      return $result[0];
    }

    function getAdminID(string $id) : Gestionnaire {
      $req = "SELECT * FROM gestionnaire WHERE id= '$id'";
      echo "SELECT * FROM gestionnaire WHERE id= $id";
    $sth = $this->db->query($req);
      $result = $sth->fetchAll(PDO::FETCH_CLASS, 'Gestionnaire');
      return $result[0];
    }


    function getAllClients() : array {
      $req = "SELECT * FROM client";

      $sth = $this->db->query($req);
      $result = $sth->fetchAll(PDO::FETCH_CLASS, 'Client');

      return $result;
    }

    //Renvoie true si le mail existe déjà dans la base de donnée
    // false sinon
    function existe(string $mail) {
      $req = "SELECT * FROM client where mail=$mail";

      $sth = $this->db->query($req);

      return isset($sth);
    }

    function getId() : int {
      $req = "SELECT max(id)+1 FROM client";

      $sth = $this->db->query($req);
      $result = $sth->fetchAll(PDO::FETCH_NUM);

      //Au cas ou il s'agisse du 1er client
      if ($result[0][0] == null) {
        return 1;
      } else return $result[0][0];

    }

    function inscrireClient($id, $nom, $prenom, $adresse, $telephone, $mail, $mdp) {
      $req = $this->db->prepare("INSERT INTO client VALUES (:id, :nom, :prenom, :adresse, :telephone, :mail, :mdp)");

      $param = array( 'id' => $id,
                      'nom'=> $nom,
                      'prenom' => $prenom,
                      'adresse'=> $adresse,
                      'telephone'=> $telephone,
                      'mail'=> $mail,
                      'mdp'=> $mdp);

      $req ->execute($param);
    }

    function modifierClient($id, $nom, $prenom, $adresse, $telephone, $mail){
      $req = $this->db->prepare("UPDATE client SET nom = '$nom', prenom = '$prenom', adresse = '$adresse', telephone = $telephone, mail = '$mail' WHERE id = '$id'");

      $req ->execute();
    }

    function modifierAdmin($id, $nom, $prenom, $mail){
      $req = $this->db->prepare("UPDATE gestionnaire SET nom = '$nom', prenom = '$prenom', mail = '$mail' WHERE id = '$id'");

      $req ->execute();
    }

    function connexion($mail, $motDePasse) {
      $req = 'SELECT * FROM client WHERE mail="'.$mail.'" and motDePasse="'.$motDePasse.'"';
      $sth = $this->db->query($req);
      $result = $sth->fetchAll(PDO::FETCH_CLASS, 'Client');

      return ($result != false);
    }

    function connexionAdmin($mail, $motDePasse) {
      $req = "SELECT * FROM gestionnaire WHERE mail='$mail' and motDePasse='$motDePasse'";
      echo "SELECT * FROM gestionnaire WHERE mail='$mail' and motDePasse='$motDePasse'";
      $sth = $this->db->query($req);
      $result = $sth->fetchAll(PDO::FETCH_CLASS, 'Gestionnaire');

      return ($result != false);
    }


}

?>
