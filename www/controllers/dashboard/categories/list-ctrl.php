<?php

try {
    // instance du modele 
    $categoryModel = new Category();
    // récupération des données de la liste des catégories 
    $categories = $categoryModel->getAll();
} catch (\PDOException $ex) {
    echo sprintf('la récupération des catégories a échoué avec le message %s', $ex->getMessage());
    //throw $th;
}

$title = "Liste des catégories";
renderView('dashboard/categories/list', compact('title', 'categories'));
