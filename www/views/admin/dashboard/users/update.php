<?php

ob_start()
?>

<div class="container my-5">
    <div class="mb-3">
        <a class="text-light" href="?page=admin/dashboard/users/list"><i class="fa-solid fa-arrow-left text-light px-2"></i>Revenir à la liste des utilisateurs</a>
    </div>
    <h1 class="text-center text-light"> <?= $title ?> </h1>
    <div class="d-flex justify-content-center">
        <div class="col-md-6">
            <?php if ($user) : ?>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="my-2 text-light" for="pseudo">Pseudo</label>
                        <input type="text" class="form-control" id="pseudo" name="pseudo" placeholder="John" value="<?= $user['pseudo']; ?>" required>
                        <label class="my-2 text-light" for="email">Email</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="johndoe@example.com" value="<?= $user['email']; ?>" required>
                        <label class="my-2 text-light" for="biography">Biographie</label>

                        <textarea class="form-control" id="biography" name="biography" rows="6"><?= $user['biography'] ?></textarea>

                        <label class="my-2 text-light" for="website">Website</label>
                        <input type="text" class="form-control" id="website" placeholder="https://codify.fr/" name="website" value="<?= $user['website']; ?>">
                        <label class="my-2 text-light" for="website">Github</label>
                        <input type="text" class="form-control" id="github" placeholder="https://github.com/codify" name="github" value="<?= $user['github']; ?>">
                        <label class="my-2 text-light" for="twitter">Twitter</label>
                        <input type="text" class="form-control" id="twitter" placeholder="https://x.com/codify" name="twitter" value="<?= $user['twitter']; ?>">
                        <label class="my-2 text-light" for="linkedin">Linkedin</label>
                        <input type="text" class="form-control" id="linkedin" placeholder="https://www.linkedin.com/codify" name="linkedin" value="<?= $user['linkedin']; ?>">
                        <label class="my-2 text-light" for="discord">Discord</label>
                        <input type="text" class="form-control" id="discord" placeholder="Codify#1234" name="discord" value="<?= $user['discord']; ?>">
                        <div class="mb-3">
                            <label for="picture" class="form-label my-2 text-light">Photo de profil</label>
                            <input type="file" class="form-control" name="picture" id="picture">
                        </div>
                        <div>
                            <?php if ($user['picture']) : ?>
                                <div class="d-flex justify-content-center my-3">
                                    <div class="col-6 d-flex justify-content-center">
                                        <img src="./../../../../public/uploads/users/<?= $user['picture']; ?>" alt="User Image" class="img-fluid">
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="button-edit p-2 mt-4">Mettre à jour</button>
                    </div>
                </form>
            <?php else : ?>
                <div class="alert alert-warning">
                    Utilisateur non trouvé.
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php
$main = ob_get_clean();
?>