<?php

  class Categorie {
      private $ref;   // Reference de la catégorie unique
      private $nom;  // Nom
      private $image; // Image

      function __get(string $property) {
          return $this->$property;
      }
  }


?>
