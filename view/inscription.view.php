<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php if(isset($msgErreur)) : ?>
      <p><?php echo $msgErreur; ?></p>
    <?php endif ?>

    <form action="afficherNewUser.ctrl.php" method="post">
      <table class="formulaires">
        <tr>
          <td>Quel est votre nom ?</td>
          <td><input type="text" name="nom" size="10"></td>
        </tr>
        <tr>

          <td>Quel est votre prenom ?</td>
          <td><input type="text" name="prenom" size="75"></td>
        </tr>

        <tr>
          <td>Quelle est votre addresse Email ?</td>
          <td><input type="Email" name="mail" size="100"></td>
        </tr>

        <tr>
          <td>Vérification de votre addresse Email :</td>
          <td><input type="Email" name="mail2" size="100"></td>
        </tr>

        <tr>
          <td>Entrer un mot de passe :</td>
          <td><input type="password" name="ajzt" size="100"></td>
        </tr>

        <tr>
          <td>Vérification de votre mot de passe :</td>
          <td><input type="password" name="pdsf" size="100"></td>
        </tr>

        <tr>
          <td>Quelle est votre addresse ? (ex : 300 rue des champs)</td>
          <td><input type="text" name="adresse" size="100"></td>
        </tr>

        <tr>
          <td>Quelle est votre numéro de téléphone ?</td>
          <td><input type="integer" name="tel" size="10"></td>
        </tr>

        <tr>
          <td colspan=2><input type="submit" value="Inscriptions"></td>
        </tr>

      </table>
    </form>
    <font color="red">Tous les champs doivent être complétés !</font>
  </body>
</html>
