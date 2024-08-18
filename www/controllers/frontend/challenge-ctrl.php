<?php

$errors = [];

try {

    $current_user = $_SESSION['user'];
    $currentUserId = $current_user->user_id;

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $challengeModel = new Challenge();
        $challenge = $challengeModel->getChallengeById($id);

        if (!$challenge) {
            throw new Exception('Challenge non trouvé');
        }

        $typeModel = new Type();
        $types = $typeModel->getAllTypes();
        $typesById = [];
        foreach ($types as $type) {
            $typesById[$type->type_id] = $type->type;
        }

        $contributionModel = new Contribution();
        $contributions = $contributionModel->getContributionsByChallengeId($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['link'])) {
            if (isset($_SESSION['user'])) {
                $userId = $_SESSION['user']->user_id;

                // Vérification si l'utilisateur a déjà contribué à ce challenge
                if ($contributionModel->hasUserContributedToChallenge($userId, $challenge['challenge_id'])) {
                    $errors['contribution'] = 'Vous avez déjà soumis une contribution pour ce challenge.';
                } else {
                    $link = filter_var($_POST['link'], FILTER_SANITIZE_URL);

                    if (!filter_var($link, FILTER_VALIDATE_URL)) {
                        $errors['link'] = 'Le lien fourni n\'est pas une URL valide.';
                    } else {
                        $regex = '/^https:\/\/[a-zA-Z0-9_-]+\.github\.io\/[a-zA-Z0-9_-]+\/$/';

                        if (!preg_match($regex, $link)) {
                            $errors['link'] = 'Le lien doit être au format "https://VotrePseudoGithub.github.io/NomDeVotreProjet/".';
                        } else {
                            $contributionModel->setUser_id($userId)
                                ->setChallenge_id($challenge['challenge_id'])
                                ->setLink($link)
                                ->addContribution();

                            redirectToRoute('?page=previous-challenges/challenge&id=' . urlencode($id));
                            exit;
                        }
                    }
                }
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

renderView('frontend/challenge', compact('title', 'challenge', 'typesById', 'contributions', 'errors', 'currentUserId'), 'templateLogin');
