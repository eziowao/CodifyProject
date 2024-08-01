<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $userModel = new User();
    $userModel->setUserId($id);

    if ($userModel->deleteUser()) {
        redirectToRoute('/?page=admin/dashboard/users/list');
    }
}

$title = "Liste des catégories";
