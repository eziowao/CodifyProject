<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Codify - Accueil</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typeit/5.0.2/typeit.min.js" integrity="sha512-izh01C0sD66AuIVp4kRaEsvCSEC5bgs3n8Bm8Db/GhqJWei47La76LGf8Lbm8UHdIOsn+I7SxbeVLKb1k2ExMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/735b33aaa3.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./public/assets/css/style.css">
    <link rel="icon" type="image/x-icon" href="./public/assets/img/logo_v2_large.png">

</head>

<body>
    <header>
        <?= $navbar ?>
    </header>

    <div class="container flex-grow-1">
        <main>
            <!-- <h1 class="text-center my-2 font-cars"> <?= $title ?> </h1> -->
            <?= $main ?>
        </main>
    </div>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12">
                    <p class="text-light mt-3 mb-0 text-center text-lg-start"><a class="text-decoration-none
                        text-light" href="./questions.php">F.A.Q</a></p>
                    <p class="text-light mb-0 text-center text-lg-start"><a class="text-decoration-none
                        text-light" href="./questions.php">Contact</a></p>
                </div>
                <div class="col-lg-4 d-flex justify-content-center align-items-center">
                    <a class="mx-3" href=""><i class="fa-brands fa-discord fa-2xl"></i></a>
                    <a class="mx-3" href=""><i class="fa-brands fa-x-twitter fa-2xl"></i></a>
                    <a class="mx-3" href=""><i class="fa-brands fa-instagram fa-2xl"></i></a>
                </div>
                <div class="col-lg-4 col-md-12">
                    <p class="mt-3 mb-0 text-center text-lg-end"><a class="text-decoration-none
                        text-light" href="./aboutus.php">Mentions légales</a></p>
                    <p class="mb-0 text-center text-lg-end"> <a class="text-decoration-none
                        text-light" href="./questions.php">CGU</a></p>
                </div>
            </div>
            <div class="row">
                <p class="col-12 text-center text-light">Copyright Codify 2024</p>
            </div>
        </div>

    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <?= $script ?>

    <!-- script Jquery  -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#inscriptionLink").click(function() {
                $('#connexionModal').modal('hide');
                $('#inscriptionModal').modal('show');
            });
        });
    </script>


</body>

</html>