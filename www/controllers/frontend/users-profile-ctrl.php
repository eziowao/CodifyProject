<?php

try {

    $current_user = $_SESSION['user'];
    $currentUserId = $current_user->user_id;

    if (isset($_GET['id'])) {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        $userModel = new User();
        $user = $userModel->getUserById($id);

        $contribution = new Contribution();
        $contributions = $contribution->getContributionsWithChallengeByUserId($id);
        $contributionCount = count($contributions);
    }

    // ajoute l'état du like pour chaque contribution
    $likeModel = new Like();
    foreach ($contributions as &$contribution) {
        $contribution->liked = $likeModel->hasUserLikedContribution($currentUserId, $contribution->contribution_id);
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
} catch (\PDOException $ex) {
    echo sprintf('La récupération des contributions a échoué avec le message : %s', $ex->getMessage());
}


$title = "Profil perso";

renderView('frontend/users-profile', compact('title', 'user', 'contributions', 'contributionCount', 'currentUserId'), 'templateLogin');
