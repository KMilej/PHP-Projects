<?php #Script basic.Connect.php

$pageTitle = 'View All Staff';

include('header.php');
require('mysqlConnectSample.php');  //mysqlConnect22



$query2 = "SELECT staffID, firstName FROM staff";

$result = @mysqli_query($dbConnect, $query2);
echo 'got to here';


if($result) //if the query runs successfully 
{
    echo'<p>it worked</p>';
} else {
    echo '<p>error massage</p>';
    echo '<p>'. mysqli_error($dbConnect). '</p>';
}

mysqli_close($dbConnect);


include('footer.php');
?>