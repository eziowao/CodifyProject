<?php

try {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $userModel = new User();
        $user = $userModel->getUserById($id);

        $contribution = new Contribution();
        $contributions = $contribution->getContributionsWithChallengeByUserId($id);
    }
} catch (\PDOException $ex) {
    echo sprintf('La récupération des contributions a échoué avec le message : %s', $ex->getMessage());
}


$title = "Profil perso";

renderView('frontend/users-profile', compact('title', 'user', 'contributions'), 'templateLogin');
