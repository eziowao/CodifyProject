<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $typeModel = new Type();
    $typeModel->setTypeId($id);

    if ($typeModel->deleteType()) {
        addFlash('success', 'Catégorie supprimée avec succès !');
        redirectToRoute('?page=admin/dashboard/types/list');
    }
}
