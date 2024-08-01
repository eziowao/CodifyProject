<?php

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
}
$title = "Challenge";

renderView('frontend/challenge', compact('title', 'challenge', 'typesById'), 'templateLogin');
