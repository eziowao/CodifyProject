<?php

ob_start()
?>

<main class="container my-5">

    <div class="row">
        <div class="col-md-8 text-light">
            <div class="my-3">
                <h1 class="text-center text-md-start">
                    <?= $user['pseudo'] ?>
                </h1>
            </div>
            <div class="d-flex justify-content-center">
                <?php if (!empty($user['biography'])) : ?>
                    <div class="col-11 col-md-12">
                        <p class="text-justify py-5 py-md-3 py-lg-5"><?= $user['biography'] ?></p>
                    </div>
                <?php endif; ?>
            </div>
            <div class="d-flex justify-content-center">
                <div class="row wrapper mb-4">
                    <?php if (!empty($user['website'])) : ?>
                        <div class="col-2">
                            <a target="_blank" href="<?= $user['website'] ?>" class="icon website">
                                <div class="tooltip">
                                    Site
                                </div>
                                <span><i class="fa-solid fa-globe fa-2xl"></i></span>
                            </a>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($user['github'])) : ?>
                        <div class="col-2">
                            <a target="_blank" href="<?= $user['github'] ?>" class="icon github">
                                <div class="tooltip">
                                    GitHub
                                </div>
                                <span><i class="fa-brands fa-github fa-2xl"></i></span>
                            </a>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($user['discord'])) : ?>
                        <div class="col-2">
                            <a href="#" class="icon discord">
                                <div class="tooltip">
                                    <?= $user['discord'] ?>
                                </div>
                                <span><i class="fa-brands fa-discord fa-2xl"></i></span>
                            </a>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($user['linkedin'])) : ?>
                        <div class="col-2">
                            <a target="_blank" href="<?= $user['linkedin'] ?>" class="icon linkedin">
                                <div class="tooltip">
                                    Linkedin
                                </div>
                                <span><i class="fa-brands fa-linkedin fa-2xl"></i></span>
                            </a>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($user['discord'])) : ?>
                        <div class="col-2">
                            <a target="_blank" href="<?= $user['discord'] ?>" class="icon twitter">
                                <div class="tooltip">
                                    X
                                </div>
                                <span><i class="fa-brands fa-x-twitter fa-2xl"></i></span>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="d-flex justify-content-center">
                <img class="profile-img my-3" src="<?= $_SESSION['user']->picture ? "./public/uploads/users/{$_SESSION['user']->picture}" : './public/assets/img/default_profile_icon.png' ?>">
            </div>
        </div>
    </div>

    <h2 class="text-light fs-3 text-center mt-5 pt-5">Mes challenges réalisés</h2>
    <div class="rounded-5 my-4">
        <div class="row d-flex justify-content-center my-4">
            <?php if (!empty($contributions)) : ?>
                <?php foreach ($contributions as $contribution) : ?>
                    <div class="col-lg-6 p-3">
                        <div class="challenge-card bg_test my-2 px-3 py-4 rounded-20 text-light">
                            <div class="row">
                                <div class="col-6">
                                    <div class="img-container">
                                        <div class="overlay">
                                            <a target="_blank" href="<?= $contribution->link ?>"><img class="img-fluid rounded-2" src="./public/uploads/challenges/<?= $contribution->challenge_picture ?>" alt=""></a>
                                            <div class="text">Voir la contribution</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <h5 class="mb-2"> <a class="text-light" href="?page=previous-challenges/challenge&id=<?= $contribution->challenge_id ?>"><?= $contribution->challenge_name ?></a></h5>
                                    <div class="h-50 d-flex align-items-end justify-content-end">
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
                <p class="text-light text-center">Aucune contribution pour le moment.</p>
            <?php endif; ?>
        </div>
    </div>
</main>

<?php
$main = ob_get_clean();

ob_start()
?>

<script src="./public/assets/js/frontend/likes.js"></script>

<?php
$script = ob_get_clean();
?>