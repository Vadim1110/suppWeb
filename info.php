<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: ../cookies/index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><title>Server Information</title></head>
<body>
<h3>Request Information</h3>
<ul>
    <li>Client IP: <?= $_SERVER['REMOTE_ADDR'] ?></li>
    <li>Browser: <?= htmlspecialchars($_SERVER['HTTP_USER_AGENT']) ?></li>
    <li>Script: <?= $_SERVER['PHP_SELF'] ?></li>
    <li>Request method: <?= $_SERVER['REQUEST_METHOD'] ?></li>
    <li>File path: <?= $_SERVER['SCRIPT_FILENAME'] ?></li>
</ul>
</body>
</html>
