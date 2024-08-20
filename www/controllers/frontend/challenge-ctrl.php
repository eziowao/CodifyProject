<?php

$errors = [];

try {
    $current_user = $_SESSION['user'];
    $currentUserId = $current_user->user_id;

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $challengeModel = new Challenge();
        $challenge = $challengeModel->getChallengeById($id);

        $typeModel = new Type();
        $types = $typeModel->getAllTypes();
        $typesById = [];
        foreach ($types as $type) {
            $typesById[$type->type_id] = $type->type;
        }

        $contributionModel = new Contribution();

        // Pagination setup
        $limit = 6; // Number of contributions per page
        $page = isset($_GET['p']) ? (int)$_GET['p'] : 1;
        $offset = ($page - 1) * $limit;

        // Get contributions with pagination
        $contributions = $contributionModel->getContributionsByChallengeIdWithPagination($id, $limit, $offset);

        // Get total number of contributions
        $totalContributions = $contributionModel->countContributionsByChallengeId($id);
        $totalPages = ceil($totalContributions / $limit);

        // gestion top contributions
        $topContributions = $contributionModel->getTopLikedContributionsByChallengeId($id, 10);


        // ajoute l'état du like pour chaque contribution
        $likeModel = new Like();
        foreach ($contributions as &$contribution) {
            $contribution->liked = $likeModel->hasUserLikedContribution($currentUserId, $contribution->contribution_id);
        }

        foreach ($topContributions as &$contribution) {
            $contribution->liked = $likeModel->hasUserLikedContribution($currentUserId, $contribution->contribution_id);
        }

        // formulaire pour l'ajout d'une contribution
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
        throw new Exception('ID de challenge non trouvée');
    }
} catch (PDOException $ex) {
    echo sprintf('La récupération des données a échoué avec le message : %s', $ex->getMessage());
}

$title = "Challenge";

renderView('frontend/challenge', compact('title', 'challenge', 'typesById', 'contributions', 'errors', 'currentUserId', 'topContributions', 'totalPages', 'page'), 'templateLogin');
