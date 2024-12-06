<?php
// Skrypt: addStaff.php
$pageTitle = 'Add a new staff member to authorise loans';

include('header.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $errors = []; // Tablica do przechowywania błędów

    // Sprawdź, czy pole firstName zostało wypełnione
    if (empty($_POST['firstName'])) {
        $errors[] = "You need to enter a first name";
    } else {
        $firstName = trim($_POST['firstName']);
    }

    // Sprawdź, czy pole surname zostało wypełnione
    if (empty($_POST['surname'])) {
        $errors[] = "You need to enter a surname";
    } else {
        $surname = trim($_POST['surname']);
    }

    // Sprawdź, czy pole email zostało wypełnione
    if (empty($_POST['email'])) {
        $errors[] = "You need to enter an email";
    } else {
        $email = trim($_POST['email']);
    }

    // Jeśli są błędy, wyświetl je
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<p style='color:red;'>$error</p>";
        }
    } else {
        // Jeśli brak błędów, wykonaj zapis do bazy danych
        require('mysqlConnect22.php');

        $staffInsertQuery = "INSERT INTO staff (firstName, surname, email) 
                             VALUES ('$firstName', '$surname', '$email')";

        $result = mysqli_query($dbConnect, $staffInsertQuery);

        if ($result) {
            echo '<h1>Success</h1>';
        } else {
            echo '<h1>Failed</h1>';
            echo mysqli_error($dbConnect);
        }

        mysqli_close($dbConnect);
    }
}

?>



<h1>Enter new Staff Member for Loan Authorisation</h1>

<form action="addStaff.php" method="POST">
    <p>First Name: <input type="text" name="firstName" size="25" maxlength="25"
            value="<?php if (isset($_POST['firstName'])) echo htmlspecialchars($_POST['firstName']); ?>"></p>
    
    <p>Surname: <input type="text" name="surname" size="25" maxlength="25"
            value="<?php if (isset($_POST['surname'])) echo htmlspecialchars($_POST['surname']); ?>"></p>
    
    <p>Email: <input type="text" name="email" size="25" maxlength="25"
            value="<?php if (isset($_POST['email'])) echo htmlspecialchars($_POST['email']); ?>"></p>
    
    <p><input type="submit" name="submit" value="Save staff member"></p>
</form>

<?php include('footer.php');