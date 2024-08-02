<?php

try {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Initialiser le modèle Challenge et récupérer le challenge spécifique
        $challengeModel = new Challenge();
        $challenge = $challengeModel->getChallengeById($id);

        if (!$challenge) {
            throw new Exception('Challenge non trouvé');
        }

        // Initialiser le modèle Type et récupérer tous les types
        $typeModel = new Type();
        $types = $typeModel->getAllTypes();
        $typesById = [];
        foreach ($types as $type) {
            $typesById[$type->type_id] = $type->type;
        }

        // Initialiser le modèle Contribution et récupérer les contributions liées au challenge
        $contributionModel = new Contribution();
        $contributions = $contributionModel->getContributionsByChallengeId($id);
    } else {
        throw new Exception('ID de challenge non trouvée');
    }
} catch (PDOException $ex) {
    echo sprintf('La récupération des données a échoué avec le message : %s', $ex->getMessage());
}

$title = "Challenge";

renderView('frontend/challenge', compact('title', 'challenge', 'typesById', 'contributions'), 'templateLogin');
