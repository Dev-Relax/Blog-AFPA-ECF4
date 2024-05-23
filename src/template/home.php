<?php

$title = "B.log - Accueil";
require_once "./src/partials/header.php";
require_once "./src/model/articles.php";
?>

<main>
    <h1>B.log Articles</h1>
    <div class="articles-container-wrapper">
        <div class="articles-container">
            <?php $articles = getAllArticles();

            foreach ($articles as $article) :
            ?>
                <article class="article article-<?= $article["id"] ?>">


                    <img src="./Images/profil1.jpg" alt="Image de l'article 1">
                    <div class="article-content">
                        <h2><?= $article["titre"] ?></h2>
                        <p><?= $article["contenu"] ?></p>
                    </div>
                    <div class="icons">
                        <i class="fas fa-edit"></i>
                        <i class="fas fa-comment"></i>
                    </div>
                </article>
            <?php endforeach; ?>

        </div>
    </div>
</main>

<?php
require_once "./src/partials/footer.php";
?>