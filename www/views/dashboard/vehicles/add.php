<?php
ob_start()
?>

<div class="container">
    <?php if ($success) : ?>
        <div class="alert alert-success">
            Le véhicule a été ajouté avec succès !
        </div>
    <?php endif; ?>
    <div class="d-flex justify-content-center">
        <div class="col-md-6">
            <form method="POST" action="" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="mt-2" for="brand">Marque : </label>
                    <input type="text" class="form-control" id="brand" name="brand" value="<?= $brand ?? '' ?>" required>
                    <label class="mt-2" for="model">Modèle : </label>
                    <input type="text" class="form-control" id="model" name="model" value="<?= $model ?? '' ?>" required>
                    <label class="mt-2" for="registration">Immatriculation : </label>
                    <input type="text" class="form-control" id="registration" name="registration" value="<?= $registration ?? '' ?>" required>
                    <label class="mt-2" for="mileage">Kilométrage : </label>
                    <input type="text" class="form-control" id="mileage" name="mileage" value="<?= $mileage ?? '' ?>" required>
                    <div class="mb-3">
                        <label for="picture" class="form-label mt-2">Photo</label>
                        <input type="file" class="form-control" name="picture" id="picture">
                    </div>
                    <select class="form-select mt-4" name="categorie_id" id="categorie_id" required>
                        <option value=""> Catégorie </option>
                        <?php foreach ($categories as $category) {
                        ?>
                            <option value="<?= $category->categorie_id ?>"><?= $category->name ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="button-27 mt-4">Ajouter</button>
                </div>
                <?= $errors['brand'] ?? '' ?>
            </form>
        </div>
    </div>
</div>

<?php
$main = ob_get_clean()
?>