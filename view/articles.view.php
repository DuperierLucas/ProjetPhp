<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Alcooliques&Anonymes - Articles</title>
  </head>
  <body>
    <?php require_once('header.view.php'); ?>
    <!-- Une section contient l'ensemble des produit à afficher -->
    <section>
      <?php foreach ($articles as $value) :?>
      <!-- Chaque div représente un article -->
      <a href="#">
        <div>
          <img src="../view/image/vins/bourgogne.jpg.jpg" alt="bourgogne">
          <!-- Nom du vin -->
          <p>Bourgogne - Pinot Noir</p>
          <!-- Description du vin -->
          <p>Vin rouge francais </p>
          <!-- caractéristique -->
          <p>3% d'alcool</p>
        </div>
      </a>
    <?php endforeach ?>

    </section>

  </body>
</html>
