<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $challengeModel = new Challenge();
    $challengeModel->setChallengeId($id);
    $challenge = $challengeModel->getChallengeById($id);

    if ($challenge && !empty($challenge['picture'])) {
        $uploadDir = __DIR__ . '/../../../../public/uploads/challenges/';
        $imagePath = $uploadDir . $challenge['picture'];
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
    }

    if ($challengeModel->deleteChallenge()) {
        redirectToRoute('?page=admin/dashboard/challenges/list');
    }
}
