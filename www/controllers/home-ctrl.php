<?php

try {
    // récupération challenge de la semaine
    $challengeModel = new Challenge();
    $challenge = $challengeModel->getCurrentChallenge();


    // affichage challenges précédents

    $challengeModel = new Challenge();
    $currentChallenge = $challengeModel->getCurrentChallenge();

    // Récupérer tous les challenges
    $allChallenges = $challengeModel->getAllChallenges();

    // Filtrer le challenge de la semaine
    $filteredChallenges = array_filter($allChallenges, function ($challenge) use ($currentChallenge) {
        return $challenge->challenge_id !== $currentChallenge['challenge_id'];
    });

    // Réindexer le tableau (optionnel, mais peut être utile pour les boucles)
    $filteredChallenges = array_values($filteredChallenges);
} catch (\PDOException $ex) {
    echo sprintf('La récupération des données a échoué avec le message : %s', $ex->getMessage());
}


$title = 'Accueil';
renderView('home', compact('title', 'challenge', 'filteredChallenges'), 'templateLogin');
