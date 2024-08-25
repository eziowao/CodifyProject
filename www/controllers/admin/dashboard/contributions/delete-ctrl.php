<?php


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $contributionModel = new Contribution();
    $contributionModel->setContributionId($id);

    if ($contributionModel->deleteContribution()) {
        addFlash('success', 'Contribution supprimée avec succès !');
        redirectToRoute('?page=admin/dashboard/contributions/list');
    }
}
