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
                <th scope="col">Image d'illustration</th>
                <th scope="col">Description</th>
                <th scope="col">Url de téléchargement</th>
                <th scope="col">Modifier</th>
                <th scope="col">Supprimer</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($challenges as $challenge) : ?>
                <tr>
                    <td><?= $challenge->challenge_id ?></td>
                    <td><?= $challenge->name ?></td>
                    <td> <img class="rounded-2" src="./../../../../public/uploads/challenges/<?= $challenge->picture ?>" height="50px" alt="Illustration">
                    </td>
                    <td><?= $challenge->description  ?></td>
                    <td>
                        <?php if (!empty($challenge->file_url)) : ?>
                            <a href="?page=admin/dashboard/challenges/download&id=<?= $challenge->challenge_id ?>" class="btn btn-primary">Télécharger le Fichier</a>
                        <?php else : ?>
                            <span>Aucun fichier disponible</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <a class="btn btn-warning" href="?page=admin/dashboard/users/update&id=<?= 'test' ?>"><i class="bi bi-pencil"></i></a>
                    </td>
                    <td>
                        <form class="delete-form" action="?page=admin/dashboard/users/delete&id=<?= 'test'  ?>" method="post">
                            <input type="hidden" name="user_id" value="<?= 'test'  ?>">
                            <button class="btn btn-danger" type="submit"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <?php foreach ($challenges as $challenge) : ?>
        <div class="challenge">
            <h3><?php echo htmlspecialchars($challenge->name ?? ''); ?></h3>
            <p><?php echo htmlspecialchars($challenge->description ?? ''); ?></p>
            <?php if (!empty($challenge->file_url)) : ?>
                <a href="/uploads/challenges/<?php echo htmlspecialchars($challenge->file_url); ?>" class="btn btn-primary" download>Télécharger le Fichier</a>
            <?php else : ?>
                <span>Aucun fichier disponible</span>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
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
                <p>Vous voulez vraiment bannir l'utilisateur ?</p>
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