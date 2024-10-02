<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasks</title>
    <style>
        /* Simple CSS to use flex mostly rest just is for better looking */
        body {
        margin :6%;
        }

        h1 {
            color: blue;
        }

        h3 {
            color: rgb(167, 158, 158)
        }
        .dropdown-container {
            display: flex;
            justify-content: space-between;
            width: 50%;
            margin-bottom: 20px;
        }

        .dropdown {
            width: 45%;
        }

        button {
            margin-top: 10px;
            margin-bottom: 10px;
        }
    </style>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<h1>Final File With Exclusive All tasks</h1>

<!-- Dropdown form with two selections side by side -->
<form method="POST">
    <div class="dropdown-container">
        <!-- First Dropdown for the first set of tasks -->
        <div class="dropdown">
            <label for="task1">Fundamentals Concepts:</label>
            <select name="task1" id="task1" required>
                <option value="">--Select a Task--</option>
                <option value="task1_1">Task 1.1: True About Christmas</option>
                <option value="task1_2">Task 1.2: Favourite</option>
                <option value="task1_3">Task 1.3: Name and Salary</option>
                <option value="task1_4">Task 1.4: VAT</option>
                <option value="task1_5">Task 1.5: Hamburger Cola shake</option>
                <option value="task1_6">Task 1.6: Jovian Years</option>
                <option value="task1_7">Task 1.7: display ALL</option>
            </select>
        </div>

        <!-- Second Dropdown for the second set of tasks -->
        <div class="dropdown">
            <label for="task2">Conditional Statements:</label>
            <select name="task2" id="task2">
                <option value="">--Select a Task--</option>
                <option value="task2_1">Task 2.1: Voting Eligibility</option>
                <option value="task2_2">Task 2.2: Even/Odd Numbers</option>
                <option value="task2_3">Task 2.3: Carier True</option>
                <option value="task2_4">Task 2.4: Today is?</option>
                <option value="task2_5">Task 2.5: Book Discount</option>
                <option value="task2_6">Task 2.6: Exam Tests</option>
            </select>
        </div>
    </div>
    <button type="submit">Run Selected Tasks</button>
</form>

