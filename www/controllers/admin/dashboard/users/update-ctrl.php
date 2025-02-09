<?php

$errors = [];

if (isset($_GET['id'])) {
    $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
    $userModel = new User();
    $userModel->setUserId($id);
    $user = $userModel->getUserById($id);

    if (!$user) {
        $errors[] = "Utilisateur non trouvé.";
    }

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
        if ($picture && $picture['error'] === UPLOAD_ERR_OK) {
            $uploadDir = __DIR__ . '/../../../../public/uploads/users/';
            $tmp_name = $picture['tmp_name'];
            $oldImage = $user['picture'] ?? null;

            if ($oldImage) {
                $oldImagePath = $uploadDir . $oldImage;
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            $fileExtension = pathinfo($picture['name'], PATHINFO_EXTENSION);
            $fileName = uniqid() . '.' . $fileExtension;
            move_uploaded_file($tmp_name, $uploadDir . $fileName);
            $picture = $fileName;
        } else {
            $picture = $user['picture'] ?? null;
        }

        // Mise à jour des propriétés de l'utilisateur
        $userModel->setPseudo($pseudo)
            ->setEmail($email)
            ->setBiography($biography)
            ->setWebsite($website)
            ->setGithub($github)
            ->setTwitter($twitter)
            ->setLinkedin($linkedin)
            ->setDiscord($discord)
            ->setPicture($picture);

        if ($userModel->updateUser()) {
            addFlash('success', 'Utilisateur mis à jour avec succès !');
            redirectToRoute('/?page=admin/dashboard/users/list');
        } else {
            $errors[] = "Erreur lors de la mise à jour de l'utilisateur.";
        }
    }
}

$title = "Modifier l'utilisateur";
renderView('admin/dashboard/users/update', compact('title', 'user', 'errors'), 'templateAdminLogin');
