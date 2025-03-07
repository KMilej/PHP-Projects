<?php
// Połączenie z bazą danych
include('config.php');

// Sprawdzenie, czy jest wysłane zapytanie
if (isset($_GET['query'])) {
    $search = $_GET['query'];
    $category = $_GET['category'] ?? ''; // Jeśli kategoria nie jest wybrana, ustaw pustą wartość

    // Ochrona przed SQL Injection
    $search = mysqli_real_escape_string($dbConnect, $search);
    $category = mysqli_real_escape_string($dbConnect, $category);

    // Budowanie zapytania SQL
    $sql = "SELECT * FROM products WHERE title LIKE '%$search%'";

    // Jeśli użytkownik wybrał kategorię, dodajemy warunek do zapytania SQL
    if (!empty($category)) {
        $sql .= " AND category = '$category'";
    }

    $result = mysqli_query($dbConnect, $sql);

    echo "<h2>Search results for: <strong>$search</strong></h2>";

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<p><strong>" . $row['title'] . "</strong> - " . $row['description'] . " - $" . $row['price'] . "</p>";
        }
    } else {
        echo "<p>No results found.</p>";
    }
} else {
    echo "<p>Please enter a search term.</p>";
}
?>
