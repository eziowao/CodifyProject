<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $typeModel = new Type();
    $typeModel->setTypeId($id);

    if ($typeModel->deleteType()) {
        redirectToRoute('?page=admin/dashboard/types/list');
    }
}
