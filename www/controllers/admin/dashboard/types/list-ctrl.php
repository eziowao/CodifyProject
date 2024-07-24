<?php

session_start();

if (!isset($_SESSION['password']) || empty($_SESSION['password'])) {
    header('Location: ?page=admin');
    exit;
}

try {
    $typeModel = new Type();
    $types = $typeModel->getAllTypes();
} catch (\PDOException $ex) {
    echo sprintf('la récupération des catégories a échoué avec le message %s', $ex->getMessage());
    //throw $th;
}

$title = "Liste des types de challenges";
renderView('admin/dashboard/types/list', compact('title', 'types'), 'templateAdminLogin');
