<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Alcooliques&Anonymes - Connexion</title>
    <link rel="stylesheet" href="../view/stylesheet.css">
  </head>
  <body>
    <?php require_once('../view/header.view.php'); ?>

    <?php if(isset($msgErreur)) : ?>
      <font color="red"><p><?= $msgErreur ?></p></font>
    <?php endif ?>

    <form action="../controler/afficherConnexion.ctrl.php" method="post">
      <fieldset>
        <legend>Connexion</legend>

        <label for="mail1">E-mail * :</label>
        <input type="Email" name="mail" size="100" id="mail1" required/>
      </br>

      <label for="mdp">Mot de passe * :</label>
      <input type="password" name="ajzt" size="100" id="mdp" required/>
    </br>

  </fieldset>

  <p>
    <input type="submit" value="Se connecter"/>
    <input type="reset"  value="Supprimer"/>
  </p>

  </form>

  <form action="../controler/afficherNewUser.ctrl.php" method="post">
    <p>
      <input type="submit" name="inscrire" value="S'inscrire">
    </p>
  </form>

  </body>
</html>
