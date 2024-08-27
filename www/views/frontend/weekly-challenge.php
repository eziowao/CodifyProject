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
                    <p class="text-justify"><?= $challenge['description'] ?></p>
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
                    <div class="col-12 col-md-6 d-flex justify-content-center">
                        <div class="col-12 bg_test p-3 my-3">
                            <div class="d-flex align-items-center my-3">
                                <a href="?page=user&id=<?= $contribution->user_id ?>">
                                    <img src="<?= $contribution->picture ? "./public/uploads/users/{$contribution->picture}" : './public/assets/img/default_profile_icon.png' ?>"
                                        alt="Photo de profil"
                                        class="rounded-circle"
                                        width="60"
                                        height="60">
                                </a>
                                <h5 class="text-light ms-3">
                                    <a class="text-light" href="?page=user&id=<?= $contribution->user_id ?>">
                                        <?= $contribution->pseudo ?>
                                    </a>
                                </h5>
                            </div>
                            <a href="<?= $contribution->link ?>" target="_blank">Lien du projet</a>
                            <form action="" method="POST" class="d-flex justify-content-end align-items-center">
                                <input type="hidden" name="contribution_id" value="<?= $contribution->contribution_id ?>">
                                <button class="like-button bg-transparent border-0 p-0" data-contribution-id="<?= $contribution->contribution_id ?>">
                                    <i class="<?= $contribution->liked ? 'fa-solid fa-heart' : 'fa-regular fa-heart' ?>" id="like-icon-<?= $contribution->contribution_id ?>"></i>
                                </button>
                                <span class="ms-2 text-light" id="like-count-<?= $contribution->contribution_id ?>"><?= $contribution->like_count ?></span>
                            </form>
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
        <div class="d-flex justify-content-center">
            <?php if (isset($errors['contribution'])) : ?>
                <div class="alert alert-danger col-8 text-center">
                    <?= $errors['contribution'] ?>
                </div>
            <?php endif; ?>
        </div>

        <div class="my-4">
            <div class="row d-flex justify-content-center">
                <h1 class="m-0 fs-4 py-4 text-center text-light">Contributions les plus aimées pour ce challenge</h1>
            </div>
        </div>

        <div>
            <div class="row d-flex justify-content-center">
                <div class="col-12 d-flex justify-content-center ranking-content py-4 mb-5 rounded-20">
                    <div class="col-3 text-center text-light">
                        <div class="d-flex justify-content-center">
                            <div class="col-6">
                                <h2 class="fs-5 fw-semibold py-1 rounded-20">Rank</h2>
                            </div>
                        </div>
                        <?php for ($i = 1; $i <= count($topContributions); $i++): ?>
                            <p><?= $i ?></p>
                        <?php endfor; ?>
                    </div>
                    <div class="col-6 text-light text-center">
                        <div class="d-flex justify-content-center">
                            <div class="col-3">
                                <h2 class="fs-5 fw-semibold py-1 rounded-20">Pseudo</h2>
                            </div>
                        </div>
                        <?php foreach ($topContributions as $contribution): ?>
                            <p><a class="text-light" href="?page=user&id=<?= $contribution->user_id ?>"><?= $contribution->pseudo ?> </a></p>
                        <?php endforeach; ?>
                    </div>
                    <div class="col-3 text-center text-light">
                        <h2 class="fs-5 fw-semibold">Likes</h2>
                        <?php foreach ($topContributions as $contribution): ?>
                            <p><?= $contribution->like_count ?></p>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Ajouter ma contribution</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="contributionForm" action="" method="POST">
                        <div class="modal-body">
                            <div class="form-group mb-3">
                                <label class="mb-3" for="link">Lien de la contribution</label>
                                <input type="text" class="form-control" id="link" placeholder="https://eziowao.github.io/MonProjet/" name="link" value="" required>
                                <div class="invalid-feedback" id="linkError"></div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                            <button type="submit" class="btn bg-green text-light">Ajouter</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
$main = ob_get_clean();

ob_start()
?>

<script src="./public/assets/js/frontend/linkModal.js"></script>
<script src="./public/assets/js/frontend/likes.js"></script>

<?php
$script = ob_get_clean();
?>