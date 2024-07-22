<?php
ob_start()
?>

<div class="row my-5 d-flex justify-content-center">
    <div class="col-10 col-lg-3 d-flex flex-column justify-content-center align-items-center bg-list">
        <p> <span class="fw-bold"> Marque : </span><?= $vehicle['brand']; ?></p>
        <p><span class="fw-bold"> Modèle : </span><?= $vehicle['model']; ?></p>
        <p><span class="fw-bold"> Catégorie : </span><?= $categories['name']; ?></p>
        <p><span class="fw-bold"> Immatriculation : </span><?= $vehicle['registration']; ?></p>
        <p><span class="fw-bold"> Kilométrage : </span><?= $vehicle['mileage']; ?> kms</p>
    </div>
    <div class="col-10 col-lg-9">
        <div class="d-flex justify-content-center">
            <img class="imgVehicle" src="./../../../public/uploads/vehicles/<?= $vehicle['picture']; ?>" alt="">
        </div>
    </div>
</div>

<div>
    <div class="d-flex justify-content-center">
        <a href="?page=booking&id=<?= $vehicle['vehicle_id']; ?>"><button type="submit" class="btn btn-success mt-4">Réserver ce véhicule</button></a>
    </div>
</div>

<?php
$main = ob_get_clean()
?>