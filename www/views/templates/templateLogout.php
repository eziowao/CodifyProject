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
        <nav class="navbar navbar-expand-lg navbar-light my-4">
            <div class="container">
                <a class="navbar-brand" href="/">
                    <img src="./public/assets/img/logo_v2.png" alt="Logo" height="40">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon custom-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav text-center ml-auto justify-content-center justify-content-lg-end ms-auto">
                        <li class="nav-item">
                            <a class="nav-link text-light" href="#" data-bs-toggle="modal" data-bs-target="#connexionModal">Inscription / Connexion</a>

                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Modal de connexion -->
        <div class="modal fade" id="connexionModal" tabindex="-1" aria-labelledby="connexionModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content bg-dark-grey">
                    <div class="modal-header border-0">
                        <h5 class="modal-title text-light fw-bold my-3 col-11 d-flex justify-content-center" id="connexionModalLabel">Connexion</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="connexionForm">
                            <div class="mb-3">
                                <label for="email" class="form-label text-white">Email</label>
                                <input type="email" class="form-control rounded-4 bg-dark-grey text-light" name="email" id="email" required>
                                <p> <?= isset($errors['email']) && !empty($errors['email']) ? $errors['email'] : '' ?></p>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label text-white">Mot de passe</label>
                                <input type="password" class="form-control rounded-4 bg-dark-grey text-light" name="password" id="password" required>
                                <p> <?= isset($errors['password']) && !empty($errors['password']) ? $errors['password'] : '' ?></p>
                                <p> <?= isset($errors['auth']) && !empty($errors['auth']) ? $errors['auth'] : '' ?></p>
                            </div>
                            <a class="text-white fs-16 d-flex justify-content-end text-decoration-none" href="#">Mot de
                                passe
                                oublié ?</a>
                            <div class="modal-footer text-center border-0">
                                <a href="?page=home" class="btn col- col-lg-4 bg-green text-light border-0 rounded-5 mx-auto">Connexion</a>
                            </div>
                        </form>
                        <p class="mt-3 text-white text-center fs-16">Vous n'avez pas de compte? <a href="#" class="text-decoration-none text-purple" id="inscriptionLink">Inscrivez-vous
                                ici</a>
                        </p>
                    </div>
                </div>
            </div>

        </div>

        <!-- Modal d'inscription -->
        <div class="modal fade" id="inscriptionModal" tabindex="-1" aria-labelledby="inscriptionModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content bg-dark-grey">
                    <div class="modal-header border-0">
                        <h5 class="modal-title text-light fw-bold my-3 col-11 d-flex justify-content-center" id="inscriptionModalLabel">Inscription</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="inscriptionForm">
                            <div class="mb-3">
                                <label for="pseudo" class="form-label text-white">Pseudo</label>
                                <input type="text" class="form-control rounded-4 bg-dark-grey text-light" id="pseudo" required>
                            </div>
                            <div class="mb-3">
                                <label for="emailInscription" class="form-label text-white">Email</label>
                                <input type="email" class="form-control rounded-4 bg-dark-grey text-light" id="emailInscription" required>
                            </div>
                            <div class="mb-3">
                                <label for="motDePasseInscription" class="form-label text-white">Mot de passe</label>
                                <input type="password" class="form-control rounded-4 bg-dark-grey text-light" id="motDePasseInscription" required>
                            </div>
                            <div class="modal-footer text-center border-0">
                                <a href="?page=home" class="btn col- col-lg-4 bg-green text-light border-0 rounded-5 mx-auto">Inscription</a>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer border-0">
                        <p class="text-decoration-none fs-16 text-light">Déjà inscrit ? <a href="#" class="text-decoration-none text-purple" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#connexionModal">Connectez-vous
                                ici</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="container flex-grow-1">
        <main>
            <?php include __DIR__ . './../partials/message.php'; ?>

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