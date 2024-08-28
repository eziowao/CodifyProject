<?php

ob_start()
?>

<div class="container my-5">
    <div class="mb-3">
        <a class="text-light" href="?page=admin/dashboard/types/list"><i class="fa-solid fa-arrow-left text-light px-2"></i>Revenir à la liste des types</a>
    </div>
    <h1 class="text-center text-light mb-5"> <?= $title ?> </h1>
    <div class="d-flex justify-content-center">
        <div class="col-6 ">
            <?php if ($type) : ?>
                <form action="" method="post">
                    <div class="form-group">
                        <label class="mb-3 text-light" for="type">Nom de la catégorie</label>
                        <input type="text" class="form-control" id="type" name="type" value="<?= $type['type'] ?>" required>
                        <?php if (isset($errors['type'])): ?>
                            <p class=" text-danger"><?= $errors['type'] ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="d-flex justify-content-center my-3">
                        <button type="submit" class="button-edit p-2">Mettre à jour</button>
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
?>