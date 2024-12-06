<?php #Script Staff lender list
$pageTitle = 'View all loans - with all info';
require('mysqlConnectSample.php');
include('header.php');


//$query = "SELECT equipID, equipname, equipCondition, equipDesc, typeDesc FROM equipment";

$query = "SELECT
    stu.studentID,
    stu.firstName,
    stu.surname,
    el.loanID,
    el.loanStart,
    el.loanEnd,
    el.equipID,
    equip.equipname,
CONCAT(sta.firstName, ' ', sta.surname) AS StaffName
FROM student AS stu
INNER JOIN equipmentLoan as el ON el.studentID = stu.studentID
INNER JOIN equipment AS equip on equip.equipID = el.equipID
INNER JOIN staff AS sta ON el.staffID = sta.staffID ORDER BY stu.studentID";

$result = @mysqli_query($dbConnect, $query);

if($result) // if the query runs successfull 
{
    //update all of this
    echo'<p>Equipment Loan System - Equipment Details</p>';

    echo '<table width="50%" border="1">';
    echo '<thead>';
    //echo '<tr><th align="left">equipID</th><th align="left">equipname</th><th align="left">equipCondition</th><th align="left">equipDesc</th><th align="left">typeDesc</th></tr>';
    Echo '<th>Student ID</th>
    <th>First Name</th>
    <th>Surname</th>
    <th>Loan ID</th>
    <th>Loan Start</th>
    <th>Loan END</th>
    <th>Item Loaned</th>
    <th>Staff Name</th>';
    echo '</thead>';

    echo '<tbody>';
    //loop for main page content goes in here

    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
    {
        echo '<tr><td align="left">'. $row['studentID'].'</th>
        <td align="left">'. $row['firstName'].'</th>
        <td align="left">'. $row['surname'].'</th>
        <td align="left">'. $row['loanID'].'</th>
        <td align="left">'. $row['loanStart'].'</th>
        <td align="left">'. $row['loanEnd'].'</th>
        <td align="left">'. $row['equipname'].'</th>
        <td align="left">'. $row['StaffName'].'</th></tr>';
        
  
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