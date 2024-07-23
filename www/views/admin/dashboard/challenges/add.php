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
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Gestion challenges
                    </a>
                    <ul class="dropdown-menu bg-dark-grey">
                        <li>
                            <a class="dropdown-item text-light text-center" href="?page=admin/dashboard/challenges/list">Liste des challenges</a>
                        </li>
                        <li>
                            <a class="dropdown-item text-light text-center" href="?page=admin/dashboard/challenges/add">Créer un challenge</a>
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
    <div class="d-flex justify-content-center">
        <div class="col-md-6">
            <form method="POST" action="" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="mt-2" for="brand">Nom : </label>
                    <input type="text" class="form-control" id="brand" name="brand" value="<?= $brand ?? '' ?>" required>
                    <label class="mt-2" for="model">Modèle : </label>
                    <input type="text" class="form-control" id="model" name="model" value="<?= $model ?? '' ?>" required>
                    <label class="mt-2" for="registration">Immatriculation : </label>
                    <input type="text" class="form-control" id="registration" name="registration" value="<?= $registration ?? '' ?>" required>
                    <label class="mt-2" for="mileage">Kilométrage : </label>
                    <input type="text" class="form-control" id="mileage" name="mileage" value="<?= $mileage ?? '' ?>" required>
                    <div class="mb-3">
                        <label for="picture" class="form-label mt-2">Photo</label>
                        <input type="file" class="form-control" name="picture" id="picture">
                    </div>
                    <select class="form-select mt-4" name="categorie_id" id="categorie_id" required>
                        <option value=""> Catégorie </option>
                        <?php foreach ($categories as $category) {
                        ?>
                            <option value="<?= $category->categorie_id ?>"><?= $category->name ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="button-27 mt-4">Ajouter</button>
                </div>
                <?= $errors['brand'] ?? '' ?>
            </form>
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