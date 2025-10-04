<?php
$uploadDir = 'uploads/';
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['file'])) {
        $file = $_FILES['file'];

        if (is_uploaded_file($file['tmp_name'])) {
            $fileName = basename($file['name']);
            $fileSize = $file['size'];
            $fileTmp = $file['tmp_name'];
            $fileType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

            $allowed = ['jpg', 'jpeg', 'png'];
            if (!in_array($fileType, $allowed)) {
                die("❌ Only files allowed JPG, JPEG або PNG.");
            }

            if ($fileSize > 2 * 1024 * 1024) {
                die("❌ File size exceeds 2 MB.");
            }

            $targetFile = $uploadDir . $fileName;
            if (file_exists($targetFile)) {
                $uniqueName = pathinfo($fileName, PATHINFO_FILENAME) . "_" . date("Ymd_His") . "." . $fileType;
                $targetFile = $uploadDir . $uniqueName;
            }

            if (move_uploaded_file($fileTmp, $targetFile)) {
                echo "<h3>✅ file successfully loaded!</h3>";
                echo "name file: " . basename($targetFile) . "<br>";
                echo "file type: " . $fileType . "<br>";
                echo "saze: " . round($fileSize / 1024, 2) . " КБ<br><br>";
                echo "<a href='$targetFile' download>⬇️ download file </a><br>";
                echo "<a href='index.html'>Go back</a>";
            } else {
                echo "❌ Error saving file.";
            }
        } else {
            echo "❌ File upload error.";
        }
    }
}
?>
