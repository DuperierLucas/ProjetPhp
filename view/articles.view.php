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
    <p class="panier">Votre produit <?= $article->libelle?> a été ajouté au panier</p>
    <?php endif; ?>

    <!-- Si aucun article ne correspond à la recherche on affiche un message -->
    <?php if($articles == null): ?>
      <p class="erreur">Aucun article ne correspond à votre recherche</p>
    <?php endif; ?>


    <?php if(isset($prev)): ?>
    <section class="fleches">
      <!-- Affiche la flèche de gauche -->
      <a href="../controler/afficherArticles.ctrl.php?ref=<?= ($prev[0]->ref-1).'&categorie='.$categorie?>"> <img src="../view/image/page_precedente.jpg" alt="Flèche page précèdente"> </a>
      <!-- Affiche la flèche de droite -->
      <a href="../controler/afficherArticles.ctrl.php?ref=<?= $nextRef.'&categorie='.$categorie?>"> <img src="../view/image/page_suivante.jpg" alt="Flèche page suivante"> </a>
    </section>
    <?php endif; ?>


    <section>
      <?php foreach ($articles as $value) : ?>
      <!-- Chaque div représente un article -->
      <!-- lorsque clique sur le lien ajoute au panier -->
      <a href="../controler/afficherArticles.ctrl.php?categorie=<?= $categorie?>&article=<?= $value->ref ?>">
        <div>
          <article>
            <img src="../view/image/vins/<?= $value->image ?>" alt="<?= $value->libelle?>">
            <!-- Prix -->
            <h4><?= $value->prix?> €</h4>
          </article>
          <!-- Nom du vin -->
          <h3><?= $value->libelle ?></h3>
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

  <?php if(isset($prev)): ?>
    <section class="fleches">
      <!-- Affiche la flèche de gauche -->
      <a href="../controler/afficherArticles.ctrl.php?ref=<?= ($prev[0]->ref-1).'&categorie='.$categorie?>"> <img src="../view/image/page_precedente.jpg" alt="Flèche page précèdente"> </a>
      <!-- Affiche la flèche de droite -->
      <a href="../controler/afficherArticles.ctrl.php?ref=<?= $nextRef.'&categorie='.$categorie?>"> <img src="../view/image/page_suivante.jpg" alt="Flèche page suivante"> </a>
    </section>
  <?php endif; ?>
  </body>
</html>
