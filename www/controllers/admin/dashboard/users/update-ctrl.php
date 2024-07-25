<?php

session_start();

if (!isset($_SESSION['password']) || empty($_SESSION['password'])) {
    header('Location: ?page=admin');
    exit;
}

$errors = [];
$success = false;

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $userModel = new User();
    $user = $userModel->getUserById($id);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $pseudo = $_POST['pseudo'] ?? null;
        $email = $_POST['email'] ?? null;
        $biography = $_POST['biography'] ?? null;
        $website = $_POST['website'] ?? null;
        $github = $_POST['github'] ?? null;
        $twitter = $_POST['twitter'] ?? null;
        $linkedin = $_POST['linkedin'] ?? null;
        $discord = $_POST['discord'] ?? null;
        $picture = $_FILES['picture'] ?? null;

        // Traitement de l'image
        if ($picture && $picture['error'] === UPLOAD_ERR_OK) { // vérifie que le téléchargement est ok 
            $uploadDir = __DIR__ . '/../../../../public/uploads/users/';
            $tmp_name = $picture['tmp_name']; // chemin temporaire 
            $oldImage = $user['picture'] ?? null;

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
            $picture = $user['picture'] ?? null; // garde l'ancienne image si aucune nouvelle image n'est envoyée
        }

        if ($userModel->updateUser($id, $pseudo, $email, $biography, $picture, $website, $github, $twitter, $linkedin, $discord)) {
            $success = true;
            redirectToRoute('?page=admin/dashboard/users/list');
        }
    }
}

$title = "Modifier l'utilisateur";

renderView('admin/dashboard/users/update', compact('title', 'user'), 'templateAdminLogin');
