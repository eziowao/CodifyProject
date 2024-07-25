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
    $challenge = $challengeModel->getChallengeById($id);

    if ($challengeModel->deleteChallenge($id)) {
        $success = true;
        $challenge = $challengeModel->getChallengeById($id);
        redirectToRoute('?page=admin/dashboard/challenges/list');
    }
}
