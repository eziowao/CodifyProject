<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Codify - Accueil</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typeit/5.0.2/typeit.min.js" integrity="sha512-izh01C0sD66AuIVp4kRaEsvCSEC5bgs3n8Bm8Db/GhqJWei47La76LGf8Lbm8UHdIOsn+I7SxbeVLKb1k2ExMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://kit.fontawesome.com/735b33aaa3.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./public/assets/css/libs/bootstrap.min.css">
    <link rel="stylesheet" href="./public/assets/css/style.css">
    <link rel="icon" type="image/x-icon" href="./public/assets/img/logo_v2_large.png">
    <meta name="description" content="Codify est la plateforme idéale pour les développeurs souhaitant se challenger en reproduisant des designs. Relevez des défis, améliorez vos compétences en frontend et montrez vos créations !">
    <meta name="keywords" content="développeur, challenges, design, frontend, codage, HTML, CSS, JavaScript, challenges développeurs, Codify">
    <meta name="robots" content="index, follow">
    <meta name="author" content="Codify">
</head>

<body class="d-flex flex-column min-vh-100">
    <header>
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light my-4">
                <div class="container">
                    <a class="navbar-brand" href="?page=home">
                        <img src="./public/assets/img/logo_v2.png" alt="Logo" height="40">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon custom-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav text-center ml-auto justify-content-center justify-content-lg-end ms-auto">

                            <?php if (!isset($_SESSION['user']) || !$_SESSION['user']) { ?>
                                <li class="nav-item">
                                    <a class="nav-link text-light" href="/?page=signUp">Inscription</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-light" href="/?page=signIn">Connexion</a>
                                </li>
                            <?php } ?>

                            <?php if (isset($_SESSION['user']) && $_SESSION['user']) { ?>
                                <li class="nav-item">
                                    <a class="nav-link text-light" href="?page=weekly-challenge">Challenge de la semaine</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-light" href="?page=previous-challenges">Challenges précédents</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <?= $_SESSION['user']->pseudo ?>
                                    </a>
                                    <ul class="dropdown-menu bg_test">
                                        <li>
                                            <a class="dropdown-item text-light text-center" href="?page=profile">Mon profil</a>
                                        </li>
                                        <?php if ($_SESSION['user']->role == 2) { ?>
                                            <li>
                                                <a class="dropdown-item text-light text-center" href="?page=admin/dashboard/types/list">Dashboard</a>
                                            </li>
                                        <?php } ?>
                                        <li>
                                            <a class="dropdown-item text-light text-center" href="?page=logout">Déconnexion</a>
                                        </li>
                                    </ul>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <div class="flex-grow-1">
        <main class="flex-fill">
            <?php include __DIR__ . './../partials/message.php'; ?>

            <?= $main ?>
        </main>
    </div>

    <footer class="mt-auto">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12">
                    <p class="text-light my-3 text-center text-lg-start"><a class="text-decoration-none
                        text-light" href="./questions.php">Mentions légales</a></p>
                </div>
                <div class="col-lg-4 d-flex justify-content-center align-items-center">
                    <a class="mx-3" href="https://discord.gg/UqRpFj92"><i class="fa-brands fa-discord fa-2xl social-footer"></i></a>
                    <a class="mx-3" href="https://x.com/"><i class="fa-brands fa-x-twitter fa-2xl social-footer"></i></a>
                    <a class="mx-3" href="https://www.instagram.com/"><i class="fa-brands fa-instagram fa-2xl social-footer"></i></a>
                </div>
                <div class="col-lg-4 col-md-12">
                    <p class="mt-3 my-3 text-center text-lg-end"><a class="text-decoration-none
                        text-light" href="./aboutus.php">CGU</a></p>
                </div>
            </div>
            <div class="row">
                <p class="col-12 text-center text-light">Copyright Codify 2024</p>
            </div>
        </div>
    </footer>

    <?php if (isset($script) && !empty($script)): ?>
        <?= $script ?>
    <?php endif; ?>
    <script src="./public/assets/js/libs/bootstrap.bundle.min.js"></script>

</body>

</html>