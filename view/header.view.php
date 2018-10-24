      <header>
        <article class="header">
          <h1> <a href="../controler/afficherCategories.ctrl.php">Alcooliques&Anonymes.com</a></h1>
          <form action="" method="post">
            <input type="text" name="recherche" placeholder="Rechercher">
          </form>
          <ul>
            <li> <a href="<?php//../controler/afficherCompte.ctrl.php?>../view/inscription.view.php"> <img src="../view/image/moncompte.jpg" alt="mon compte" > </a> </li>
            <li><a href="../controler/afficherPanier.ctrl.php"> <img src="../view/image/panier.jpg" alt="panier"> </a> </li>
          </ul>
        </article>

        <nav class="nav">
          <ul>
            <li><a href="../controler/afficherArticles.ctrl.php?categorie=tout">Tous Les Vins</a></li>

            <?php foreach ($categories as $value) : ?>
            <li><a href="../controler/afficherArticles.ctrl.php?categorie=<?=$value->ref?>"><?=$value->nom?></a></li>
            <?php endforeach ?>

          </ul>
        </nav>
      </header>
