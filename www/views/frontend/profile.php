<?php

ob_start()
?>

<main class="my-5">
    <div class="container">
        <div class="row text-light mt-5 pt-5 d-flex justify-content-center">
            <div class="col-11 col-lg-7">
                <div class="row">
                    <div class="col-10">
                        <h1 class="fs-4">User-name</h1>
                    </div>
                    <div class="col-2 d-flex justify-content-end">
                        <i class="fa-solid fa-ellipsis fa-2xl"></i>
                    </div>
                    <p class="text-justify py-3">Développeur Web passionné par l'art du code et la création
                        d'expériences
                        numériques
                        mémorables. Expert en HTML, CSS, JavaScript, avec une expérience solide dans les frameworks
                        comme Bootstrap et React. Toujours à l'affût de nouveaux défis et prêt à collaborer sur des
                        projets innovants. Disponible pour des opportunités de développement web excitantes ! <br>
                        <br>
                        Je suis ouvert aux opportunités de collaboration, aux projets innovants et aux échanges
                        enrichissants. N'hésitez pas à me contacter pour discuter de vos idées et projets !
                    </p>
                </div>
            </div>
            <div class="col-10 col-lg-5 px-5 ">
                <div class="row d-flex justify-content-center">
                    <img class="profile-img" src="./public/assets/img/user_picture.png" alt="">
                </div>
                <div class="container py-4">
                    <div class="row justify-content-center">
                        <div class="col-3 col-lg-2 text-center">
                            <a href="#"><i class="fa-solid fa-globe fa-2xl"></i></a>
                        </div>
                        <div class="col-3 col-lg-2 text-center">
                            <a href="#"><i class="fa-brands fa-github fa-2xl"></i></a>
                        </div>
                        <div class="col-3 col-lg-2 text-center">
                            <a href="#"><i class="fa-brands fa-x-twitter fa-2xl"></i></a>
                        </div>
                        <div class="col-3 col-lg-2 text-center">
                            <a href="#"><i class="fa-brands fa-linkedin fa-2xl"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-center mb-5 pb-5">
            <h2 class="text-light fs-5 text-center my-5">Mes contributions</h2>
            <div class="col-md-6 px-2 d-flex justify-content-center">
                <div class="col-10 d-flex justify-content-center">
                    <div class="row">
                        <img class="contributions-img" src="./public/assets/img/contribnetflix.png" alt="">
                        <div class="row">
                            <a class="col-6 py-3" href="">lien.github.com</a>
                            <div class="col-6 d-flex justify-content-end align-items-center">
                                <i class="fa-regular fa-heart fa-xl py-3"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 px-2 pt-5 pt-md-0 d-flex justify-content-center">
                <div class="col-10 d-flex justify-content-center">
                    <div class="row">
                        <img class="contributions-img" src="./public/assets/img/contribfnac.png" alt="">
                        <div class="row">
                            <a class="col-6 py-3" href="">lien.github.com</a>
                            <div class="col-6 d-flex justify-content-end align-items-center">
                                <i class="fa-regular fa-heart fa-xl py-3"></i>
                            </div>
                        </div>
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