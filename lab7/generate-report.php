<?php
$cacheFile = __DIR__ . '/cache/report.html';
$cacheTime = 600; // 10 хвилин

if (file_exists($cacheFile) && (time() - filemtime($cacheFile) < $cacheTime)) {
    // Використовуємо кеш
    echo file_get_contents($cacheFile);
    echo "<p><em>Дані взято з кешу</em></p>";
} else {
    // Генеруємо новий звіт
    ob_start();
    echo "<table border='1' cellpadding='5'>";
    echo "<tr><th>ID</th><th>Ім'я</th><th>Сума</th><th>Дата</th></tr>";
    sleep(3); // Імітація довгої обробки
    for ($i = 1; $i <= 1000; $i++) {
        echo "<tr>";
        echo "<td>$i</td>";
        echo "<td>Користувач" . rand(1, 100) . "</td>";
        echo "<td>" . rand(100, 1000) . "</td>";
        echo "<td>" . date('Y-m-d', strtotime("-" . rand(0, 365) . " days")) . "</td>";
        echo "</tr>";
    }
    echo "</table>";

    $output = ob_get_clean();
    // Збереження у файл
    if (!is_dir(__DIR__ . '/cache')) mkdir(__DIR__ . '/cache');
    file_put_contents($cacheFile, $output);

    echo $output;
    echo "<p><em>Створено новий кеш</em></p>";
}
