<?php

ob_start()
?>

<div class="container my-5">
    <h1 class="text-light text-center"><?= $title ?></h1>
    <div class="d-flex justify-content-center my-2">
        <div class="col-4">
            <form method="post" class="text-light">
                <fieldset>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="email@example.com">
                        <p> <?= isset($errors['email']) && !empty($errors['email']) ? $errors['email'] : '' ?></p>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Votre mot de passe</label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="Entrez votre mot de passe">
                        <p> <?= isset($errors['password']) && !empty($errors['password']) ? $errors['password'] : '' ?></p>
                        <p> <?= isset($errors['auth']) && !empty($errors['auth']) ? $errors['auth'] : '' ?></p>

                    </div>
                </fieldset>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="bg-green text-light border-0 rounded-5 p-2">Se connecter</button>
                </div>
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