<?php

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
                <img src="./public/assets/img/left_chevron.png" height="70px" alt="">
            </div>
        </div>
        <div class="row my-3">
            <div class="col-lg-4 offset-lg-3">
                <div class="card bg_test w-100">
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
                <div class="card bg_test w-100">
                    <div class="card-body">
                        <p class="card-text text-light text-center py-3"> 2. <span class="text-green">Découvrez</span>
                            le challenge de la
                            semaine </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row my-3">
            <div class="col-lg-4">
                <div class="card bg_test w-100">
                    <div class="card-body">
                        <p class="card-text text-light text-center py-3"> 3. <span class="text-green">Réalisez</span> le
                            challenge </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row my-3">
            <div class="col-lg-4 offset-lg-5">
                <div class="card bg_test w-100">
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
                <img src="./public/assets/img/right_chevron.png" height="100px" alt="">
            </div>
        </div>
    </div>

    <!-- -------------------------------- weekly challenge -------------------------------- -->

    <div class="container">
        <div class="row">
            <div class="container col-12 col-lg-5 my-5 d-flex align-items-center justify-content-center justify-content-lg-start">
                <div class="d-flex flex-column align-items-center">
                    <h2 class="col-12 text-light fs-4 text-center mb-4">Prochain challenge</h2>
                    <div class="row">
                        <div class="col-3">
                            <div class="countdown-item text-center">
                                <span id="days" class="countdown-number">00</span>
                            </div>
                            <div class="countdown-label text-light text-center">Jours</div>
                        </div>
                        <div class="col-3">
                            <div>
                                <div class="countdown-item">
                                    <span id="hours" class="countdown-number text-center">00</span>
                                </div>
                            </div>
                            <div class="countdown-label text-light text-center">Heures</div>
                        </div>
                        <div class="col-3">
                            <div class="countdown-item">
                                <span id="minutes" class="countdown-number text-center">00</span>
                            </div>
                            <div class="countdown-label text-light text-center">Minutes</div>
                        </div>
                        <div class="col-3">
                            <div class="countdown-item">
                                <span id="seconds" class="countdown-number text-center">00</span>
                            </div>
                            <div class="countdown-label text-light text-center">Secondes</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container col-12 col-lg-7 my-5">
                <h2 class="text-light fs-4 text-center mb-4 pb-4">Challenge de la semaine : <?= $challenge['name']; ?></h2>
                <div class="d-flex justify-content-center">
                    <?php if (!isset($_SESSION['user']) || !$_SESSION['user']) { ?>
                        <div class="col-8">
                            <a href="?page=signUp">
                                <img src="./../../../../public/uploads/challenges/<?= $challenge['picture'] ?>" alt="<?= $challenge['name']; ?>" class="img-fluid" halt="">
                            </a>
                        </div>
                    <?php } ?>
                    <?php if (isset($_SESSION['user']) && $_SESSION['user']) { ?>
                        <div class="col-8 d-flex">
                            <a href="?page=signUp">
                                <img src="./../../../../public/uploads/challenges/<?= $challenge['picture'] ?>" alt="<?= $challenge['name']; ?>" class="img-fluid" halt="">
                            </a>
                        </div>
                    <?php } ?>

                </div>
            </div>
        </div>
    </div>

    <!-- -------------------------------- previous challenges -------------------------------- -->

    <div>
        <?php if (!isset($_SESSION['user']) || !$_SESSION['user']) { ?>
            <h2 class="col-12 text-light fs-4 text-center mb-4">Inscrivez-vous ou connectez-vous pour découvrir tous les challenges disponibles</h2>
        <?php } else { ?>
            <h2 class="col-12 text-light fs-4 text-center my-4">Tous les challenges disponibles</h2>
        <?php } ?>

        <div class="marquee-wrapper">
            <div class="marquee">
                <?php if (isset($filteredChallenges) && count($filteredChallenges) > 0) : ?>
                    <?php foreach ($filteredChallenges as $challenge) : ?>
                        <div class="marquee-item">
                            <?php if (!isset($_SESSION['user']) || !$_SESSION['user']) { ?>
                                <a href="?page=signUp">
                                    <img src="./../../../../public/uploads/challenges/<?= $challenge->picture ?>" alt="<?= $challenge->name ?>">
                                </a>
                            <?php } else { ?>
                                <a href="?page=previous-challenges/challenge&id=<?= $challenge->challenge_id ?>">
                                    <img src="./../../../../public/uploads/challenges/<?= $challenge->picture ?>" alt="<?= $challenge->name ?>">
                                </a>
                            <?php } ?>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <p class="text-center text-light">Aucun challenge précédent trouvé.</p>
                <?php endif; ?>
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
$main = ob_get_clean();

ob_start()
?>

<script src="./public/assets/js/script.js"></script>
<script src="./public/assets/js/countdown.js"></script>

<?php
$script = ob_get_clean();
?>