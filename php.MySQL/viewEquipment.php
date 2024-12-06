<?php #Script Staff lender list
$pageTitle = 'Equipment service';
require('mysqlConnectSample.php');
include('header.php');


$query = "SELECT equipID, equipname, equipCondition, equipDesc, typeDesc FROM equipment";



$result = @mysqli_query($dbConnect, $query);

if($result) // if the query runs successfull 
{
    //update all of this
    echo'<p>Equipment Loan System - Equipment Details</p>';

    echo '<table width="50%" border="1">';
    echo '<thead>';
    echo '<tr><th align="left">equipID</th><th align="left">equipname</th><th align="left">equipCondition</th><th align="left">equipDesc</th><th align="left">typeDesc</th></tr>';
    echo '</thead>';

    echo '<tbody>';
    //loop for main page content goes in here

    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
    {
        echo '<tr><td align="left">'. $row['equipID'].'</th><td align="left">'.$row['equipname'].'</td><td align="left">'.$row['equipCondition'].'</td><td align="left">'.$row['equipDesc'].'</td><td align="left">'.$row['typeDesc'].'</td></tr>';
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