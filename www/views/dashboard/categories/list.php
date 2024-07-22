<?php
ob_start()
?>

<div class="container">
    <div class="d-flex justify-content-center my-5">
        <a href="/?page=categories/add"><button type="button" class="button-27">Ajouter une catégorie</button></a>
    </div>

    <div class="bg-list d-flex justify-content-center py-5">
        <table class="col-9 text-center">
            <thead>
                <tr>
                    <th class="col-3 col-md-3">ID</th>
                    <th class="col-3 col-md-3">Catégorie</th>
                    <th class="col-3 col-md-3"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categories as $category) : ?>
                    <tr>
                        <th scope="row"><?= $category->categorie_id ?></th>
                        <td><?= $category->name ?></td>
                        <td class="d-flex justify-content-center gap-3">
                            <a class="btn btn-warning" href="?page=categories/update&id=<?= $category->categorie_id ?>"><i class="bi bi-pencil"></i></a>
                            <form class="delete-form" action="?page=categories/delete&id=<?= $category->categorie_id ?>" method="post">
                                <input type="hidden" name="categorie_id" value="<?= $category->categorie_id ?>">
                                <button class="btn btn-danger" type="submit"><i class="bi bi-trash3-fill"></i></button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php
$main = ob_get_clean()
?>