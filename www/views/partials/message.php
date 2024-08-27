<?php
$flash = getFlash();
if (!empty($flash)) : ?>
    <div class="container d-flex justify-content-center">
        <div class="alert alert-dismissible alert-<?= $flash["type"] ?>">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong> <?= $flash["message"] ?></strong>
        </div>
    </div>
<?php endif; ?>