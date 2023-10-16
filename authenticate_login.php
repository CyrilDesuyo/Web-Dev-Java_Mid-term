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

// Process the login form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // SQL query to fetch user data by email
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $_SESSION["user_name"] = $row["name"];
        if (password_verify($password, $row["password"])) {
            // Password is correct
            $role = $row["role"];
            // Redirect based on the role
            if ($role === 'admin') {
                header("Location: ./NiceAdmin/index.php");
            } elseif ($role === 'user') {
                header("Location: inner-page1.php");
            } else {
                echo "Invalid role!";
            }
            exit();
        } else {
            echo "Incorrect password!";
        }
    } else {
        echo "User not found!";
    }

    $stmt->close();
}

// Close the database connection
$conn->close();
?>
