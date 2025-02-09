<?php

ob_start()
?>

<div class="container my-5">
    <div class="mb-3">
        <a class="text-light" href="?page=admin/dashboard/contributions/list"><i class="fa-solid fa-arrow-left text-light px-2"></i>Revenir à la liste des contributions</a>
    </div>
    <h1 class="text-center mb-5 text-light"> <?= $title ?> </h1>
    <div class="d-flex justify-content-center">
        <div class="col-6 text-light">
            <form action="" method="POST">
                <div class="form-group">
                    <label class="mb-3" for="link">Lien de la contribution</label>
                    <input type="text" class="form-control" id="link" name="link" placeholder="https://eziowao.github.io/JeuDuPendu/" value="<?= htmlspecialchars($contribution['link'] ?? '') ?>" required>
                </div>
                <div class="form-group my-5">
                    <label for="challenge_id">Type de challenge</label>
                    <select class="form-select mt-2" name="challenge_id" id="challenge_id" required>
                        <option value="">Type de challenge</option>
                        <?php if (!empty($challenges) && is_array($challenges)): ?>
                            <?php foreach ($challenges as $challenge) : ?>
                                <option value="<?= $challenge->challenge_id ?>" <?= isset($contribution) && $contribution['challenge_id'] == $challenge->challenge_id ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($challenge->name) ?>
                                </option>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <option value="">Aucun challenge disponible</option>
                        <?php endif; ?>
                    </select>
                </div>
                <div class="form-group my-5">
                    <label for="user_id">Auteur de la contribution</label>
                    <select class="form-select mt-2" name="user_id" id="user_id" required>
                        <option value="">Utilisateur</option>
                        <?php if (!empty($users) && is_array($users)): ?>
                            <?php foreach ($users as $user) : ?>
                                <option value="<?= $user->user_id ?>" <?= isset($contribution) && $contribution['user_id'] == $user->user_id ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($user->pseudo) ?>
                                </option>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <option value="">Aucun utilisateur disponible</option>
                        <?php endif; ?>
                    </select>
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="button-edit">Mettre à jour</button>
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