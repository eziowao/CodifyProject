<?php

$errors = [];

if (isset($_GET['id'])) {
    $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
    $typeModel = new Type();
    $typeModel->setTypeId($id);

    $type = $typeModel->getTypeById($id);

    if (!$type) {
        $errors[] = "Type non trouvé.";
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $typeName = filter_input(INPUT_POST, 'type', FILTER_SANITIZE_SPECIAL_CHARS);

        if (empty($typeName)) {
            $errors['type'] = 'Le type de challenge est requis.';
        } elseif (strlen($typeName) > 30) {
            $errors['type'] = 'Le type de challenge doit contenir moins de 30 caractères.';
        } else {
            $typeModel->setType($typeName);

            if ($typeModel->updateType()) {
                addFlash('success', 'Catégorie modifiée avec succès !');
                $type = $typeModel->getTypeById($id);
                redirectToRoute('/?page=admin/dashboard/types/list');
            } else {
                $errors[] = "Erreur lors de la mise à jour du type.";
            }
        }
    }
} else {
    $errors[] = "ID du type non fourni.";
}

$title = "Modifier le type de challenge";
renderView('admin/dashboard/types/update', compact('title', 'type', 'errors'), 'templateAdminLogin');
