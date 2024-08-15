<?php

ob_start()
?>

<h1 class="text-center"> <?= $title ?> </h1>

<div class="container mt-5">
    <?php if ($success) : ?>
        <div class="alert alert-success">
            Le type de challenges a été ajoutée avec succès !
        </div>
    <?php endif; ?>
    <div class="d-flex justify-content-center">
        <div class="col-6 ">
            <form action="" method="POST">
                <div class="form-group my-5">
                    <label class="mb-3" for="type">Nom du type</label>
                    <input type="text" class="form-control" id="type" name="type" value="" pattern="[a-zA-Z]{1-20}" required>
                    <?php if (isset($errors['type'])): ?>
                        <p class=" text-danger"><?= $errors['type'] ?></p>
                    <?php endif; ?>
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="button-27">Ajouter</button>
                </div>
            </form>
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