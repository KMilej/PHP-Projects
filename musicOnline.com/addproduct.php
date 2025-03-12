<?php
session_start();
include('config.php'); // Połączenie z bazą

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    header('Content-Type: application/json'); // Zwracamy JSON

    if (!$dbConnect) {
        echo json_encode(["message" => "❌ Database connection failed."]);
        exit;
    }

    $title = $_POST['title'] ?? "";
    $price = $_POST['price'] ?? "";
    $description = $_POST['description'] ?? "";
    $category = $_POST['category'] ?? "";
    $ownedby = $_SESSION['username'] ?? "unknown";

    if (empty($title) || empty($price) || empty($description) || empty($category)) {
        echo json_encode(["message" => "❌ All fields are required!"]);
        exit;
    }

    $uploadDir = __DIR__ . "/images/products/";

    if (!is_dir($uploadDir)) {
        if (!mkdir($uploadDir, 0777, true)) {
            echo json_encode(["message" => "❌ Failed to create upload directory."]);
            exit;
        }
    }

    $imageName = basename($_FILES['image']['name']);
    $imagePath = $uploadDir . $imageName;

    if (!move_uploaded_file($_FILES['image']['tmp_name'], $imagePath)) {
        echo json_encode(["message" => "❌ Image upload failed."]);
        exit;
    }

    $dbImagePath = "" . $imageName;

    // 📌 Wstawienie produktu do bazy
    $sql = "INSERT INTO products (image, title, price, description, category, ownedby) 
            VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $dbConnect->prepare($sql);
    $stmt->bind_param("ssdsss", $dbImagePath, $title, $price, $description, $category, $ownedby);

    if ($stmt->execute()) {
        echo json_encode([
            "message" => "✅ Product added successfully!",
            "image" => $dbImagePath,
            "title" => $title,
            "price" => $price,
            "description" => $description,
            "category" => $category,
            "ownedby" => $ownedby
        ]);
    } else {
        echo json_encode(["message" => "❌ Database error: " . $stmt->error]);
    }

    $stmt->close();
    exit;
}
?>
