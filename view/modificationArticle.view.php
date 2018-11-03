<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Alcooliques&Anonymes - Modifier article</title>
    <link rel="stylesheet" href="../view/stylesheet.css">
    <link rel="icon" href="favicon.ico">
  </head>
  <body>
    <?php require_once('../view/header.view.php'); ?>

    <section>
      <fieldset>
        <legend>Fonctionnement des catégories</legend>
        <p>Les catégories sont numérotés de 1 à 3:</p>
        <p> - Mettre '1' pour les Vins Blancs</p>
        <p> - Mettre '2' pour les Vins Rouges</p>
        <p> - Mettre '3' pour les Vins Rosés</p>
        <p> - Mettre 'tout' si votre article n'appartient à aucune Catégorie, il apparaîtra alors dans "tout les vins"</p>
      </fieldset>
      <img class="imageVueModif" src="../view/image/vins/<?php echo $article->image ?>" alt="image de l'article">
      <fieldset>
        <legend>Modifier l'article</legend>
        <form action="afficherModificationArticle.ctrl.php" method="post">
          <p> Référence de l'article (ne peut être modifiée) : <?php echo $article->ref ?></p>
          <input type="hidden" name="ref" value="<?php echo $article->ref ?>"> <!-- On fait passer la référence de manière cachée -->
          <p> Libellé : <input type="text" name="libelle" value="<?php echo $article->libelle ?>"> </p>
          <p> Description : <input type="text" name="description" value="<?php echo $article->description ?>"> </p>
          <p> Pourcentage d'alcool : <input type="text" name="pourcentageAlcool" value="<?php echo $article->pourcentageAlcool ?>"> </p>
          <p> Annee : <input type="text" name="annee" value="<?php echo $article->annee ?>"> </p>
          <p> Catégorie : <input type="text" name="categorie" value="<?php echo $article->categorie ?>"> </p>
          <p> Prix : <input type="text" name="prix" value="<?php echo $article->prix ?>"> </p>
          <p> Nom de l'image : <input type="text" name="image" value="<?php echo $article->image ?>"> </p>
          <input class="bouton" type="submit" name="enregistrer" value="Enregistrer les modifications">
        </form>
      </fieldset>
      <fieldset>
        <legend>Supprimer l'article</legend>
        <p>Attention la suppression de l'article est définitive!</p>
        <form action="afficherSuppressionArticle.ctrl.php" method="post">
          <input type="hidden" name="ref" value="<?php echo $article->ref ?>">
          <input class="bouton" type="submit" name="supprimer" value="Supprimer l'article">
        </form>
      </fieldset>
    </section>

    <?php require_once('../view/footer.view.php'); ?>
  </body>
</html>
