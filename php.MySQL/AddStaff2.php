// Sprawdź, czy formularz został przesłany
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Tu umieścisz logikę przetwarzania formularza
    // Na przykład walidację danych lub zapis do bazy danych
  //  $firstName = $_POST['firstName'] ?? '';
 //   $surname = $_POST['surname'] ?? '';
  //  $email = $_POST['email'] ?? '';

    // Możesz tutaj dodać kod walidacji i zapisania danych
  //  echo "First Name: $firstName<br>";
   // echo "Surname: $surname<br>";
  //  echo "Email: $email<br>";
  
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

  // Opcjonalnie: wyświetl błędy
  if (!empty($errors)) {
      foreach ($errors as $error) {
          echo "<p style='color:red;'>$error</p>";
      }
  } else {
      // Jeśli brak błędów, można przejść do dalszego przetwarzania
      echo "<p style='color:green;'>Form submitted successfully!</p>";
  }

if (empty($errors)) { // Jeśli brak błędów
  // Załaduj połączenie z bazą danych
  require('mysqlConnect22.php');

  // Przygotowanie zapytania SQL do wstawienia danych
  $staffInsertQuery = "INSERT INTO staff (firstName, surname, email) 
                       VALUES ('$firstName', '$surname', '$email')";

  // Wykonanie zapytania
  $result = mysqli_query($dbConnect, $staffInsertQuery);

  // Sprawdzenie wyniku zapytania
  if ($result) {
      echo '<h1>Success</h1>';
  } else {
      echo '<h1>Failed</h1>';
      echo mysqli_error($dbConnect); // Wyświetlenie błędu w przypadku niepowodzenia
  }

  // Zamknięcie połączenia z bazą danych
  mysqli_close($dbConnect);

} else {
  // Tutaj możesz obsłużyć sytuację, gdy występują błędy
  foreach ($errors as $error) {
      echo "<p style='color:red;'>$error</p>";
  }

}
}
