<?php

$errors = [];
$success = false;

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $categoryModel = new Category();
    $category = $categoryModel->getById($id);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = trim($_POST['name']);

        if (empty($name)) {
            $errors[] = "Nom requis";
        }

        if ($categoryModel->update($id, $name)) {
            $success = true;
            $category = $categoryModel->getById($id);
            redirectToRoute('?page=categories/list');
        }
    }
}

$title = "Modifier la catégorie";

renderView('dashboard/categories/update', compact('title', 'category', 'success'));
