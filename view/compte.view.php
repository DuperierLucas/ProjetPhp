<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Anonymes&Alcooliques - Mon compte</title>
  </head>
  <body>
    <?php require_once('../view/header.view.php'); ?>

    <?php if(isset($client)) : ?>
      <!-- affichage du client -->
    <fieldset>
      <legend>Votre compte</legend>
      <p>Nom : <?php echo $client->nom ?></p>
      <p>Prénom : <?php echo $client->prenom ?></p>
      <p>Adresse : <?php echo $client->adresse ?></p>
      <p>Téléphone : <?php echo $client->telephone ?></p>
      <p>Mail : <?php echo $client->mail ?></p>
    </fieldset>

    <?php else : ?>
      <!-- affichage d'un bouton "se connecter" qui envoie a '../controler/afficherConnexion.ctrl.php' -->

    <?php endif; ?>

  </body>
</html>
