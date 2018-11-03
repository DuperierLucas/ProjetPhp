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
        <form action="afficherNouvelArticle.ctrl.php" method="post">
          <p> Libellé : <input type="text" name="libelle"> </p>
          <p> Description : <input type="text" name="description" value=""> </p>
          <p> Pourcentage d'alcool : <input type="text" name="pourcentageAlcool" > </p>
          <p> Annee : <input type="text" name="annee"> </p>
          <p> Catégorie : <input type="text" name="categorie"> </p>
          <p> Prix : <input type="text" name="prix"> </p>
          <p> Nom de l'image : <input type="text" name="image"> </p>
          <input class="bouton" type="submit" name="enregistrer" value="Enregistrer les modifications">
        </form>
      </fieldset>
    </section>

    <?php require_once('../view/footer.view.php'); ?>
  </body>
</html>
