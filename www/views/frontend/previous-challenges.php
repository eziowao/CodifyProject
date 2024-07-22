<?php

ob_start()
?>

<nav class="navbar navbar-expand-lg navbar-light my-4">
    <div class="container">
        <a class="navbar-brand" href="?page=home">
            <img src="./public/assets/img/logo_v2.png" alt="Logo" height="40">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon custom-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav text-center ml-auto justify-content-center justify-content-lg-end ms-auto">
                <li class="nav-item">
                    <a class="nav-link text-light" href="?page=weekly-challenge">Challenge de la semaine</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="?page=previous-challenges">Challenges précédents</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="?page=rankings">Classements</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {user-name}
                    </a>
                    <ul class="dropdown-menu bg-dark-grey">
                        <li><a class="dropdown-item text-light text-center" href="?page=profile">Mon
                                profil</a>
                        </li>
                        <li><a class="dropdown-item text-light text-center" href="./index.php">Déconnexion</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<?php
$navbar = ob_get_clean();


ob_start()
?>

<main class="my-5">
    <div class="container">
        <div class="row">
            <h1 class="m-0 fs-4 py-4 text-center text-light">Challenges précédents</h1>
        </div>
        <div class="row h-50 py-3">
            <div class="d-flex justify-content-center">
                <img src="./public/assets/img/netflix.png" class="col-10 col-md-8 img-fluid" alt="">
            </div>
        </div>
        <div class="row h-50 py-3">
            <div class="d-flex justify-content-center">
                <img src="./public/assets/img/apple.png" class="col-10 col-md-8 img-fluid" alt="">
            </div>
        </div>
    </div>
</main>

<?php
$main = ob_get_clean()
?>