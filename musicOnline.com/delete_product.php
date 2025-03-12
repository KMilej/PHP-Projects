<?php
session_start();
include('config.php');

if (!isset($_SESSION['username'])) {
    echo json_encode(["message" => "❌ You must be logged in!"]);
    exit;
}

$id = $_POST['id'] ?? "";

// Sprawdzenie roli użytkownika
$userRole = $_SESSION['role'] ?? "user";

if ($userRole === "admin") {
    // 📌 Admin może usuwać każdy produkt
    $sql = "SELECT image FROM products WHERE id = ?";
    $stmt = $dbConnect->prepare($sql);
    $stmt->bind_param("i", $id);
} else {
    // 📌 Normalny użytkownik może usuwać tylko swoje produkty
    $sql = "SELECT image FROM products WHERE id = ? AND ownedby = ?";
    $stmt = $dbConnect->prepare($sql);
    $stmt->bind_param("is", $id, $_SESSION['username']);
}

$stmt->execute();
$result = $stmt->get_result();
$product = $result->fetch_assoc();

if (!$product) {
    echo json_encode(["message" => "❌ Product not found or unauthorized!"]);
    exit;
}

// 📌 Usuń plik obrazu
$imagePath = __DIR__ . "/" . $product['image'];
if (file_exists($imagePath)) {
    unlink($imagePath);
}

// 📌 Usuń produkt z bazy danych
if ($userRole === "admin") {
    $sql = "DELETE FROM products WHERE id = ?";
    $stmt = $dbConnect->prepare($sql);
    $stmt->bind_param("i", $id);
} else {
    $sql = "DELETE FROM products WHERE id = ? AND ownedby = ?";
    $stmt = $dbConnect->prepare($sql);
    $stmt->bind_param("is", $id, $_SESSION['username']);
}

if ($stmt->execute()) {
    echo json_encode(["message" => "✅ Product deleted successfully!"]);
} else {
    echo json_encode(["message" => "❌ Error deleting product!"]);
}

$stmt->close();
?>
