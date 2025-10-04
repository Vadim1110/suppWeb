<?php
if (isset($_POST['username'])) {
    // Save cookie for 7 days
    setcookie('username', $_POST['username'], time() + (7 * 24 * 60 * 60));
    header("Location: index.php");
    exit;
}

if (isset($_POST['delete_cookie'])) {
    // Delete cookie
    setcookie('username', '', time() - 3600);
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><title>Working with COOKIES</title></head>
<body>
<?php if (isset($_COOKIE['username'])): ?>
    <h3>Hello, <?= htmlspecialchars($_COOKIE['username']) ?>!</h3>
    <form method="POST">
        <button type="submit" name="delete_cookie">Delete cookie</button>
    </form>
<?php else: ?>
    <form method="POST">
        <label>Enter your name: <input type="text" name="username" required></label>
        <button type="submit">Save</button>
    </form>
<?php endif; ?>
</body>
</html>
