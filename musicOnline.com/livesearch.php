<?php
include("config.php");

if (isset($_POST['input'])) {
    $input = $_POST['input'];

    // Użycie prepared statements dla bezpieczeństwa
    $query = "SELECT * FROM products WHERE title LIKE ?";
    $stmt = mysqli_prepare($dbConnect, $query);
    $search = $input . '%';
    mysqli_stmt_bind_param($stmt, "s", $search);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        echo '<main>
                <div class="products">';
                
        while ($row = mysqli_fetch_assoc($result)) {
            // Ścieżka do obrazka w katalogu `images/products/`
            $imagePath = !empty($row['image']) ? "images/products/{$row['image']}" : "images/products/placeholder.jpg";

            echo "<div class='productsearch'>
                    <div class='productimgsearch'>
                        <img src='{$imagePath}' alt='Product Image' onerror=\"this.onerror=null; this.src='images/products/placeholder.jpg';\">
                    </div>
                    <div class='product-infosearch'>
                        <div class='title'>
                            <a href='#'>{$row['title']}</a>
                        </div>
                        <div class='description'>{$row['description']}</div>
                        <div class='price'>{$row['price']} $</div>
                    </div>
                  </div>";
        }

        echo '</div></main>';
    } else {
        echo "<h6 class='text-danger text-center mt-3'>No data found</h6>";
    }
}
?>
