<?php

$errors = [];

$email = null;
$password = null;
$confirmPassword = null;


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        // extract($_POST);
        // $email = filter_var($email, FILTER_VALIDATE_EMAIL);

        $pseudo = filter_input(INPUT_POST, 'pseudo', FILTER_SANITIZE_SPECIAL_CHARS);
        if (!$pseudo) {
            $errors['pseudo'] = 'pseudo invalide';
        }


        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        if (!$email) {
            $errors['email'] = 'Email invalide';
        }

        $password = filter_input(INPUT_POST, 'password');
        if (!$password) {
            $errors['password'] = 'Mot de passe requis';
        } elseif (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', $_POST['password'])) {
            $errors['password'] = 'Mot de passe non valide';
        }

        $confirmPassword = filter_input(INPUT_POST, 'confirmPassword');
        if (!$confirmPassword) {
            $errors['password'] = 'Mot de passe requis';
        }

        if ($password != $confirmPassword) {
            $errors['password'] = 'Les mots de passe doivent être identiques';
        }

        if (!$errors) {
            $password = password_hash($password, PASSWORD_DEFAULT);

            $userModel = new User(
                pseudo: $pseudo,
                email: $email,
                password: $password
            );
            $userModel->addUser();
            redirectToRoute('?page=home');
        }
    } catch (\PDOException $ex) {
        var_dump($ex);
    }
}

$title = 'Inscription';

renderView('users/signUp', compact('title', 'errors'), 'templateAdminLogout');
