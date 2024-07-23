<?php

ob_start()
?>

<nav class="navbar navbar-expand-lg navbar-light my-4">
    <div class="container">
        <a class="navbar-brand" href="?page=home">
            <img src="./public/assets/img/logo_v2.png" alt="Logo" height="40">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon custom-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav text-center ml-auto justify-content-center justify-content-lg-end ms-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Gestion utilisateurs
                    </a>
                    <ul class="dropdown-menu bg-dark-grey">
                        <li>
                            <a class="dropdown-item text-light text-center" href="?page=admin/dashboard/users/list">Liste des utilisateurs</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="?page=logout">Se deconnecter</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<?php
$navbar = ob_get_clean();

ob_start()
?>

<h1 class="text-center"> <?= $title ?> </h1>

<div class="container mt-5">
    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Pseudo</th>
                <th scope="col">Email</th>
                <th scope="col">Photo de profil</th>
                <th scope="col">Biographie</th>
                <th scope="col">Réseaux sociaux</th>
                <th scope="col">Modifier</th>
                <th scope="col">Bannir</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user) : ?>
                <tr>
                    <td><?= $user->pseudo ?></td>
                    <td><?= $user->email ?></td>
                    <td> <img class="rounded-2" src="./../../../../public/uploads/users/<?= $user->picture ?>" height="50px" alt=""></td>
                    <td><?= $user->biography ?></td>
                    <td><?= $user->social_networks ?></td>
                    <td>
                        <a class="btn btn-warning" href="?page=admin/dashboard/users/update&id=<?= $user->user_id ?>"><i class="bi bi-pencil"></i></a>
                    </td>
                    <td>
                        <form class="delete-form" action="?page=admin/dashboard/users/delete&id=<?= $user->user_id ?>" method="post">
                            <input type="hidden" name="user_id" value="<?= $user->user_id ?>">
                            <button class="btn btn-danger" type="submit"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
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