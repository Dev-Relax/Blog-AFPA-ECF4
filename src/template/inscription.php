<?php
$title = "B.log - Inscription";
require_once "./src/partials/header.php";
require_once "./src/model/utilisateurs.php";
$error = false;

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $pseudo = $_POST['pseudo'];
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $mail = $_POST['mail'];
    $mdp = $_POST['mdp'];
    if(ajoutUtilisateur($nom, $prenom, $pseudo, $mail, $mdp)){
        header("Location: /Blog-AFPA-ECF4/");
    }else{
        $error = true;
    }
}
?>

<main>
    <div class="form-container-wrapper">
        <div class="form-container">
            <h1>Inscription</h1>
            <p class="inscription">Vous avez déjà un compte ? <a href="../User/login.html" class="connexion-link">Connexion</a></p>
            <form method="post" action="">
                <label for="pseudo">Pseudo</label>
                <input type="text" id="pseudo" name="pseudo" required>
                <?= !$error ? "" : "<p class='error'>ERRREUR : Ce pseudo n'est pas disponible</p>"; ?>
                <label for="prenom">Prénom</label>
                <input type="text" id="first-name" name="prenom" required>

                <label for="nom">Nom</label>
                <input type="text" id="last-name" name="nom" required>

                <label for="mail">E-mail</label>
                <input type="email" id="email" name="mail" required>

                <label for="mdp">Mot de passe</label>
                <input type="password" id="password" name="mdp" required minlength="8">

                <div class="form-buttons">
                    <button type="submit" class="save-button">S'inscrire</button>
                </div>
            </form>
            <p class="terms">En vous inscrivant, vous acceptez les <a href="#">Conditions</a> et la <a href="#">Charte de gestion des données</a>.</p>
        </div>
    </div>
</main>

<?php
require_once "./src/partials/footer.php";
?>