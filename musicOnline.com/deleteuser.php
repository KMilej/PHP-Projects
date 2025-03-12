<?php
session_start();
include('config.php'); // Połączenie z bazą

header('Content-Type: application/json');
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST['id']; // Pobranie ID użytkownika

    // Przygotowanie zapytania SQL
    $stmt = $dbConnect->prepare("DELETE FROM users WHERE user_id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo json_encode(["status" => "success", "message" => "User deleted successfully"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Error deleting user"]);
    }

    $stmt->close();
    $dbConnect->close();
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request"]);
}
?>
