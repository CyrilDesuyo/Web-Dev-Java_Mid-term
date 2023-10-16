<?php
// Check if the request is a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Replace with your database connection code
    $pdo = new PDO('mysql:host=localhost;dbname=register_form', 'root', '');

    // Get the data from the POST request
    $id = $_POST['id'];
    $name = $_POST['name'];
    $month = $_POST['month'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $location = $_POST['location'];
    $ootd = $_POST['ootd'];

    // Update the activity in the database
    try {
        // Replace 'activities' with your actual table name
        $sql = "UPDATE activities SET name = ?, month = ?, date = ?, time = ?, location = ?, ootd = ? WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$name, $month, $date, $time, $location, $ootd, $id]);
        echo "Activity updated successfully";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    // Handle invalid requests or direct access to this script
    echo "Invalid request";
}
?>
