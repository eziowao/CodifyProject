<?php

ob_start()
?>

<div class="container">
    <h1 class="text-light text-center"><?= $title ?></h1>

    <div class="d-flex justify-content-center">
        <div class="col-6">
            <form method="post" class="text-light">
                <fieldset>
                    <div class="mb-3">
                        <label for="email" class="form-label mt-4">Email</label>
                        <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                        <p> <?= isset($errors['email']) && !empty($errors['email']) ? $errors['email'] : '' ?></p>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label mt-4">Votre mot de passe</label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="">
                        <p> <?= isset($errors['password']) && !empty($errors['password']) ? $errors['password'] : '' ?></p>
                        <p> <?= isset($errors['auth']) && !empty($errors['auth']) ? $errors['auth'] : '' ?></p>

                    </div>
                </fieldset>
                <button type="submit" class="btn btn-primary">Se connecter</button>
            </form>
        </div>
    </div>
</div>

<?php
$main = ob_get_clean();

ob_start()
?>

<script src="./public/assets/js/script.js"></script>

<?php
$script = ob_get_clean();
?>