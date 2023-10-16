<?php
// Replace with your database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "register_form";


// Debugging output
echo "Received activityId: " . $_POST["activityId"] . "<br>";
echo "Received result: " . $_POST["result"] . "<br>";
echo "Received remarks: " . $_POST["remarks"] . "<br>";
// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get data from the form
$activityId = isset($_POST["activityId"]) ? intval($_POST["activityId"]) : 0;
$result = isset($_POST["result"]) ? $_POST["result"] : "";
$remarks = isset($_POST["remarks"]) ? $_POST["remarks"] : "";

echo "Received activityId: $activityId<br>";
echo "Received result: $result<br>";
echo "Received remarks: $remarks<br>";
// Ensure activityId is valid
if ($activityId <= 0) {
    die("Invalid activity ID");
}

// SQL query to update the result and remarks in the database
$sql = "UPDATE activities SET result = ?, remarks = ? WHERE id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssi", $result, $remarks, $activityId);

if ($stmt->execute()) {
    echo "success"; // Indicates a successful update
} else {
    echo "error";   // Indicates an update error
}

$stmt->close();
$conn->close();
?>
