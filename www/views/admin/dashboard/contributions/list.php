<?php ob_start() ?>

<h1 class="text-center text-light"> <?= $title ?> </h1>

<div class="container mt-5">
    <form method="GET" action="">

        <input type="hidden" name="page" value="admin/dashboard/contributions/list">
        <div class="input-group mb-3">
            <input type="text" class="form-control" name="search" placeholder="Rechercher par ID, utilisateur ou challenge" value="<?= htmlspecialchars($_GET['search'] ?? '', ENT_QUOTES) ?>">
            <button class="btn btn-primary" type="submit">Rechercher</button>
        </div>
    </form>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Lien</th>
                    <th scope="col">User_id</th>
                    <th scope="col">Challenge</th>
                    <th scope="col">Modifier</th>
                    <th scope="col">Supprimer</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($contributions) && is_array($contributions)): ?>

                    <?php foreach ($contributions as $contribution) : ?>
                        <tr>
                            <td><?= $contribution->contribution_id ?></td>
                            <td> <a href="<?= $contribution->link ?>" target="_blank"><?= $contribution->link ?></a></td>
                            <td><?= $usersById[$contribution->user_id] ?? 'user inconnu' ?> </td>
                            <td><?= $challengesById[$contribution->challenge_id] ?></td>
                            <td>
                                <a class="btn btn-warning" href="?page=admin/dashboard/contributions/update&id=<?= $contribution->contribution_id ?>"><i class="bi bi-pencil"></i></a>
                            </td>
                            <td>
                                <form class="delete-form" action="?page=admin/dashboard/contributions/delete&id=<?= $contribution->contribution_id ?>" method="post">
                                    <input type="hidden" name="user_id" value="<?= 'test' ?>">
                                    <button class="btn btn-danger" type="submit"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <option value="">Aucune contribution disponible</option>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

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
                <p>Vous voulez vraiment supprimer la <?= $contribution->link ?> ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" data-valid="true" class="btn btn-primary">Valider</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<?php
$main = ob_get_clean();

ob_start()
?>

<script src="./../../public/assets/js/modal.js"></script>

<?php
$script = ob_get_clean();
?>