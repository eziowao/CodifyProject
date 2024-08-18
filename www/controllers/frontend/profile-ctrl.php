<?php

$errors = [];

try {
    // recupération des infos user pour l'affichage 
    $current_user = $_SESSION['user'];
    $user_id = $current_user->user_id;

    // affichage des contributions
    $contribution = new Contribution();
    $contributions = $contribution->getContributionsWithChallengeByUserId($user_id);
    $contributionCount = count($contributions);

    // Suppression des contributions
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $contributionModel = new Contribution();
        $contributionModel->setContributionId($id);

        $user_id = $_SESSION['user']->user_id;

        if ($contributionModel->isOwnedByUser($user_id)) {
            if ($contributionModel->deleteContribution()) {
                redirectToRoute('?page=profile');
            } else {
                $errors[] = "Erreur lors de la suppression de la contribution.";
            }
        } else {
            $errors[] = "Vous n'êtes pas autorisé à supprimer cette contribution.";
        }
    }

    $user = new User();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $pseudo = filter_input(INPUT_POST, 'pseudo', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($pseudo)) {
            $errors['pseudo'] = "Le pseudo est obligatoire!";
        } elseif (!preg_match('/^[a-zA-Z0-9_-]{3,20}$/', $pseudo)) {
            $errors['pseudo'] = 'Pseudo invalide. Il doit contenir entre 3 et 20 caractères, et peut inclure des lettres, des chiffres, des tirets et underscores.';
        }

        $biography = filter_input(INPUT_POST, 'biography', FILTER_SANITIZE_SPECIAL_CHARS);

        $website = filter_input(INPUT_POST, 'website', FILTER_SANITIZE_URL);

        $github = filter_input(INPUT_POST, 'github', FILTER_SANITIZE_URL);

        if (!empty($github) && !preg_match('/^https:\/\/github\.com\//', $github)) {
            $errors['github'] = "L'URL GitHub doit commencer par 'https://github.com/'.";
        }

        $twitter = filter_input(INPUT_POST, 'twitter', FILTER_SANITIZE_URL);
        if (!empty($twitter) && !preg_match('/^https:\/\/x\.com\//', $twitter)) {
            $errors['twitter'] = "L'URL Twitter doit commencer par 'https://x.com/'.";
        }

        $linkedin = filter_input(INPUT_POST, 'linkedin', FILTER_SANITIZE_URL);
        if (!empty($linkedin) && !preg_match('/^https:\/\/www\.linkedin\.com\//', $linkedin)) {
            $errors['linkedin'] = "L'URL LinkedIn doit commencer par 'https://www.linkedin.com/'.";
        }

        $discord = filter_input(INPUT_POST, 'discord', FILTER_SANITIZE_URL);

        //picture 
        if (isset($_FILES['picture']) && $_FILES['picture']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = __DIR__ . '/../../public/uploads/users/';
            $picture = $_FILES['picture'];
            $tmp_name = $picture['tmp_name'];
            $oldImage = $current_user->picture ?? null;

            $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
            $fileExtension = strtolower(pathinfo($picture['name'], PATHINFO_EXTENSION));
            if (!in_array($fileExtension, $allowedExtensions)) {
                $errors['picture'] = 'Format de fichier non autorisé. Les formats acceptés sont : jpg, jpeg, png, gif.';
            }

            if ($picture['size'] > 2 * 1024 * 1024) {
                $errors['picture'] = 'Le fichier est trop volumineux. La taille maximale autorisée est de 2 Mo.';
            }

            if (empty($errors)) {
                if ($oldImage) {
                    $oldImagePath = $uploadDir . $oldImage;
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }

                $fileName = uniqid() . '.' . $fileExtension;
                if (move_uploaded_file($tmp_name, $uploadDir . $fileName)) {
                    $user->setPicture($fileName);
                } else {
                    $errors['picture'] = "Échec du téléchargement de l'image.";
                }
            }
        } else {
            $user->setPicture($current_user->picture);
        }

        if (empty($errors)) {
            $user->setUserId($user_id)
                ->setPseudo($pseudo)
                ->setBiography($biography)
                ->setWebsite($website)
                ->setGithub($github)
                ->setTwitter($twitter)
                ->setLinkedin($linkedin)
                ->setDiscord($discord)
                ->setEmail($current_user->email);

            if ($user->updateUser()) {
                $_SESSION['user'] = (object) array_merge((array) $_SESSION['user'], [
                    'pseudo' => $user->getPseudo(),
                    'biography' => $user->getBiography(),
                    'website' => $user->getWebsite(),
                    'github' => $user->getGithub(),
                    'twitter' => $user->getTwitter(),
                    'linkedin' => $user->getLinkedin(),
                    'discord' => $user->getDiscord(),
                    'picture' => $user->getPicture(),
                    'email' => $user->getEmail(),
                ]);

                redirectToRoute('/?page=profile');
                exit;
            } else {
                $errorMessage = "La mise à jour des informations a échoué.";
                throw new Exception($errorMessage);
            }
        }
    }
} catch (\PDOException $ex) {
    echo sprintf('La récupération des informations a échoué avec le message : %s', $ex->getMessage());
} catch (\Exception $ex) {
    echo sprintf('Une erreur est survenue : %s', $ex->getMessage());
}

$title = "Profil perso";

renderView('frontend/profile', compact('title', 'contribution', 'contributions', 'errors', 'contributionCount'), 'templateLogin');
