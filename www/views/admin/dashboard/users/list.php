<?php

ob_start()
?>

<div class="container my-5">
    <h1 class="text-center text-light mb-5"> <?= $title ?> </h1>
    <form method="GET" action="">
        <input type="hidden" name="page" value="admin/dashboard/users/list">
        <div class="input-group mb-3">
            <input type="text" class="form-control rounded-20" name="search" placeholder="Rechercher par ID ou Pseudo" value="<?= htmlspecialchars($_GET['search'] ?? '') ?>">
            <button class="btn bg-green text-light rounded-20" type="submit">Rechercher</button>
        </div>
    </form>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">
                        <a href="?page=admin/dashboard/users/list&order_by=user_id&direction=<?= $orderBy === 'user_id' && $direction === 'DESC' ? 'ASC' : 'DESC' ?>">ID</a>
                        <?php if ($orderBy === 'user_id'): ?>
                            <i class="fa-solid <?= $direction === 'DESC' ? 'fa-arrow-down' : 'fa-arrow-up' ?>"></i>
                        <?php endif; ?>
                    </th>
                    <th scope="col">
                        <a href="?page=admin/dashboard/users/list&order_by=created_at&direction=<?= $orderBy === 'created_at' && $direction === 'DESC' ? 'ASC' : 'DESC' ?>">
                            Crée le
                            <?php if ($orderBy === 'created_at'): ?>
                                <i class="fa-solid <?= $direction === 'DESC' ? 'fa-arrow-down' : 'fa-arrow-up' ?>"></i>
                            <?php endif; ?>
                        </a>
                    </th>
                    <th scope="col">
                        <a href="?page=admin/dashboard/users/list&order_by=updated_at&direction=<?= $orderBy === 'updated_at' && $direction === 'DESC' ? 'ASC' : 'DESC' ?>">Mis à jour le</a>
                        <?php if ($orderBy === 'updated_at'): ?>
                            <i class="fa-solid <?= $direction === 'DESC' ? 'fa-arrow-down' : 'fa-arrow-up' ?>"></i>
                        <?php endif; ?>
                    </th>
                    <th scope="col">
                        <a href="?page=admin/dashboard/users/list&order_by=pseudo&direction=<?= $orderBy === 'pseudo' && $direction === 'DESC' ? 'ASC' : 'DESC' ?>">Pseudo</a>
                        <?php if ($orderBy === 'pseudo'): ?>
                            <i class="fa-solid <?= $direction === 'DESC' ? 'fa-arrow-down' : 'fa-arrow-up' ?>"></i>
                        <?php endif; ?>
                    </th>
                    <th scope="col">Email</th>
                    <th scope="col">Modifier</th>
                    <th scope="col">Bannir</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($users) && is_array($users)): ?>
                    <?php foreach ($users as $user) : ?>
                        <tr>
                            <td> <a target="_blank" href="?page=user&id=<?= $user->user_id ?>"><?= $user->user_id ?></a></td>
                            <td><?= date('d-m-Y', strtotime($user->created_at)) ?></td>
                            <td><?= date('d-m-Y', strtotime($user->updated_at)) ?></td>
                            <td><?= $user->pseudo ?></td>
                            <td><?= $user->email ?></td>
                            <td>
                                <a href="?page=admin/dashboard/users/update&id=<?= $user->user_id ?>"><button class="button-edit"><i class="fa-solid fa-pen-to-square fa-sm"></i></button></a>
                            </td>
                            <td>
                                <form class="delete-form" action="?page=admin/dashboard/users/delete&id=<?= $user->user_id ?>" method="post">
                                    <input type="hidden" name="user_id" value="<?= $user->user_id ?>">
                                    <button class="button-delete-admin" type="submit"><i class="fa-solid fa-trash fa-sm"></i></button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <option value="">Aucun utilisateur</option>
                <?php endif; ?>
            </tbody>
        </table>
        <nav>
            <ul class="pagination justify-content-center">
                <?php
                if ($totalPages > 0) { ?>
                    <nav class="paginationContainer my-3" aria-label="Page navigation">
                        <ul class="pagination justify-content-center">
                            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                                <li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
                                    <a class="page-item" href="?page=admin/dashboard/users/list&page_num=<?= $i ?>&order_by=<?= $orderBy ?>&direction=<?= $direction ?>">
                                        <?= $i ?>
                                    </a>
                                </li>
                                </li>
                            <?php endfor; ?>
                        </ul>
                    </nav>
                <?php }
                ?>
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
                    <p>Vous voulez vraiment bannir l'utilisateur ?</p>
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