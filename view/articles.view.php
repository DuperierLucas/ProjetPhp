<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Alcooliques&Anonymes - Articles</title>
    <link rel="stylesheet" href="../view/stylesheet.css">
    <link rel="icon" href="favicon.ico">
  </head>
  <body>
    <?php require_once('../view/header.view.php'); ?>
    <!-- Une section contient l'ensemble des produit à afficher -->

    <!-- Si un produit a été commandé on affiche un message de sa prise en compte -->
    <?php if(isset($commande)) : ?>
    <p class="panierMsg">Votre produit <?= $article->libelle?> a été ajouté au panier</p>
    <?php endif; ?>

    <!-- Si un article à été supprimer -->
    <?php if(isset($refSuppr)): ?>
      <p class="panierMsg">Votre produit référencé <?= $refSuppr?> a bien été supprimé</p>
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
        <div>
          <article>
            <img src="../view/image/vins/<?= $value->image ?>" alt="<?= $value->libelle?>">
            <!-- Prix -->
            <h4><?= $value->prix?> €</h4>
            <!-- Si l'administrateur et connecté, on affiche le bouton de modification -->
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
          <!-- Si l'admin est connecté on affiche le bouton mofifier, sinon on affiche le bouton commander -->
          <article class="boutArticle">
            <?php if(isset($idAdmin)) : ?>
              <form class="modification" action="../controler/afficherModificationArticle.ctrl.php" method="post">
                <input type="hidden" name="ref" value="<?php echo $value->ref  ?>">
                <input class="bouton" type="submit" name="modifier" value="Modifier">
              </form>
            <?php else : ?>
              <form action="../controler/afficherArticles.ctrl.php?categorie=<?= $categorie?>&article=<?= $value->ref ?>" method="post">
                <input class="bouton" type="submit" name="commander" value="Commander">
              </form>
            <?php endif; ?>
          </article>
        </div>

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
  <?php require_once('../view/footer.view.php'); ?>
  </body>
</html>
