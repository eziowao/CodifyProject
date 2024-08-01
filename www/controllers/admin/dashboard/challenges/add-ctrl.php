<?php

// pour récupérer les types de challenges 

$typeModel = new Type();
$types = $typeModel->getAllTypes();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    try {
        if ($_FILES['picture']) {
            $uploadDir = __DIR__ . '/../../../../public/uploads/challenges/';
            $tmp_name = $_FILES['picture']['tmp_name'];
            $fileName = uniqid() . '.' . explode('/', $_FILES['picture']['type'])[1];
            move_uploaded_file($tmp_name, $uploadDir . $fileName);
            // Récupérer les données du formulaire
            $name = $_POST['name'];
            $published_at = new DateTime($_POST['published_at']);
            $description = $_POST['description'];
            $type_id = $_POST['type_id'];
            // $user_id = $_POST['user_id'];
            $file_url = $_POST['file_url'];
            $picture = $fileName;

            $challengeModel = new Challenge(
                name: $name,
                published_at: $published_at,
                description: $description,
                type_id: $type_id,
                // user_id: $user_id,
                file_url: $file_url,
                picture: $picture
            );
            $challengeModel->addChallenge();
        }
    } catch (\PDOException $ex) {
        echo sprintf('La création du challenge a échoué avec le message %s', $ex->getMessage());
    } catch (\Exception $ex) {
        echo sprintf('Une erreur est survenue : %s', $ex->getMessage());
    }
}

$title = "Créer un challenge";

renderView('admin/dashboard/challenges/add', compact('title', 'types'), 'templateAdminLogin');
