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

        <div class="row text-light">
            <h2 class="m-0 fs-4 pt-5 pb-4 text-center text-light">Contributions délivrées</h2>
            <?php if (!empty($contributions)) : ?>
                <?php foreach ($contributions as $contribution) : ?>
                    <div class="col-md-6 d-flex justify-content-center">
                        <div class="col-md-10 bg_test p-3 my-3">
                            <h5 class="text-light"><?= htmlspecialchars($contribution->pseudo) ?> <?= htmlspecialchars($contribution->user_id) ?> </h5>
                            <a href="<?= htmlspecialchars($contribution->link) ?>">Lien du projet</a>
                            <p class="card-text text-end"><img src="./public/assets/img/logo_like 2.png" alt=""></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <p class="text-light text-center">Aucune contribution pour le moment.</p>
            <?php endif; ?>
        </div>

        <div class="row py-4 d-flex justify-content-center">
            <button class="col-7 col-md-5 p-2 col-lg-3 bg-green text-light border-0 rounded-5" data-bs-toggle="modal" data-bs-target="#exampleModal"> Ajouter ma contribution</button>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Ajouter ma contribution</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST">
                            <div class="form-group mb-3">
                                <label class="mb-3" for="link">Lien de la contribution</label>
                                <input type="text" class="form-control" id="link" name="link" value="" required>
                            </div>


                            <?= $errors['type'] ?? '' ?>
                            <?= $errors['auth'] ?? '' ?>
                            <button type="submit" class="btn bg-green text-light">Ajouter</button>

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn bg-green text-light">Ajouter</button>
                    </div>
                </div>
            </div>
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