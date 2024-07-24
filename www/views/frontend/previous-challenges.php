<?php

ob_start()
?>

<main class="my-5">
    <div class="container">
        <div class="row">
            <h1 class="m-0 fs-4 py-4 text-center text-light">Challenges précédents</h1>
        </div>
        <div class="row h-50 py-3">
            <div class="d-flex justify-content-center">
                <img src="./public/assets/img/netflix.png" class="col-10 col-md-8 img-fluid" alt="">
            </div>
        </div>
        <div class="row h-50 py-3">
            <div class="d-flex justify-content-center">
                <img src="./public/assets/img/apple.png" class="col-10 col-md-8 img-fluid" alt="">
            </div>
        </div>
    </div>
</main>

<?php
$main = ob_get_clean();

ob_start()
?>


<?php
$script = ob_get_clean();
?>