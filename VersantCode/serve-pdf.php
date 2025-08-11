<?php
require_once __DIR__ . '/config.php';

$filename = basename($_GET['file'] ?? '');
$filepath = $PDF_FOLDER . DIRECTORY_SEPARATOR . $filename;

// Serve only PDFs that exist
if (file_exists($filepath) && strtolower(pathinfo($filepath, PATHINFO_EXTENSION)) === 'pdf') {
    header('Content-Type: application/pdf');
    header('Content-Disposition: inline; filename="' . $filename . '"');
    readfile($filepath);
    exit;
}

http_response_code(404);
echo "File not found or invalid.";
