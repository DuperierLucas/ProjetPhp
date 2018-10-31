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
      <p>Nom : <input type="text" name="nom" value="<?= $client->nom ?>"></p>
      <p>Prénom : <input type="text" name="prenom" value="<?= $client->prenom ?>"> </p>
      <p>Adresse : <input type="text" name="adresse" value="<?= $client->adresse ?>"> </p>
      <p>Téléphone : <input type="text" name="telephone" value="<?= $client->telephone ?>"> </p>
      <p>E-mail : <input type="text" name="mail" value="<?= $client->mail ?>"> </p>
      <input class="bouton" type="submit" name="enregistrer" value="Enregistrer les modifications">
    </fieldset>

    <form action="../controler/deconnection.ctrl.php" method="post">
      <p>
        <input class = "bouton" type="submit" name="deconnection" value="Se déconnecter"/>
      </p>
    </form>

    <?php require_once('../view/footer.view.php'); ?>
  </body>
  </html>
