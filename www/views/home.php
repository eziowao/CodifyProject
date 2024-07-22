<?php

ob_start()
?>

<nav class="navbar navbar-expand-lg navbar-light my-4">
    <div class="container">
        <a class="navbar-brand" href="/">
            <img src="./public/assets/img/logo_v2.png" alt="Logo" height="40">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon custom-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav text-center ml-auto justify-content-center justify-content-lg-end ms-auto">
                <li class="nav-item">
                    <a class="nav-link text-light" href="#" data-bs-toggle="modal" data-bs-target="#connexionModal">Inscription / Connexion</a>

                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Modal de connexion -->
<div class="modal fade" id="connexionModal" tabindex="-1" aria-labelledby="connexionModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content bg-dark-grey">
            <div class="modal-header border-0">
                <h5 class="modal-title text-light fw-bold my-3 col-11 d-flex justify-content-center" id="connexionModalLabel">Connexion</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="connexionForm">
                    <div class="mb-3">
                        <label for="emailConnexion" class="form-label text-white">Email</label>
                        <input type="email" class="form-control rounded-4 bg-dark-grey text-light" id="emailConnexion" required>
                    </div>
                    <div class="mb-3">
                        <label for="motDePasseConnexion" class="form-label text-white">Mot de passe</label>
                        <input type="password" class="form-control rounded-4 bg-dark-grey text-light" id="motDePasseConnexion" required>
                    </div>
                    <a class="text-white fs-16 d-flex justify-content-end text-decoration-none" href="#">Mot de
                        passe
                        oublié ?</a>
                    <div class="modal-footer text-center border-0">
                        <a href="?page=home" class="btn col- col-lg-4 bg-green text-light border-0 rounded-5 mx-auto">Connexion</a>
                    </div>
                </form>
                <p class="mt-3 text-white text-center fs-16">Vous n'avez pas de compte? <a href="#" class="text-decoration-none text-purple" id="inscriptionLink">Inscrivez-vous
                        ici</a>
                </p>
            </div>
        </div>
    </div>

</div>

<!-- Modal d'inscription -->
<div class="modal fade" id="inscriptionModal" tabindex="-1" aria-labelledby="inscriptionModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content bg-dark-grey">
            <div class="modal-header border-0">
                <h5 class="modal-title text-light fw-bold my-3 col-11 d-flex justify-content-center" id="inscriptionModalLabel">Inscription</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="inscriptionForm">
                    <div class="mb-3">
                        <label for="pseudo" class="form-label text-white">Pseudo</label>
                        <input type="text" class="form-control rounded-4 bg-dark-grey text-light" id="pseudo" required>
                    </div>
                    <div class="mb-3">
                        <label for="emailInscription" class="form-label text-white">Email</label>
                        <input type="email" class="form-control rounded-4 bg-dark-grey text-light" id="emailInscription" required>
                    </div>
                    <div class="mb-3">
                        <label for="motDePasseInscription" class="form-label text-white">Mot de passe</label>
                        <input type="password" class="form-control rounded-4 bg-dark-grey text-light" id="motDePasseInscription" required>
                    </div>
                    <div class="modal-footer text-center border-0">
                        <a href="?page=home" class="btn col- col-lg-4 bg-green text-light border-0 rounded-5 mx-auto">Inscription</a>
                    </div>
                </form>
            </div>
            <div class="modal-footer border-0">
                <p class="text-decoration-none fs-16 text-light">Déjà inscrit ? <a href="#" class="text-decoration-none text-purple" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#connexionModal">Connectez-vous
                        ici</a>
                </p>
            </div>
        </div>
    </div>
</div>

<?php
$navbar = ob_get_clean();

ob_start()
?>

