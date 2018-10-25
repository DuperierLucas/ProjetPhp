<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Alcooliques&Anonymes - Articles</title>
    <link rel="stylesheet" href="../view/stylesheet.css">
  </head>
  <body>
    <?php require_once('../view/header.view.php'); ?>
    <!-- Une section contient l'ensemble des produit à afficher -->

    <!-- Si un produit a été commandé on affiche un message de sa prise en compte -->
    <?php if(isset($commande)) : ?>
    <p>Votre produit <?= $article->libelle?> a été ajouté au panier</p>
  <?php endif; ?>

  <?php if($articles == null): ?>
    <p>Aucun article ne correspond à votre recherche</p>
  <?php endif; ?>

  <?php if(!(empty($prev))): ?>
    <!-- Affiche la flèche de gauche -->
    <a href="../controler/afficherArticles.ctrl.php?ref=<?= ($prev[0]->ref-1).'&categorie='.$categorie?>">&lt; </a>
  <?php endif; ?>

  <?php if(!($nextRef == end($articles)->ref)) : ?>
    <!-- Affiche la flèche de droite -->
    <a href="../controler/afficherArticles.ctrl.php?ref=<?= $nextRef.'&categorie='.$categorie?>"> ></a>
  <?php endif; ?>


    <section>
      <?php foreach ($articles as $value) : ?>
      <!-- Chaque div représente un article -->
      <!-- lorsque clique sur le lien ajoute au panier -->
      <a href="../controler/afficherArticles.ctrl.php?categorie=<?= $categorie?>&article=<?= $value->ref ?>">
        <div>
          <img src="../view/image/vins/<?= $value->image ?>" alt="<?= $value->libelle?>">
          <!-- Nom du vin -->
          <h3><?= $value->libelle ?></h3>
          <!-- Description du vin -->
          <p><?= $value->description?></p>
          <!-- Caractéristiques -->
          <!-- Annee -->
          <p><?= $value->annee?></p>
          <!-- Pourcentage alcool -->
          <p><?= $value->pourcentageAlcool?>% d'alcool</p>
          <!-- Prix -->
          <p><?= $value->prix?> €</p>
        </div>
      </a>
    <?php endforeach ?>

    </section>

    <!-- Affiche la flèche de gauche -->
    <a href="../controler/afficherArticles.ctrl.php?ref=<?= $prev[0]->ref.'&categorie='.$categorie?>">&lt; </a>
    <!-- Affiche la flèche de droite -->
    <a href="../controler/afficherArticles.ctrl.php?ref=<?= $nextRef.'&categorie='.$categorie?>"> ></a>

  </body>
</html>
