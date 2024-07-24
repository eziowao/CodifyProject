<?php

session_start();

if (!isset($_SESSION['password']) || empty($_SESSION['password'])) {
    header('Location: ?page=admin');
    exit;
}

$errors = [];
$success = false;

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $typeModel = new Type();
    $type = $typeModel->getTypeById($id);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $type = trim($_POST['type']);

        if (empty($type)) {
            $errors[] = "Nom du type requis";
        }

        if ($typeModel->updateType($id, $type)) {
            $success = true;
            $type = $typeModel->getTypeById($id);
        }
    }
}

$title = "Modifier le type de challenge";
renderView('admin/dashboard/types/update', compact('title', 'type', 'success'), 'templateAdminLogin');
