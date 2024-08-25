<?php

ob_start()
?>

<h1 class="text-center"> <?= $title ?> </h1>

<div class="container mt-5">
    <div class="d-flex justify-content-center">
        <div class="col-6 ">
            <?php if ($type) : ?>
                <form action="" method="post">
                    <div class="form-group my-5">
                        <label class="mb-3" for="type">Nom de la catégorie</label>
                        <input type="text" class="form-control" id="type" name="type" value="<?= $type['type'] ?>" required>
                        <?php if (isset($errors['type'])): ?>
                            <p class=" text-danger"><?= $errors['type'] ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-success">Mettre à jour</button>
                    </div>
                </form>
            <?php else : ?>
                <div class="alert alert-warning">
                    Type non trouvé.
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php
$main = ob_get_clean();

ob_start()
?>

<?php
$script = ob_get_clean();
?>