<?php
// Start the session
session_start();

// Check if the user is already logged in
if (!isset($_SESSION["user_name"])) {
    // If not logged in, you can redirect to a login page in a different folder.
    header("Location: /Login_Form - v1.2/login.php"); // Replace "/your-folder/login.php" with the actual path to your login page
    exit();
}

// Check if the "Logout" button is clicked
if (isset($_POST["logout"])) {
    // Unset all of the session variables
    session_unset();

    // Destroy the session
    session_destroy();

    // Redirect to the login page in a different folder
    header("Location: /Login_Form - v1.2/login.php"); // Replace "/your-folder/login.php" with the actual path to your login page
    exit();
}
?>
