<?php
session_start();

// If the user is already logged in
if (isset($_SESSION['user'])) {
    echo "<h3>Hello, {$_SESSION['user']}!</h3>";
    echo '<form action="logout.php" method="POST"><button type="submit">Logout</button></form>';
    exit;
}

// Handle login
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = $_POST['login'];
    $password = $_POST['password'];

    // Example condition: username admin, password 1234
    if ($login === 'admin' && $password === '1234') {
        $_SESSION['user'] = $login;
        $_SESSION['last_activity'] = time();
        header("Location: login.php");
        exit;
    } else {
        $error = "Invalid username or password!";
    }
}
?>

<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><title>Sessions</title></head>
<body>
<h3>Login</h3>
<?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
<form method="POST">
    <label>Username: <input type="text" name="login" required></label><br>
    <label>Password: <input type="password" name="password" required></label><br>
    <button type="submit">Login</button>
</form>
</body>
</html>
