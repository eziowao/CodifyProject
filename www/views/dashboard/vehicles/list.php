<?php
ob_start()
?>
<div class="container">
    <div class="d-flex justify-content-center my-5">
        <a href="?page=vehicles/add"><button type="button" class="button-27">Ajouter un nouveau véhicule</button></a>
    </div>

    <div class="d-none d-lg-flex bg-list justify-content-center py-5">
        <table class="col-11 text-center">
            <thead>
                <tr>
                    <th scope="col"><a href="?page=vehicles/list&sort=vehicle_id&order=<?= $sortOrder === 'ASC' ? 'DESC' : 'ASC' ?>">ID</a></th>
                    <th scope="col"><a href="?page=vehicles/list&sort=categorie_id&order=<?= $sortOrder === 'ASC' ? 'DESC' : 'ASC' ?>">ID catégorie</a></th>
                    <th scope="col"><a href="?page=vehicles/list&sort=brand&order=<?= $sortOrder === 'ASC' ? 'DESC' : 'ASC' ?>">Marque</a></th>
                    <th scope="col"><a href="?page=vehicles/list&sort=model&order=<?= $sortOrder === 'ASC' ? 'DESC' : 'ASC' ?>">Modèle</a></th>
                    <th scope="col">Immat</th>
                    <th scope="col"><a href="?page=vehicles/list&sort=mileage&order=<?= $sortOrder === 'ASC' ? 'DESC' : 'ASC' ?>">Kms</a></th>
                    <th scope="col">Image</th>
                    <th scope="col"><a href="?page=vehicles/list&sort=created_at&order=<?= $sortOrder === 'ASC' ? 'DESC' : 'ASC' ?>">Créé le</a></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($vehicles as $vehicle) : ?>
                    <tr>
                        <td><?= $vehicle->vehicle_id ?> </td>
                        <td> <?= $vehicle->categorie_id ?> </td>
                        <td> <?= $vehicle->brand ?> </td>
                        <td> <?= $vehicle->model ?> </td>
                        <td> <?= $vehicle->registration ?> </td>
                        <td> <?= $vehicle->mileage ?> </td>
                        <td> <img class="rounded-2" src="./../../../public/uploads/vehicles/<?= $vehicle->picture ?>" height="50px" alt=""></td>
                        <td> <?= $vehicle->created_at ?> </td>
                        <td class="d-flex justify-content-center gap-3">
                            <a class="btn btn-warning" href="?page=vehicles/update&id=<?= $vehicle->vehicle_id ?>"><i class="bi bi-pencil"></i></a>
                            <form class="delete-form" action="?page=vehicles/delete&id=<?= $vehicle->vehicle_id ?>" method="post">
                                <input type="hidden" name="vehicle_id" value="<?= $vehicle->vehicle_id ?>">
                                <button class="btn btn-danger" type="submit"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="d-flex d-lg-none bg-list justify-content-center py-5">
        <table class="col-11 text-center">
            <thead>
                <tr>
                    <th scope="col"><a href="?page=vehicles/list&sort=vehicle_id&order=<?= $sortOrder === 'ASC' ? 'DESC' : 'ASC' ?>">ID</a></th>
                    <th scope="col"><a href="?page=vehicles/list&sort=model&order=<?= $sortOrder === 'ASC' ? 'DESC' : 'ASC' ?>">Modèle</a></th>
                    <th scope="col-3">Immat</th>
                    <th scope="col-3"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($vehicles as $vehicle) : ?>
                    <tr>
                        <td><?= $vehicle->vehicle_id ?> </td>
                        <td> <?= $vehicle->model ?> </td>
                        <td> <?= $vehicle->registration ?> </td>
                        <td class="d-flex d-flex justify-content-center gap-3">
                            <a class="btn btn-warning" href="?page=vehicles/update&id=<?= $vehicle->vehicle_id ?>"><i class="bi bi-pencil"></i></a>
                            <form class="delete-form" action="?page=vehicles/delete&id=<?= $vehicle->vehicle_id ?>" method="post">
                                <input type="hidden" name="vehicle_id" value="<?= $vehicle->vehicle_id ?>">
                                <button class="btn btn-danger" type="submit"><i class="bi bi-trash"></i></button>
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