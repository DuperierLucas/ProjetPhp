<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Anonymes&Alcooliques - Mon compte</title>
    <link rel="stylesheet" href="../view/stylesheet.css">
    <link rel="icon" href="favicon.ico">
  </head>
  <body>
    <?php require_once('../view/header.view.php'); ?>

    <!-- Affichage du client -->
    <form action="../controler/afficherCompte.ctrl.php" method="post">
      <fieldset>
        <legend>Votre compte</legend>
        <?php if(isset($client)): ?>
        <p>Nom : <input type="text" name="nom" value="<?= $client->nom ?>" required></p>
        <p>Prénom : <input type="text" name="prenom" value="<?= $client->prenom ?>" required> </p>
        <p>Adresse : <input type="text" name="adresse" value="<?= $client->adresse ?>" required> </p>
        <p>Téléphone : <input type="text" name="telephone" value="<?= $client->telephone ?>" required> </p>
        <p>E-mail : <input type="email" name="mail" value="<?= $client->mail ?>" required> </p>
      <?php endif; ?>
      <?php if(isset($admin)): ?>
        <p>Nom : <input type="text" name="nom" value="<?= $admin->nom ?>" required></p>
        <p>Prénom : <input type="text" name="prenom" value="<?= $admin->prenom ?>" required> </p>
        <p>E-mail : <input type="email" name="mail" value="<?= $admin->mail ?>" required> </p>
      <?php endif; ?>
        <input class="bouton" type="submit" name="enregistrer" value="Enregistrer les modifications">
      </fieldset>
    </form>

    <form action="../controler/deconnection.ctrl.php" method="post">
      <p>
        <input class = "bouton" type="submit" name="deconnection" value="Se déconnecter"/>
      </p>
    </form>

    <?php require_once('../view/footer.view.php'); ?>
  </body>
  </html>
