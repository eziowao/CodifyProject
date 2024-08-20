<?php

ob_start()
?>

<main class="my-5">
    <div class="container">
        <div class="row text-light mt-5 pt-5 d-flex justify-content-center">
            <div class="col-11 col-lg-7">
                <div class="row">
                    <div class="d-flex align-items-center">
                        <div class="col-11">
                            <h1 class="fs-4"><?= $_SESSION['user']->pseudo ?></h1>
                        </div>
                        <div class="col-1">
                            <button class="bg-green text-light border-0 rounded-5" data-bs-toggle="modal" data-bs-target="#editModal"> <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                        </div>
                    </div>
                    <div class="col-12">
                        <p class="text-justify py-3"><?= $_SESSION['user']->biography ?></p>
                    </div>
                </div>
            </div>
            <div class="col-10 col-lg-5 px-5 ">
                <div class="row d-flex justify-content-center">
                    <img class="profile-img" src="./public/uploads/users/<?= $_SESSION['user']->picture ?>" alt="">
                </div>
                <div class="container py-4">
                    <div class="row justify-content-center">
                        <?php if (!empty($_SESSION['user']->website)) : ?>
                            <div class="col-3 col-lg-2 text-center">
                                <a target="_blank" href="<?= htmlspecialchars($_SESSION['user']->website) ?>"><i class="fa-solid fa-globe fa-2xl"></i></a>
                            </div>
                        <?php endif; ?>

                        <?php if (!empty($_SESSION['user']->github)) : ?>
                            <div class="col-3 col-lg-2 text-center">
                                <a target="_blank" href="<?= $_SESSION['user']->github ?>"><i class="fa-brands fa-github fa-2xl"></i></a>
                            </div>
                        <?php endif; ?>

                        <?php if (!empty($_SESSION['user']->twitter)) : ?>
                            <div class="col-3 col-lg-2 text-center">
                                <a target="_blank" href="<?= $_SESSION['user']->twitter ?>"><i class="fa-brands fa-x-twitter fa-2xl"></i></a>
                            </div>
                        <?php endif; ?>

                        <?php if (!empty($_SESSION['user']->linkedin)) : ?>
                            <div class="col-3 col-lg-2 text-center">
                                <a target="_blank" href="<?= $_SESSION['user']->linkedin ?>"><i class="fa-brands fa-linkedin fa-2xl"></i></a>
                            </div>
                        <?php endif; ?>

                        <?php if (!empty($_SESSION['user']->discord)) : ?>
                            <div class="col-3 col-lg-2 text-center">
                                <a target="_blank" href="<?= $_SESSION['user']->discord ?>"><i class="fa-brands fa-discord fa-2xl"></i></a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-center mb-5 pb-5">
            <h2 class="text-light fs-5 text-center my-5">Mes contributions (<?= htmlspecialchars($contributionCount) ?>)</h2>
            <?php if (!empty($contributions)) : ?>
                <?php foreach ($contributions as $contribution) : ?>
                    <div class="col-md-6 px-2 d-flex justify-content-center">
                        <div class="col-10 d-flex justify-content-center">
                            <div class="row">
                                <div>
                                    <form class="delete-form" action="?page=profile/delete&id=<?= $contribution->contribution_id ?>" method="post">
                                        <input type="hidden" name="user_id" value="<?= 'test' ?>">
                                        <button class="btn btn-danger" type="submit"><i class="bi bi-trash"></i></button>
                                    </form>
                                </div>
                                <div>
                                    <a class="btn btn-warning" href="?page=profile/contribution&id=<?= $contribution->contribution_id ?>"><i class="bi bi-pencil"></i></a>
                                </div>
                                <div>
                                    <a href="?page=previous-challenges/challenge&id=<?= $contribution->challenge_id ?>">
                                        <img class="img-fluid" src="./public/uploads/challenges/<?= htmlspecialchars($contribution->challenge_picture) ?>" alt="">
                                    </a>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <a href="<?= htmlspecialchars($contribution->link) ?>" target="_blank">Lien vers le projet</a>
                                    </div>
                                    <div class="col-6">
                                        <form action="" method="POST" class="d-flex justify-content-end align-items-center">
                                            <input type="hidden" name="contribution_id" value="<?= $contribution->contribution_id ?>">
                                            <button class="like-button bg-transparent border-0 p-0" data-contribution-id="<?= $contribution->contribution_id ?>">
                                                <i class="<?= $contribution->liked ? 'fa-solid fa-heart' : 'fa-regular fa-heart' ?>" id="like-icon-<?= $contribution->contribution_id ?>"></i>
                                            </button>
                                            <span class="ms-2 text-light" id="like-count-<?= $contribution->contribution_id ?>"><?= $contribution->like_count ?></span>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <p class="text-light text-center">Vous n'avez pas encore de contributions.</p>
            <?php endif; ?>
        </div>
    </div>

    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editProfileModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 fw-bolder" id="editProfileModal">Mettre à jour mes informations</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="contributionForm" action="" method="POST" enctype="multipart/form-data">
                        <div class="d-flex justify-content-end">
                            <small> <span class="text-danger">*</span> : champs obligatoire </small>
                        </div>
                        <div class="form-group mb-3">
                            <label class="mt-2 fw-semibold" for="pseudo">Pseudo <small class="text-danger">*</small></label>
                            <input type="text" class="form-control" id="pseudo" required placeholder="Codify" name="pseudo" value="<?= $_SESSION['user']->pseudo ?>">
                            <div class="invalid-feedback" id="pseudoError"></div>
                        </div>

                        <div class="form-group mb-3">
                            <label class="mt-2 fw-semibold" for="biography">Biographie</label>
                            <textarea class="form-control" id="biography" name="biography" rows="6"><?= $_SESSION['user']->biography ?></textarea>
                        </div>

                        <div class="form-group mb-3">
                            <label class="mt-2 fw-semibold" for="website">Website</label>
                            <input type="text" class="form-control" id="website" placeholder="https://codify.fr/" name="website" value="<?= $_SESSION['user']->website ?>">
                        </div>

                        <div class="form-group mb-3">
                            <label class="mt-2 fw-semibold" for="github">Github</label>
                            <input type="text" class="form-control" id="github" placeholder="https://github.com/codify" name="github" value="<?= $_SESSION['user']->github ?>">
                            <div class="invalid-feedback" id="githubError"></div>
                        </div>

                        <div class="form-group mb-3">
                            <label class="mt-2 fw-semibold" for="twitter">Twitter</label>
                            <input type="text" class="form-control" id="twitter" placeholder="https://x.com/codify" name="twitter" value="<?= $_SESSION['user']->twitter ?>">
                            <div class="invalid-feedback" id="twitterError"></div>
                        </div>

                        <div class="form-group mb-3">
                            <label class="mt-2 fw-semibold" for="linkedin">LinkedIn</label>
                            <input type="text" class="form-control" id="linkedin" placeholder="https://www.linkedin.com/codify" name="linkedin" value="<?= $_SESSION['user']->linkedin ?>">
                            <div class="invalid-feedback" id="linkedinError"></div>
                        </div>

                        <div class="form-group mb-3">
                            <label class="mt-2 fw-semibold" for="discord">Discord</label>
                            <input type="text" class="form-control" id="discord" placeholder="Codify#1234" name="discord" value="<?= $_SESSION['user']->discord ?>">
                        </div>
                        <div class="form-group mb-3">
                            <label class="mt-2 fw-semibold" for="picture">Photo de profil</label>
                            <input type="file" class="form-control" id="picture" name="picture" accept=".jpg, .jpeg, .png, .gif">
                            <div class="invalid-feedback" id="pictureError"></div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn bg-green text-light" form="contributionForm">Mettre à jour</button>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
$main = ob_get_clean();

ob_start()
?>

<script src="./public/assets/js/frontend/profileModal.js"></script>
<script src="./public/assets/js/frontend/likes.js"></script>


<?php
$script = ob_get_clean();
?>