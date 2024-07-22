<?php
ob_start()
?>

<div class="container">

    <?php if ($success) : ?>
        <div class="alert alert-success">
            La catégorie a été mise à jour avec succès.
        </div>
    <?php endif; ?>
    <div class="d-flex justify-content-center">
        <div class="col-md-6">
            <?php if ($vehicle) : ?>
                <form action="" method="post">
                    <div class="form-group">
                        <label class="mt-2" for="brand">Marque</label>
                        <input type="text" class="form-control" id="brand" name="brand" value="<?= ($vehicle['brand']); ?>" required>
                        <label class="mt-2" for="model">Modèle</label>
                        <input type="text" class="form-control" id="model" name="model" value="<?= ($vehicle['model']); ?>" required>
                        <label class="mt-2" for="registration">Immatriculation</label>
                        <input type="text" class="form-control" id="registration" name="registration" value="<?= ($vehicle['registration']); ?>" required>
                        <label class="mt-2" for="mileage">Kilométrage</label>
                        <input type="text" class="form-control" id="mileage" name="mileage" value="<?= ($vehicle['mileage']); ?>" required>
                        <div class="mb-3">
                            <label for="picture" class="form-label mt-2">Photo</label>
                            <input type="file" class="form-control" name="picture" id="picture">
                        </div>
                        <label class="mt-2" for="categorie_id">Catégorie</label>
                        <select class="form-select" name="categorie_id" id="categorie_id" required>
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
                        <button type="submit" class="btn btn-success mt-4">Mettre à jour</button>
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