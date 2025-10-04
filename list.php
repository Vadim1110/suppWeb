<?php
$uploadDir = 'uploads/';

echo "<h2>List of downloaded files:</h2>";

if (is_dir($uploadDir)) {
    $files = array_diff(scandir($uploadDir), ['.', '..']);

    if (count($files) > 0) {
        echo "<ul>";
        foreach ($files as $file) {
            $filePath = $uploadDir . $file;
            echo "<li><a href='$filePath' download>$file</a></li>";
        }
        echo "</ul>";
    } else {
        echo "<p>The folder is empty..</p>";
    }
} else {
    echo "<p>The uploads folder has not been created yet.</p>";
}

echo "<a href='index.html'>Go back</a>";
?>
