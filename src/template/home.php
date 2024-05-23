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


                    <img src="" alt="Image de l'article 1">
                    <div class="article-content">
                        <a href="/Blog-AFPA-ECF4/article-<?= $article["id"] ?>"><h2><?= $article["titre"] ?></h2></a>
                        <p><?= $article["contenu"] ?></p>
                    </div>
                    <div class="icons">
                        <a href="/Blog-AFPA-ECF4/modifier-<?= $article["id"] ?>"><i class="fas fa-edit"></i></a>
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