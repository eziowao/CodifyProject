<?php

if (!isset($_SESSION['user'])) {
    redirectToRoute('/');
    exit();
}

$current_user = $_SESSION['user'];
$user_id = $current_user->user_id;

if (isset($_GET['page']) && $_GET['page'] === 'profile/deleteAccount' && isset($_GET['id'])) {
    $id = (int) $_GET['id'];

    if ($id === $user_id) {
        try {
            $userModel = new User();
            $userModel->setUserId($user_id);

            if ($userModel->deleteUser()) {
                session_destroy();
                addFlash('success', 'Compte supprimé avec succès !');
                redirectToRoute('/');
            }
        } catch (\Exception $ex) {
            sprintf('Une erreur est survenue : %s', $ex->getMessage());
        }
    } else {
        redirectToRoute('/');
    }

    redirectToRoute('/?page=admin/dashboard/types/list');
    exit();
}
