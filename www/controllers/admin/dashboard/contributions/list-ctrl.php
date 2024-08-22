<?php

$contributions = [];
$sortField = $_GET['sort'] ?? 'contribution_id';
$sortOrder = $_GET['order'] ?? 'ASC';

try {
    $contributionModel = new Contribution();

    // Si une recherche est effectuée, on appelle la méthode de recherche
    if (!empty($_GET['search'])) {
        $searchTerm = $_GET['search'];
        $contributions = $contributionModel->searchContributions($searchTerm);
    } else {
        // Sinon, on récupère toutes les contributions avec le tri sélectionné
        $contributions = $contributionModel->getAllContributionsSorted($sortField, $sortOrder);
    }

    // récupération des utilisateurs et des challenges pour afficher leurs noms dans la vue
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
} catch (\PDOException $ex) {
    echo sprintf('La récupération des données a échoué avec le message : %s', $ex->getMessage());
    exit;
}

$title = "Liste des contributions";
renderView('admin/dashboard/contributions/list', compact('title', 'contributions', 'usersById', 'challengesById', 'sortField', 'sortOrder'), 'templateAdminLogin');
