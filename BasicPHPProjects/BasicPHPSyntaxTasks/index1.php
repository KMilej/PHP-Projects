<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $total = 50;
    $postage = 2.95;
    $discount = 0.9;
    $totalAmount = 0.0;

    $totalAmount = ($total * $discount) + $postage;
    $totalAmount = round($totalAmount, 2);

    echo "<p>The total is &pound;$totalAmount</p>\n";

    $fileName = $_SERVER['SCRIPT_NAME'];
    $userAgent = $_SERVER['HTTP_USER_AGENT'];
    $softServe = $_SERVER['SERVER_SOFTWARE'];

    echo "<p> this file is called: $fileName.</p>\n";
    echo "<p>it is being accessed using : $userAgent.</p>\n";
    echo "<p>The server is running : $softServe. </p>\n";

    $firstName = "Kamil";
    $surName = "Milej";
    $fullName = $fileName . ' ' . $surName;

    echo "<p> This script was written by $fullName.</p>\n";
    echo '<p>This script was written by ' . $firstName . ' ' . $surName. "</p>\n";

    echo "<p>the $fullName is " . strLen($fullName) . "charactes long </p>\n";
    ?>
</body>
</html>