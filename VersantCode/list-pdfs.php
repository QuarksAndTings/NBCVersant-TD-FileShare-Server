<?php
require_once __DIR__ . '/config.php';

$files = glob($PDF_FOLDER . '/*.pdf');

if ($files && count($files) > 0) {
    echo "<ul>";
    foreach ($files as $file) {
        $filename = basename($file);
        echo '<li><a href="serve-pdf.php?file=' . urlencode($filename) . '" target="_blank">'
           . htmlspecialchars($filename) . '</a></li>';
    }
    echo "</ul>";
} else {
    echo "<p>No PDF files found.</p>";
}
