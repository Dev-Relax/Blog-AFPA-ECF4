<?php
require_once 'db.php';



function verifierUtilisateur($pseudo)
{

    $bdd = connectToBdd();

    // 1 preparer la requete
    $query = $bdd->prepare('SELECT * FROM utilisateurs WHERE pseudo = ?');
    // 2 executer la requete
    $query->execute([$pseudo]);
    $users = $query->fetchAll(PDO::FETCH_ASSOC);
    return ($users > 0) ? true : false;
}

//ajouter un utilisateur
function ajoutUtilisateur()
{

    $bdd = connectToBdd();
    // Vérifiez si les données POST nécessaires sont définies
    if (isset($_POST['nom'], $_POST['prenom'], $_POST['pseudo'], $_POST['mail'], $_POST['mdp'])) {
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $pseudo = $_POST['pseudo'];
        $mail = $_POST['mail'];
        $mdp = $_POST['mdp'];


        if (!verifierUtilisateur($pseudo)) {

            $hash = password_hash($mdp, PASSWORD_BCRYPT);
            // Préparation de la requête SQL
            $query = $bdd->prepare('INSERT INTO utilisateurs (nom, prenom, pseudo, mail, mdp) VALUES (?, ?, ?, ?, ?)');

            // Exécution de la requête avec les valeurs fournies
            $result = $query->execute([$nom, $prenom, $pseudo, $mail, $hash]);
        }
        // Exécution de la requête avec les valeurs fournies
        $result = $query->execute([$nom, $prenom, $pseudo, $mail, $mdp]);
    }
}
