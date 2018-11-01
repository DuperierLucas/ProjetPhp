<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Alcooliques&Anonymes - Panier</title>
  <link rel="stylesheet" href="../view/stylesheet.css">
  <link rel="icon" href="favicon.ico">
</head>
<body>
  <?php require_once('../view/header.view.php'); ?>

  <!-- Si un produit a été commandé on affiche un message de sa prise en compte -->
  <?php if(isset($msg)) : ?>
    <p class="panier"><?= $msg?></p>
  <?php endif; ?>

  <h4 class="Total">Prix Total : <?= $prixTotal ?> €</h4>

  <!-- On affiche le bouton valider que si le panier n'est pas vide -->
  <?php if (!empty($articles)) :?>
    <?php if($connecte) :?>
      <a href="../controler/afficherPanier.ctrl.php?action=valider">Valider</a>
    <?php else :?>
      <a href="../controler/afficherConnexion.ctrl.php">Valider</a>
    <?php endif; ?>
    <!-- A FAIRE : créer un bouton Valider plutot que des a-->
  <?php endif; ?>


  <section>
    <?php foreach ($articles as $key => $value) : ?>
      <div>
        <article>
          <img src="../view/image/vins/<?= $value->image ?>" alt="<?= $value->libelle?>">
          <!-- Prix -->
          <h4><?= $value->prix?> €</h4>
          <!-- Supprimer l'article -->
          <form action="../controler/afficherPanier.ctrl.php?" method="get">
            <input type="hidden" name="supprimer" value="<?= $value->ref ?>">
            <input type="submit" value="Supprimer">
          </form>
        </article>
        <!-- Nom du vin -->
        <h3><?= $value->libelle ?></h3>
        <!-- Description du vin -->
        <p><?= $value->description ?></p>
        <!-- Caractéristiques -->
        <!-- Annee -->
        <p><?= $value->annee ?></p>
        <!-- Pourcentage alcool -->
        <p><?= $value->pourcentageAlcool ?>% d'alcool</p>
        <!-- Nombre de bouteille commandé -->
        <p>x<?= $value->nbCommande ?></p>

      </div>
    <?php endforeach?>
  </section>
  <?php require_once('../view/footer.view.php'); ?>
</body>
</html>
