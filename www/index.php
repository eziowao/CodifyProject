<?php

require_once './config/db-config.php';
require_once './models/Database.php';
require_once './models/BaseModel.php';

require_once './models/User.php';
require_once './models/Challenge.php';
require_once './models/Type.php';
require_once './models/Contribution.php';
require_once './models/Like.php';

// helpers
require_once './helpers/http_helper.php';

// démarrage session
session_start();

// Import des controleurs 
$page = $_GET['page'] ?? '';

$page = filter_var($page, FILTER_SANITIZE_SPECIAL_CHARS);

// $path = match ($page) {

//     // frontend 
//     '' => 'home',
//     'home' => 'frontend/connected-home',
//     'weekly-challenge' => 'frontend/weekly-challenge',
//     'previous-challenges' => 'frontend/previous-challenges',
//     'rankings' => 'frontend/rankings',
//     'profile' => 'frontend/profile',
//     'previous-challenges/challenge' => 'frontend/challenge',

//     // admin 
//     'admin' => 'admin/logs/login',
//     'logout' => 'admin/logs/logout',

//     // users logs 
//     'signIn' => 'users/signIn',
//     'signUp' => 'users/signUp',

//     // gestion membres
//     'admin/dashboard/users/add' => 'admin/dashboard/users/add',
//     'admin/dashboard/users/list' => 'admin/dashboard/users/list',
//     'admin/dashboard/users/update' => 'admin/dashboard/users/update',
//     'admin/dashboard/users/delete' => 'admin/dashboard/users/delete',

//     // gestion challenges
//     'admin/dashboard/challenges/list' => 'admin/dashboard/challenges/list',
//     'admin/dashboard/challenges/add' => 'admin/dashboard/challenges/add',
//     'admin/dashboard/challenges/update' => 'admin/dashboard/challenges/update',
//     'admin/dashboard/challenges/delete' => 'admin/dashboard/challenges/delete',

//     // gestion types 
//     'admin/dashboard/types/list' => 'admin/dashboard/types/list',
//     'admin/dashboard/types/add' => 'admin/dashboard/types/add',
//     'admin/dashboard/types/update' => 'admin/dashboard/types/update',
//     'admin/dashboard/types/delete' => 'admin/dashboard/types/delete',

//     // gestion contributions 
//     'admin/dashboard/contributions/list' => 'admin/dashboard/contributions/list',
//     'admin/dashboard/contributions/add' => 'admin/dashboard/contributions/add',
//     'admin/dashboard/contributions/update' => 'admin/dashboard/contributions/update',
//     'admin/dashboard/contributions/delete' => 'admin/dashboard/contributions/delete',

//     default => '404',
// };

$pathPublic = match ($page) {
    '', 'home' => 'home',

    // users logs 
    'signIn' => 'users/signIn',
    'signUp' => 'users/signUp',
    'logout' => 'users/signOut',

    default => '404'
};

$pathUser = match ($page) {

    // logs
    'logout' => 'users/signOut',

    // frontend
    '', 'home' => 'home',
    'weekly-challenge' => 'frontend/weekly-challenge',
    'previous-challenges' => 'frontend/previous-challenges',
    'rankings' => 'frontend/rankings',
    'user' => 'frontend/users-profile',
    'previous-challenges/challenge' => 'frontend/challenge',
    'profile' => 'frontend/profile',
    'profile/delete' => 'frontend/profile',
    'profile/update' => 'frontend/profile',
    'profile/contribution' => 'frontend/edit-contribution',

    default => '404'
};

$pathAdmin = match ($page) {

    // frontend
    '', 'home' => 'home',
    'weekly-challenge' => 'frontend/weekly-challenge',
    'previous-challenges' => 'frontend/previous-challenges',
    'rankings' => 'frontend/rankings',
    'user' => 'frontend/users-profile',
    'previous-challenges/challenge' => 'frontend/challenge',
    'profile' => 'frontend/profile',
    'profile/delete' => 'frontend/profile',
    'profile/update' => 'frontend/profile',
    'profile/contribution' => 'frontend/edit-contribution',

    // logs
    'logout' => 'users/signOut',

    // gestion membres
    'admin/dashboard/users/add' => 'admin/dashboard/users/add',
    'admin/dashboard/users/list' => 'admin/dashboard/users/list',
    'admin/dashboard/users/update' => 'admin/dashboard/users/update',
    'admin/dashboard/users/delete' => 'admin/dashboard/users/delete',

    // gestion challenges
    'admin/dashboard/challenges/list' => 'admin/dashboard/challenges/list',
    'admin/dashboard/challenges/add' => 'admin/dashboard/challenges/add',
    'admin/dashboard/challenges/update' => 'admin/dashboard/challenges/update',
    'admin/dashboard/challenges/delete' => 'admin/dashboard/challenges/delete',

    // gestion types 
    'admin/dashboard/types/list' => 'admin/dashboard/types/list',
    'admin/dashboard/types/add' => 'admin/dashboard/types/add',
    'admin/dashboard/types/update' => 'admin/dashboard/types/update',
    'admin/dashboard/types/delete' => 'admin/dashboard/types/delete',

    // gestion contributions 
    'admin/dashboard/contributions/list' => 'admin/dashboard/contributions/list',
    'admin/dashboard/contributions/add' => 'admin/dashboard/contributions/add',
    'admin/dashboard/contributions/update' => 'admin/dashboard/contributions/update',
    'admin/dashboard/contributions/delete' => 'admin/dashboard/contributions/delete',


    default => '404'
};

if (User::isAdmin()) {
    $path = $pathAdmin;
} elseif (User::isUser()) {
    $path = $pathUser;
} else {
    $path = $pathPublic;
}

// Router

require_once './controllers/' . $path . '-ctrl.php';
