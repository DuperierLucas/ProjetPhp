<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Alcooliques&Anonymes - Panier</title>
  <link rel="stylesheet" href="../view/stylesheet.css">
</head>
<body>
  <?php require_once('../view/header.view.php'); ?>

  <section>
    <?php foreach ($articles as $value) : ?>
      <div>
        <img src="../view/image/vins/<?= $value->image ?>" alt="<?= $value->libelle?>">
        <!-- Nom du vin -->
        <p><?= $value->libelle ?></p>
        <!-- Description du vin -->
        <p><?= $value->description?></p>
        <!-- Annee -->
        <p><?= $value->annee?></p>
        <!-- Pourcentage alcool -->
        <p><?= $value->pourcentageAlcool?>% d'alcool</p>
        <!-- Prix -->
        <p><?= $value->prix?> € </p>
      </div>
  <?php endforeach?>

  <?php if(isset($articles)) : ?>
  <div>
    <p>Prix Total : <?= $prixTotal ?> €</p>
  </div>
<?php endif; ?>

</body>
</html>
