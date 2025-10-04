<?php
session_start();

// Initialize cart
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Add item
if (isset($_POST['item'])) {
    $item = $_POST['item'];
    $_SESSION['cart'][] = $item;

    // Save purchase history in cookie
    $previous = isset($_COOKIE['old_cart']) ? json_decode($_COOKIE['old_cart'], true) : [];
    $previous[] = $item;
    setcookie('old_cart', json_encode($previous), time() + (7 * 24 * 60 * 60));
}

// Clear cart
if (isset($_POST['clear'])) {
    $_SESSION['cart'] = [];
}
?>

<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><title>Shopping Cart</title></head>
<body>
<h3>Shopping Cart</h3>
<form method="POST">
    <label>Item name: <input type="text" name="item" required></label>
    <button type="submit">Add</button>
</form>

<h4>Current session:</h4>
<ul>
    <?php foreach ($_SESSION['cart'] as $c): ?>
        <li><?= htmlspecialchars($c) ?></li>
    <?php endforeach; ?>
</ul>

<h4>Previous purchases:</h4>
<ul>
    <?php
    if (isset($_COOKIE['old_cart'])) {
        foreach (json_decode($_COOKIE['old_cart'], true) as $c) {
            echo "<li>" . htmlspecialchars($c) . "</li>";
        }
    }
    ?>
</ul>

<form method="POST">
    <button name="clear">Clear cart</button>
</form>
</body>
</html>

