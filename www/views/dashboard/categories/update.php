<?php
ob_start()
?>

<div class="container">
    <div class="d-flex justify-content-center">
        <div class="col-6 ">

            <?php if ($success) : ?>
                <div class="alert alert-success">
                    La catégorie a été mise à jour avec succès.
                </div>
            <?php endif; ?>

            <?php if ($category) : ?>
                <form action="" method="post">
                    <div class="form-group my-5">
                        <label class="mb-3" for="name">Nom de la catégorie</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?= ($category['name']); ?>" required>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-success">Mettre à jour</button>
                    </div>
                </form>
            <?php else : ?>
                <div class="alert alert-warning">
                    Catégorie non trouvée.
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php
$main = ob_get_clean()
?>