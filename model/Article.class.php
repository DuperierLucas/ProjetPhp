<?php

    // Un article en vente
    class Article {
        private $libelle;   // Nom de l'article unique
        private $description, //Description de l'article
        private $caracteristique, //Caractéristique de l'article
	      private $categorie, //Categorie de l'article
	      private $prix, //Prix
	      private $image, //Image
        private $nbStock, //Nombre d'article qu'il reste en stock

        function __get(string $property) {
          return $this->$property;
        }
    }

?>
