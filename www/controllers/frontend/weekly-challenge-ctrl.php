<?php

try {
    // Récupérer le challenge de la semaine
    $challengeModel = new Challenge();
    $challenge = $challengeModel->getCurrentChallenge();

    if ($challenge) {
        // Récupérer le type du challenge
        $typeModel = new Type();
        $types = $typeModel->getAllTypes();
        $typesById = [];
        foreach ($types as $type) {
            $typesById[$type->type_id] = $type->type;
        }

        // Récupérer les contributions pour ce challenge
        $contributionModel = new Contribution();
        $contributions = $contributionModel->getContributionsByChallengeId($challenge['challenge_id']);
    } else {
        echo 'Aucun challenge actuel à afficher';
    }
} catch (\PDOException $ex) {
    echo sprintf('La récupération des données a échoué avec le message : %s', $ex->getMessage());
}

$title = "Challenge de la semaine";

renderView('frontend/weekly-challenge', compact('title', 'challenge', 'contributions'), 'templateLogin');
