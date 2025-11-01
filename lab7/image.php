<?php
header("Content-Type: image/png");
header("Cache-Control: public, max-age=86400");
header("Expires: " . gmdate("D, d M Y H:i:s", time() + 86400) . " GMT");

// Створюємо PNG-зображення динамічно
$im = imagecreatetruecolor(200, 80);
$bg = imagecolorallocate($im, 220, 220, 220);
$color = imagecolorallocate($im, 0, 0, 0);
imagefilledrectangle($im, 0, 0, 200, 80, $bg);
imagestring($im, 5, 50, 30, "Hello Cache!", $color);

imagepng($im);
imagedestroy($im);
