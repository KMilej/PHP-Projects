<?php
require 'config.php'; // Ensure database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);
    $confirm_password = trim($_POST["confirm_password"]);

    // ✅ Validate input fields
    if (empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
        header("Location: register.php?error=Please fill in all fields!");
        exit();
    }

    // ✅ Validate username length and content (3-15 characters, letters only)
    if (strlen($username) < 3 || strlen($username) > 15) {
        header("Location: register.php?error=Username must be between 3 and 15 characters!");
        exit();
    }

    if (!preg_match("/^[a-zA-Z]+$/", $username)) { // ✅ Ensures only letters
        header("Location: register.php?error=Username can only contain letters (no numbers or symbols)!");
        exit();
    }

    // ✅ Check if passwords match
    if ($password !== $confirm_password) {
        header("Location: register.php?error=Passwords do not match!");
        exit();
    }

    // ✅ Check if username or email already exists
    $stmt = $dbConnect->prepare("SELECT user_id FROM users WHERE username = ? OR email = ?");
    $stmt->bind_param("ss", $username, $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        header("Location: register.php?error=Username or email already taken!");
        exit();
    }
    $stmt->close();

    // ✅ Hash password before storing it
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // ✅ Insert user into database (default role: 'user')
    $stmt = $dbConnect->prepare("INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, 'user')");
    $stmt->bind_param("sss", $username, $email, $hashed_password);

    if ($stmt->execute()) {
        header("Location: register.php?success=Registration successful! You can now log in.");
        exit();
    } else {
        header("Location: register.php?error=Registration failed, please try again.");
        exit();
    }
    $stmt->close();
}
$dbConnect->close();
?>
