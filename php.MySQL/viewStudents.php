<?php #Script Staff lender list
$pageTitle = 'Equipment service';
require('mysqlConnectSample.php');
include('header.php');


$query = "SELECT studentID, firstName, surname, email, phone FROM student";


$result = @mysqli_query($dbConnect, $query);

if($result) // if the query runs successfull 
{
    //update all of this
    echo'<p>Equipment Loan System - Equipment Details</p>';

    echo '<table width="50%" border="1">';
    echo '<thead>';
    echo '<tr><th align="left">studentID</th><th align="left">firstName</th><th align="left">surname</th><th align="left">email</th><th align="left">phone</th></tr>';
    echo '</thead>';

    echo '<tbody>';
    //loop for main page content goes in here

    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
    {
        echo '<tr><td align="left">'. $row['studentID'].'</th><td align="left">'.$row['firstName'].'</td><td align="left">'.$row['surname'].'</td><td align="left">'.$row['email'].'</td><td align="left">'.$row['phone'].'</td></tr>';
    }

    echo '</tbody>';
    echo '</table>';
    mysqli_free_result($result);

} else {
    echo '<p>error</p>'; //custom error - this will show for syntax error rather then a php server error message
    echo '<p>'. mysqli_error($dbConnect). '</p>'; 
}

mysqli_close($dbConnect);

include('footer.php');

?>