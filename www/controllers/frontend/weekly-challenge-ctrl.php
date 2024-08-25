<?php

$errors = [];

try {
    $current_user = $_SESSION['user'];
    $currentUserId = $current_user->user_id;
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

        // gestion top contributions
        $topContributions = $contributionModel->getTopLikedContributionsByChallengeId($challenge['challenge_id'], 10);

        // ajoute l'état du like pour chaque contribution
        $likeModel = new Like();
        foreach ($contributions as &$contribution) {
            $contribution->liked = $likeModel->hasUserLikedContribution($currentUserId, $contribution->contribution_id);
        }

        foreach ($topContributions as &$contribution) {
            $contribution->liked = $likeModel->hasUserLikedContribution($currentUserId, $contribution->contribution_id);
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['link'])) {
            if (isset($_SESSION['user'])) {
                $userId = $_SESSION['user']->user_id;
                if ($contributionModel->hasUserContributedToChallenge($userId, $challenge['challenge_id'])) {
                    $errors['contribution'] = 'Vous avez déjà soumis une contribution pour ce challenge.';
                } else {
                    $link = filter_var($_POST['link'], FILTER_SANITIZE_URL);

                    if (!filter_var($link, FILTER_VALIDATE_URL)) {
                        $errors['link'] = 'Le lien fourni n\'est pas une URL valide.';
                    } else {
                        $contributionModel->setUser_id($userId)
                            ->setChallenge_id($challenge['challenge_id'])
                            ->setLink($link)
                            ->addContribution();
                        redirectToRoute('?page=weekly-challenge');
                        exit;
                    }
                }
            } else {
                redirectToRoute('?page=home');
            }
        }

        // formulaire gestion de like
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['contribution_id'])) {
            if (isset($_SESSION['user'])) {
                $userId = $_SESSION['user']->user_id;
                $contributionId = $_POST['contribution_id'];

                $likeModel = new Like();

                $hasLiked = $likeModel->hasUserLikedContribution($userId, $contributionId);

                if ($hasLiked) {
                    $likeModel->removeLike($userId, $contributionId);
                } else {
                    $likeModel->addLike($userId, $contributionId);
                }

                $newLikeCount = $likeModel->countLikesForContribution($contributionId);

                // Renvoi de la réponse JSON
                echo json_encode([
                    'success' => true,
                    'new_like_count' => $newLikeCount,
                    'liked' => !$hasLiked // état inversé du like
                ]);
                exit();
            } else {
                echo json_encode(['success' => false, 'message' => 'Vous devez être connecté pour liker une contribution.']);
                exit();
            }
        }
    } else {
        echo 'Aucun challenge actuel à afficher';
    }
} catch (\PDOException $ex) {
    echo sprintf('La récupération des données a échoué avec le message : %s', $ex->getMessage());
}

$title = "Challenge de la semaine";

renderView('frontend/weekly-challenge', compact('title', 'challenge', 'contributions', 'typesById', 'errors', 'topContributions'), 'templateLogin');
