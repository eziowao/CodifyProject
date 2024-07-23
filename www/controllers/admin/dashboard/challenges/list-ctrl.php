<?php

session_start();

if (!isset($_SESSION['password']) || empty($_SESSION['password'])) {
    header('Location: ?page=admin');
    exit;
}

try {
    $challengeModel = new Challenge();
    $challenges = $challengeModel->getAllChallenges();
} catch (\PDOException $ex) {
    echo sprintf('la récupération des catégories a échoué avec le message %s', $ex->getMessage());
    //throw $th;
}

$title = "Liste des challenges";
renderView('admin/dashboard/challenges/list', compact('title', 'challenges'));
