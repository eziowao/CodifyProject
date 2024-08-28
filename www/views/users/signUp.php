<?php

ob_start()
?>

<div class="container my-5">
    <h1 class="text-light text-center"><?= $title ?></h1>
    <div class="d-flex justify-content-center">
        <div class="col-5">
            <form method="post" class="text-light">
                <fieldset>
                    <div class="mb-3">
                        <label for="pseudo" class="form-label mt-4">Pseudo <small class="text-danger">*</small></label>
                        <input type="text" name="pseudo" class="form-control rounded-20" id="pseudo" placeholder="Entrez un pseudo" value="<?= htmlspecialchars($_POST['pseudo'] ?? '') ?>">
                        <?php if (isset($errors['pseudo'])): ?>
                            <p class="text-danger"><?= $errors['pseudo'] ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email <small class="text-danger">*</small></label>
                        <input type="email" name="email" class="form-control rounded-20" id="email" placeholder="email@example.com" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
                        <?php if (isset($errors['email'])): ?>
                            <p class=" text-danger"><?= $errors['email'] ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Votre mot de passe <small class="text-danger">*</small></label>
                        <input type="password" name="password" class="form-control rounded-20" id="password" placeholder="Entrez votre mot de passe">
                        <?php if (isset($errors['password'])): ?>
                            <p class=" text-danger"><?= $errors['password'] ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="mb-3">
                        <label for="confirmPassword" class="form-label">Confirmer votre mot de passe <small class="text-danger">*</small></label>
                        <input type="password" name="confirmPassword" class="form-control rounded-20" id="confirmPassword" placeholder="Confirmez votre mot de passe">
                        <?php if (isset($errors['password'])): ?>
                            <p class=" text-danger"><?= $errors['password'] ?></p>
                        <?php endif; ?>
                    </div>
                </fieldset>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="button-edit p-2">S'inscrire</button>
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