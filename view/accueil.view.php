<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Alcooliques&Anonymes - Accueil</title>
  </head>
  <body>
      <header>
        <article class="header">
          <h1> <a href="">Alcooliques&Anonymes.com</a></h1>
          <form action="" method="post">
            <input type="text" name="recherche" value="Rechercher">
          </form>
          <ul>
            <li> <a href="#"> <img src="moncompte.jpg" alt="mon compte" class="moncompte"> </a> </li>
            <li><a href="#"> <img src="panier.jpg" alt="panier"> </a> </li>
          </ul>
        </article>

        <nav class="nav">
          <ul>
            <li><a href="controler/afficherArticles.ctrl.php?categorie=tout">Tous Les Vins</a></li>
            <?php foreach ($categories as $value) : ?>
            <li><a href="controler/afficherArticles.ctrl.php?categorie=<?=$value->ref ?>"><?=$value->nom?></a></li>
          <?php endforeach ?>
          </ul>
        </nav>
      </header>
      <section>

      </section>
  </body>
</html>
