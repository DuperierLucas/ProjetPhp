<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Alcooliques&Anonymes - Panier</title>
</head>
<body>
  <?php require_once('../view/header.view.php'); ?>

  <section>
    <?php foreach ($_COOKIE as $key) ?>
    <!-- Chaque div représente un article -->
    <!-- lorsque clique sur le lien ajoute au panier : cookie ?-->
    <a href="../controler/afficherArticles.ctrl.php?categorie=<?= $categorie?>&article=<?= $value->ref ?>">
      <div>
        <img src="../view/image/vins/<?= $value->image ?>" alt="<?= $value->libelle?>">
        <!-- Nom du vin -->
        <p><?= $value->libelle ?></p>
        <!-- Description du vin -->
        <p><?= $value->description?></p>
        <!-- Caractéristiques -->
        <!-- Annee -->
        <p><?= $value->annee?></p>
        <!-- Pourcentage alcool -->
        <p><?= $value->pourcentageAlcool?>% d'alcool</p>
      </div>
    </a>
  <?php endforeach?>

</body>
</html>
