<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = trim($_POST["first_name"]);
    $lastName = trim($_POST["last_name"]);

    if (empty($firstName) || empty($lastName)) {
        echo "Please fill in all fields..";
    } 
    elseif (!ctype_alpha($firstName) || !ctype_alpha($lastName)) {
        echo "First and last name must contain only letters.";
    } 
    else {
        echo "hi, " . htmlspecialchars($firstName) . " " . htmlspecialchars($lastName) . "!";
    }
} else {
    echo "The form was not sent.";
}
?>
