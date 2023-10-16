<?php
// Start the session
// session_start();

// Check if the user is already logged in
if (!isset($_SESSION["user_name"])) {
    // If not logged in, you can redirect to a login page or any other appropriate page.
    header("Location: index.html"); // Replace "login.php" with your login page URL
    exit();
}

// Check if the "Logout" button is clicked
if (isset($_POST["logout"])) {
    // Unset all of the session variables
    session_unset();

    // Destroy the session
    session_destroy();

    // Redirect to the login page or any other page you prefer
    header("Location: index.html"); // Replace "login.php" with the actual login page URL
    exit();
}
?>