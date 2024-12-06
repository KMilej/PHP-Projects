<!DOCTYPE html>
<html lang="en">
<head>

    <title><?php echo $pageTitle; ?></title>
    <link rel="stylesheet" href="stylephp.css">
   

</head>
<body>
    <img src="file-logo.png" alt="file Collage Logo" width="591" height="185">

    <ul>
        <li><a href="#">Home</a></li>
        <li class="dropdown">
            <a href="javascript:void(0)" class="dropbtn">Basic Connection Demos</a>
            <div class="dropdown-content">
                <a href="basicConnect_step1.php">randompage</a>
                <a href="basicConnect_step2.php">Staff Info</a>
                <a href="basicConnect_step3.php">randomPage</a>
            </div>
        </li>
        
        <li class="dropdown">
            <a href="javascript:void(0)" class="dropbtn">View table info</a>
            <div class="dropdown-content">
                <a href="viewEquipment.php">viewEquipment</a>
                <a href="viewStaff.php">viewStaff</a>
                <a href="viewStudents.php">viewStudents</a>
                <a href="viewLoan2.php">viewLoan</a>
                <a href="viewLoan3.php">viewLoan3</a>
            </div>
        </li>
        <li class="dropdown">
            <a href="javascript:void(0)" class="dropbtn">Add Staff</a>
            <div class="dropdown-content">
                <a href="addStaff.php">basic Connect1</a>
                <a href="basicConnect_step2.php">basic Connect2</a>
                <a href="basicConnect_step3.php">basic Connect3</a>
            </div>
        </li>
    </ul>
