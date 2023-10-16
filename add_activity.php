<?php
// Replace with your database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "register_form";

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$name = $_POST["name"];
$month = $_POST["month"];
$date = $_POST["date"];
$time = $_POST["time"];
$location = $_POST["location"];
$ootd = $_POST["ootd"];

// SQL query to insert data into the database
$sql = "INSERT INTO activities (name, month, date, time, location, ootd)
        VALUES ('$name', '$month', '$date', '$time', '$location', '$ootd')";

if ($conn->query($sql) === TRUE) {
    $response = array("success" => true);
} else {
    $response = array("success" => false);
}

$conn->close();

// Send JSON response
header("Content-type: application/json");
echo json_encode($response);
?>
