<?php

ob_start()
?>

<h1 class="text-center"> <?= $title ?> </h1>

<div class="container mt-5">
    <?php if ($success) : ?>
        <div class="alert alert-success">
            La contribution a été mise à jour avec succès !
        </div>
    <?php endif; ?>
    <div class="d-flex justify-content-center">
        <div class="col-6 text-light">
            <form action="" method="POST">
                <div class="form-group my-5">
                    <label class="mb-3" for="link">Lien de la contribution</label>
                    <input type="text" class="form-control" id="link" name="link" value="<?= htmlspecialchars($contribution['link'] ?? '') ?>" required>
                </div>
                <div class="form-group my-5">
                    <label for="challenge_id">Type de challenge</label>
                    <select class="form-select mt-2" name="challenge_id" id="challenge_id" required>
                        <option value="">Type de challenge</option>
                        <?php foreach ($challenges as $challenge) : ?>
                            <option value="<?= $challenge->challenge_id ?>" <?= isset($contribution) && $contribution['challenge_id'] == $challenge->challenge_id ? 'selected' : '' ?>>
                                <?= htmlspecialchars($challenge->name) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group my-5">
                    <label for="user_id">Auteur de la contribution</label>
                    <select class="form-select mt-2" name="user_id" id="user_id" required>
                        <option value="">Utilisateur</option>
                        <?php foreach ($users as $user) : ?>
                            <option value="<?= $user->user_id ?>" <?= isset($contribution) && $contribution['user_id'] == $user->user_id ? 'selected' : '' ?>>
                                <?= htmlspecialchars($user->pseudo) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="button-27">Mettre à jour</button>
                </div>
                <?= $errors['type'] ?? '' ?>
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