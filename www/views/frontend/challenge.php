<?php
ob_start()
?>

<main class="my-4 container">
    <div class="d-flex justify-content-center">
        <div class="row col-11 col-md-12 text-light bg_test p-3">
            <div>
                <h1 class="fs-4 py-2 text-center text-light"><?= $challenge['name']; ?></h1>
            </div>
            <div class="d-flex justify-content-center">
                <div class="bg-types">
                    <small class="text-light text-center my-auto p-2"><?= $typesById[$challenge['type_id']] ?? '' ?></> </small>
                </div>
            </div>
            <div class="col-lg-5 d-flex align-items-center">
                <div class="d-flex justify-content-center my-4">
                    <div class="d-flex justify-content-center">
                        <img src="./../../../../public/uploads/challenges/<?= $challenge['picture'] ?>" class="img-fluid" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-7 d-flex justify-content-center align-items-center">
                <div class="text-light white-space">
                    <p class="text-justify my-auto"><?= nl2br($challenge['description']) ?></p>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <form action="<?= $challenge['file_url'] ?>" target="_blank" class="col-7 col-md-9 col-lg-7 d-flex justify-content-center">
                    <button class="bg-purple text-light border-0 rounded-5 p-2"> <i class="fa-solid fa-link"></i> Accéder à la maquette </button>
                </form>
            </div>
        </div>
    </div>

    <div class="row text-light" id="contributions-list">
        <h2 class="m-0 fs-4 pt-5 pb-4 text-center text-light">Contributions délivrées</h2>
        <?php if (!empty($contributions)) : ?>
            <?php foreach ($contributions as $contribution) : ?>
                <div class="col-12 col-md-6 d-flex justify-content-center">
                    <div class="col-12 bg_test p-3 my-3">
                        <div class="d-flex align-items-center my-3">
                            <a href="<?= $userLink = ($contribution->user_id == $currentUserId) ? '?page=profile' : "?page=user&id={$contribution->user_id}" ?>">
                                <img src="<?= $contribution->picture ? "./public/uploads/users/{$contribution->picture}" : './public/assets/img/default_profile_icon.png' ?>"
                                    alt="Photo de profil"
                                    class="rounded-circle"
                                    width="60"
                                    height="60">
                            </a>
                            <div class="text-light fw-bolder ms-3">
                                <a class="text-light" href="<?= $userLink ?>">
                                    <?= $contribution->pseudo ?>
                                </a>
                            </div>
                        </div>
                        <div class="my-3">
                            <a class="text-light" href="<?= $contribution->link ?>" target="_blank">Voir la contribution</a>
                        </div>

                        <div class=row>
                            <div class="col-6">
                                <p> Publiée le <?= date('d-m-Y', strtotime($contribution->created_at)) ?></p>
                            </div>
                            <div class="col-6">
                                <form action="" method="POST" class="d-flex justify-content-end align-items-center">
                                    <input type="hidden" name="contribution_id" value="<?= $contribution->contribution_id ?>">
                                    <button class="like-button bg-transparent border-0 p-0" data-contribution-id="<?= $contribution->contribution_id ?>">
                                        <i class="<?= $contribution->liked ? 'fa-solid fa-heart' : 'fa-regular fa-heart' ?>" id="like-icon-<?= $contribution->contribution_id ?>"></i>
                                    </button>
                                    <span class="ms-3 text-light" id="like-count-<?= $contribution->contribution_id ?>"><?= $contribution->like_count ?></span>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

            <!-- Pagination -->
            <?php

            if ($totalPages > 1) { ?>
                <nav class="paginationContainer my-3" aria-label="Page navigation">
                    <ul class="pagination justify-content-center">
                        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                            <li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
                                <a href="?page=previous-challenges/challenge&id=<?= $challenge['challenge_id'] ?>&p=<?= $i ?>">
                                    <?= $i ?>
                                </a>
                            </li>
                        <?php endfor; ?>
                    </ul>
                </nav>
            <?php }
            ?>

        <?php else : ?>
            <p class="text-light text-center">Aucune contribution pour le moment.</p>
        <?php endif; ?>
    </div>

    <div class="d-flex justify-content-center my-3">
        <button class="bg-green text-light border-0 rounded-5 p-2" data-bs-toggle="modal" data-bs-target="#exampleModal"> Ajouter ma contribution</button>
    </div>

    <div class="d-flex justify-content-center">
        <?php if (isset($errors['contribution'])) : ?>
            <div class="alert alert-danger col-8 text-center">
                <?= $errors['contribution'] ?>
            </div>
        <?php endif; ?>
    </div>

    <?php if (!empty($contributions)) : ?>
        <div class="mb-4">
            <div class="row d-flex justify-content-center">
                <h1 class="m-0 fs-4 py-4 text-center text-light">Contributions les plus aimées pour ce challenge</h1>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <div class="row col-11 col-md-12 d-flex justify-content-center">
                <div class="col-11 col-md-12 d-flex justify-content-center ranking-content py-4 mb-5 rounded-20">
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
    <?php endif; ?>

    <div class="d-flex justify-content-center">
        <div class="row col-11 col-md-12 bg-purple rounded-20 p-4 text-light">
            <div class="col-md-10">
                <p class="fw-semibold fs-2">Besoin d'aide ? 🚀</p>
                <p class="text-justify">N'hésite pas à rejoindre notre communauté sur Discord ! 🌟 C'est l'endroit idéal pour échanger avec d'autres développeurs, poser des questions, obtenir des conseils, et partager tes idées. Ensemble, nous pourrons surmonter tous les défis du développement frontend et avancer plus loin ! 💪</p>
                <a href="https://discord.gg/4xcTPZCR" target="_blank" class="no-underline">
                    <button class="bg-white p-2 rounded-20 border-0">
                        Rejoindre notre Discord
                    </button>
                </a>
            </div>
            <div class="col-md-2 py-3 d-flex justify-content-end">
                <img src="./../../../../public/assets/img/discord-white-icon.svg" height="60px" alt="">
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
                            <input type="text" class="form-control" id="link" placeholder="https://username.github.io/monprojet/" name="link" value="" required>
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