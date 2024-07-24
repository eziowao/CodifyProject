<?php

ob_start()
?>

<main class="my-5">
    <div class="container">
        <div class="mb-5">
            <div class="row d-flex justify-content-center">
                <h1 class="m-0 fs-4 py-4 text-center text-light mb-3">Classements</h1>
                <div class="ranking-content col-10 col-md-6 col-lg-4 d-flex justify-content-around py-1">
                    <div class="col-4 text-center rounded-20 p-1 m-1 bg-green ranking-btn">Global</div>
                    <div class="col-4 text-center rounded-20 p-1 m-1 bg-grey-ranking ranking-btn">Mensuel</div>
                    <div class="col-4 text-center rounded-20 p-1 m-1 bg-grey-ranking ranking-btn">Hebdo</div>
                </div>
            </div>
        </div>

        <div>
            <div class="row d-flex justify-content-center">
                <div class="col-10 d-flex justify-content-center ranking-content py-4 mb-5 rounded-20">
                    <div class="col-3 text-center text-light">
                        <div class="d-flex justify-content-center">
                            <div class="col-6">
                                <h2 class="fs-5 bg-dark-ranking py-1 rounded-20">Rank</h2>
                            </div>
                        </div>
                        <p>1</p>
                        <p>2</p>
                        <p>3</p>
                        <p>4</p>
                        <p>5</p>
                        <p>6</p>
                        <p>7</p>
                        <p>8</p>
                        <p>8</p>
                        <p>10</p>
                    </div>
                    <div class="col-6 text-light">
                        <div class="d-flex justify-content-center">
                            <div class="col-3">
                                <h2 class="fs-5 bg-dark-ranking py-1 rounded-20 text-center">Pseudo</h2>
                            </div>
                        </div>
                        <p>Pseudo1</p>
                        <p>Pseudo2</p>
                        <p>Pseudo3</p>
                        <p>Pseudo4</p>
                        <p>Pseudo5</p>
                        <p>Pseudo6</p>
                        <p>Pseudo7</p>
                        <p>Pseudo8</p>
                        <p>Pseudo8</p>
                        <p>Pseudo10</p>
                    </div>
                    <div class="col-3 text-center text-light">
                        <h2 class="fs-5">Likes</h2>
                        <p>20</p>
                        <p>18</p>
                        <p>16</p>
                        <p>12</p>
                        <p>8</p>
                        <p>7</p>
                        <p>6</p>
                        <p>4</p>
                        <p>2</p>
                        <p>1</p>
                    </div>
                </div>
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