<?php
session_start();
include('config.php'); // Połączenie z bazą

header('Content-Type: application/json');
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Pobierz WSZYSTKIE produkty, niezależnie od użytkownika
$sql = "SELECT id, image, title, price, description, category, ownedby FROM products";
$result = $dbConnect->query($sql);

$products = [];
while ($row = $result->fetch_assoc()) {
    // Upewnij się, że ścieżka do obrazu jest poprawna
    if (!str_starts_with($row['image'], "images/products/")) {
        $row['image'] = "images/products/" . $row['image'];
    }
    $products[] = $row;
}

echo json_encode($products);
?>
