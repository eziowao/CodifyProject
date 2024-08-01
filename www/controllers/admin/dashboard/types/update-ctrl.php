<?php

session_start();

if (!isset($_SESSION['password']) || empty($_SESSION['password'])) {
    header('Location: ?page=admin');
    exit;
}

$errors = [];
$success = false;

if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $typeModel = new Type();
    $typeModel->setTypeId($id);

    $type = $typeModel->getTypeById($id);

    if (!$type) {
        $errors[] = "Type non trouvé.";
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $typeName = trim($_POST['type']);

        if (empty($typeName)) {
            $errors[] = "Nom du type requis";
        } else {
            $typeModel->setType($typeName);

            if ($typeModel->updateType()) {
                $success = true;
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
renderView('admin/dashboard/types/update', compact('title', 'type', 'success'), 'templateAdminLogin');
