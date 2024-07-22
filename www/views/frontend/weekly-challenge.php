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
    <!-- -------------------------------- hero -------------------------------- -->

    <div class="container">
        <div class="row">
            <h1 class="m-0 fs-4 py-4 text-center text-light">Home Page Airbnb</h1>
        </div>
        <div class="row h-50">
            <div class="d-flex justify-content-center">
                <img src="./public/assets/img/both-airbnb.png" class="col-10 col-md-8 img-fluid" alt="">
            </div>
        </div>
        <div class="row py-4 d-flex justify-content-center">
            <button class="col-7 col-md-5 col-lg-3 bg-green text-light border-0 rounded-5 p-2"> Télécharger le
                projet
            </button>
        </div>
        <div class="row">
            <h2 class="m-0 fs-4 pt-5 pb-4 text-center text-light">Projets délivrés</h2>
        </div>
        <div class="d-flex justify-content-center">

            <div class="row d-flex justify-content-center">
                <div class="col-11 col-md-5 py-3">
                    <div class="card mb-3 bg-dark-grey text-light">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="..." class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">Pseudo</h5>
                                    <p class="card-text">Projet link</p>
                                    <p class="card-text">Message about the projet realization</p>
                                    <p class="card-text text-end"><img src="./public/assets/img/logo_like 2.png" alt=""></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-11 col-md-5 py-3">
                    <div class="card mb-3 bg-dark-grey text-light">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="" class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">Pseudo</h5>
                                    <p class="card-text">Projet link</p>
                                    <p class="card-text">Message about the projet realization</p>
                                    <p class="card-text text-end"><img src="./public/assets/img/logo_like 2.png" alt=""></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-11 col-md-5 py-3">
                    <div class="card mb-3 bg-dark-grey text-light">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="..." class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">Pseudo</h5>
                                    <p class="card-text">Projet link</p>
                                    <p class="card-text">Message about the projet realization</p>
                                    <p class="card-text text-end"><img src="./public/assets/img/logo_like 2.png" alt=""></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row py-4 d-flex justify-content-center">
            <button class="col-7 col-md-5 p-2 col-lg-3 bg-green text-light border-0 rounded-5"> Ajouter ma contribution</button>
        </div>
    </div>
</main>

<?php
$main = ob_get_clean()
?>