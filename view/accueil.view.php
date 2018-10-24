<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Alcooliques&Anonymes - Accueil</title>
  </head>
  <body>
      <?php require_once('header.view.php'); ?>
      <section>

        <?php foreach ($categories as $value) :?>
        <a href="../controler/afficherArticles.ctrl.php?categorie=<?= $value->ref ?>">
          <div>
            <img src="../view/image/<?= $value->image?>" alt="<?= $value->nom ?>">
            <h2><?= $value->nom ?></h2>
          </div>
        </a>
      <?php endforeach ?>
      
      </section>
  </body>
</html>
