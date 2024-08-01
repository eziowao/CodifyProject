<?php

$success = false;

try {
    $challengeModel = new Challenge();
    $challenges = $challengeModel->getAllChallenges();

    $typeModel = new Type();
    $types = $typeModel->getAllTypes();
    $typesById = [];
    foreach ($types as $type) {
        $typesById[$type->type_id] = $type->type;
    }
} catch (\PDOException $ex) {
    echo sprintf('La récupération des catégories a échoué avec le message %s', $ex->getMessage());
    //throw $th;
}


$title = "Challenges précédents";

renderView('frontend/previous-challenges', compact('title', 'challenges', 'typesById'), 'templateLogin');
