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
                    <td><?= $user->biography ?></td>
                    <td><?= $user->social_networks ?></td>
                    <td> <button>Modifier</button> </td>
                    <td> <button>Bannir</button> </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php
$main = ob_get_clean()
?>