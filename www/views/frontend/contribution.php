<?php
ob_start();
?>

<main class="my-5">
    <div class="container">
        <div class="row">
            <h1 class="m-0 fs-4 py-4 text-center text-light"><?= $title ?></h1>
        </div>
        <div class="row h-50 py-3 d-flex justify-content-center">
            <div class="col-10 col-md-8 col-lg-6">
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="link" class="text-light">Lien</label>
                        <input type="text" class="form-control rounded-20" id="link" name="link" value="<?= htmlspecialchars($contribution['link'] ?? '') ?>">
                    </div>
                    <div class="d-flex justify-content-center my-3">
                        <button type="submit" class="button-edit">Mettre à jour</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<?php
$main = ob_get_clean();
?>