<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Alcooliques&Anonymes - Ajouter article</title>
    <link rel="stylesheet" href="../view/stylesheet.css">
    <link rel="icon" href="favicon.ico">
  </head>
  <body>
    <?php require_once('../view/header.view.php'); ?>

    <section>
      <fieldset>
        <legend>Modifier l'article</legend>
        <?php if (isset($msg)): ?>
          <p class="panierMsg"> <?php echo $msg ?></p>
        <?php endif; ?>
        <form action="afficherNouvelArticle.ctrl.php" method="post">
          <p> Libellé : <input type="text" name="libelle" required> </p>
          <p> Description : <input type="text" name="description" required> </p>
          <p> Pourcentage d'alcool : <input type="text" name="pourcentageAlcool" required > </p>
          <p> Annee : <input type="text" name="annee" required> </p>
          <p> Catégorie : <input type="text" name="categorie" required> </p>
          <p> Prix : <input type="text" name="prix" required  > </p>
          <p> Nom de l'image : <input type="text" name="image" required> </p>
          <input class="bouton" type="submit" name="enregistrer" value="Ajouter l'article">
        </form>
      </fieldset>
    </section>

    <?php require_once('../view/footer.view.php'); ?>
  </body>
</html>
