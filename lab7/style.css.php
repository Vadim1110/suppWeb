<?php
header("Content-Type: text/css");
header("Cache-Control: public, max-age=86400"); // 1 день
header("Expires: " . gmdate("D, d M Y H:i:s", time() + 86400) . " GMT");

echo "
body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
}
h1 {
    color: #333;
}
";
