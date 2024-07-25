<?php

ob_start()
?>

<h1 class="text-center"> <?= $title ?> </h1>

<div class="container mt-5">
    <div class="d-flex justify-content-center">
        <div class="col-lg-8 text-light">
            <?php if ($challenge) : ?>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="mt-2" for="name">Nom du Challenge</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?= $challenge['name']; ?>" required>

                        <label class="mt-2" for="description">Description</label>
                        <input type="text" class="form-control" id="description" name="description" value="<?= $challenge['description']; ?>" required>

                        <label class="mt-2" for="picture">Image descriptive</label>
                        <input type="file" class="form-control" id="picture" name="picture">
                        <div>
                            <?php if ($challenge['picture']) : ?>
                                <img src="./../../../../public/uploads/challenges/<?= $challenge['picture']; ?>" alt="Challenge Image" style="max-width: 100px;">
                            <?php endif; ?>
                        </div>

                        <label class="mt-2" for="file_url">Url de la maquette</label>
                        <input type="text" class="form-control" id="file_url" name="file_url" value="<?= $challenge['file_url']; ?>">

                        <label for="published_at">Date de Publication</label>
                        <input type="datetime-local" class="form-control" id="published_at" name="published_at" value="<?= (new DateTime($challenge['published_at']))->format('Y-m-d\TH:i'); ?>" required>

                        <label class="mt-2" for="type_id">Type de challenge</label>
                        <select class="form-select mt-4" name="type_id" id="type_id" required>
                            <option value="">Type de challenge</option>
                            <?php foreach ($types as $type) : ?>
                                <option value="<?= $type->type_id ?>" <?= $type->type_id == $challenge['type_id'] ? 'selected' : '' ?>>
                                    <?= $type->type ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-success mt-4">Mettre à jour</button>
                    </div>
                </form>
            <?php else : ?>
                <div class="alert alert-warning">
                    Challenge non trouvé.
                </div>
            <?php endif; ?>
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