<?php

try {
    // Initialiser les modèles
    $contribution = new Contribution();

    // Récupérer l'utilisateur connecté
    $current_user = $_SESSION['user'];
    $user_id = $current_user->user_id;  // Assurez-vous que user_id est une propriété de $_SESSION['user']

    // Récupérer les contributions de l'utilisateur
    $contributions = $contribution->getContributionsWithChallengeByUserId($user_id);
} catch (\PDOException $ex) {
    // Gérer les exceptions
    echo sprintf('La récupération des contributions a échoué avec le message : %s', $ex->getMessage());
}


$title = "Profil perso";

renderView('frontend/profile', compact('title', 'contribution', 'contributions'), 'templateLogin');
