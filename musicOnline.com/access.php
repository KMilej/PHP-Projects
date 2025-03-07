<?php
session_start();
require 'config.php'; // Ensure database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    if (!empty($username) && !empty($password)) {
        // Ensure column names match your database (check phpMyAdmin!)
        $stmt = $dbConnect->prepare("SELECT user_id, username, password, role FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($id, $db_username, $db_password, $role);
            $stmt->fetch();

            if (password_verify($password, $db_password)) {
                // Store user details in session
                $_SESSION["user_id"] = $id;
                $_SESSION["username"] = $db_username;
                $_SESSION["role"] = $role;

                // Debugging - Print session data before redirecting
                echo "Login successful! Redirecting...";
                echo "<pre>";
                print_r($_SESSION);
                echo "</pre>";
                
                header("Location: main.php");
                exit();
            } else {
                header("Location: login.php?error=Incorrect password!");
                exit();
            }
        } else {
            header("Location: login.php?error=User does not exist!");
            exit();
        }
        $stmt->close();
    } else {
        header("Location: login.php?error=Please fill in all fields!");
        exit();
    }
}
$dbConnect->close();
?>
