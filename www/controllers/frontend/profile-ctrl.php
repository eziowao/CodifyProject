<?php

try {
    $contribution = new Contribution();

    $current_user = $_SESSION['user'];
    $user_id = $current_user->user_id;

    $contributions = $contribution->getContributionsWithChallengeByUserId($user_id);
} catch (\PDOException $ex) {
    echo sprintf('La récupération des contributions a échoué avec le message : %s', $ex->getMessage());
}


$title = "Profil perso";

renderView('frontend/profile', compact('title', 'contribution', 'contributions'), 'templateLogin');
