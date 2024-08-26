<?php
ob_start();
?>

<main class="my-5">
    <div class="container">
        <div class="row">
            <h1 class="m-0 fs-4 py-4 text-center text-light"><?= htmlspecialchars($title) ?></h1>
        </div>
        <div class="row h-50 py-3">
            <form action="" method="POST">
                <div class="form-group">
                    <label for="link">Lien</label>
                    <input type="text" class="form-control" id="link" name="link" value="<?= htmlspecialchars($contribution['link'] ?? '') ?>">
                </div>
                <button type="submit" class="btn btn-primary">Mettre à jour</button>
            </form>
        </div>
    </div>
</main>

<?php
$main = ob_get_clean();
?>