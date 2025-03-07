<?php require "php/function.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?></title>

    <link rel="stylesheet" href="css/style.css">
    <script src="javascript/JavaScript.js" defer></script> 

    <meta name="description" content="">
    <meta name="keywords" content="">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
<?php
session_start();
?>
<header>
        <div class="top-banner"> <img src="images/main/topimage.jpg" alt="Girl in a jacket"></div>
        <nav class="navigation">
            <a href="http://olly.fifecomptech.net/~s2264629/musicOnline.com/main.php">Home</a>
            <a href="http://olly.fifecomptech.net/~s2264629/musicOnline.com/tracing.php">Tracking</a>
            <a href="http://olly.fifecomptech.net/~s2264629/musicOnline.com/news.php">News</a>
            <a href="http://olly.fifecomptech.net/~s2264629/musicOnline.com/contact.php">Contact</a>
            <a href="http://olly.fifecomptech.net/~s2264629/musicOnline.com/product.php">Products</a>
            <a href="http://olly.fifecomptech.net/~s2264629/musicOnline.com/notification.php">Notification</a>
            <a href="http://olly.fifecomptech.net/~s2264629/musicOnline.com/cart.php">Cart</a>

            <?php if (isset($_SESSION["user_id"])): ?>
            <span>Welcome, <strong><?php echo htmlspecialchars($_SESSION["username"]); ?></strong>!</span>
            <a href="http://olly.fifecomptech.net/~s2264629/musicOnline.com/logout.php">Logout</a>
            <a href="http://olly.fifecomptech.net/~s2264629/musicOnline.com/userpanel.php">Sell Items</a>
        <?php else: ?>
            <a href="http://olly.fifecomptech.net/~s2264629/musicOnline.com/login.php">Log In</a>
            <a href="http://olly.fifecomptech.net/~s2264629/musicOnline.com/register.php">Register</a>
        <?php endif; ?>
        </nav>
</header>
<section class="allcontent">
<section class="search-section">
    <div class="logo">
        <img src="images/main/musiconline.jpg" alt="Logo">
    </div>

    <div class="search-box">
        <form action="search.php" method="GET">
            <input type="text" name="query" placeholder="Search bar" required>
            <select name="category">
                <option value="">All Categories</option>
                <option value="rock">Rock</option>
                <option value="pop">Pop</option>
                <option value="jazz">Jazz</option>
                <option value="hiphop">Hip-Hop</option>
            </select>
            <button type="submit">Search</button>
        </form>
    </div>
</section>