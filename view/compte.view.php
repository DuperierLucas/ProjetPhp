<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Anonymes&Alcooliques - Mon compte</title>
    <link rel="stylesheet" href="../view/stylesheet.css">
  </head>
  <body>
    <?php require_once('../view/header.view.php'); ?>

    <!-- Affichage du client -->
    <fieldset>
      <legend>Votre compte</legend>
      <p>Nom : <?= $client->nom ?></p>
      <p>Prénom : <?= $client->prenom ?></p>
      <p>Adresse : <?= $client->adresse ?></p>
      <p>Téléphone : <?= $client->telephone ?></p>
      <p>E-mail : <?= $client->mail ?></p>
    </fieldset>
<?php require_once('../view/footer.view.php'); ?>
  </body>
</html>