<?php
// Check if form is submitted and handle task execution
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $selectedTask1 = $_POST['task1'];
    $selectedTask2 = $_POST['task2'];

    // First dropdown task logic
    if (!empty($selectedTask1)) {
        switch ($selectedTask1) {
            case "task1_1":
                
                
    $variableOne = "Christmas is";
    $variableTwo = "my favourite";
    $variableThree = "time of Year";

    echo "<p>" . $variableOne . " " . $variableTwo . " " . $variableThree . "</p>";
    echo "<p>" . $variableOne . "<br>" . $variableTwo . "<br>" . $variableThree . "</p>";
                break;

            case "task1_2":
                
             
                $variableOne = "green";
                $variableTwo = "curry";
                $variableThree = "milk";

                echo "My favourite colour is " . $variableOne . ", my favourite food is " . $variableTwo . ", and my favourite drink is " . $variableThree . ".";

                break;

            case "task1_3":
                
                $firstName = "Kamil";
                $surName = "Milej";
                $weeklyWage = 100;
                $annualSalary = $weeklyWage * 52;
                echo "Task 1.2 - Personal Info:<br>";
                echo "My name is " . $firstName . " " . $surName . "<br>";
                echo "My weekly wage is £" . $weeklyWage . "<br>";
                echo "My annual salary is £" . $annualSalary . "<br><br>";
                break;

            case "task1_4":

                $unitCost = 12.65;
                $vatRate = 0.20;
                $deliveryCharge = 6.50;
                
                // Display costs for purchasing 1, 5, and 15 items
                calculateCost(1, $unitCost, $vatRate, $deliveryCharge);
                calculateCost(5, $unitCost, $vatRate, $deliveryCharge);
                calculateCost(15, $unitCost, $vatRate, $deliveryCharge);
                break;

            case "task1_5":
                
                $hamburgerCost = 4.95;
                $milkshakeCost = 1.95;
                $colaCost = 0.95;
                $salesTaxRate = 0.075; 
                $tipRate = 0.16; 

                // Calculate the total cost before tax and tip
                $numHamburgers = 2;
                $totalMealCost = ($numHamburgers * $hamburgerCost) + $milkshakeCost + $colaCost;

                // Calculate sales tax
                $salesTax = $totalMealCost * $salesTaxRate;

                // Calculate tip based on the meal cost before tax
                $tip = $totalMealCost * $tipRate;

                // Calculate the final total cost
                $totalCost = $totalMealCost + $salesTax + $tip;

                // Display the results
                echo "The cost of 2 hamburgers is £" . number_format($numHamburgers * $hamburgerCost, 2) . "<br>";
                echo "The cost of 1 chocolate milkshake is £" . number_format($milkshakeCost, 2) . "<br>";
                echo "The cost of 1 cola is £" . number_format($colaCost, 2) . "<br>";
                echo "The total meal cost (before tax and tip) is £" . number_format($totalMealCost, 2) . "<br>";
                echo "The sales tax is £" . number_format($salesTax, 2) . "<br>";
                echo "The tip is £" . number_format($tip, 2) . "<br>";
                echo "The total cost of the meal is £" . number_format($totalCost, 2) . "<br>";
                break;

            case "task1_6":

                $earthYearsPerJovianYear = 12;
                echo "Task 1.3 - Jovian Years:<br>";
                echo "1 Jovian year is " . $earthYearsPerJovianYear . " earth years.<br>";
                echo "5 Jovian years is " . (5 * $earthYearsPerJovianYear) . " earth years.<br>";
                echo "10 Jovian years is " . (10 * $earthYearsPerJovianYear) . " earth years.<br><br>";
                break;

            case "task1_7":
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
                echo "change great for massive: . $replaceMassage<br>";
                
                break;
    
        }
    }

    // Second dropdown task logic
    if (!empty($selectedTask2)) {
        switch ($selectedTask2) {
            case "task2_1":
                
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
                }

                break;

            case "task2_2":

                for ($i = 0; $i <= 5; $i++) {
                    echo $i;
                    echo " "; 
                    if ($i % 2 == 0) {
                        echo "number is even<br>";
                    } else {
                        echo "number is odd<br>";
                    }
                }
                
                break;

            case "task2_3":
                // Task 2.3: Age Group Greetings
                $firstName = "John";
                $age = 20;
                echo "Task 2.3 - Age Group Greetings:<br>";
                echo "Hi, $firstName! ";
                if ($age <= 17) {
                    echo "You are young, do your best at school!<br><br>";
                } elseif ($age >= 18 && $age <= 25) {
                    echo "Hope you find a rewarding career!<br><br>";
                } elseif ($age >= 26 && $age <= 59) {
                    echo "Hope you are doing well in your career?<br><br>";
                } else {
                    echo "Are you looking forward to retirement?<br><br>";
                }
                break;

            case "task2_4";
               
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

                break;

            case "task2_5";

                $oneBookPrice = 10.00;

                //We call the function here and we use diffrent parameters.
                calculateCosts(3, $oneBookPrice);  
                calculateCosts(4, $oneBookPrice);  
                calculateCosts(10, $oneBookPrice); 
                calculateCosts(15, $oneBookPrice); 

                break;

            case "task2_6":
                // $studentName = "Kamil"; 
                // $studentMark = rand(1, 100); 

                // // Function to determine the grade based on the mark
                // function determineGrade($mark) {
                //     if ($mark < 0 || $mark > 100) {
                //         return "Invalid mark. just from 1 - 100";
                //     } elseif ($mark < 50) {
                //         return "Fail";
                //     } elseif ($mark < 60) {
                //         return "C";
                //     } elseif ($mark < 70) {
                //         return "B";
                //     } elseif ($mark < 80) {
                //         return "A";
                //     } else {
                //         return "A with distinction";
                //     }
                // }

                // // Get the grade based on the student's mark
                // $grade = determineGrade($studentMark);

                // // Display the result
                // echo "Student Name: $studentName<br>";
                // echo "Student Mark: $studentMark<br>";
                // echo "Grade Achieved: $grade<br>";

                function determineGrade($mark) {
                    if ($mark < 0 || $mark > 100) {
                        return "Invalid mark. just from 1 - 100";
                    } elseif ($mark < 50) {
                        return "Fail";
                    } elseif ($mark < 60) {
                        return "C";
                    } elseif ($mark < 70) {
                        return "B";
                    } elseif ($mark < 80) {
                        return "A";
                    } else {
                        return "A with distinction";
                    }
                }

                for ($i = 0; $i < 10; $i++) {
                    $studentName = "Kamil"; 
                    $studentMark = rand(1, 100);    

                    $grade = determineGrade($studentMark);
    

                    echo "Student Name: $studentName<br>";
                    echo "Student Mark: $studentMark<br>";
                    echo "Grade Achieved: $grade<br>";
                }
                /*
                $marksToTest = [0, 25, 50, 55, 65, 75, 85, 95, 100, 110, -5];
                foreach ($marksToTest as $testMark) {
                
                    $gradeTest = determineGrade($testMark);
                    echo "For a mark of $testMark: Grade = $gradeTest<br>";
                }*/
                break;
        }
    }
}
function calculateCost($numItems, $unitCost, $vatRate, $deliveryCharge) {
    $totalUnitCost = $numItems * $unitCost;
    $vat = $totalUnitCost * $vatRate;
    $totalCost = $totalUnitCost + $vat + $deliveryCharge;

    echo "The unit cost for $numItems items is £" . number_format($totalUnitCost, 2) . "<br>";
    echo "The VAT is £" . number_format($vat, 2) . "<br>";
    echo "The delivery charge is £" . number_format($deliveryCharge, 2) . "<br>";
    echo "The total cost is £" . number_format($totalCost, 2) . "<br><br>";
}

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

    ?>

</body>
</html>



