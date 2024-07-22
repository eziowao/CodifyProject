<?php

$success = false;

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $vehicleModel = new Vehicle();
    $vehicle = $vehicleModel->getById($id);

    $sortColumn = $_GET['sort'] ?? 'vehicle_id';
    $sortOrder = $_GET['order'] ?? 'ASC';

    if ($vehicleModel->deleteVehicle($id)) {
        $success = true;
        $vehicle = $vehicleModel->getById($id);
        $vehicles = $vehicleModel->getAll($sortColumn, $sortOrder);
        $title = "Liste des vehicules";
        renderView('dashboard/vehicles/list', compact('title', 'vehicles', 'sortColumn', 'sortOrder'));
    }
}

// rajouter un truc au cas où tqt (à suivre pcq j'ai oublié le pourquoi du "tqt")
// $title = "Liste des véhicules";

// renderView('dashboard/vehicles/list', compact('title', 'success', 'vehicle'));
