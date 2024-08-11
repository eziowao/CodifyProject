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
                redirectToRoute('?page=previous-challenges/challenge&id=' . urlencode($id));
                exit;
            } else {
                $errors['auth'] = 'Vous devez être connecté pour ajouter une contribution.';
            }
        }
    } else {
        throw new Exception('ID de challenge non trouvée');
    }
} catch (PDOException $ex) {
    echo sprintf('La récupération des données a échoué avec le message : %s', $ex->getMessage());
}

$title = "Challenge";

renderView('frontend/challenge', compact('title', 'challenge', 'typesById', 'contributions'), 'templateLogin');
