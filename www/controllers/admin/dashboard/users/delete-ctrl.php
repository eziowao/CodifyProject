<?php

session_start();

if (!isset($_SESSION['password']) || empty($_SESSION['password'])) {
    header('Location: ?page=admin');
    exit;
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $userModel = new User();
    $userModel->setUserId($id);

    if ($userModel->deleteUser()) {
        redirectToRoute('/?page=admin/dashboard/users/list');
    }
}

$title = "Liste des catégories";
