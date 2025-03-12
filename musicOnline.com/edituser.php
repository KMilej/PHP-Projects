<?php
session_start();
include('config.php'); // Połączenie z bazą

header('Content-Type: application/json');
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Sprawdzenie, czy wszystkie dane są przesłane
    if (!isset($_POST['id']) || !isset($_POST['username']) || !isset($_POST['email']) || !isset($_POST['role'])) {
        echo json_encode(["status" => "error", "message" => "Missing required fields"]);
        exit;
    }

    // Pobranie danych z żądania
    $id = $_POST['id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $role = $_POST['role'];

    // Przygotowanie zapytania SQL
    $stmt = $dbConnect->prepare("UPDATE users SET username = ?, email = ?, role = ? WHERE user_id = ?");
    $stmt->bind_param("sssi", $username, $email, $role, $id);

    if ($stmt->execute()) {
        echo json_encode(["status" => "success", "message" => "User updated successfully"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Error updating user"]);
    }

    $stmt->close();
    $dbConnect->close();
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request"]);
}
?>
