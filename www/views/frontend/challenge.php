<?php

ob_start()
?>

<main class="my-5">
    <div class="container">
        <div class="row my-5 p-4 bg_test">
            <div class="col-md-6">
                <div>
                    <h1 class="fs-4 py-2 text-center text-light"><?= $challenge['name']; ?></h1>
                </div>
                <div class="d-flex justify-content-center mb-3">
                    <div class="bg-types">
                        <p class="text-light text-center my-auto p-2"><?= $typesById[$challenge['type_id']] ?? '' ?></p>
                    </div>
                </div>
                <div class="text-light">
                    <p><?= $challenge['description'] ?></p>
                </div>
                <div class="d-flex justify-content-center my-5">
                    <form action="<?= $challenge['file_url'] ?>" target="_blank" class="col-7 col-md-9 col-lg-7 d-flex justify-content-center">
                        <button class="bg-green text-light border-0 rounded-5 p-2"> Accéder à la maquette
                        </button>
                    </form>
                </div>
            </div>
            <div class="d-flex justify-content-center col-md-6">
                <img src="./../../../../public/uploads/challenges/<?= $challenge['picture'] ?>" class="img-fluid" alt="">
            </div>
        </div>

        <div class="row">
            <h2 class="m-0 fs-4 pt-5 pb-4 text-center text-light">Contributions délivrées</h2>
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