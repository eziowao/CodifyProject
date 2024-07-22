<?php
ob_start()
?>

<div class="container">
    <?php if ($success) : ?>
        <div class="alert alert-success">
            La catégorie a été ajoutée avec succès !
        </div>
    <?php endif; ?>
    <div class="d-flex justify-content-center">
        <div class="col-6 ">
            <form action="" method="POST">
                <div class="form-group my-5">
                    <label class="mb-3" for="name">Nom de la catégorie</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?= $name ?? '' ?>" pattern="[a-zA-Z]{1-20}" required>
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="button-27">Ajouter</button>
                </div>
                <?= $errors['name'] ?? '' ?>
            </form>
        </div>
    </div>
    <div class="d-flex justify-content-end">
        <img src="./../../../public/assets/img/flash.png" height="200vh" alt="">
    </div>
</div>

<?php
$main = ob_get_clean()
?>