<?php

session_start();

if (!isset($_SESSION['password']) || empty($_SESSION['password'])) {
    header('Location: ?page=admin');
    exit;
}

$success = false;

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $typeModel = new Type();
    $type = $typeModel->getTypeById($id);

    if ($typeModel->deleteType($id)) {
        $success = true;
        $type = $typeModel->getTypeById($id);
        redirectToRoute('?page=admin/dashboard/types/list');
    }
}
