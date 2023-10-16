<?php
session_start();
// Database configuration
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'register_form';

// Create a database connection
$conn = new mysqli($host, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT); // Hash the password for security
    $role = $_POST["role"];
    $gender = $_POST["gender"]; // Get the gender from the form

    // Get the current timestamp
    $currentTimestamp = date('Y-m-d H:i:s');

    // SQL query to insert data into the user table and set status to active and updatedAt
    $sql = "INSERT INTO users (name, email, password, role, gender, status, updatedAt) VALUES (?, ?, ?, ?, ?, 'active', ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $name, $email, $password, $role, $gender, $currentTimestamp);

    if ($stmt->execute()) {
        // Redirect based on the role
        // After successful authentication and retrieving the user's name from your database
        $_SESSION["user_name"] = $name;

        if ($role === 'admin') {
            header("Location: ./NiceAdmin/index.php");
        } elseif ($role === 'user') {
            header("Location: inner-page1.php");
        } else {
            header('Location: index.html');
        }
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

// Close the database connection
$conn->close();
?>
