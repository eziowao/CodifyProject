<?php

$typeModel = new Type();
$types = [];
$errors = [];

try {
    $types = $typeModel->getAllTypes();
} catch (\PDOException $ex) {
    echo sprintf('Erreur lors de la récupération des types : %s', $ex->getMessage());
} catch (\Exception $ex) {
    echo sprintf('Une erreur est survenue : %s', $ex->getMessage());
}

if (isset($_GET['id'])) {
    $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
    $challengeModel = new Challenge();
    $challenge = $challengeModel->getChallengeById($id);

    if ($id === false) {
        echo 'ID invalide.';
        exit;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        try {
            // name
            $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
            if (empty($name)) {
                $errors['name'] = 'Le nom du challenge est requis.';
            } elseif (strlen($name) > 100) {
                $errors['type'] = 'Le nom du challenge ne doit pas dépasser 100 caractères.';
            }

            // description
            $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS);
            if (empty($description)) {
                $errors['description'] = 'La description du challenge est requise.';
            }

            // image
            $picture = $_FILES['picture'] ?? null;
            if ($picture && $picture['error'] === UPLOAD_ERR_OK) {
                $uploadDir = __DIR__ . '/../../../../public/uploads/challenges/';
                $tmp_name = $picture['tmp_name'];
                $fileName = uniqid() . '.' . strtolower(pathinfo($picture['name'], PATHINFO_EXTENSION));

                $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
                $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
                if (!in_array($fileExtension, $allowedExtensions)) {
                    $errors['picture'] = 'Format de fichier non autorisé.';
                }

                if ($picture['size'] > 2 * 1024 * 1024) {
                    $errors['picture'] = 'Le fichier est trop volumineux.';
                }

                if (empty($errors)) {
                    $oldImage = $challenge['picture'] ?? null;
                    if ($oldImage) {
                        $oldImagePath = $uploadDir . $oldImage;
                        if (file_exists($oldImagePath)) {
                            unlink($oldImagePath);
                        }
                    }

                    move_uploaded_file($tmp_name, $uploadDir . $fileName);
                    $picture = $fileName;
                } else {
                    $picture = $challenge['picture'] ?? null;
                }
            } else {
                $picture = $challenge['picture'] ?? null;
            }

            // url 
            $file_url = filter_input(INPUT_POST, 'file_url', FILTER_SANITIZE_URL);
            if (empty($file_url)) {
                $errors['file_url'] = 'L\'url du challenge est requise.';
            } elseif ($file_url && !preg_match('/^https:\/\/www\.figma\.com\/.+$/', $file_url)) {
                $errors['file_url'] = 'L\'URL de la maquette doit commencer par https://www.figma.com/';
            }

            // date
            $published_at = filter_input(INPUT_POST, 'published_at', FILTER_SANITIZE_SPECIAL_CHARS);
            $published_at = new DateTime($published_at);
            if ($published_at->format('N') != 1) {
                $errors['published_at'] = 'La date de publication doit être un lundi.';
            }

            // type de challenge
            $type_id = filter_input(INPUT_POST, 'type_id', FILTER_VALIDATE_INT);
            $valid_type_ids = array_column($types, 'type_id');
            if ($type_id === false || $type_id <= 0 || !in_array($type_id, $valid_type_ids)) {
                $errors['type_id'] = 'Type de challenge invalide.';
            }

            if (empty($errors)) {
                $challengeModel->setChallengeId($id)
                    ->setName($name)
                    ->setPublished_at($published_at)
                    ->setDescription($description)
                    ->setType_id($type_id)
                    ->setFile_url($file_url)
                    ->setPicture($picture);
                $challengeModel->updateChallenge();
                addFlash('success', 'Challenge mis à jour avec succès !');
                redirectToRoute('/?page=admin/dashboard/challenges/list');
            }
        } catch (\PDOException $ex) {
            echo sprintf('La mise à jour du challenge a échoué avec le message %s', $ex->getMessage());
        } catch (\Exception $ex) {
            echo sprintf('Une erreur est survenue : %s', $ex->getMessage());
        }
    }
}

$title = "Modifier le challenge";

renderView('admin/dashboard/challenges/update', compact('title', 'challenge', 'types', 'errors'), 'templateAdminLogin');
