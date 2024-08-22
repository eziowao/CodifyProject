<?php

$types = [];

try {
    $orderBy = $_GET['order_by'] ?? 'type_id';
    $direction = $_GET['direction'] ?? 'ASC';

    $typeModel = new Type();
    $types = $typeModel->getAllTypes($orderBy, $direction);
} catch (\PDOException $ex) {
    echo sprintf('La récupération des types a échoué avec le message %s', $ex->getMessage());
}

$title = "Liste des types de challenges";
renderView('admin/dashboard/types/list', compact('title', 'types', 'orderBy', 'direction'), 'templateAdminLogin');
