<?php

$errors = [];
$success = false;


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $type = $_POST['type'];
        // instance du modèle
        $typeModel = new Type($type);
        // récupération de la liste des actégories
        $typeModel->addType();
        $success = true;
    } catch (\PDOException $ex) {
        echo sprintf('la création de la catégorie a échoué avec le message %s', $ex->getMessage());
    }
}

$title = "Ajouter un type de challenges";
renderView('admin/dashboard/types/add', compact('title', 'success'), 'templateAdminLogin');
