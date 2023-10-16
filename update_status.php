<?php
// Set the PHP timezone to Asia/Manila
date_default_timezone_set('Asia/Manila');

// Database connection settings (replace with your actual database credentials)
$db_host = "localhost";
$db_name = "register_form";
$db_user = "root";
$db_password = "";

try {
    // Create a PDO database connection
    $pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Get the user's ID, new status, and current timestamp from the POST request
    $userId = $_POST["userId"];
    $newStatus = $_POST["newStatus"];
    $currentTimestamp = date('Y-m-d H:i:s'); // Get the current timestamp in military time format (24-hour)

    // SQL query to update the user's status and updatedAt
    $sql = "UPDATE users SET status = :newStatus, updatedAt = :currentTimestamp WHERE id = :userId";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":newStatus", $newStatus);
    $stmt->bindParam(":currentTimestamp", $currentTimestamp);
    $stmt->bindParam(":userId", $userId);
    $stmt->execute();

    // Check if the update was successful
    if ($stmt->rowCount() > 0) {
        echo "success";
    } else {
        echo "error";
    }
} catch (PDOException $e) {
    // Handle database connection or query errors
    echo "Error: " . $e->getMessage();
}
?>
