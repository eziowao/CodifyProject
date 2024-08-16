<?php

$errors = [];

try {
    $contribution = new Contribution();

    $current_user = $_SESSION['user'];
    $user_id = $current_user->user_id;

    $contributions = $contribution->getContributionsWithChallengeByUserId($user_id);

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

        if (empty($errors)) {
            $user = new User();
            $user->setUserId($user_id)
                ->setPseudo($pseudo)
                ->setBiography($biography)
                ->setWebsite($website)
                ->setGithub($github)
                ->setTwitter($twitter)
                ->setLinkedin($linkedin)
                ->setDiscord($discord)
                ->setEmail($current_user->email);

            if (isset($_FILES['picture']) && $_FILES['picture']['error'] === UPLOAD_ERR_OK) {
                $uploadDir = __DIR__ . '/../../public/uploads/users/';
                $picture = $_FILES['picture'];
                $tmp_name = $picture['tmp_name'];
                $oldImage = $current_user->picture ?? null;

                if ($oldImage) {
                    $oldImagePath = $uploadDir . $oldImage;
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }

                $fileExtension = pathinfo($picture['name'], PATHINFO_EXTENSION);
                $fileName = uniqid() . '.' . $fileExtension;

                if (move_uploaded_file($tmp_name, $uploadDir . $fileName)) {
                    $user->setPicture($fileName);
                } else {
                    $errors['picture'] = "Échec du téléchargement de l'image.";
                }
            } else {
                $user->setPicture($current_user->picture);
            }

            if (empty($errors) && $user->updateUser()) {
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
                $errorMessage = !empty($errors) ? implode('<br>', $errors) : "La mise à jour des informations a échoué.";
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

renderView('frontend/profile', compact('title', 'contribution', 'contributions', 'errors'), 'templateLogin');
