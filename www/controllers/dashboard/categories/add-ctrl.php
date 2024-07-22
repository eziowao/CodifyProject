<?php

$errors = [];
$success = false;


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    try {
        $name = $_POST['name'];
        // instance du modèle
        $categoryModel = new Category($name);
        // récupération de la liste des actégories
        $categoryModel->add();
        $success = true;
    } catch (\PDOException $ex) {
        echo sprintf('la création de la catégorie a échoué avec le message %s', $ex->getMessage());
    }
}

$title = "Ajouter une catégorie";
renderView('dashboard/categories/add', compact('title', 'success'));
