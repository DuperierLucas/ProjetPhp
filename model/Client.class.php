<?php

    // Un client
    class Client {
        private $id; // Identifiant du client unique
        private $nom;   // Nom
        private $prenom; // Prenom
        private $adresse; // Adresse
        private $telephone; // Telephone
	      private $mail; // Mail
	      private $motDePasse; // Mot de passe

        function __get(string $property) {
          return $this->$property;
        }
    }

?>
