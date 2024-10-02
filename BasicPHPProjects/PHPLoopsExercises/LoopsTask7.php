<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loooooooooooooooops</title>
</head>
<body>
<?php

$sum = 0;
while ($sum <= 20) {
    if ($sum % 2 == 0) {
        echo "<br>,<br>";
    } else {
        echo "I'm displaying the numbers : $sum". "<br>"; 
        echo " this number is odd and we display them ";
    }
    $sum++;
}


// Hidden Library
/* task 1 
    for ($i = 0; $i <= 20; $i++) {
        echo $i . "\n<br><br>";
    } */
/* task 2
for ($i = 0; $i <= 20; $i++) {


    if ($i % 2 == 0) {
        echo "number is even";
    } else {
        echo "number is odd";
    }

    echo " " .  $i . "\n<br><br>";
} */
/* task 3
for ($i = 0; $i <= 20; $i++) {

    if ($i % 2 == 0) {
        echo  $i . " number is even and we display even<br><br>";
    } else {

    }
} */
/* task 4
for ($i = 0; $i <= 12; $i++) {
    $sum = 10 * $i;
    echo "display 10 x $i = $sum" . "<br><br>"; 
} */
/* task5
$i = 0;
while ($i <= 20) {
    echo $i . "\n<br><br>";
    $i++;
} */
/* task 6
$i = 1;
while ($i <= 20) {

    echo "I'm displaying the numbers : $i". "<br>"; 

    if ($i % 2 == 0) {
        echo "this number is even<br><br>";
    } else {
        echo "this number is odd<br><br>";
    }

    $i++;
} */
?>

</body>
</html>
