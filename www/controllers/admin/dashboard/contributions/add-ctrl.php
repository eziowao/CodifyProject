<?php

$errors = [];
$success = false;

$userModel = new User();
$users = [];

$challengeModel = new Challenge();
$challenges = [];

try {
    $users = $userModel->getAllUsers();
    $challenges = $challengeModel->getAllChallenges();
} catch (\PDOException $ex) {
    $errors[] = sprintf('Erreur lors de la récupération des données : %s', $ex->getMessage());
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    try {
        $link = $_POST['link'];
        $user_id = $_POST['user_id'];
        $challenge_id = $_POST['challenge_id'];

        $contributionModel = new Contribution(
            link: $link,
            user_id: $user_id,
            challenge_id: $challenge_id
        );

        $contributionModel->addContribution();
        $success = true;
    } catch (\PDOException $ex) {
        echo sprintf('la création de la contribution a échouée avec le message %s', $ex->getMessage());
    }
}

$title = "Ajouter une contribution";
renderView('admin/dashboard/contributions/add', compact('title', 'success', 'users', 'challenges'), 'templateAdminLogin');
