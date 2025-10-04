<?php
$logFile = "log.txt";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['content'])) {
    $text = trim($_POST['content']);
    $time = date("Y-m-d H:i:s");
    $entry = "[$time] " . $text . PHP_EOL;

    file_put_contents($logFile, $entry, FILE_APPEND);
    echo "<p>Text is recorded у log.txt</p>";
}

echo "<h3>📄 Вміст log.txt:</h3>";

if (file_exists($logFile)) {
    $content = file_get_contents($logFile);
    echo "<pre>" . htmlspecialchars($content) . "</pre>";
} else {
    echo "<p>The log.txt file has not been created yet.</p>";
}

echo "<a href='index.html'>Go back</a>";
?>
