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

    <?php else : ?>
      <!-- affichage d'un bouton "se connecter" qui envoie a '../controler/afficherConnexion.ctrl.php' -->

    <?php endif; ?>

  </body>
</html>
