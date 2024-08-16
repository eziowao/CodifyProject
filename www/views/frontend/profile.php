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
                            <button class="bg-green text-light border-0 rounded-5" data-bs-toggle="modal" data-bs-target="#exampleModal"> <i class="fa-solid fa-pen-to-square"></i>
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
            <h2 class="text-light fs-5 text-center my-5">Mes contributions</h2>
            <?php if (!empty($contributions)) : ?>
                <?php foreach ($contributions as $contribution) : ?>
                    <div class="col-md-6 px-2 d-flex justify-content-center">
                        <div class="col-10 d-flex justify-content-center">
                            <div class="row">
                                <div>
                                    <a href="?page=previous-challenges/challenge&id=<?= $contribution->challenge_id ?>">
                                        <img class="img-fluid" src="./public/uploads/challenges/<?= htmlspecialchars($contribution->challenge_picture) ?>" alt="">
                                    </a>
                                </div>

                                <div class="row">
                                    <div class="col-10 py-3">
                                        <a href="<?= htmlspecialchars($contribution->link) ?>" target="_blank"><?= htmlspecialchars($contribution->link) ?></a>
                                    </div>
                                    <div class="col-2 d-flex justify-content-end align-items-center">
                                        <i class="fa-regular fa-heart fa-xl py-3"></i>
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

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Mettre à jour mes informations</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <label class="mt-2" for="pseudo">Pseudo</label>
                        <input type="text" class="form-control" id="pseudo" name="pseudo" value="<?= htmlspecialchars($_SESSION['user']->pseudo) ?>">
                        <?php if (isset($errors['pseudo'])): ?>
                            <p class=" text-danger"><?= $errors['pseudo'] ?></p>
                        <?php endif; ?>

                        <label class="mt-2" for="biography">Biographie</label>
                        <textarea class="form-control" id="biography" name="biography"><?= htmlspecialchars($_SESSION['user']->biography) ?></textarea>
                        <?php if (isset($errors['biography'])): ?>
                            <p class=" text-danger"><?= $errors['biography'] ?></p>
                        <?php endif; ?>

                        <label class="mt-2" for="website">Website</label>
                        <input type="text" class="form-control" id="website" name="website" value="<?= htmlspecialchars($_SESSION['user']->website) ?>">
                        <?php if (isset($errors['website'])): ?>
                            <p class=" text-danger"><?= $errors['website'] ?></p>
                        <?php endif; ?>

                        <label class="mt-2" for="github">Github</label>
                        <input type="text" class="form-control" id="github" name="github" value="<?= htmlspecialchars($_SESSION['user']->github) ?>">
                        <?php if (isset($errors['github'])): ?>
                            <p class=" text-danger"><?= $errors['github'] ?></p>
                        <?php endif; ?>

                        <label class="mt-2" for="twitter">Twitter</label>
                        <input type="text" class="form-control" id="twitter" name="twitter" value="<?= htmlspecialchars($_SESSION['user']->twitter) ?>">
                        <?php if (isset($errors['twitter'])): ?>
                            <p class=" text-danger"><?= $errors['twitter'] ?></p>
                        <?php endif; ?>

                        <label class="mt-2" for="linkedin">LinkedIn</label>
                        <input type="text" class="form-control" id="linkedin" name="linkedin" value="<?= htmlspecialchars($_SESSION['user']->linkedin) ?>">
                        <?php if (isset($errors['linkedin'])): ?>
                            <p class=" text-danger"><?= $errors['linkedin'] ?></p>
                        <?php endif; ?>

                        <label class="mt-2" for="discord">Discord</label>
                        <input type="text" class="form-control" id="discord" name="discord" value="<?= htmlspecialchars($_SESSION['user']->discord) ?>">
                        <?php if (isset($errors['discord'])): ?>
                            <p class=" text-danger"><?= $errors['discord'] ?></p>
                        <?php endif; ?>

                        <label class="mt-2" for="picture">Photo de profil</label>
                        <input type="file" class="form-control" id="picture" name="picture">
                        <?php if (isset($errors['picture'])): ?>
                            <p class=" text-danger"><?= $errors['picture'] ?></p>
                        <?php endif; ?>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                            <button type="submit" class="btn bg-green text-light">Mettre à jour</button>
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

<script src="./public/assets/js/frontend/modal.js"></script>

<?php
$script = ob_get_clean();
?>