<?php
session_start();
include('config.php'); // Połączenie z bazą

header('Content-Type: application/json');
error_reporting(E_ALL);
ini_set('display_errors', 1);

// get all users
$sql = "SELECT user_id, username, email, role, created_at FROM users";
$result = $dbConnect->query($sql);

$users = [];
while ($row = $result->fetch_assoc()) {
    
    $users[] = $row;
}

echo json_encode($users);
?>
