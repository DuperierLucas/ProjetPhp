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
    <?php foreach ($articles as $key => $value) : ?>
      <div>
        <article>
          <img src="../view/image/vins/<?= $key->image ?>" alt="<?= $key->libelle?>">
          <!-- Prix -->
          <h4><?= $key->prix?> €</h4>
        </article>
        <!-- Nom du vin -->
        <h3><?= $key->libelle ?></h3>
        <!-- Description du vin -->
        <p><?= $key->description?></p>
        <!-- Caractéristiques -->
        <!-- Annee -->
        <p><?= $key->annee?></p>
        <!-- Pourcentage alcool -->
        <p><?= $key->pourcentageAlcool?>% d'alcool</p>
      </div>
      <!-- A FAIRE : créer un bouton x pour supprimer l'article -->
  <?php endforeach?>

  <?php if(isset($articles)) : ?>
    <div>
      <p>Prix Total : <?= $prixTotal ?> €</p>
    </div>

    <?php if($connecte) :?>
      <a href="../controler/afficherPanier.ctrl.php?action=valider">Valider</a>
    <?php else :?>
      <a href="../controler/afficherConnexion.ctrl.php">Valider</a>
    <?php endif; ?>
    <!-- A FAIRE : créer un bouton Valider plutot que des a-->
  <?php endif; ?>

</body>
</html>
