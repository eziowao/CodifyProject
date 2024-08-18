<?php

ob_start()
?>

<h1 class="text-center"> <?= $title ?> </h1>

<div class="container mt-5">
    <div class="d-flex justify-content-center">
        <div class="col-md-6 text-light">
            <form method="POST" action="" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Nom du Challenge</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?= htmlspecialchars($_POST['name'] ?? '') ?>">
                    <?php if (isset($errors['name'])): ?>
                        <p class=" text-danger"><?= $errors['name'] ?></p>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3"><?= htmlspecialchars($_POST['description'] ?? '') ?></textarea>
                    <?php if (isset($errors['description'])): ?>
                        <p class=" text-danger"><?= $errors['description'] ?></p>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="picture">Image descriptive</label>
                    <input type="file" class="form-control" id="picture" name="picture" accept=".jpg, .jpeg, .png, .gif">
                    <?php if (isset($errors['picture'])): ?>
                        <p class=" text-danger"><?= $errors['picture'] ?></p>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="file_url">Url de la maquette</label>
                    <input type="text" class="form-control" id="file_url" name="file_url" value="<?= htmlspecialchars($_POST['file_url'] ?? '') ?>">
                    <?php if (isset($errors['file_url'])): ?>
                        <p class=" text-danger"><?= $errors['file_url'] ?></p>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="published_at">Date de Publication</label>
                    <input type="date" class="form-control" id="published_at" name="published_at" value="<?= htmlspecialchars($_POST['published_at'] ?? '') ?>">
                    <?php if (isset($errors['published_at'])): ?>
                        <p class=" text-danger"><?= $errors['published_at'] ?></p>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="type_id">Type de Challenge</label>
                    <select class="form-select mt-4" name="type_id" id="type_id">
                        <option value="">Type de challenge</option>
                        <?php if (!empty($types) && is_array($types)): ?>
                            <?php foreach ($types as $type): ?>
                                <option value="<?= htmlspecialchars($type->type_id) ?>"
                                    <?= ($_POST['type_id'] ?? '') == $type->type_id ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($type->type) ?>
                                </option>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <option value="">Aucun type disponible</option>
                        <?php endif; ?>
                    </select>
                    <?php if (isset($errors['type_id'])): ?>
                        <p class="text-danger"><?= htmlspecialchars($errors['type_id']) ?></p>
                    <?php endif; ?>
                </div>
                <button type="submit" class="btn btn-primary">Ajouter le Challenge</button>
            </form>
        </div>
    </div>
</div>

<?php
$main = ob_get_clean();

ob_start()
?>

<!-- <script src="./../../public/assets/js/calendar.js"></script> -->


<?php
$script = ob_get_clean();
?>