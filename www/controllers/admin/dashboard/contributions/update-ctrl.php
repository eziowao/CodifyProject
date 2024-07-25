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

$contribution = null;

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $contributionModel = new Contribution();
    $contributionModel->setContributionId($id);
    $contribution = $contributionModel->getContributionById();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $link = $_POST['link'];
        $user_id = $_POST['user_id'];
        $challenge_id = $_POST['challenge_id'];

        $contributionModel->setLink($link)
            ->setUser_id($user_id)
            ->setChallenge_id($challenge_id);

        if ($contributionModel->updateContribution()) {
            $success = true;
            $contribution = $contributionModel->getContributionById();
        }
    }
}

$title = "Modifier une contribution";
renderView('admin/dashboard/contributions/update', compact('title', 'success', 'users', 'challenges', 'contribution'), 'templateAdminLogin');
