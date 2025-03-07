<?php
$pageTitle = 'Register';
include('header.php'); // Include header (optional)
?>

<section class="register">
    <h2>Register</h2>

    <!-- Display errors if any -->
    <?php
    if (isset($_GET['error'])) {
        echo "<p style='color:red;'>" . htmlspecialchars($_GET['error']) . "</p>";
    }
    if (isset($_GET['success'])) {
        echo "<p style='color:green;'>" . htmlspecialchars($_GET['success']) . "</p>";
    }
    ?>

    <form action="process_register.php" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br><br>

        <label for="confirm_password">Confirm Password:</label>
        <input type="password" id="confirm_password" name="confirm_password" required>
        <br><br>

        <button type="submit">Register</button>
    </form>
</section>

<?php
include('footer.php'); // Include footer (optional)
?>
