<?php

ob_start()
?>

<nav class="navbar navbar-expand-lg navbar-light my-4">
    <div class="container">
        <a class="navbar-brand" href="?page=home">
            <img src="./public/assets/img/logo_v2.png" alt="Logo" height="40">
        </a>
    </div>
</nav>

<?php
$navbar = ob_get_clean();


ob_start()
?>

<div class="container d-flex justify-content-center">
    <div class="col-6 my-5">
        <form method="post" action="" align-items-center>
            <div class="mb-3">
                <label for="pseudo" class="form-label text-white">Pseudo</label>
                <input type="text" class="form-control rounded-4 bg-dark-grey text-light" name="pseudo" id="pseudo">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label text-white">Mot de passe</label>
                <input type="password" class="form-control rounded-4 bg-dark-grey text-light" name="password" id="password">
            </div>
            <div class="modal-footer text-center border-0">
                <input class="btn col- col-lg-4 bg-green text-light border-0 rounded-5 mx-auto" type="submit" name="valider">
            </div>
        </form>
    </div>
</div>
<?php
$main = ob_get_clean()
?>