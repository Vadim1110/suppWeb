<?php
session_start();
require_once 'config.php';

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($username === '') $errors[] = 'Enter username';
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = 'Invalid email format';
    if (strlen($password) < 6) $errors[] = 'Password must be at least 6 characters long';

    if (empty($errors)) {
        $stmt = $pdo->prepare('SELECT id FROM users WHERE username = :u OR email = :e LIMIT 1');
        $stmt->execute([':u' => $username, ':e' => $email]);

        if ($stmt->fetch()) {
            $errors[] = 'User with this username or email already exists';
        } else {
            $password_hash = password_hash($password, PASSWORD_DEFAULT);

            $ins = $pdo->prepare('INSERT INTO users (username, email, password) VALUES (:u, :e, :p)');
            $ins->execute([':u' => $username, ':e' => $email, ':p' => $password_hash]);

            $_SESSION['user_id'] = $pdo->lastInsertId();
            $_SESSION['username'] = $username;

            header('Location: welcome.php');
            exit;
        }
    }
}
?>

<!doctype html>
<html lang="uk">
<head>
    <meta charset="utf-8">
    <title>Registration</title>
</head>
<body>
<h2>Registration</h2>

<?php if (!empty($errors)): ?>
<ul style="color:red">
    <?php foreach ($errors as $e) echo '<li>' . htmlspecialchars($e) . '</li>'; ?>
</ul>
<?php endif; ?>

<form method="post" action="">
    <label>Username:<br><input type="text" name="username" value="<?= htmlspecialchars($_POST['username'] ?? '') ?>"></label><br>
    <label>Email:<br><input type="email" name="email" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>"></label><br>
    <label>Password:<br><input type="password" name="password"></label><br><br>
    <button type="submit">Register</button>
</form>

<p>Already have an account? <a href="login.php">Log in</a></p>
</body>
</html>
