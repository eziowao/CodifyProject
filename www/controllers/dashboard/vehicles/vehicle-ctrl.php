<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $vehicleModel = new Vehicle();
    $vehicle = $vehicleModel->getById($id);
    $categoryModel = new Category();
    $categories = $categoryModel->getById($vehicle['categorie_id']);
}
$title = "Fiche véhicule";

renderView('dashboard/vehicles/vehicle', compact('title', 'vehicle', 'categories'));
