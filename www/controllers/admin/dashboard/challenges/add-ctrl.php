<?php

session_start();

if (!isset($_SESSION['password']) || empty($_SESSION['password'])) {
    header('Location: ?page=admin');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $uploadDir = __DIR__ . '/../../../../public/uploads/challenges/';

        // Gérer l'upload de l'image
        if (isset($_FILES['picture']) && $_FILES['picture']['error'] == UPLOAD_ERR_OK) {
            $tmp_name = $_FILES['picture']['tmp_name'];
            $fileName = uniqid() . '.' . pathinfo($_FILES['picture']['name'], PATHINFO_EXTENSION);
            move_uploaded_file($tmp_name, $uploadDir . $fileName);
            $picture = $fileName;
        } else {
            $picture = null;
        }

        // Gérer l'upload du fichier
        if (isset($_FILES['file_url']) && $_FILES['file_url']['error'] == UPLOAD_ERR_OK) {
            $fileTmpName = $_FILES['file_url']['tmp_name'];
            $originalFileName = basename($_FILES['file_url']['name']);
            $extension = pathinfo($originalFileName, PATHINFO_EXTENSION);
            $fileUrl = uniqid() . '.' . $extension;
            move_uploaded_file($fileTmpName, $uploadDir . $fileUrl);
        } else {
            $fileUrl = null;
            $originalFileName = null;
        }

        // Récupérer les données du formulaire
        $name = $_POST['name'] ?? '';
        $published_at = new DateTime($_POST['published_at']);
        $description = $_POST['description'] ?? '';
        // $type_id = $_POST['type_id'];
        // $user_id = $_POST['user_id'];

        $challengeModel = new Challenge(
            name: $name,
            published_at: $published_at,
            description: $description,
            picture: $picture,
            file_url: $fileUrl,
            original_file_name: $originalFileName
            // type_id: $type_id,
            // user_id: $user_id,
        );
        $challengeModel->addChallenge();
    } catch (\PDOException $ex) {
        echo sprintf('la création du challenge a échoué avec le message %s', $ex->getMessage());
    }
}

$title = "Créer un challenge";

renderView('admin/dashboard/challenges/add', compact('title'), 'templateAdminLogin');