<main class="my-5">
    <!-- -------------------------------- hero -------------------------------- -->

    <div class=" container my-4">
        <div class="row">
            <div class="col-12 col-md-7 text-light d-flex align-items-center">
                <h1 id="hero" class="fs-4 py-4 text-center text-lg-start"></h1>
            </div>
            <div class="col-12 col-md-5 d-flex justify-content-center justify-content-lg-end">
                <img src="./public/assets/img/blocs.png" class="img-fluid" alt="">
            </div>
        </div>
    </div>


    <!-- -------------------------------- cards -------------------------------- -->

    <div class="container my-5">
        <div class="row">
            <div>
                <img src="./public/assets/img/chevron-gauche.png" alt="">
            </div>
        </div>
        <div class="row my-3">
            <div class="col-lg-4 offset-lg-3">
                <div class="card bg-dark-grey w-100">
                    <div class="card-body">
                        <p class="card-text text-light text-center py-3"> 1. <span class="text-green">Inscrivez</span>
                            vous ou
                            <span class="text-green">connectez</span> vous
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row my-3">
            <div class="col-lg-4 offset-lg-8">
                <div class="card bg-dark-grey w-100">
                    <div class="card-body">
                        <p class="card-text text-light text-center py-3"> 2. <span class="text-green">Téléchargez</span>
                            le challenge de la
                            semaine </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row my-3">
            <div class="col-lg-4">
                <div class="card bg-dark-grey w-100">
                    <div class="card-body">
                        <p class="card-text text-light text-center py-3"> 3. <span class="text-green">Réalisez</span> le
                            challenge </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row my-3">
            <div class="col-lg-4 offset-lg-5">
                <div class="card bg-dark-grey w-100">
                    <div class="card-body">
                        <p class="card-text text-light text-center py-3"> 4. <span class="text-green">Partagez</span>
                            votre réalisation avec
                            l’ensemble
                            de la <span class="text-green">communauté</span> </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="d-flex justify-content-end">
                <img src="./public/assets/img/chevron-droit.png" alt="">
            </div>
        </div>
    </div>

    <!-- -------------------------------- weekly challenge -------------------------------- -->

    <div class="container">
        <div class="row">
            <div class="container col-12 col-md-5 my-5 d-flex align-items-center justify-content-center justify-content-lg-start">
                <div class="d-flex flex-column align-items-center">
                    <h2 class="col-12 text-light fs-4 text-center mb-4">Prochain challenge</h2>
                    <div>
                        <img src="./public/assets/img/decompte.png" class="img-fluid" alt="">
                    </div>
                </div>
            </div>
            <div class="container col-12 col-md-7 my-5">
                <h2 class="text-light fs-4 text-center mb-4 pb-4">Challenge de la semaine</h2>
                <div class="d-flex justify-content-end">
                    <img src="./public/assets/img/project_profile.png" class="img-fluid" halt="">
                </div>
            </div>
        </div>
    </div>

    <!-- -------------------------------- previous challenges -------------------------------- -->

    <div class="container">
        <div class="row">
            <div class="mt-5">
                <h2 class="text-light fs-4 text-center mb-4 pb-4">Challenges précédents</h2>
            </div>
            <div class="col-12 col-md-6 mb-5">
                <img src="./public/assets/img/fnac-home-desktop.png" class="img-fluid" alt="">

            </div>
            <div class="col-12 col-md-6 mb-5 d-flex justify-content-end">
                <img src="./public/assets/img/netflix-home-desktop.png" class="img-fluid" alt="">
            </div>

        </div>
    </div>

    <div class="container">
        <section class="text-light py-5">
            <div class="container bg-ultra-dark">
                <div class="row">
                    <div class="col-12 col-md-5">
                        <div class="d-flex flex-column justify-content-center h-100">
                            <div class="text-center">
                                <h2 class="fs-5 fw-semibold lh-sm">Une question ? On est là pour y répondre</h2>
                                <hr class="custom-hr mx-auto mb-5 mb-md-0">
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-7">
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item bg-ultra-dark text-light">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed bg-ultra-dark text-light rounded-4" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                        Qu'est-ce que Codify ?
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">

                                        <p class="text-justify">Codify est une plateforme en ligne destinée aux développeurs de tous
                                            niveaux qui propose des défis de codage hebdomadaires et favorise
                                            l'apprentissage collaboratif au sein d'une communauté dynamique.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item bg-ultra-dark text-light">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed bg-ultra-dark text-light rounded-4" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Comment puis-je participer aux défis sur Codify ?
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p class="text-justify">Pour participer aux défis sur Codify, vous devez d'abord vous inscrire
                                            sur la plateforme. Une fois inscrit, vous pouvez parcourir la liste des
                                            défis disponibles, consulter le challenge hebdomadaire ou bien un
                                            challenge précédent qui vous intéresse, et soumettre votre solution via
                                            un lien GitHub.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item bg-ultra-dark text-light">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed bg-ultra-dark text-light rounded-4" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        Comment fonctionne le système de likes sur Codify ?
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p class="text-justify">
                                            Sur Codify, les utilisateurs peuvent découvrir les projets soumis par
                                            d'autres membres en consultant leurs liens GitHub. Si un projet leur
                                            plaît particulièrement, ils peuvent exprimer leur appréciation en lui
                                            attribuant un "like". Les projets les plus appréciés seront mis en avant
                                            sur la plateforme, offrant ainsi une visibilité accrue à leurs
                                            créateurs.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item bg-ultra-dark text-light">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed bg-ultra-dark text-light rounded-4" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                        Comment puis-je interagir avec la communauté sur Codify ?
                                    </button>
                                </h2>
                                <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p class="text-justify">
                                            Pour une expérience communautaire conviviale et interactive, nous avons
                                            mis en place un serveur Discord dédié à Codify. C'est un lieu où les
                                            membres peuvent discuter des défis, partager des astuces et des
                                            solutions en temps réel, et interagir de manière plus directe avec
                                            d'autres passionnés de codage. Rejoignez-nous sur notre serveur Discord
                                            pour faire partie de la communauté Codify et profiter d'une expérience
                                            enrichissante !
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item bg-ultra-dark text-light">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed bg-ultra-dark text-light rounded-4" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                        Puis-je proposer des idées de défis pour Codify ?
                                    </button>
                                </h2>
                                <div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p class="text-justify">
                                            Absolument ! Nous sommes toujours à la recherche de nouvelles idées de
                                            défis intéressants pour notre communauté. Si vous avez des suggestions,
                                            n'hésitez pas à nous les envoyer via le formulaire de contact ci-dessous ou bien directement sur notre serveur Discord. Vos idées seront les bienvenues !
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>

<?php
$main = ob_get_clean()
?>