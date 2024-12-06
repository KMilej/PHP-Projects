<?php






define('USERNAME', 's2264629');
define('PWRD', 'QfO3spxx');
define('HOSTNAME', 'LOCALHOST');
define('DBNAME', 's2264629_EqDesign'); 
                    //define('USERNAME', 's2264629');
                    //define('PWRD', 'securepassword');
                    //define('HOSTNAME', 'LOCALHOST');
                    //define('DBNAME', 's2264629_EqDesign');


$dbConnect = @mysqli_connect(HOSTNAME, USERNAME, PWRD, DBNAME) OR die('could not connect'. mysqli_connect_error());

?>