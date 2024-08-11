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
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                </div>
                <div class="form-group">
                    <label for="picture">Image descriptive</label>
                    <input type="file" class="form-control" id="picture" name="picture" accept="image/*">
                </div>
                <div class="form-group">
                    <label for="file_url">Url de la maquette</label>
                    <input type="text" class="form-control" id="file_url" name="file_url">
                </div>
                <div class="form-group">
                    <label for="published_at">Date de Publication</label>
                    <input type="datetime-local" class="form-control" id="published_at" name="published_at" required>
                </div>
                <select class="form-select mt-4" name="type_id" id="type_id" required>
                    <option value=""> Type de challenge </option>
                    <?php if (!empty($types) && is_array($types)): ?>
                        <?php foreach ($types as $type): ?>
                            <option value="<?= htmlspecialchars($type->type_id) ?>"><?= htmlspecialchars($type->type) ?></option>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <option value="">Aucun type disponible</option>
                    <?php endif; ?>
                </select>
                <button type="submit" class="btn btn-primary">Ajouter le Challenge</button>
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