<?php #Script basicConnect_step2.php
$pageTitle = 'Basic Connection Demo';
require('mysqlConnectSample.php');
include('header.php');


$query = "SELECT staffID, firstName, surname, email FROM staff";

$result = @mysqli_query($dbConnect, $query);

if($result) // if the query runs successfull 
{
    //update all of this
    echo'<p>Equipment Load - Example Database Info</p>';

    echo '<table width="50%" border="1">';
    echo '<thead>';
    echo '<tr><th align="left">Staff ID</th>
          <th align="left">First Name</th>
          <th align="left">Surname</th>
          <th align="left">Email</th></th</tr>';
    echo '</thead>';

    echo '<tbody>';
    //loop for main page content goes in here

    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
    {
        echo '<tr><td align="left">'. $row['staffID'].'</th><td align="left">'.$row['firstName'].'</td><td align="left">'.$row['surname'].'</td><td align="left">'.$row['email'].'</td></tr>';
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