<?php

$usersPerPage = 10;
$page = isset($_GET['page_num']) ? (int)$_GET['page_num'] : 1;
$offset = ($page - 1) * $usersPerPage;

$orderBy = $_GET['order_by'] ?? 'user_id';
$direction = $_GET['direction'] ?? 'DESC';

$search = $_GET['search'] ?? null;

try {
    $userModel = new User();

    if ($search) {
        $totalUsers = $userModel->getUsersCount($search);
        $users = $userModel->searchUsers($search, $orderBy, $direction, $usersPerPage, $offset);
    } else {
        $totalUsers = $userModel->getUsersCount();
        $users = $userModel->getAllUsers($orderBy, $direction, $usersPerPage, $offset);
    }
} catch (\PDOException $ex) {
    echo sprintf('La récupération des utilisateurs a échoué avec le message %s', $ex->getMessage());
}

$totalPages = ceil($totalUsers / $usersPerPage);

$title = "Liste des utilisateurs";
renderView('admin/dashboard/users/list', compact('title', 'users', 'orderBy', 'direction', 'page', 'totalPages', 'search'), 'templateAdminLogin');
