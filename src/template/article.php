<?php

$article = getArticle($article_id)[0];

$title = "B.log - " . $article["titre"];
require_once "./src/partials/header.php";
require_once "./src/model/commentaires.php";



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['supprimer'])) {
        supprimerArticle($_POST["supprimer"]);
        header("Location: /Blog-AFPA-ECF4");
    }

    if(isset($_POST["modifier"])){
        header("Location: /Blog-AFPA-ECF4/modifier-" . $_POST["modifier"]);
    }

    if(isset($_POST["new-comment"])) {
        ajouterCommentaire(1, $_POST["new-comment"], $article_id);
    }
}

?>

<main>
    <div class="form-container-wrapper">
        <div class="form-container">
            <form method="POST" action="">
                <button class="edit-button" name="modifier" value="<?= $article_id ?>">Modifier</button>
                <button class="delete-button" name="supprimer" value="<?= $article_id ?>">Supprimer la publication</button>
            </form>
            <form>
                <h1><?= $article["titre"] ?></h1>

                <label for="article">Article</label>
                <input type="text" id="article" name="article" value="<?= $article["contenu"] ?> " readonly>

                <label for="category">Catégorie</label>
                <input type="text" id="category" name="category" value="Catégorie de l'article" readonly>
                
                <h2>Commentaires</h2>
                <?php
                $commentaires = recupererCommentairesArticle($article_id);
        
                 foreach($commentaires as $commentaire): ?>
                    <label for="comment<?= $commentaire["id"]?>"><?= $commentaire["pseudo"]?></label>
                    <textarea id="comment<?= $commentaire["id"]?>" name="comment<?= $commentaire["id"]?>" rows="3" readonly><?= $commentaire["contenu"] ?></textarea>
                <?php endforeach; ?>
            </form>
            <form method="POST" action="">
                <label for="new-comment">Formulaire d'ajout de commentaire</label>
                <textarea id="new-comment" name="new-comment" rows="5" required></textarea>

                <div class="form-buttons">
                    <button type="submit" class="save-button">Ajouter</button>
                    <button type="reset" class="cancel-button">Annuler</button>
                </div>
            </form>
        </div>
    </div>
</main>

<?php
require_once "./src/partials/footer.php";
?>