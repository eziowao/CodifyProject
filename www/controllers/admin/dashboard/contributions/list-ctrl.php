<?php

$contributions = [];
$orderBy = $_GET['sort'] ?? 'contribution_id';
$direction = $_GET['order'] ?? 'ASC';
$itemsPerPage = 10;
$pageNum = isset($_GET['page_num']) ? (int)$_GET['page_num'] : 1;
$offset = ($pageNum - 1) * $itemsPerPage;

try {
    $contributionModel = new Contribution();

    // Si une recherche est effectuée
    if (!empty($_GET['search'])) {
        $searchTerm = trim($_GET['search']);  // Trim du terme de recherche
        $contributions = $contributionModel->searchContributionsWithPagination($searchTerm, $itemsPerPage, $offset, $orderBy, $direction);
        $totalContributions = $contributionModel->countSearchResults($searchTerm); // Compter les résultats de recherche
    } else {
        // Récupérer les contributions avec pagination
        $contributions = $contributionModel->getContributionsWithPagination($itemsPerPage, $offset, $orderBy, $direction);
        $totalContributions = $contributionModel->countAllContributions(); // Compter toutes les contributions
    }

    // Récupération des utilisateurs et des challenges pour afficher leurs noms dans la vue
    $userModel = new User();
    $users = $userModel->getAllUsers();
    $usersById = [];

    foreach ($users as $user) {
        $usersById[$user->user_id] = $user->pseudo;
    }

    $challengeModel = new Challenge();
    $challenges = $challengeModel->getAllChallenges();
    $challengesById = [];

    foreach ($challenges as $challenge) {
        $challengesById[$challenge->challenge_id] = $challenge->name;
    }

    // Calcul du nombre total de pages
    $totalPages = ceil($totalContributions / $itemsPerPage);
} catch (\PDOException $ex) {
    echo sprintf('La récupération des données a échoué avec le message : %s', $ex->getMessage());
    exit;
}

$title = "Liste des contributions";
renderView('admin/dashboard/contributions/list', compact('title', 'contributions', 'usersById', 'challengesById', 'orderBy', 'direction', 'pageNum', 'totalPages'), 'templateAdminLogin');
