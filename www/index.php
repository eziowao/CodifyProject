<?php

require_once './config/db-config.php';
require_once './models/Database.php';

// exemple de rent my ride 
require_once './models/BaseModel.php';
require_once './models/Category.php';
require_once './models/Vehicle.php';
require_once './models/Client.php';
require_once './models/Rent.php';

require_once './models/User.php';
require_once './models/Challenge.php';

// helpers
require_once './helpers/http_helper.php';

// Import des controleurs 

$page = $_GET['page'] ?? '';

$page = filter_var($page, FILTER_SANITIZE_SPECIAL_CHARS);

$path = match ($page) {

    // frontend 
    '' => 'home',
    'home' => 'frontend/connected-home',
    'weekly-challenge' => 'frontend/weekly-challenge',
    'previous-challenges' => 'frontend/previous-challenges',
    'rankings' => 'frontend/rankings',
    'profile' => 'frontend/profile',

    // admin 

    // gestion membres
    'admin' => 'admin/logs/login',
    'logout' => 'admin/logs/logout',
    'admin/dashboard/users/list' => 'admin/dashboard/users/list',
    'admin/dashboard/users/update' => 'admin/dashboard/users/update',
    'admin/dashboard/users/delete' => 'admin/dashboard/users/delete',

    // gestion challenges
    'admin/dashboard/challenges/list' => 'admin/dashboard/challenges/list',
    'admin/dashboard/challenges/add' => 'admin/dashboard/challenges/add',


    'categories/list' => 'dashboard/categories/list',
    'categories/add' => 'dashboard/categories/add',
    'categories/update' => 'dashboard/categories/update',
    'categories/delete' => 'dashboard/categories/delete',
    'vehicles/list' => 'dashboard/vehicles/list',
    'vehicles/add' => 'dashboard/vehicles/add',
    'vehicles/update' => 'dashboard/vehicles/update',
    'vehicles/delete' => 'dashboard/vehicles/delete',
    'vehicles/vehicle' => 'dashboard/vehicles/vehicle',
    default => '404',
};

// Router

require_once './controllers/' . $path . '-ctrl.php';

die;
