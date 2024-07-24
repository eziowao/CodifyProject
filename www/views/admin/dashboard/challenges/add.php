<?php

ob_start()
?>

<h1 class="text-center"> <?= $title ?> </h1>

<div class="container mt-5">
    <div class="d-flex justify-content-center">
        <div class="col-md-6">
            <form method="POST" action="" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Nom du Challenge</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                </div>
                <div class="form-group">
                    <label for="published_at">Date de Publication</label>
                    <input type="datetime-local" class="form-control" id="published_at" name="published_at" required>
                </div>
                <div class="form-group">
                    <label for="picture">Image</label>
                    <input type="file" class="form-control-file" id="picture" name="picture" accept="image/*">
                </div>
                <div class="form-group">
                    <label for="file_url">Fichier</label>
                    <input type="file" class="form-control-file" id="file_url" name="file_url">
                </div>
                <button type="submit" class="btn btn-primary">Ajouter le Challenge</button>
            </form>
        </div>
    </div>
</div>

<?php
$main = ob_get_clean();

ob_start()
?>

<script src="./../../public/assets/js/modal.js"></script>

<?php
$script = ob_get_clean();
?>