<?php

session_start();

if (!isset($_SESSION['password']) || empty($_SESSION['password'])) {
    header('Location: ?page=admin');
    exit;
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $typeModel = new Type();
    $typeModel->setTypeId($id);

    if ($typeModel->deleteType()) {
        redirectToRoute('?page=admin/dashboard/types/list');
    }
}
