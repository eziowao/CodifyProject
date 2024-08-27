<?php

if (isset($_GET['id'])) {
    $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
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
        addFlash('success', 'Challenge supprimé avec succès !');
        redirectToRoute('?page=admin/dashboard/challenges/list');
    }
}
