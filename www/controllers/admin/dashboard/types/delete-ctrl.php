<?php

if (isset($_GET['id'])) {
    $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
    $typeModel = new Type();
    $typeModel->setTypeId($id);

    if ($typeModel->deleteType()) {
        addFlash('success', 'Catégorie supprimée avec succès !');
        redirectToRoute('?page=admin/dashboard/types/list');
    }
}
