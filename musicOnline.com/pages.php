<?php
include('header.php');



// Check if the database connection is established
if (!$dbConnect) {
    die("<h1>Error: Database connection failed</h1>");
}

// Check if 'id' parameter is present in the URL
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Convert ID to an integer for security

    // Prepare the SQL query using MySQLi
    $query = "SELECT * FROM products WHERE id = ?";
    $stmt = mysqli_prepare($dbConnect, $query);
    
    // Bind the parameter (i = integer)
    mysqli_stmt_bind_param($stmt, "i", $id);
    
    // Execute the statement
    mysqli_stmt_execute($stmt);
    
    // Get the result set
    $result = mysqli_stmt_get_result($stmt);
    
    // Fetch the product data as an associative array
    $product = mysqli_fetch_assoc($result);

    // If the product does not exist, display an error message
    if (!$product) {
        die("<h1>Product does not exist</h1>");
    }
} else {
    die("<h1>No product ID provided</h1>");
}
?>

<section class="advert">
<div class="advertising">
    <div class="slideshow">
        <img src="images/slide/slidepage1.jpg" class="slide" alt="Ad 1">
        <img src="images/slide/slidepage2.jpg" class="slide" alt="Ad 2">
        <img src="images/slide/slidepage3.jpg" class="slide" alt="Ad 3">
    </div>
</div

<div class="individualproduct">
    <div class="row">
        <!-- LEFT COLUMN - PRODUCT IMAGE -->
        <div class="productleft">
            <img src="images/products/<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['title']); ?>">
        </div>

        <!-- RIGHT COLUMN - PRODUCT DETAILS -->
        <div class="productright">
            <h1><?php echo htmlspecialchars($product['title']); ?></h1>
            <h4><?php echo number_format($product['price'], 2); ?> PLN</h4>
            <p><strong>Category:</strong> <?php echo htmlspecialchars($product['category']); ?></p>
            <p><?php echo nl2br(htmlspecialchars($product['description'])); ?></p>

            <!-- Add to Cart Button -->
            <form action="cart.php" method="POST">
                <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                <button type="submit" class="btn btn-primary">Add to Cart</button>
            </form>
        </div>
    </div>
</div>

<?php include('footer.php'); ?>
