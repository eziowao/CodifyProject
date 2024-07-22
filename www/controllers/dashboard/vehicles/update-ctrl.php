<?php

$errors = [];
$success = false;

$categoryModel = new Category();
$categories = $categoryModel->getAll();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $vehicleModel = new Vehicle();
    $vehicle = $vehicleModel->getById($id);

    $sortColumn = $_GET['sort'] ?? 'vehicle_id';
    $sortOrder = $_GET['order'] ?? 'ASC';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $brand = $_POST['brand'];
        $model = $_POST['model'];
        $registration = $_POST['registration'];
        $mileage = $_POST['mileage'];
        $picture = $_POST['picture'];
        $categorie_id = $_POST['categorie_id'];

        if ($vehicleModel->updateVehicle($id, $brand, $model, $registration, $mileage, $picture, $categorie_id)) {
            $success = true;
            $vehicles = $vehicleModel->getAll($sortColumn, $sortOrder);
            $title = "Liste des vehicules";
            renderView('dashboard/vehicles/list', compact('title', 'vehicles', 'sortColumn', 'sortOrder'));
        }

        if ($picture) {
            $uploadDir =  __DIR__ . '/../../../public/uploads/vehicles/';
            $tmp_name = $_FILES['picture']['tmp_name'];
            $oldImage = $vehicle->picture;
            unlink($uploadDir . $oldImage);
            $fileName = uniqid() . '.' . explode('/', $_FILES['picture']['type'])[1];
            move_uploaded_file($tmp_name, $uploadDir . $fileName);
            $picture = $fileName;
            $vehicleModel = new Vehicle(
                categorie_id: $categorie_id,
                brand: $brand,
                model: $model,
                registration: $registration,
                mileage: $mileage,
                picture: $picture,
            );
        } else {
            $vehicleModel = new Vehicle(
                categorie_id: $categorie_id,
                brand: $brand,
                model: $model,
                registration: $registration,
                mileage: $mileage,
            );
        }
    }
}

$title = "Modifier le véhicule";

renderView('dashboard/vehicles/update', compact('title', 'success', 'vehicle', 'categories', 'sortColumn', 'sortOrder'));
