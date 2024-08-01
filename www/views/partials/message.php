<?php
$flash = getFlash();
if (!empty($flash)) : ?>
    <div class="alert alert-dismissible alert-<?= $flash["type"] ?>">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong> <?= $flash["message"] ?></strong>
    </div>
<?php endif; ?>