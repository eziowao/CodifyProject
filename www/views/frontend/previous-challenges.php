<?php

ob_start()
?>

<main class="my-4 container">
    <div class="row">
        <h1 class="m-0 fs-4 py-4 text-center text-light"><?= $title ?></h1>
    </div>
    <div class="row">
        <?php if (!empty($filteredChallenges) && is_array($filteredChallenges)): ?>
            <?php foreach ($filteredChallenges as $challenge) : ?>
                <div class="col-md-6 p-3">
                    <a href="?page=previous-challenges/challenge&id=<?= $challenge->challenge_id ?>" class="text-decoration-none">
                        <div class="challenge-card bg_test my-2 px-3 py-4 rounded-20 text-light">
                            <div class="row">
                                <div class="col-6">
                                    <img src="./../../../../public/uploads/challenges/<?= $challenge->picture ?>" class="img-fluid" alt="<?= $challenge->name ?>">
                                </div>
                                <div class="col-6">
                                    <h5 class="mb-2"><?= $challenge->name ?></h5>
                                    <?php

                                    if ($challenge->type_id == 1) { ?>
                                        <span class="badge bg-green me-2"><?= $typesById[$challenge->type_id] ?></span>
                                    <?php } else { ?>
                                        <span class="badge bg-purple me-2"><?= $typesById[$challenge->type_id] ?></span>
                                    <?php }
                                    ?>
                                    <div class="h-50 d-flex align-items-end justify-content-end">
                                        <small><?= date('d-m-Y', strtotime($challenge->published_at)) ?></small>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <p class="text-center text-light">Aucun challenge précédent trouvé.</p>
        <?php endif; ?>
    </div>

    <?php
    if ($totalPages > 1) { ?>
        <nav class="paginationContainer my-3" aria-label="Page navigation">
            <ul class="pagination justify-content-center">
                <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                    <li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
                        <a href="?page=previous-challenges&page_num=<?= $i ?>"><?= $i ?></a>
                    </li>
                <?php endfor; ?>
            </ul>
        </nav>
    <?php }
    ?>
</main>



<?php
$main = ob_get_clean();
?>