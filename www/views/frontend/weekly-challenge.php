<?php

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
$main = ob_get_clean();

ob_start()
?>

<?php
$script = ob_get_clean();
?>