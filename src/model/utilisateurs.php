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
function ajoutUtilisateur($nom, $prenom, $pseudo, $mail, $mdp)
{

    $bdd = connectToBdd();

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