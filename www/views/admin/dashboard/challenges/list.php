<?php

ob_start()
?>


<h1 class="text-center"> <?= $title ?> </h1>

<div class="container mt-5">
    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nom</th>
                <th scope="col">Description</th>
                <th scope="col">Image</th>
                <th scope="col">Url maquette</th>
                <th scope="col">Type</th>
                <th scope="col">Modifier</th>
                <th scope="col">Supprimer</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($challenges) && is_array($challenges)): ?>
                <?php foreach ($challenges as $challenge) : ?>
                    <tr>
                        <td><?= $challenge->challenge_id ?></td>
                        <td><?= $challenge->name ?></td>
                        <td><?= $challenge->description ?></td>
                        <td> <img class="rounded-2" src="./../../../../public/uploads/challenges/<?= $challenge->picture ?>" height="50px" alt="Illustration">
                        </td>
                        <td> <a href="<?= $challenge->file_url ?>" target="_blank" class="text-black">Lien maquette</a> </td>
                        <td> <?= $typesById[$challenge->type_id] ?? 'Type inconnu' ?> </td>
                        <td>
                            <a class="btn btn-warning" href="?page=admin/dashboard/challenges/update&id=<?= $challenge->challenge_id ?>"><i class="bi bi-pencil"></i></a>
                        </td>
                        <td>
                            <form class="delete-form" action="?page=admin/dashboard/challenges/delete&id=<?= $challenge->challenge_id ?>" method="post">
                                <input type="hidden" name="user_id" value="<?= 'test'  ?>">
                                <button class="btn btn-danger" type="submit"><i class="bi bi-trash"></i></button>
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