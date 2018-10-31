<?php

    // Un gestionnaire
    class Gestionnaire {
        private $id; // Identifiant du gestionnaire unique
        private $nom;   // Nom
        private $prenom; // Prenom
	      private $mail; // Mail
	      private $motDePasse; // Mot de passe

        function __get(string $property) {
          return $this->$property;
        }
    }

?>
