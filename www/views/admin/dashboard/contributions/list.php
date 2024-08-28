<?php ob_start() ?>


<div class="container my-5">
    <h1 class="text-center text-light mb-5"> <?= $title ?> </h1>
    <form method="get" class="mb-4>
        <input type=" hidden" name="page" value="admin/dashboard/contributions/list">
        <div class="input-group mb-3">
            <input type="text" name="search" class="form-control rounded-20" placeholder="Rechercher une contribution par ID, pseudo ou challenge" value="<?= $_GET['search'] ?? '' ?>">
            <button class="btn bg-green text-light rounded-20" type="submit">Rechercher</button>
        </div>
    </form>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col"><a href="?page=admin/dashboard/contributions/list&sort=contribution_id&order=<?= $orderBy == 'contribution_id' && $direction == 'ASC' ? 'DESC' : 'ASC' ?>">ID</a></th>
                    <th scope="col">Lien</th>
                    <th scope="col"><a href="?page=admin/dashboard/contributions/list&sort=pseudo&order=<?= $orderBy == 'pseudo' && $direction == 'ASC' ? 'DESC' : 'ASC' ?>">Nom de l'utilisateur</a></th>

                    <th scope="col"><a href="?page=admin/dashboard/contributions/list&sort=challenge_name&order=<?= $orderBy == 'challenge_name' && $direction == 'ASC' ? 'DESC' : 'ASC' ?>">Nom du challenge</a></th>

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
                                <a href="?page=admin/dashboard/contributions/update&id=<?= $contribution->contribution_id ?>"><button class="button-edit"><i class="fa-solid fa-pen-to-square fa-sm"></i></button></a>
                            </td>
                            <td>
                                <form class="delete-form" action="?page=admin/dashboard/contributions/delete&id=<?= $contribution->contribution_id ?>" method="post">
                                    <input type="hidden" name="user_id" value="<?= 'test' ?>">
                                    <button class="button-delete-admin" type="submit"><i class="fa-solid fa-trash fa-sm"></i></button>
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

    <nav>
        <ul class="pagination justify-content-center">
            <?php if ($pageNum > 1): ?>
                <li class="page-item"><a class="page-link" href="?page=admin/dashboard/contributions/list&page_num=<?= $pageNum - 1 ?>&sort=<?= $orderBy ?>&order=<?= $direction ?>">Précédent</a></li>
            <?php endif; ?>
            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <li class="page-item <?= $i === $pageNum ? 'active' : '' ?>"><a class="page-link" href="?page=admin/dashboard/contributions/list&page_num=<?= $i ?>&sort=<?= $orderBy ?>&order=<?= $direction ?>"><?= $i ?></a></li>
            <?php endfor; ?>
            <?php if ($pageNum < $totalPages): ?>
                <li class="page-item"><a class="page-link" href="?page=admin/dashboard/contributions/list&page_num=<?= $pageNum + 1 ?>&sort=<?= $orderBy ?>&order=<?= $direction ?>">Suivant</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</div>

<div id="delete-modal" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content text-black">
            <div class="modal-header">
                <h5 class="modal-title text-light">Suppression</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>
            <div class="modal-body text-light">
                <p>Vous voulez vraiment supprimer la contribution <?= $contribution->link ?> ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="button-delete p-2" data-bs-dismiss="modal">Close</button>
                <button type="button" data-valid="true" class="button-edit p-2">Valider</button>
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