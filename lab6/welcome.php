<?php
session_start();
if (empty($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}
?>

<!doctype html>
<html lang="uk">
<head>
    <meta charset="utf-8">
    <title>Welcome</title>
</head>
<body>
<h2>Welcome <?= htmlspecialchars($_SESSION['username']) ?>!</h2>
<p>This is a protected page, accessible only after logging in</p>
<p><a href="logout.php">Log out</a></p>
</body>
</html>
