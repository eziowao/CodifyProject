<?php

$errors = [];
$success = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    try {

        $pseudo = $_POST['pseudo'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $userModel = new User(
            pseudo: $pseudo,
            email: $email,
            password: $password
        );
        $userModel->addUser();
        $success = true;
    } catch (\PDOException $ex) {
        echo sprintf('la création a échoué avec le message %s', $ex->getMessage());
    }
}

$title = "Créer un utilisateur";

renderView('admin/dashboard/users/add', compact('title', 'success'), 'templateAdminLogin');
