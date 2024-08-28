<?php

ob_start()
?>

<div class="container my-5">
    <div class="mb-3">
        <a class="text-light" href="?page=admin/dashboard/challenges/list"><i class="fa-solid fa-arrow-left text-light px-2"></i>Revenir à la liste des challenges</a>
    </div>
    <h1 class="text-center text-light"> <?= $title ?> </h1>
    <div class="d-flex justify-content-center">
        <div class="col-lg-8 text-light my-3">
            <?php if ($challenge) : ?>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <div class="form-group">
                            <label class="my-2" for="name">Nom du Challenge</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Dashboard administrateur" value="<?= $challenge['name']; ?>">
                            <?php if (isset($errors['name'])): ?>
                                <p class=" text-danger"><?= $errors['name'] ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <label class="my-2" for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="5" placeholder="Décrivez ici les détails du challenge, les objectifs, les règles, et toute information pertinente pour les participants." value="<?= $challenge['description']; ?>"><?= $challenge['description']; ?></textarea>
                            <?php if (isset($errors['description'])): ?>
                                <p class=" text-danger"><?= $errors['description'] ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <label class="my-2" for="picture">Image descriptive</label>
                            <input type="file" class="form-control" id="picture" name="picture" accept=".jpg, .jpeg, .png, .gif">
                            <div>
                                <?php if ($challenge['picture']) : ?>
                                    <div class="d-flex justify-content-center my-3">
                                        <div class="col-6">
                                            <img src="./../../../../public/uploads/challenges/<?= $challenge['picture']; ?>" alt="Challenge Image" class="img-fluid">
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <?php if (isset($errors['picture'])): ?>
                                <p class=" text-danger"><?= $errors['picture'] ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <label class="my-2" for="file_url">Url de la maquette</label>
                            <input type="text" class="form-control" id="file_url" name="file_url" value="<?= $challenge['file_url']; ?>">
                            <?php if (isset($errors['file_url'])): ?>
                                <p class=" text-danger"><?= $errors['file_url'] ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <label class="my-2" for="published_at">Date de Publication</label>
                            <input type="datetime-local" class="form-control" id="published_at" name="published_at" value="<?= (new DateTime($challenge['published_at']))->format('Y-m-d\TH:i'); ?>">
                            <?php if (isset($errors['published_at'])): ?>
                                <p class="text-danger"><?= $errors['published_at'] ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <label class="my-2" for="type_id">Type de Challenge</label>
                            <select class="form-select" name="type_id" id="type_id">
                                <option value="">Type de challenge</option>
                                <?php if (!empty($types) && is_array($types)): ?>
                                    <?php foreach ($types as $type): ?>
                                        <option value="<?= htmlspecialchars($type->type_id) ?>"
                                            <?= ($_POST['type_id'] ?? $challenge['type_id']) == $type->type_id ? 'selected' : '' ?>>
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

                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="button-edit p-2 mt-4">Mettre à jour</button>
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