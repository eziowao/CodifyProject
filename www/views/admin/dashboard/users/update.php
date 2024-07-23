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

<div class="d-flex justify-content-center">
    <div class="col-md-6">
        <?php if ($user) : ?>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="mt-2" for="pseudo">Pseudo</label>
                    <input type="text" class="form-control" id="pseudo" name="pseudo" value="<?= $user['pseudo']; ?>" required>
                    <label class="mt-2" for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email" value="<?= $user['email']; ?>" required>
                    <label class="mt-2" for="biography">Biographie</label>
                    <input type="text" class="form-control" id="biography" name="biography" value="<?= $user['biography']; ?>">
                    <label class="mt-2" for="social_networks">Réseaux sociaux</label>
                    <input type="text" class="form-control" id="social_networks" name="social_networks" value="<?= $user['social_networks']; ?>">
                    <div class="mb-3">
                        <label for="picture" class="form-label mt-2">Photo</label>
                        <input type="file" class="form-control" name="picture" id="picture">
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-success mt-4">Mettre à jour</button>
                </div>
            </form>
        <?php else : ?>
            <div class="alert alert-warning">
                Catégorie non trouvée.
            </div>
        <?php endif; ?>
    </div>
</div>

<?php
$main = ob_get_clean();

ob_start()
?>


<?php
$script = ob_get_clean();
?>