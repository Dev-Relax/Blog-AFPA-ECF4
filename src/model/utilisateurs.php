<?php
//query utilisateur
$dsn = 'mysql:dbname=qrxzfaeafpa;host=phpmyadmin.cluster030.hosting.ovh.net';
$user = 'qrxzfaeafpa';
$password = 'Afpa2024';

try {

    $bdd = new PDO($dsn, $user, $password);
} catch (PDOException $Exception) {
    echo 'Échec lors de la connexion : ' . $Exception->getMessage();
}

// Vérifiez si 'id' est défini dans $_POST et si c'est un entier
if (isset($_POST['id']) && filter_var($_POST['id'], FILTER_VALIDATE_INT)) {
    $id_utilisateur = $_POST['id'];


    // 1 preparer la requete
    $query = $bdd->prepare('SELECT * FROM utilisateurs WHERE id = ?');

    // 2 executer la requete
    $query->execute([$id_utilisateur]);
    $users = $query->fetchAll(PDO::FETCH_ASSOC);
}

//ajouter un utilisateur
// Vérifiez si les données POST nécessaires sont définies
if (isset($_POST['nom'], $_POST['prenom'], $_POST['pseudo'], $_POST['mail'], $_POST['mdp'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $pseudo = $_POST['pseudo'];
    $mail = $_POST['mail'];
    $mdp = $_POST['mdp'];

    // Préparation de la requête SQL
    $query = $bdd->prepare('INSERT INTO utilisateurs (nom, prenom, pseudo, mail, mdp) VALUES (?, ?, ?, ?, ?)');

    // Exécution de la requête avec les valeurs fournies
    $result = $query->execute([$nom, $prenom, $pseudo, $mail, $mdp]);
}
