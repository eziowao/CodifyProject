<?php

$errors = [];
$success = false;
$typeModel = new Type();
$types = [];

try {
    $types = $typeModel->getAllTypes();
} catch (\PDOException $ex) {
    echo sprintf('Erreur lors de la récupération des types : %s', $ex->getMessage());
} catch (\Exception $ex) {
    echo sprintf('Une erreur est survenue : %s', $ex->getMessage());
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $challengeModel = new Challenge();
    $challenge = $challengeModel->getChallengeById($id);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Récupérer les données du formulaire
        $name = $_POST['name'];
        $published_at = new DateTime($_POST['published_at']);
        $description = $_POST['description'];
        $type_id = $_POST['type_id'];
        // $user_id = $_POST['user_id'];
        $file_url = $_POST['file_url'];
        $picture = $_FILES['picture'] ?? null;

        // Traitement de l'image
        if ($picture && $picture['error'] === UPLOAD_ERR_OK) { // vérifie que le téléchargement est ok 
            $uploadDir = __DIR__ . '/../../../../public/uploads/challenges/';
            $tmp_name = $picture['tmp_name']; // chemin temporaire 
            $oldImage = $challenge['picture'] ?? null; // correction ici

            if ($oldImage) {
                $oldImagePath = $uploadDir . $oldImage;
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath); // supprime l'ancienne image 
                }
            }

            $fileExtension = pathinfo($picture['name'], PATHINFO_EXTENSION);
            $fileName = uniqid() . '.' . $fileExtension;
            move_uploaded_file($tmp_name, $uploadDir . $fileName); //  déplace le fichier téléchargé du répertoire temporaire vers le répertoire de destination
            $picture = $fileName;
        } else {
            $picture = $challenge['picture'] ?? null; // garde l'ancienne image si aucune nouvelle image n'est envoyée
        }

        $challengeModel->setChallengeId($id)
            ->setName($name)
            ->setPublished_at($published_at)
            ->setDescription($description)
            ->setType_id($type_id)
            ->setFile_url($file_url)
            ->setPicture($picture);

        if ($challengeModel->updateChallenge()) {
            $success = true;
            header('Location: ?page=admin/dashboard/challenges/list');
            exit;
        }
    }
}

$title = "Modifier le challenge";

renderView('admin/dashboard/challenges/update', compact('title', 'challenge', 'types'), 'templateAdminLogin');
