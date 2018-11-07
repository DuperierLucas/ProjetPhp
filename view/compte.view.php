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
          <p>Téléphone : <input type="text" name="telephone" value="<?= $client->telephone ?>" required> </p>
          <p>E <input type="email" name="mail" value="<?= $client->mail ?>" required> </p>
          <label for="mdp">Choisir un mot de passe * :</label>
          <input type="password" name="ajzt" size="100" id="mdp" required/>

          <label for="mdp2">Confirmation du mot de passe * :</label>
          <input type="password" name="pdsf" size="100" id="mdp2" required/>
        <?php endif; ?>
        <?php if(isset($admin)): ?>
          <p>Nom : <input type="text" name="nom" value="<?= $admin->nom ?>" required></p>
          <p>Prénom : <input type="text" name="prenom" value="<?= $admin->prenom ?>" required> </p>
          <p>E-mail : <input type="email" name="mail" value="<?= $admin->mail ?>" required> </p>
        <?php endif; ?>
          <input class="bouton" type="submit" name="enregistrer" value="Enregistrer les modifications">
        </fieldset>
      </form>
      <?php if(isset($admin)): ?>
        <fieldset>
          <legend>Nouvel article</legend>
            <form action="afficherNouvelArticle.ctrl.php" method="post">
              <input class = "bouton" type="submit" name="nouvArticle" value="Créer un article"/>
            </form>
          </fieldset>
      <?php endif; ?>
      <fieldset class="quitterCompte">
        <form action="../controler/deconnection.ctrl.php" method="post">
          <p>
            <input class = "bouton" type="submit" name="deconnection" value="Se déconnecter"/>
          </p>
        </form>
        <form action="../controler/afficherConfirmationMdP.ctrl.php" method="post">
          <input class="bouton" type="submit" name="supprCompte" value="Supprimer Compte">
        </form>
      </fieldset>

    </section>


    <?php require_once('../view/footer.view.php'); ?>
  </body>
  </html>
