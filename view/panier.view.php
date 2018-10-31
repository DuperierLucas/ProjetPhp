<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Alcooliques&Anonymes - Panier</title>
  <link rel="stylesheet" href="../view/stylesheet.css">
</head>
<body>
  <?php require_once('../view/header.view.php'); ?>

  <?php if(isset($articles)) : ?>

    <h4 class="Total">Prix Total : <?= $prixTotal ?> €</h4>


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
            <input type="submit" name="supprimer" value="Supprimer">
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
