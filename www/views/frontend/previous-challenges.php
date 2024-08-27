<?php

ob_start()
?>

<main class="my-4">
    <div class="container">
        <div class="row">
            <h1 class="m-0 fs-4 py-4 text-center text-light"> <?= $title ?></h1>
        </div>
        <div class="row h-50 py-3">
            <?php if (!empty($filteredChallenges) && is_array($filteredChallenges)): ?>
                <?php foreach ($filteredChallenges as $challenge) : ?>
                    <div class="col-md-4 py-3">
                        <div class="d-flex flex-column align-items-center">
                            <a href="?page=previous-challenges/challenge&id=<?= $challenge->challenge_id ?>" class="d-flex justify-content-center">
                                <img src="./../../../../public/uploads/challenges/<?= $challenge->picture ?>" class="col-10 col-md-10 img-fluid" alt="<?= $challenge->name ?>">
                            </a>
                            <div class="text-center mt-2">
                                <p class="text-light"> <?= $challenge->name ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

            <?php else : ?>
                <p class="text-center text-light">Aucun challenge précédent trouvé.</p>
            <?php endif; ?>
        </div>
    </div>
</main>

<?php
$main = ob_get_clean();
?>