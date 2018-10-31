<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Alcooliques&Anonymes - Inscription</title>
    <link rel="stylesheet" href="../view/stylesheet.css">
  </head>
  <body>
    <?php require_once('../view/header.view.php'); ?>


    <section>
      <form action="../controler/afficherNewUser.ctrl.php" method="post">
        <fieldset>
          <legend>Formulaire d'inscription</legend>
            <?php if(isset($msgErreur)) : ?>
              <p class="erreur"><?= $msgErreur ?></p>
            <?php endif ?>
            <label for="nom">Nom * :</label>
            <input type="text" name="nm" size="10" id="nom"  required/>

            <label for="prenom">Prénom * :</label>
            <input type="text" name="pr" size="75" id="prenom" required/>

            <label for="mail1">E-mail * :</label>
            <input type="Email" name="mel1" size="100" id="mail1" required/>

            <label for="mail2">Confirmation de l'e-mail * :</label>
            <input type="Email" name="mel2" size="100" id="mail2" required/>

            <label for="mdp">Choisir un mot de passe * :</label>
            <input type="password" name="ajzt" size="100" id="mdp" required/>

            <label for="mdp2">Confirmation du mot de passe * :</label>
            <input type="password" name="pdsf" size="100" id="mdp2" required/>

            <label for="adresse">Adresse * :</label>
            <input type="text" name="adr" size="100" id="adresse" required placeholder="300 rue des champs 38000 GRENOBLE"/>

            <label for="telephone">Téléphone * :</label>
            <input type="integer" name="tel" size="10" id="telephone" required/>
            <p>
                <input class="bouton" type="submit" value="Valider"/>
            </p>
        </fieldset>
      </form>
    </section>
    <?php require_once('../view/footer.view.php'); ?>
  </body>
</html>
