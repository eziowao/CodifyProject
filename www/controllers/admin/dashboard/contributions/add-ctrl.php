<?php

session_start();

if (!isset($_SESSION['password']) || empty($_SESSION['password'])) {
    header('Location: ?page=admin');
    exit;
}

$errors = [];
$success = false;

$userModel = new User();
$users = $userModel->getAllUsers();

$challengeModel = new Challenge();
$challenges = $challengeModel->getAllChallenges();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    try {
        $link = $_POST['link'];
        $user_id = $_POST['user_id'];
        $challenge_id = $_POST['challenge_id'];

        // instance du modèle
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
