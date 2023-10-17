<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$database = "register_form";

// Create a connection to the database
$connection = new mysqli($servername, $username, $password, $database);

// Check for connection errors
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Query to fetch data from the database
$query = "SELECT month, COUNT(name) FROM activities ORDER BY month";

$result = $connection->query($query);

if ($result) {
    $data = array("months" => array(), "name" => array());

    while ($row = $result->fetch_assoc()) {
        $data["months"][] = $row["month"];
        $data["name"][] = $row["name"];
    }

    // Set the response content type to JSON
    header('Content-Type: application/json');
    echo json_encode($data);
} else {
    echo "Error: " . $connection->error;
}

// Close the database connection
$connection->close();
?>
