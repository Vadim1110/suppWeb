<?php
session_start();
require_once 'config.php';

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($username === '' || $password === '') {
        $errors[] = 'Fill in all fields';
    } else {
        $stmt = $pdo->prepare('SELECT id, username, password FROM users WHERE username = :u LIMIT 1');
        $stmt->execute([':u' => $username]);
        $user = $stmt->fetch();

        if (!$user) {
            $errors[] = 'User not found';
        } else {
            $stored_hash = $user['password'];

            if (password_verify($password, $stored_hash)) {
                session_regenerate_id(true);
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                header('Location: welcome.php');
                exit;
            }

            $errors[] = 'Invalid password.';
        }
    }
}
?>

<!doctype html>
<html lang="uk">
<head>
    <meta charset="utf-8">
    <title>Login</title>
</head>
<body>
<h2>Login</h2>

<?php if (!empty($errors)): ?>
<ul style="color:red">
    <?php foreach ($errors as $e) echo '<li>' . htmlspecialchars($e) . '</li>'; ?>
</ul>
<?php endif; ?>

<form method="post" action="">
    <label>Username:<br><input type="text" name="username" value="<?= htmlspecialchars($_POST['username'] ?? '') ?>"></label><br>
    <label>Password:<br><input type="password" name="password"></label><br><br>
    <button type="submit">Log in</button>
</form>

<p>Don't have an account? <a href="register.php">Register</a></p>
</body>
</html>
