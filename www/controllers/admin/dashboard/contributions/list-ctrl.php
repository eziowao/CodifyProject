<?php

session_start();

if (!isset($_SESSION['password']) || empty($_SESSION['password'])) {
    header('Location: ?page=admin');
    exit;
}

try {
    $contributionModel = new Contribution();
    $contributions = $contributionModel->getAllContributions();

    // recupération pseudo user
    $userModel = new User();
    $users = $userModel->getAllUsers();
    $usersById = [];

    foreach ($users as $user) {
        $usersById[$user->user_id] = $user->pseudo;
    }

    // récupération nom challenges

    $challengeModel = new Challenge();
    $challenges = $challengeModel->getAllChallenges();
    $challengesById = [];

    foreach ($challenges as $challenge) {
        $challengesById[$challenge->challenge_id] = $challenge->name;
    }
} catch (\PDOException $ex) {
    echo sprintf('La récupération des catégories a échoué avec le message %s', $ex->getMessage());
    exit;
}

$title = "Liste des types de challenges";
renderView('admin/dashboard/contributions/list', compact('title', 'contributions', 'usersById', 'challengesById'), 'templateAdminLogin');
