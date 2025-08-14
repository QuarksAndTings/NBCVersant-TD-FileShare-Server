<?php
require_once __DIR__ . '/smb.php';

$PDF_FOLDER = smb_ensure_and_get_folder();

$items = [];
if (is_dir($PDF_FOLDER)) {
    try {
        $it = new DirectoryIterator($PDF_FOLDER);
        foreach ($it as $f) {
            if ($f->isFile() && strtolower($f->getExtension()) === 'pdf') {
                $items[] = $f->getFilename();
            }
        }
    } catch (Throwable $e) {
        echo "<p>Error reading share: " . htmlspecialchars($e->getMessage()) . "</p>";
    }
}

if ($items) {
    sort($items, SORT_NATURAL | SORT_FLAG_CASE);
    echo "<ul>";
    foreach ($items as $name) {
        echo '<li><a href="serve-pdf.php?file=' . urlencode($name) . '" target="_blank">'
           . htmlspecialchars($name) . '</a></li>';
    }
    echo "</ul>";
} else {
    echo "<p>No PDF files found or share not reachable.</p>";
}
