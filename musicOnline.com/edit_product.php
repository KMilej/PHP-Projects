<?php
session_start();
include('config.php');

if (!isset($_SESSION['username'])) {
    echo json_encode(["message" => "❌ You must be logged in!"]);
    exit;
}

$id = $_POST['id'] ?? "";
$title = $_POST['title'] ?? "";
$price = $_POST['price'] ?? "";
$description = $_POST['description'] ?? "";
$category = $_POST['category'] ?? "";

// Sprawdzenie roli użytkownika
$userRole = $_SESSION['role'] ?? "user";

if ($userRole === "admin") {
    // 📌 Admin może edytować każdy produkt
    $sql = "UPDATE products SET title=?, price=?, description=?, category=? WHERE id=?";
    $stmt = $dbConnect->prepare($sql);
    $stmt->bind_param("sdssi", $title, $price, $description, $category, $id);
} else {
    // 📌 Normalny użytkownik może edytować tylko swoje produkty
    $sql = "UPDATE products SET title=?, price=?, description=?, category=? WHERE id=? AND ownedby=?";
    $stmt = $dbConnect->prepare($sql);
    $stmt->bind_param("sdssis", $title, $price, $description, $category, $id, $_SESSION['username']);
}

if ($stmt->execute()) {
    echo json_encode(["message" => "✅ Product updated successfully!"]);
} else {
    echo json_encode(["message" => "❌ Error updating product!"]);
}

$stmt->close();
?>
