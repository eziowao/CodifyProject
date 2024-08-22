<?php

$success = false;
$challenge = [];

try {
    $search = $_GET['search'] ?? '';
    $orderBy = $_GET['orderBy'] ?? 'challenge_id';
    $direction = $_GET['direction'] ?? 'ASC';

    $challengeModel = new Challenge();

    // Si une recherche est effectuée, utilisez la méthode searchChallenges()
    if (!empty($search)) {
        $challenges = $challengeModel->searchChallenges($search);
    } else {
        $challenges = $challengeModel->getChallengesSorted($orderBy, $direction);
    }

    $typeModel = new Type();
    $types = $typeModel->getAllTypes();
    $typesById = [];
    foreach ($types as $type) {
        $typesById[$type->type_id] = $type->type;
    }
} catch (\PDOException $ex) {
    echo sprintf('La récupération des catégories a échoué avec le message %s', $ex->getMessage());
}

$title = "Liste des challenges";
renderView('admin/dashboard/challenges/list', compact('title', 'challenges', 'typesById', 'orderBy', 'direction', 'search'), 'templateAdminLogin');
