<?php

$filteredChallenges = [];

try {

    $challengeModel = new Challenge();
    $currentChallenge = $challengeModel->getCurrentChallenge();

    $allChallenges = $challengeModel->getAllChallenges();

    $now = new DateTime();

    $filteredChallenges = array_filter($allChallenges, function ($challenge) use ($currentChallenge, $now) {
        $publishedAt = new DateTime($challenge->published_at);
        return $challenge->challenge_id !== $currentChallenge['challenge_id'] && $publishedAt <= $now;
    });

    $filteredChallenges = array_values($filteredChallenges);
} catch (\PDOException $ex) {
    echo sprintf('La récupération des données a échoué avec le message : %s', $ex->getMessage());
}

$title = "Challenges Précédents";
renderView('frontend/previous-challenges', compact('title', 'filteredChallenges'), 'templateLogin');
