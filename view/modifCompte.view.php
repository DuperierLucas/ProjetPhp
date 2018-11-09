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
  <?php if(isset($msgErreur)) : ?>
    <p class="erreur"><?=$msgErreur?></p>
  <?php endif; ?>
  <form  action="modificationCompte.ctrl.php?action=<?=$action?>" method="post">
    <fieldset>
      <label for="mdp">Entrer votre mot de passe</label>
      <input type="hidden" name="pdsf" value="<?=$mdp?>">
      <input type="password" name="ajzt" id="mdp" required>
      <input class="bouton" type="submit" name="valider" value="Valider">
    </fieldset>
  </form>

</body>
</html>
