<?php

$errors = [];

$email = null;
$password = null;
$confirmPassword = null;
$pseudoPattern = '/^[a-zA-Z0-9_-]{3,15}$/';
$passwordPattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {

        // gestion pseudo 
        $pseudo = filter_input(INPUT_POST, 'pseudo', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($pseudo)) {
            $errors["pseudo"] = "Le pseudo est obligatoire!";
        } elseif (!preg_match($pseudoPattern, $pseudo)) {
            $errors['pseudo'] = 'Pseudo invalide. Il doit contenir entre 3 et 20 caractères, et peut inclure des lettres, des chiffres, des tirets et underscores.';
        }

        // gestion email 
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        if (empty($email)) {
            $errors["email"] = "L'adresse mail est obligatoire!";
        } else {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = 'Email invalide';
            } elseif (User::isMailExist($email)) {
                $errors['email'] = 'Ce mail est déjà attribué';
            }
        }

        // gestion password 
        $password = filter_input(INPUT_POST, 'password');
        if (!$password) {
            $errors['password'] = 'Mot de passe requis';
        } elseif (!preg_match($passwordPattern, $_POST['password'])) {
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
            $account = $userModel->addUser();
            $user = User::getUserByEmail($email);

            if ($account) {
                $_SESSION['user'] = $user;
                redirectToRoute('?page=home');
            }
        }
    } catch (\PDOException $ex) {
        var_dump($ex);
    }
}

$title = 'Inscription';

renderView('users/signUp', compact('title', 'errors'), 'templateLogin');
