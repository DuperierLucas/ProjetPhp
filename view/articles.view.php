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
<<<<<<< HEAD
          <p><?= $value->description?></p>
          <!-- Caractéristiques -->
          <!-- Annee -->
          <p><?= $value->annee?></p>
          <!-- Pourcentage alcool -->
          <p><?= $value->pourcentageAlcool?>% d'alcool</p>
=======
          <p>Vin rouge francais </p>
          <!-- caractéristique -->
          <p>3% d'alcool</p>
          <!-- année -->
          <p>2010</p>
>>>>>>> 9d217c1917465873b0ae6e040f6bd8630243ec0a
        </div>
      </a>
    <?php endforeach ?>

    </section>

  </body>
</html>
