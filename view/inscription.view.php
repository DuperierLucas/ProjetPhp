<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php if(isset($msgErreur)) : ?>
      <font color="red"><p><?php echo $msgErreur; ?></p></font>
    <?php endif ?>

    <form action="../controler/afficherNewUser.ctrl.php" method="post">
      <fieldset>
        <legend>Formulaire d'inscription</legend>

          <label for="nom">Nom :</label>
          <input type="text" name="nm" size="10" id="nom"  required/>
          </br>

          <label for="prenom">Prenom ?</label>
          <input type="text" name="pr" size="75" id="prenom" required/>
          </br>

          <label for="mail1">Quelle est votre addresse Email ?</label>
          <input type="Email" name="mel1" size="100" id="mail1" required/>
          </br>

          <label for="mail2">Vérification de votre addresse Email :</label>
          <input type="Email" name="mel2" size="100" id="mail2" required/>
          </br>

          <label for="mdp">Entrer un mot de passe :</label>
          <input type="password" name="ajzt" size="100" id="mdp" required/>
          </br>

          <label for="mdp2">Vérification de votre mot de passe :</label>
          <input type="password" name="pdsf" size="100" id="mdp2" required/>
          </br>

          <label for="adresse">Quelle est votre addresse ? (ex : 300 rue des champs)</label>
          <input type="text" name="adr" size="100" id="adresse" required/>
          </br>

          <label for="téléphone">Quelle est votre numéro de téléphone ?</label>
          <input type="integer" name="tel" size="10" id="téléphone" required/>
          </br>

      </fieldset>

      <p>
          <input type="submit" value="Inscriptions"/>
          <input type="reset"  value="Supprimer"/> </p>

    </form>
    <font color="red">Tous les champs doivent être complétés !</font>
  </body>
</html>
