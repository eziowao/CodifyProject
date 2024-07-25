<?php

ob_start()
?>

<h1 class="text-center"> <?= $title ?> </h1>

<div class="d-flex justify-content-center">
    <div class="col-md-6">
        <?php if ($user) : ?>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="mt-2" for="pseudo">Pseudo</label>
                    <input type="text" class="form-control" id="pseudo" name="pseudo" value="<?= $user['pseudo']; ?>" required>
                    <label class="mt-2" for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email" value="<?= $user['email']; ?>" required>
                    <label class="mt-2" for="biography">Biographie</label>
                    <input type="text" class="form-control" id="biography" name="biography" value="<?= $user['biography']; ?>">
                    <label class="mt-2" for="website">website</label>
                    <input type="text" class="form-control" id="website" name="website" value="<?= $user['website']; ?>">
                    <label class="mt-2" for="website">github</label>
                    <input type="text" class="form-control" id="github" name="github" value="<?= $user['github']; ?>">
                    <label class="mt-2" for="twitter">twitter</label>
                    <input type="text" class="form-control" id="twitter" name="twitter" value="<?= $user['twitter']; ?>">
                    <label class="mt-2" for="linkedin">linkedin</label>
                    <input type="text" class="form-control" id="linkedin" name="linkedin" value="<?= $user['linkedin']; ?>">
                    <label class="mt-2" for="discord">discord</label>
                    <input type="text" class="form-control" id="discord" name="discord" value="<?= $user['discord']; ?>">


                    <div class="mb-3">
                        <label for="picture" class="form-label mt-2">Photo</label>
                        <input type="file" class="form-control" name="picture" id="picture">
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-success mt-4">Mettre à jour</button>
                </div>
            </form>
        <?php else : ?>
            <div class="alert alert-warning">
                Utilisateur non trouvé.
            </div>
        <?php endif; ?>
    </div>
</div>

<?php
$main = ob_get_clean();

ob_start()
?>


<?php
$script = ob_get_clean();
?>