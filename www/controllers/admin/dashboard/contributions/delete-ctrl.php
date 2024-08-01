<?php

$success = false;

if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $contributionModel = new Contribution();
    $contributionModel->setContributionId($id);
    $contribution = $contributionModel->getContributionById($id);

    if ($contributionModel->deleteContribution()) {
        $success = true;
        redirectToRoute('?page=admin/dashboard/contributions/list');
    }
}
