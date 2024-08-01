<?php


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
