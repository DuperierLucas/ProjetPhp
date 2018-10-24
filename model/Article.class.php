<?php

    // Un article en vente
    class Article {
        private $ref; // Reference de l'article unique
        private $libelle;   // Nom
        private $description, //Description
        private $caracteristique, //Caractéristique
	      private $categorie, //Categorie
	      private $prix, //Prix
	      private $image, //Image

        function __get(string $property) {
          return $this->$property;
        }
    }

?>
