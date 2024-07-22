<?php

$success = false;

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $categoryModel = new Category();
    $category = $categoryModel->getById($id);

    if ($categoryModel->delete($id)) {
        $success = true;
        $category = $categoryModel->getById($id);
        redirectToRoute('?page=categories/list');
    }
}

$title = "Liste des catégories";
