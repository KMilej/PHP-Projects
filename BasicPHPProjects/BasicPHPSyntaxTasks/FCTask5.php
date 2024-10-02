<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <form method="POST">
        <label>Enter how many items you want to order:</label>
        <input type="number" name="numItems" min="1" value="1" required>
        <button type="submit">Calculate</button>
    </form>
<?php

   if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Fetch Pobranie liczby przedmiotów z formularza
    $numItems = $_POST['numItems'];

    $unit_price = 12.65;  
    $vat_rate = 0.20;     
    $delivery_charge = 6.50; 


    $item_cost = $unit_price * $numItems;
    $vat = $item_cost * $vat_rate;
    $total_cost = $item_cost + $vat + $delivery_charge;


    echo "<p>The unit cost for " . $numItems . " items is &pound;" . number_format($item_cost, 2) . "</p>";
    echo "<p>The VAT is &pound;" . number_format($vat, 2) . "</p>";
    echo "<p>The delivery charge is &pound;" . number_format($delivery_charge, 2) . "</p>";
    echo "<p>The total cost is &pound;" . number_format($total_cost, 2) . "</p>";
}











    /* My hidden Library to help do task faster ;)
     task1
    echo "<p>" . $variableOne . " " . $variableTwo . " " . $variableThree . "</p>";
    echo "<p>" . $variableOne . "<br>" . $variableTwo . "<br>" . $variableThree . "</p>"; */

    /* task2
    $variableOne = "green";
    $variableTwo = "curry";
    $variableThree = "milk";

    echo "My favourite colour is " . $variableOne . ", my favourite food is " . $variableTwo . ", and my favourite drink is " . $variableThree . "."; */

    /* task3
    $firstName = "Kamil";
    $surName = "Milej";
    $weeklyWage = 100;

    $annualSalary = $weeklyWage * 52;


    echo "My name is " . $firstName . " " . $surName . "<br>";
    echo "My weekly wage is &pound;" . $weeklyWage . "<br>";
    echo "My annual salary is &pound;" . $annualSalary . "<br>"; */

    /* task 4
    $earthYearsPerJovianYear = 12;
    $JovianYear = 1;

    echo "1 Jovian year is " . $earthYearsPerJovianYear . " earth years" . "<br>";
    echo "5 Jovian year is " . (5 * $earthYearsPerJovianYear) . " earth years" . "<br>";
    echo "10 Jovian year is " . (10 * $earthYearsPerJovianYear) . " earth years" . "<br>";
    echo "20 Jovian year is " . (20 * $earthYearsPerJovianYear) . " earth years" . "<br>"; */
    ?>

</body>
</html>












