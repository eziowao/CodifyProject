<?php

// require_once __DIR__ . './../../../models/Vehicle.php';
// require_once __DIR__ . './../../../models/Category.php';
// require_once __DIR__ . './../../../helpers/http_helper.php';

$errors = [];
$success = false;

$categoryModel = new Category();
$categories = $categoryModel->getAll();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    try {
        if ($_FILES['picture']) {
            $uploadDir = __DIR__ . '../../../../public/uploads/vehicles/';
            $tmp_name = $_FILES['picture']['tmp_name'];
            $fileName = uniqid() . '.' . explode('/', $_FILES['picture']['type'])[1];
            move_uploaded_file($tmp_name, $uploadDir . $fileName);
            // Récupérer les données du formulaire
            $categorie_id = $_POST['categorie_id'];
            $brand = $_POST['brand'];
            $model = $_POST['model'];
            $registration = $_POST['registration'];
            $mileage = $_POST['mileage'];
            $picture = $fileName;

            $vehicleModel = new Vehicle(
                categorie_id: $categorie_id,
                brand: $brand,
                model: $model,
                registration: $registration,
                mileage: $mileage,
                picture: $picture
            );
            $vehicleModel->add();
        }
    } catch (\PDOException $ex) {
        echo sprintf('la création de la catégorie a échoué avec le message %s', $ex->getMessage());
    }
}

$title = "Ajouter un véhicule";

renderView('dashboard/vehicles/add', compact('title', 'success', 'categories'));
