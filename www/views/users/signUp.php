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
                        <label for="pseudo" class="form-label mt-4">Pseudo</label>
                        <input type="text" name="pseudo" class="form-control" id="pseudo" placeholder="Enter pseudo" value="<?= htmlspecialchars($_POST['pseudo'] ?? '') ?>">
                        <?php if (isset($errors['pseudo'])): ?>
                            <p class="text-primary"><?= $errors['pseudo'] ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label mt-4">Email</label>
                        <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
                        <?php if (isset($errors['email'])): ?>
                            <p class=" text-danger"><?= $errors['email'] ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label mt-4">Votre mot de passe</label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="">
                        <p> <?= isset($errors['password']) && !empty($errors['password']) ? $errors['password'] : '' ?></p>
                    </div>
                    <div class="mb-3">
                        <label for="confirmPassword" class="form-label mt-4">Confirmer votre mot de passe</label>
                        <input type="password" name="confirmPassword" class="form-control" id="confirmPassword" placeholder="">
                        <p> <?= isset($errors['password']) && !empty($errors['password']) ? $errors['password'] : '' ?></p>
                    </div>
                </fieldset>
                <button type="submit" class="btn btn-primary">S'inscrire</button>
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