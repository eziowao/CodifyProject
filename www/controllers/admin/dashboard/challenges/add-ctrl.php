<?php

// pour récupérer les types de challenges 

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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

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
        if (isset($_FILES['picture']) && $_FILES['picture']['error'] == UPLOAD_ERR_OK) {
            $uploadDir = __DIR__ . '/../../../../public/uploads/challenges/';
            $tmp_name = $_FILES['picture']['tmp_name'];
            $fileName = uniqid() . '.' . strtolower(pathinfo($_FILES['picture']['name'], PATHINFO_EXTENSION));

            // Validation de l'extension et de la taille du fichier
            $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
            $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
            if (!in_array($fileExtension, $allowedExtensions)) {
                $errors['picture'] = 'Format de fichier non autorisé.';
            }

            // vérification que le fichier ne dépasse pas 2 Mo
            if ($_FILES['picture']['size'] > 2 * 1024 * 1024) {
                $errors['picture'] = 'Le fichier est trop volumineux.';
            }

            if (empty($errors)) {
                move_uploaded_file($tmp_name, $uploadDir . $fileName);
            }
        } else {
            $errors['picture'] = 'L\'image est requise.';
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
        if ($published_at->format('N') != 1) { // Vérifie si c'est un lundi
            $errors['published_at'] = 'La date de publication doit être un lundi.';
        }

        // type de challenge
        $type_id = filter_input(INPUT_POST, 'type_id', FILTER_VALIDATE_INT);
        $valid_type_ids = array_column($types, 'type_id');
        if ($type_id === false || $type_id <= 0 || !in_array($type_id, $valid_type_ids)) {
            $errors['type_id'] = 'Type de challenge invalide.';
        }

        if (empty($errors)) {
            $challengeModel = new Challenge(
                name: $name,
                published_at: $published_at,
                description: $description,
                type_id: $type_id,
                file_url: $file_url,
                picture: $fileName ?? null
            );
            $challengeModel->addChallenge();
            redirectToRoute('/?page=admin/dashboard/challenges/list');
        }
    } catch (\PDOException $ex) {
        echo sprintf('La création du challenge a échoué avec le message %s', $ex->getMessage());
    } catch (\Exception $ex) {
        echo sprintf('Une erreur est survenue : %s', $ex->getMessage());
    }
}

$title = "Créer un challenge";

renderView('admin/dashboard/challenges/add', compact('title', 'types', 'errors'), 'templateAdminLogin');
