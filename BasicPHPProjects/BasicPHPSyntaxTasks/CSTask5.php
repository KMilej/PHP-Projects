<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasks</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<h1>Conditional Statements</h1>



<?php

$oneBookPrice = 10.00;

//We call the function here and we use diffrent parameters.
calculateCosts(3, $oneBookPrice);  
calculateCosts(4, $oneBookPrice);  
calculateCosts(10, $oneBookPrice); 
calculateCosts(15, $oneBookPrice); 







function calculateCosts($numBook, $oneBookPrice) {   // i try to use method here to see how they look in php
    $baseCost = $numBook * $oneBookPrice;

    if ($numBook <= 3) {    /// count discount depend how many book we order
        $discountValue = 0.02; 
    } elseif ($numBook <= 10) {
        $discountValue = 0.03; 
    } else {
        $discountValue = 0.05; 
    }

    $priceAfterDiscount = $baseCost * $discountValue;
    $finalCost = $baseCost - $priceAfterDiscount;

    echo "For purchasing $numBook books: ";
    echo "Base cost (before discount): " . number_format($baseCost, 2) . "<br>";         // number_format i read is more use because is more accurate but dont know works like Math.round() in JS
    echo "you pay less by: " . number_format($priceAfterDiscount, 2) . " because of discount" . "<br>";
    echo "Final cost to pay is: £" . number_format($finalCost, 2) . "<br><br>";
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
    
/* Task 5
    <form method="POST">
    <label>Enter how many items you want to order:</label>
    <input type="number" name="numItems" min="1" value="1" required>
    <button type="submit">Calculate</button>
    </form>
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
} */
/* task 6
<form method="POST">
<label> Hamburgers (£4.95 each): </label>
<input type="number" name="burgers" min="0" value="0" required><br><br>

<label> Chocolate Milkshakes (£1.95 each): </label>
<input type="number" name="milkshakes" min="0" value="1" required><br><br>

<label> Cola (£0.95 each): </label>
<input type="number" name="cola" min="0" value="2" required><br><br>

<button type="submit">Total Cost</button>
</form>
// type is to have + and - in input window, name is attribute for later use, min mean you cant use value less then 0, and value propose a start value.  
if ($_SERVER['REQUEST_METHOD'] == 'POST') {  // this check if this page was open by POST request, its mean if someone use submit in method post where form have atribute method post, this conditional is true and can be executed  

    $priceBurger = 4.95;
    $priceMilkshake = 1.95;
    $priceCola = 0.95;


    $sellTaxRate = 1.075;
    $tipRate = 1.16;


    $numBurgers = $_POST['burgers'];    //this just get data from input with atribute name burgers
    $numMilkshakes = $_POST['milkshakes'];
    $numCola = $_POST['cola'];

    $totalCost = ($numBurgers * $priceBurger) + ($numMilkshakes * $priceMilkshake) + ($numCola * $priceCola);;
    $costWithPreTax = $totalCost * $tipRate;
    $totalCostWithTax = $costWithPreTax * $sellTaxRate;

    echo "<h3> COSTS </h3><br>";

    echo "you order " . $numBurgers . " Burders " . $numCola . " cola " . $numMilkshakes . " milkshake<br><br>";

    echo "Meal cost before tax and company tip: " . number_format($totalCost, 2) . "<br>";

    echo "cost with company tip (16%): £" . number_format($costWithPreTax, 2) . "<br>";

    echo "<p>cost with company tip and sell tax (7.5%) is: £" . number_format($totalCostWithTax, 2) . "</p>";

    echo "<p><strong>Total cost (including tax and tip): £" . number_format($totalCostWithTax, 2) . "</strong></p>";

} */
/* task 7
// strlen(),str_word_count(), strtoupper(), strpos(), str_replace() this is a built-in PHP functions
// that returns the length,count words,change to upper, find a position and replace place by place of a given string,
$message = "It is great fun learning how to program using PHP!<br>";
echo $message;

$totalCharacters = strlen($message);
echo "characters number is: . $totalCharacters<br>";

$totalWords = str_word_count($message);
echo "words number is: $totalWords<br>";

$upperCaseMessage = strtoupper($message);
echo "Uppercase massage: $upperCaseMessage<br>";

$whereisProgram = strpos($message, "program");
echo "program position in the message is: $whereisProgram<br>";

$replaceMassage = str_replace("great", "massive", $message);
echo "change great for massive: . $replaceMassage<br>"; */

/* task1 CS
$johnAge = 19;
$maryAge = 17;
$lauraAge = 18;

if ($johnAge > 17) {
    echo "John is " . $johnAge . " and is old enough to vote.<br>";
} else { 
    echo "John is " . $johnAge . " and is not old enough to vote.<br>";
}
if ($maryAge > 17) {
    echo "Mary is $maryAge and is old enough to vote.<br>";
} else { 
    echo "Mary is $maryAge and is not old enough to vote.<br>";
}
if ($lauraAge > 17) {
    echo "Laura is " . $lauraAge . " and is old enough to vote.<br>";
} else { 
    echo "Laura is " . $lauraAge . " and is not old enough to vote.<br>";
}  */
/* task 2 CS
for ($i = 0; $i <= 5; $i++) {
    echo $i;
    echo " "; 
    if ($i % 2 == 0) {
        echo "number is even<br>";
    } else {
        echo "number is odd<br>";
    }
} */
/* task 3 CS
<form method="POST">
    <label>FirstName:</label>
    <input type="text" name="firstname" value="e.g. John" onfocus="this.select();" required><br><br>

    <label>Age:</label>
    <input type="number" name="age" min="0" value="0" required><br><br>

    <button type="submit">Make a Magic</button>
</form>
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // recieve value from form 
    $firstName = $_POST['firstname'];
    $age = $_POST['age'];

    echo "Welcome " . $firstName . " Your Age is : " . $age . " depend of your age I'll piss you off a little <br>";
    
    if ($age <= 17) {
        echo "Hi, $firstName! You are young do your best at school!<br>";
    } elseif ($age >= 18 && $age <= 25) {
        echo "Hi, $firstName! Hope you find a rewarding career!<br>";
    } elseif ($age >= 26 && $age <= 59) {
        echo "i, $firstName! Hope you are doing well in your career?<br>";
    } elseif ($age >= 60) {
        echo "Hi, $firstName! Are you looking forward to retirement?<br>";
    } else {
        echo "Hi, $firstName! age invalid, change age.<br>";
    }
} */
/* task 4 CS
$d=date("D");                    // built-in date() function in PHP to retrieve the current date we can use also inside bracket Y for year, m for months everything have diffrent format or diffrent number of characters 

$previousDay = date("D", strtotime("yesterday"));        // "yesterday" is a special string recognized by strtotime() that refers to the day before today. This function calculates what the timestamp was 24 hours ago.
$nextDay = date("l", strtotime("tomorrow"));             //  same as on top but +24hours but i use l to have full name if needed

echo "Today is: $d <br>";
echo "Yesterday was: $previousDay <br>";
echo "Tomorrow will be: $nextDay <br>";

if ($d == "Fri") {
    echo "Have a nice weekend!<br>";
} elseif ($d == "Mon") {
    echo "Have a nice week!<br>";
} else {
    echo "Have a nice day!<br>";
}

*/
    ?>

</body>
</html>











