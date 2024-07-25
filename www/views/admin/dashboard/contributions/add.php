<?php

ob_start()
?>

<h1 class="text-center"> <?= $title ?> </h1>

<div class="container mt-5">
    <?php if ($success) : ?>
        <div class="alert alert-success">
            La contribution a été ajoutée avec succès !
        </div>
    <?php endif; ?>
    <div class="d-flex justify-content-center">
        <div class="col-6 text-light">
            <form action="" method="POST">
                <div class="form-group my-5">
                    <label class="mb-3" for="link">Lien de la contribution</label>
                    <input type="text" class="form-control" id="link" name="link" value="" pattern="[a-zA-Z]{1-20}" required>
                </div>
                <div class="form-group my-5">
                    <label for="challenge_id">type de challenge</label>
                    <select class="form-select mt-2" name="challenge_id" id="challenge_id" required>
                        <option value=""> Type de challenge </option>
                        <?php foreach ($challenges as $challenge) {
                        ?>
                            <option value="<?= $challenge->challenge_id ?>"><?= $challenge->name ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group my-5">
                    <label for="user_id">Auteur de la contribution</label>
                    <select class="form-select mt-2" name="user_id" id="user_id" required>
                        <option value=""> Utilisateur </option>
                        <?php foreach ($users as $user) {
                        ?>
                            <option value="<?= $user->user_id ?>"><?= $user->pseudo ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="button-27">Ajouter</button>
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