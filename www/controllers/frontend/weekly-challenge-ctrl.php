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

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['link'])) {
            if (isset($_SESSION['user'])) {
                $userId = $_SESSION['user']->user_id; // Assurez-vous que $_SESSION['user'] est correctement défini
                $link = filter_var($_POST['link'], FILTER_SANITIZE_URL); // Sécuriser l'URL

                // Ajouter la contribution
                $contributionModel->setUser_id($userId)
                    ->setChallenge_id($challenge['challenge_id'])
                    ->setLink($link)
                    ->addContribution();

                // Rediriger ou afficher un message de succès
                redirectToRoute('?page=weekly-challenge');
                exit;
            } else {
                $errors['auth'] = 'Vous devez être connecté pour ajouter une contribution.';
            }
        }
    } else {
        echo 'Aucun challenge actuel à afficher';
    }
} catch (\PDOException $ex) {
    echo sprintf('La récupération des données a échoué avec le message : %s', $ex->getMessage());
}

$title = "Challenge de la semaine";

renderView('frontend/weekly-challenge', compact('title', 'challenge', 'contributions', 'typesById'), 'templateLogin');
