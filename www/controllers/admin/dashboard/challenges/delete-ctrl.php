<?php

session_start();

if (!isset($_SESSION['password']) || empty($_SESSION['password'])) {
    header('Location: ?page=admin');
    exit;
}

$success = false;

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $challengeModel = new Challenge();
    $challengeModel->setChallengeId($id);

    if ($challengeModel->deleteChallenge()) {
        $success = true;
        redirectToRoute('?page=admin/dashboard/challenges/list');
    }
}
