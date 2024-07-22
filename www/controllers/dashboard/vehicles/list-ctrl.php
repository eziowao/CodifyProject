<?php

try {
    // instance du modele 
    $vehicleModel = new Vehicle();

    // récupération des paramètres de tri
    $sortColumn = $_GET['sort'] ?? 'vehicle_id';
    $sortOrder = $_GET['order'] ?? 'ASC';

    // récupération des données de la liste des véhicules 
    $vehicles = $vehicleModel->getAll($sortColumn, $sortOrder);
} catch (\PDOException $ex) {
    echo sprintf('la récupération des catégories a échoué avec le message %s', $ex->getMessage());
    //throw $th;
}

$title = "Liste des vehicules";

renderView('dashboard/vehicles/list', compact('title', 'vehicles', 'sortColumn', 'sortOrder'));
