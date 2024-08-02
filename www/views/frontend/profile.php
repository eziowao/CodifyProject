<?php

ob_start()
?>

<main class="my-5">
    <div class="container">
        <div class="row text-light mt-5 pt-5 d-flex justify-content-center">
            <div class="col-11 col-lg-7">
                <div class="row">
                    <div class="col-10">
                        <h1 class="fs-4"><?= $_SESSION['user']->pseudo ?></h1>
                    </div>
                    <p class="text-justify py-3"><?= $_SESSION['user']->biography ?></p>
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

                        <?php if (!empty($_SESSION['user']->linkedin)) : ?>
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
                                <img class="contributions-img" src="./public/uploads/challenges/<?= htmlspecialchars($contribution->challenge_picture) ?>" alt="">
                                <div class="row">
                                    <a class="col-6 py-3" href="<?= htmlspecialchars($contribution->link) ?>" target="_blank"><?= htmlspecialchars($contribution->link) ?></a>
                                    <div class="col-6 d-flex justify-content-end align-items-center">
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
</main>

<?php
$main = ob_get_clean();

ob_start()
?>

<?php
$script = ob_get_clean();
?>