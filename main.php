<?php
echo "Hello, World!<br><br>";

$stringVar = "hi"; 
$intVar = 42;          
$floatVar = 3.14;     
$boolVar = true;       

echo "Line: $stringVar<br>";
echo "Whole number: $intVar<br>";
echo "Floating point number: $floatVar<br>";
echo "Boolean value: " . ($boolVar ? "true" : "false") . "<br><br>";

var_dump($stringVar);
echo "<br>";
var_dump($intVar);
echo "<br>";
var_dump($floatVar);
echo "<br>";
var_dump($boolVar);
echo "<br><br>";

$firstName = "Vadim";
$lastName = "Vadimovich";
$fullName = $firstName . " " . $lastName; 
echo "full name: $fullName<br><br>";

$number = 7; 

if ($number % 2 == 0) {
    echo "number $number is even.<br><br>";
} else {
    echo "number $number is odd.<br><br>";
}

echo "for loop (1 to 10):<br>";
for ($i = 1; $i <= 10; $i++) {
    echo $i . " ";
}
echo "<br><br>";

echo "while loop (10 to 1):<br>";
$j = 10;
while ($j >= 1) {
    echo $j . " ";
    $j--;
}
echo "<br><br>";

$student = [
    "name" => "vadim",
    "surname" => "vadimovich",
    "age" => 20,
    "specialty" => "pi"
];

echo "Student information:<br>";
foreach ($student as $key => $value) {
    echo ucfirst($key) . ": $value<br>";
}
echo "<br>";

$student["average score"] = 91.5;

echo "Updated information:<br>";
foreach ($student as $key => $value) {
    echo ucfirst($key) . ": $value<br>";
}
?>
