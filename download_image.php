<?php
if (isset($_GET['filename'])) {
    $filename = $_GET['filename'];

    // Set headers to force download
    header('Content-Type: application/octet-stream');
    header("Content-Transfer-Encoding: Binary");
    header("Content-disposition: attachment; filename=\"" . basename($filename) . "\"");

    // Read the file and output it to the browser
    readfile('img/' . $filename);
}
?>