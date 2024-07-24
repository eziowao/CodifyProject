<?php

session_start();

if (isset($_POST['valider'])) {
    if (!empty($_POST['pseudo']) and !empty($_POST['password'])) {

        $pseudoAdmin = 'admin';
        $passwordAdmin = 'test';

        $pseudoEntered = htmlspecialchars($_POST['pseudo']);
        $passwordEntered = htmlspecialchars($_POST['password']);

        if ($pseudoEntered == $pseudoAdmin and $passwordEntered == $passwordAdmin) {
            $_SESSION['password'] = $pseudoEntered;
            redirectToRoute('?page=admin/dashboard/challenges/list');
        } else {
            echo 'Identifiants incorrects';
        }
    } else {
        echo 'Veuillez compléter tous les champs';
    }
}


$title = "Espace administrateur";
renderView('admin/logs/login', compact('title'), 'templateAdminLogout');
