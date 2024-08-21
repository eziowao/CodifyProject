<?php

ob_start()
?>

<h1 class="text-center text-light"> <?= $title ?> </h1>

<div class="container mt-5">
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">
                        <a class="text-dark" href="?page=admin/dashboard/types/list&order_by=type_id&direction=<?= $orderBy == 'type_id' && $direction === 'DESC' ? 'ASC' : 'DESC' ?>">
                            ID
                        </a>
                        <?php if ($orderBy === 'type_id'): ?>
                            <i class="fa-solid <?= $direction === 'DESC' ? 'fa-arrow-down' : 'fa-arrow-up' ?>"></i>
                        <?php endif; ?>
                    </th>
                    <th scope="col">
                        <a class="text-dark" href="?page=admin/dashboard/types/list&order_by=type&direction=<?= $orderBy == 'type' && $direction === 'DESC' ? 'ASC' : 'DESC'  ?>">
                            Nom
                        </a>
                        <?php if ($orderBy === 'type'): ?>
                            <i class="fa-solid <?= $direction === 'DESC' ? 'fa-arrow-down' : 'fa-arrow-up' ?>"></i>
                        <?php endif; ?>
                    </th>
                    <th scope="col">Modifier</th>
                    <th scope="col">Supprimer</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($types) && is_array($types)): ?>
                    <?php foreach ($types as $type) : ?>
                        <tr>
                            <td><?= $type->type_id ?></td>
                            <td><?= $type->type ?></td>
                            <td>
                                <a class="btn btn-warning" href="?page=admin/dashboard/types/update&id=<?= $type->type_id ?>"><i class="bi bi-pencil"></i></a>
                            </td>
                            <td>
                                <form class="delete-form" action="?page=admin/dashboard/types/delete&id=<?= $type->type_id ?>" method="post">
                                    <input type="hidden" name="user_id" value="<?= $type->type_id  ?>">
                                    <button class="btn btn-danger" type="submit"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <option value="">Aucun type trouvé</option>
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
                <p>Vous voulez vraiment supprimer le type <?= $type->type ?> ?</p>
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