<?php
require_once __DIR__ . '/smb.php';

$filename = basename($_GET['file'] ?? '');
if ($filename === '' || strtolower(pathinfo($filename, PATHINFO_EXTENSION)) !== 'pdf') {
    http_response_code(400);
    exit('Invalid file.');
}

$PDF_FOLDER = smb_ensure_and_get_folder();
$filepath   = $PDF_FOLDER . DIRECTORY_SEPARATOR . $filename;

if (!is_file($filepath)) {
    http_response_code(404);
    exit('File not found.');
}

// Serve inline
header('Content-Type: application/pdf');
header('Content-Disposition: inline; filename="' . $filename . '"');
header('Content-Transfer-Encoding: binary');
header('Accept-Ranges: bytes');
readfile($filepath);
