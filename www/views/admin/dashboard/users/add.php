<?php

ob_start()
?>

<h1 class="text-center"> <?= $title ?> </h1>

<div class="d-flex justify-content-center">
    <div class="col-md-6 text-light">

        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label class="mt-2" for="pseudo">Pseudo</label>
                <input type="text" class="form-control" id="pseudo" name="pseudo" required>
                <label class="mt-2" for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email" required>
                <label class="mt-2" for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-success mt-4">Créer un utilisateur</button>
            </div>
        </form>

    </div>
</div>

<?php
$main = ob_get_clean();

ob_start()
?>


<?php
$script = ob_get_clean();
?>