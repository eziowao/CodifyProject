<?php


$id = $_GET['id'] ?? null;

if ($id) {
    $challengeModel = new Challenge();
    $challenge = $challengeModel->getChallengeById($id);

    if ($challenge && $challenge->file_url) {
        $filePath = __DIR__ . '/../../../../public/uploads/challenges/' . $challenge->file_url;
        if (file_exists($filePath)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . $challenge->original_file_name . '"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($filePath));
            readfile($filePath);
            exit;
        } else {
            echo 'File not found.';
        }
    } else {
        echo 'Invalid challenge or file URL.';
    }
} else {
    echo 'No challenge ID provided.';
}
