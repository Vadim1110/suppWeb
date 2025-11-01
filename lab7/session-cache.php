<?php
session_start();

function generateData() {
    sleep(2); // Імітація затримки
    return [
        'usd' => rand(35, 40),
        'eur' => rand(38, 43)
    ];
}

if (!isset($_SESSION['cached_data']) || !isset($_SESSION['cached_time']) || (time() - $_SESSION['cached_time']) > 600) {
    // Генеруємо нові дані та зберігаємо у сесії
    $data = generateData();
    $_SESSION['cached_data'] = $data;
    $_SESSION['cached_time'] = time();
    $source = 'оновлено кеш';
} else {
    // Беремо дані з кешу
    $data = $_SESSION['cached_data'];
    $source = 'з кешу сесії';
}

echo "<p>Дані: " . json_encode($data) . "</p>";
echo "<p>Джерело: $source</p>";
