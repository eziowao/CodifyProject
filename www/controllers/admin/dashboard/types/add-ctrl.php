<?php

$errors = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {

        $type = filter_input(INPUT_POST, 'type', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($type)) {
            $errors['type'] = 'Le type de challenge est requis.';
        } elseif (strlen($type) > 30) {
            $errors['type'] = 'Le type de challenge doit contenir moins de 30 caractères.';
        }

        if (empty($errors)) {
            $typeModel = new Type($type);
            $typeModel->addType();
            addFlash('success', 'Catégorie ajoutée avec succès !');
            redirectToRoute('/?page=admin/dashboard/types/list');
        }
    } catch (\PDOException $ex) {
        echo sprintf('la création de la catégorie a échoué avec le message %s', $ex->getMessage());
    }
}

$title = "Ajouter un type de challenges";
renderView('admin/dashboard/types/add', compact('title', 'errors'), 'templateAdminLogin');
