<?php

session_start();

if (!isset($_SESSION['password']) || empty($_SESSION['password'])) {
    header('Location: ?page=admin');
    exit;
}

$success = false;

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $userModel = new User();
    $user = $userModel->getUserById($id);

    if ($userModel->deleteUser($id)) {
        $success = true;
        $user = $userModel->getUserById($id);
        redirectToRoute('/?page=admin/dashboard/users/list');
    }
}

$title = "Liste des catégories";
