<?php

  class Categorie {
      private $nom;  // nom de la catégorie unique

      function __get(string $property) {
          return $this->$property;
      }
  }


?>
