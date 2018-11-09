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

  <?php if(isset($msgConfirmation)) : ?>
    <p class="panierMsg"><?= $msgConfirmation?></p>
  <?php endif; ?>

  <?php if(isset($msgErreur)) : ?>
    <p class="erreur"><?= $msgErreur?></p>
  <?php endif; ?>

  <!-- Affichage du client -->
  <section>
    <form action="../controler/afficherCompte.ctrl.php" method="post">
        <fieldset>
          <legend>Votre compte</legend>
          <?php if(isset($client)): ?>
          <label for="nom"> Nom * :</label>
          <input type="text" name="nom" value="<?= $client->nom ?>" id="nom" required>

          <label for="prenom"> Prénom * : </label>
          <input type="text" name="prenom" value="<?= $client->prenom ?>" id="prenom" required>

          <label for="addr"> Adresse * : </label>
          <input type="text" name="adresse" value="<?= $client->adresse ?>" id="addr" required>

          <label for="tel"> Téléphone * :</label>
         <input type="text" name="telephone" value="<?= $client->telephone ?>" id="tel" required>

         <label for="mail"> Email * :</label>
          <input type="email" name="mail" value="<?= $client->mail ?>" id="mail" required>

        <?php endif; ?>
        <?php if(isset($admin)): ?>
          <label for="nom"> Nom * :</label>
          <input type="text" name="nom" value="<?= $admin->nom ?>" id="nom" required>

          <label for="prenom"> Prénom * : </label>
          <input type="text" name="prenom" value="<?= $admin->prenom ?>" id="prenom" required>

          <label for="mail"> Email * :</label>
          <input type="email" name="mail" value="<?= $admin->mail ?>" id="mail" required>
        <?php endif; ?>
        <input class="bouton" type="submit" name="enregistrer" value="Enregistrer les modifications">
      </fieldset>
    </form>

      <fieldset>
        <legend>Changer mot de passe</legend>
        <form action="../controler/afficherConfirmationMdP.ctrl.php" method="post">
          <label for="mdp">Nouveau mot de passe * :</label>
          <input type="password" name="ajzt" size="100" id="mdp" required/>

          <label for="mdp2">Confirmation mot de passe * :</label>
          <input type="password" name="pdsf" size="100" id="mdp2" required/>
          <input class="bouton" type="submit" name="enregistrer" value="Enregistrer les modifications">
        </form>
      </fieldset>
      <fieldset class="quitterCompte">
        <?php if(isset($admin)): ?>
            <form action="afficherNouvelArticle.ctrl.php" method="post">
              <input class = "bouton" type="submit" name="nouvArticle" value="Créer un article"/>
            </form>
        <?php endif; ?>
        <form action="../controler/modificationCompte.ctrl.php" method="post">
          <p>
            <input class = "bouton" type="submit" name="deconnection" value="Se déconnecter"/>
          </p>
        </form>
        <?php if(isset($client)): ?>
          <form action="../controler/afficherConfirmationMdP.ctrl.php" method="post">
            <input class="bouton" type="submit" name="supprCompte" value="Supprimer Compte">
          </form>
        <?php endif; ?>
      </fieldset>

    </section>


    <?php require_once('../view/footer.view.php'); ?>
  </body>
  </html>
