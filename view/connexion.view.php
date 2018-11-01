<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Alcooliques&Anonymes - Connexion</title>
    <link rel="stylesheet" href="../view/stylesheet.css">
    <link rel="icon" href="favicon.ico">
  </head>
  <body>
      <?php require_once('../view/header.view.php'); ?>
    <section>
      <?php if(isset($msgErreur)) : ?>
        <p class="erreur"><?= $msgErreur ?></p>
      <?php endif ?>

      <form action="../controler/afficherConnexion.ctrl.php" method="post">
        <fieldset>
          <legend>Connexion</legend>

          <input type="Email" name="mail" size="100" placeholder="Email" required/>
          <input type="password" name="ajzt" size="100" placeholder="Mot de passe" required/>
        <p>
          <input class="bouton" type="submit" value="Se connecter"/>
        </p>
        <p class="connexionAdmin">
          <label for="admin">Connexion Administrateur</label>
          <input id="admin" type="checkbox" name="admin" value="Connexion Administrateur">
        </p>

      </fieldset>
    </form>
      <fieldset>
        <legend>Inscription</legend>
        <p>Première fois sur notre site? Inscrivez-vous!</p>
        <form action="../controler/afficherNewUser.ctrl.php" method="post">
          <p>
            <input class="bouton" type="submit" name="inscrire" value="S'inscrire">
          </p>
        </form>
      </fieldset>
    </section>


  <?php require_once('../view/footer.view.php'); ?>
  </body>
</html>
