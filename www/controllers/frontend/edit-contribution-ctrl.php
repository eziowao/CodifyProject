<?php

$errors = [];
$success = false;

$current_user = $_SESSION['user'];
$currentUserId = $current_user->user_id;

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $contributionModel = new Contribution();
    $contributionModel->setContributionId($id);
    $contribution = $contributionModel->getContributionById($id);

    if ($contribution === false) {
        $errors[] = "Contribution non trouvée.";
    } else {
        if (!$contributionModel->isOwnedByUser($currentUserId)) {
            $errors[] = "Vous n'êtes pas autorisé à modifier cette contribution.";
        } else {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $link = $_POST['link'] ?? null;

                if (!filter_var($link, FILTER_VALIDATE_URL)) {
                    $errors['link'] = 'Le lien n\'est pas valide.';
                } else {
                    $regex = '/^https:\/\/[a-zA-Z0-9_-]+\.github\.io\/[a-zA-Z0-9_-]+\/$/';

                    if (!preg_match($regex, $link)) {
                        $errors['link'] = 'Le lien doit être au format "https://VotrePseudoGithub.github.io/NomDeVotreProjet/".';
                    } else {
                        $contributionModel->setLink($link);
                        $contributionModel->setUser_id($currentUserId);
                        $contributionModel->setChallenge_id($contribution['challenge_id']);

                        if ($contributionModel->updateContribution()) {
                            $success = true;
                            redirectToRoute('/?page=profile');
                        } else {
                            $errors[] = "Erreur lors de la mise à jour de la contribution.";
                        }
                    }
                }
            }
        }
    }
} else {
    $errors[] = "ID de contribution manquant.";
}

$title = "Modifier une contribution";
renderView('frontend/contribution', compact('title', 'contribution', 'errors', 'success'), 'templateLogin');
