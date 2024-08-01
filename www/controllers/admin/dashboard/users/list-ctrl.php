<?php

try {
    $userModel = new User();
    $users = $userModel->getAllUsers();
} catch (\PDOException $ex) {
    echo sprintf('la récupération des catégories a échoué avec le message %s', $ex->getMessage());
    //throw $th;
}

$title = "Liste des utilisateurs";
renderView('admin/dashboard/users/list', compact('title', 'users'), 'templateAdminLogin');
