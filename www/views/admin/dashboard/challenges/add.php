<?php

ob_start()
?>

<div class="container my-5">
    <h1 class="text-center text-light"> <?= $title ?> </h1>
    <div class="d-flex justify-content-center">
        <div class="col-md-6 text-light">
            <form method="POST" action="" enctype="multipart/form-data">
                <div class="form-group my-3">
                    <label for="name">Nom du Challenge <small class="text-danger">*</small> </label>
                    <input type="text" class="form-control" id="name" name="name" pattern="[a-zA-ZÀ-ÿ\s\-]{2,100}" placeholder="Dashboard administrateur" value="<?= htmlspecialchars($_POST['name'] ?? '') ?>">
                    <?php if (isset($errors['name'])): ?>
                        <p class=" text-danger"><?= $errors['name'] ?></p>
                    <?php endif; ?>
                </div>
                <div class="form-group my-3">
                    <label for="description">Description <small class="text-danger">*</small></label>
                    <textarea class="form-control" id="description" name="description" placeholder="Décrivez ici les détails du challenge, les objectifs, les règles, et toute information pertinente pour les participants." rows="4"><?= htmlspecialchars($_POST['description'] ?? '') ?></textarea>
                    <?php if (isset($errors['description'])): ?>
                        <p class=" text-danger"><?= $errors['description'] ?></p>
                    <?php endif; ?>
                </div>
                <div class="form-group my-3">
                    <label for="picture">Image descriptive <small class="text-danger">*</small></label>
                    <input type="file" class="form-control" id="picture" name="picture" accept=".jpg, .jpeg, .png, .gif">
                    <?php if (isset($errors['picture'])): ?>
                        <p class=" text-danger"><?= $errors['picture'] ?></p>
                    <?php endif; ?>
                </div>
                <div class="form-group my-3">
                    <label for="file_url">Url de la maquette <small class="text-danger">*</small></label>
                    <input type="text" class="form-control" id="file_url" name="file_url" placeholder="https://www.figma.com/design/77fgW8DVZj5/Dashboard" value="<?= htmlspecialchars($_POST['file_url'] ?? '') ?>">
                    <?php if (isset($errors['file_url'])): ?>
                        <p class=" text-danger"><?= $errors['file_url'] ?></p>
                    <?php endif; ?>
                </div>
                <div class="form-group my-3">
                    <label for="published_at">Date de Publication <small> (doit correspondre à un lundi) <span class="text-danger">*</span></small></label>
                    <input type="date" class="form-control" id="published_at" name="published_at" value="<?= htmlspecialchars($_POST['published_at'] ?? '') ?>">
                    <?php if (isset($errors['published_at'])): ?>
                        <p class=" text-danger"><?= $errors['published_at'] ?></p>
                    <?php endif; ?>
                </div>
                <div class="form-group my-3">
                    <label for="type_id">Type de Challenge <small class="text-danger">*</small></label>
                    <select class="form-select" name="type_id" id="type_id">
                        <option value="">Type de challenge</option>
                        <?php if (!empty($types) && is_array($types)): ?>
                            <?php foreach ($types as $type): ?>
                                <option value="<?= $type->type_id ?>"
                                    <?= ($_POST['type_id'] ?? '') == $type->type_id ? 'selected' : '' ?>>
                                    <?= $type->type ?>
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
                <div class="d-flex justify-content-center my-3">
                    <button type="submit" class="p-2  bg-green text-light border-0 rounded-5">Ajouter le Challenge</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
$main = ob_get_clean();
?>