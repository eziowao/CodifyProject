<?php

ob_start()
?>

<main class="my-5">
    <div class="container">
        <div class="row">
            <h1 class="m-0 fs-4 py-4 text-center text-light"> <?= $title ?></h1>
        </div>
        <div class="row h-50 py-3">
            <?php foreach ($challenges as $challenge) : ?>
                <div class="d-flex justify-content-center col-6">
                    <a href="?page=previous-challenges/challenge&id=<?= $challenge->challenge_id ?>">
                        <img src="./../../../../public/uploads/challenges/<?= $challenge->picture ?>" class="col-10 col-md-10 img-fluid rounded-2" alt="">
                    </a>
                </div>
            <?php endforeach; ?>
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