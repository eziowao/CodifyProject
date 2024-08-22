<?php

ob_start()
?>

<h1 class="text-center text-light"> <?= $title ?> </h1>

<div class="container mt-5">

    <form method="GET" class="mb-4">
        <input type="hidden" name="page" value="admin/dashboard/challenges/list">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Rechercher par nom ou ID" value="<?= htmlentities($search) ?>">
            <button type="submit" class="btn btn-primary">Rechercher</button>
        </div>
    </form>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">
                        <a href="?page=admin/dashboard/challenges/list&orderBy=challenge_id&direction=<?= $direction === 'ASC' ? 'DESC' : 'ASC' ?>">ID</a>
                    </th>
                    <th scope="col">
                        <a href="?page=admin/dashboard/challenges/list&orderBy=name&direction=<?= $direction === 'ASC' ? 'DESC' : 'ASC' ?>">Nom</a>
                    </th>
                    <th scope="col">
                        <a href="?page=admin/dashboard/challenges/list&orderBy=published_at&direction=<?= $direction === 'ASC' ? 'DESC' : 'ASC' ?>">Date de publication</a>
                    </th>
                    <th scope="col">Image</th>
                    <th scope="col">Lien</th>
                    <th scope="col">
                        <a href="?page=admin/dashboard/challenges/list&orderBy=type_id&direction=<?= $direction === 'ASC' ? 'DESC' : 'ASC' ?>">Type</a>
                    </th>
                    <th scope="col">Modifier</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($challenges) && is_array($challenges)): ?>
                    <?php foreach ($challenges as $challenge) : ?>
                        <tr>
                            <td><?= $challenge->challenge_id ?></td>
                            <td><?= $challenge->name ?></td>
                            <td> <?= date('d-m-Y', strtotime($challenge->published_at)) ?> </td>
                            <td> <img class="rounded-2" src="./../../../../public/uploads/challenges/<?= $challenge->picture ?>" height="50px" alt="Illustration">
                            </td>
                            <td> <a href="<?= $challenge->file_url ?>" target="_blank" class="text-black">Lien</a> </td>
                            <td> <?= $typesById[$challenge->type_id] ?? 'Type inconnu' ?> </td>
                            <td>
                                <a class="btn btn-warning" href="?page=admin/dashboard/challenges/update&id=<?= $challenge->challenge_id ?>"><i class="fa-solid fa-pen-to-square"></i></a>

                                <form class="delete-form" action="?page=admin/dashboard/challenges/delete&id=<?= $challenge->challenge_id ?>" method="post">
                                    <input type="hidden" name="user_id" value="<?= 'test'  ?>">
                                    <button class="btn btn-danger" type="submit"><i class="fa-solid fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <option value="">Aucun challenge disponible</option>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php if ($totalPages > 1): ?>
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <?php if ($page > 1): ?>
                <li class="page-item">
                    <a href="?page=admin/dashboard/users/list&page_num=<?= $page - 1 ?>&order_by=<?= $orderBy ?>&direction=<?= $direction ?>" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <li class="page-item <?= ($i === $page) ? 'active' : '' ?>">
                    <a class="page-link" href="?page=admin/dashboard/users/list&page_num=<?= $i ?>&order_by=<?= $orderBy ?>&direction=<?= $direction ?>">
                        <?= $i ?>
                    </a>
                </li>
            <?php endfor; ?>

            <?php if ($page < $totalPages): ?>
                <li class="page-item">
                    <a class="page-link" href="?page=admin/dashboard/users/list&page_num=<?= $page + 1 ?>&order_by=<?= $orderBy ?>&direction=<?= $direction ?>" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            <?php endif; ?>
        </ul>
    </nav>
<?php endif; ?>

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
                <p>Vous voulez vraiment bannir supprimer le challenge <?= $challenge->name ?> ?</p>
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
<script src="./../../public/assets/js/cookie.js"></script>

<?php
$script = ob_get_clean();
?>