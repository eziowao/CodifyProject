<?php


if (isset($_GET['id'])) {
    $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
    $contributionModel = new Contribution();
    $contributionModel->setContributionId($id);

    if ($contributionModel->deleteContribution()) {
        addFlash('success', 'Contribution supprimée avec succès !');
        redirectToRoute('?page=admin/dashboard/contributions/list');
    }
}
