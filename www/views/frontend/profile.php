<?php

ob_start()
?>

<main class="container my-5">
    <h1 class="fs-2 text-light text-center"> Mon profil </h1>
    <div class="bg_test rounded-5 my-4">
        <div class="row text-light d-flex justify-content-center p-4">
            <div class="col-md-6 col-lg-5">
                <div class="bg-font p-4 rounded-5 shadow">
                    <div class="d-flex justify-content-center">
                        <img class="profile-img my-3" src="<?= $_SESSION['user']->picture ? "./public/uploads/users/{$_SESSION['user']->picture}" : './public/assets/img/default_profile_icon.png' ?>">
                    </div>
                    <div class="d-flex justify-content-center my-3">
                        <p class="fs-4"><?= $_SESSION['user']->pseudo ?></p>
                    </div>
                    <div>
                        <div class="row justify-content-center">
                            <?php if (!empty($_SESSION['user']->website)) : ?>
                                <div class="col-2 col-lg-2 text-center">
                                    <a target="_blank" href="<?= htmlspecialchars($_SESSION['user']->website) ?>"><i class="fa-solid fa-globe fa-2xl"></i></a>
                                </div>
                            <?php endif; ?>

                            <?php if (!empty($_SESSION['user']->github)) : ?>
                                <div class="col-2 col-lg-2 text-center">
                                    <a target="_blank" href="<?= $_SESSION['user']->github ?>"><i class="fa-brands fa-github fa-2xl"></i></a>
                                </div>
                            <?php endif; ?>

                            <?php if (!empty($_SESSION['user']->twitter)) : ?>
                                <div class="col-2 col-lg-2 text-center">
                                    <a target="_blank" href="<?= $_SESSION['user']->twitter ?>"><i class="fa-brands fa-x-twitter fa-2xl"></i></a>
                                </div>
                            <?php endif; ?>

                            <?php if (!empty($_SESSION['user']->linkedin)) : ?>
                                <div class="col-2 col-lg-2 text-center">
                                    <a target="_blank" href="<?= $_SESSION['user']->linkedin ?>"><i class="fa-brands fa-linkedin fa-2xl"></i></a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="my-4">
                        <?php if (!empty($_SESSION['user']->discord)) : ?>
                            <div class="text-center">
                                <p> <i class="fa-brands fa-discord fa-2xl"></i> <?= $_SESSION['user']->discord ?> </p>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button class="bg-green text-light border-0 rounded-5 py-2" data-bs-toggle="modal" data-bs-target="#editModal"> Editer mon profil
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-7 d-flex justify-content-center align-items-center">
                <p class="text-justify py-5 py-md-3 py-lg-5"><?= $_SESSION['user']->biography ?></p>
            </div>
        </div>
    </div>

    <h2 class="text-light fs-3 text-center pt-5">Challenges réalisés</h2>
    <div class="bg_test rounded-5 my-4">
        <div class="row d-flex justify-content-center my-4 p-4">
            <?php if (!empty($contributions)) : ?>
                <?php foreach ($contributions as $contribution) : ?>
                    <div class="col-md-6 col-lg-6 p-4">
                        <div class="row d-flex">
                            <div>
                                <a href="?page=previous-challenges/challenge&id=<?= $contribution->challenge_id ?>"></a>
                                <p class="text-light fw-bold"><a href="?page=previous-challenges/challenge&id=<?= $contribution->challenge_id ?>"><?= $contribution->challenge_name ?></a></p>
                            </div>
                            <div class="img-container">
                                <div class="overlay">
                                    <a target="_blank" href="<?= $contribution->link ?>"><img class="img-fluid rounded-2" src="./public/uploads/challenges/<?= htmlspecialchars($contribution->challenge_picture) ?>" alt=""></a>
                                    <div class="text">Voir la contribution</div>
                                </div>
                                <div class="row my-2">
                                    <div class="col-6">
                                        <div class="d-flex justify-content-end">
                                            <a href="?page=profile/contribution&id=<?= $contribution->contribution_id ?>"><button class="button-edit"><i class="fa-solid fa-pen-to-square fa-sm"></i></button></a>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div>
                                            <form class="delete-form" action="?page=profile/delete&id=<?= $contribution->contribution_id ?>" method="post">
                                                <input type="hidden" name="user_id">
                                                <button class="button-delete" type="submit"><i class="fa-solid fa-trash fa-sm"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="d-flex justify-content-end">
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
                <?php endforeach; ?>
            <?php else : ?>
                <p class="text-light text-center">Vous n'avez pas encore de contributions.</p>
            <?php endif; ?>
        </div>
    </div>

    <div class="d-flex justify-content-center">
        <form class="delete-account" action="?page=profile/deleteAccount&id=<?= $_SESSION['user']->user_id ?>" method="post">
            <input type="hidden" name="user_id">
            <button class="button-delete" type="submit">Supprimer mon compte</button>
        </form>
    </div>


    <!-- modal form profile -->
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
                            <input type="text" class="form-control" id="pseudo" placeholder="Codify" name="pseudo" value="<?= $_SESSION['user']->pseudo ?>">
                            <div class="invalid-feedback" id="pseudoError"></div>
                            <?php if (isset($errors['pseudo'])): ?>
                                <p class=" text-danger"><?= $errors['pseudo'] ?></p>
                            <?php endif; ?>
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

    <!-- modal confirm delete contribution -->
    <div id="delete-modal" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content text-black">
                <div class="modal-header">
                    <h5 class="modal-title">Suppression</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"></span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Voulez vous vraiment supprimer votre contribution ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" data-valid="true" class="btn btn-primary">Valider</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- modal confirm delete account -->
    <div id="delete-account-modal" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content text-black">
                <div class="modal-header">
                    <h5 class="modal-title">Suppression du compte</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"></span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Voulez vous vraiment supprimer votre compte ? Cette action est irréversible.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" data-valid="true" class="btn btn-primary">Valider</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
<script src="./public/assets/js/frontend/deleteAccountModal.js"></script>
<script src="./public/assets/js/frontend/likes.js"></script>
<script src="./public/assets/js/modal.js"></script>

<?php
$script = ob_get_clean();
?>