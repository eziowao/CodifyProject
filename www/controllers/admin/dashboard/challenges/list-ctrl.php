<?php

session_start();

if (!isset($_SESSION['password']) || empty($_SESSION['password'])) {
    header('Location: ?page=admin');
    exit;
}

try {
    $challengeModel = new Challenge();
    $challenges = $challengeModel->getAllChallenges();

    $typeModel = new Type();
    $types = $typeModel->getAllTypes();
    $typesById = [];
    foreach ($types as $type) {
        $typesById[$type->type_id] = $type->type;
    }
} catch (\PDOException $ex) {
    echo sprintf('La récupération des catégories a échoué avec le message %s', $ex->getMessage());
    //throw $th;
}

$title = "Liste des challenges";
renderView('admin/dashboard/challenges/list', compact('title', 'challenges', 'typesById'), 'templateAdminLogin');
