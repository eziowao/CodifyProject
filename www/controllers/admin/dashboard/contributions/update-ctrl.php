<?php

$errors = [];

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

$contribution = null;

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $contributionModel = new Contribution();
    $contributionModel->setContributionId($id);
    $contribution = $contributionModel->getContributionById($id);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $link = $_POST['link'];
        $user_id = $_POST['user_id'];
        $challenge_id = $_POST['challenge_id'];

        $contributionModel->setLink($link)
            ->setUser_id($user_id)
            ->setChallenge_id($challenge_id);

        if ($contributionModel->updateContribution()) {
            addFlash('success', 'Contribution mise à jour avec succès !');
            $contribution = $contributionModel->getContributionById($id);
            redirectToRoute('?page=admin/dashboard/contributions/list');
        }
    }
}

$title = "Modifier une contribution";
renderView('admin/dashboard/contributions/update', compact('title', 'users', 'challenges', 'contribution'), 'templateAdminLogin');
