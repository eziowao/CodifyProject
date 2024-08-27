<?php

$success = false;
$challenge = [];

$limit = 10;
$page = isset($_GET['page_num']) ? (int)$_GET['page_num'] : 1;
$offset = ($page - 1) * $limit;

try {
    $search = $_GET['search'] ?? null;
    $search = $search !== null ? trim($search) : '';
    $orderBy = $_GET['orderBy'] ?? 'challenge_id';
    $direction = $_GET['direction'] ?? 'ASC';

    $challengeModel = new Challenge();

    if (!empty($search)) {
        $challenges = $challengeModel->searchChallenges($search);
    } else {
        $challenges = $challengeModel->getPaginatedChallenges($limit, $offset, $orderBy, $direction);
    }

    $totalChallenges = $challengeModel->countChallenges();
    $totalPages = ceil($totalChallenges / $limit);

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
renderView('admin/dashboard/challenges/list', compact('title', 'challenges', 'typesById', 'orderBy', 'direction', 'search', 'page', 'totalPages'), 'templateAdminLogin');
