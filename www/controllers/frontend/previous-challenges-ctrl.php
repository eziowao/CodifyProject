<?php

$filteredChallenges = [];

$limit = 10;
$page = isset($_GET['page_num']) ? (int)$_GET['page_num'] : 1;
$offset = ($page - 1) * $limit;

try {

    $challengeModel = new Challenge();
    $currentChallenge = $challengeModel->getCurrentChallenge();

    $allChallenges = $challengeModel->getPaginatedChallenges($limit, $offset);

    $totalChallenges = $challengeModel->countChallenges();
    $totalPages = ceil($totalChallenges / $limit);

    $now = new DateTime();

    $filteredChallenges = array_filter($allChallenges, function ($challenge) use ($currentChallenge, $now) {
        $publishedAt = new DateTime($challenge->published_at);
        return $challenge->challenge_id !== $currentChallenge['challenge_id'] && $publishedAt <= $now;
    });

    $typeModel = new Type();
    $types = $typeModel->getAllTypes();
    $typesById = [];
    foreach ($types as $type) {
        $typesById[$type->type_id] = $type->type;
    }
} catch (\PDOException $ex) {
    echo sprintf('La récupération des données a échoué avec le message : %s', $ex->getMessage());
}

$title = "Challenges Précédents";
renderView('frontend/previous-challenges', compact('title', 'typesById', 'filteredChallenges', 'page', 'totalPages'), 'templateLogin');
