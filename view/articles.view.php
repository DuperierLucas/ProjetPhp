<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Alcooliques&Anonymes - Articles</title>
  </head>
  <body>
    <?php require_once('../view/header.view.php'); ?>
    <!-- Une section contient l'ensemble des produit à afficher -->
    <section>
      <?php foreach ($articles as $value) :?>
      <!-- Chaque div représente un article -->
      <!-- lorsque clique sur le lien ajoute au panier : cookie ?-->
      <a href="#">
        <div>
          <img src="../view/image/vins/<?= $value->image ?>" alt="<?= $value->nom ?>">
          <!-- Nom du vin -->
          <p><?= $value->nom ?></p>
          <!-- Description du vin -->
          <p><?= $value->description?></p>
          <!-- Caractéristiques -->
          <!-- Annee -->
          <p><?= $value->annee?></p>
          <!-- Pourcentage alcool -->
          <p><?= $value->pourcentageAlcool?>% d'alcool</p>
        </div>
      </a>
    <?php endforeach ?>

    </section>

  </body>
</html>
