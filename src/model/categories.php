<?php
require_once 'db.php';

function recupererCategories(){
    $bdd = connectToBdd();
    $sql = 'SELECT * FROM catégories';
    $query = $bdd->prepare($sql);
    $query->execute();
    $listCategories = $query->fetchAll(PDO::FETCH_ASSOC);
    return $listCategories;
}