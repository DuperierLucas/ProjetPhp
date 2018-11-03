<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Alcooliques&Anonymes - Accueil</title>
    <link rel="stylesheet" href="../view/stylesheet.css">
    <link rel="icon" href="favicon.ico">
  </head>
  <body>
      <?php require_once('../view/header.view.php'); ?>
      <section>
        <?php echo sha1('admin') ?>
        <?php foreach ($categories as $value) :?>
        <a href="../controler/afficherArticles.ctrl.php?categorie=<?= $value->ref ?>">
          <div>
            <img src="../view/image/vins/<?= $value->image?>" alt="<?= $value->nom ?>">
            <h2><?= $value->nom ?></h2>
          </div>
        </a>
      <?php endforeach ?>

      </section>
    <?php require_once('../view/footer.view.php'); ?>
  </body>
</html>
