<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $userModel = new User();
    $userModel->setUserId($id);
    $user = $userModel->getUserById($id);

    if ($user && !empty($user['picture'])) {
        $uploadDir = __DIR__ . '/../../../../public/uploads/users/';
        $imagePath = $uploadDir . $user['picture'];
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
    }

    if ($userModel->deleteUser()) {
        addFlash('success', 'Utilisateur banni avec succès !');
        redirectToRoute('/?page=admin/dashboard/users/list');
    }
}

$title = "Liste des catégories";
