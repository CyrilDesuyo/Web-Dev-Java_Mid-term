<?php
// Step 1: Connect to your database (replace with your actual database credentials)
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'register_form';

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Step 2: Query to get gender counts, including "Prefer not to say"
$query = "SELECT gender FROM users";
$result = mysqli_query($conn, $query);

// Step 3: Initialize an array to store the gender counts
$genderData = array('Male' => 0, 'Female' => 0, 'Prefer not to say' => 0);

// Step 4: Process the query results and populate the $genderData array
while ($row = mysqli_fetch_assoc($result)) {
    // Normalize gender values to lowercase for consistency
    $gender = strtolower($row['gender']);
    
    // Check variations and update the counts accordingly
    if ($gender === 'male') {
        $genderData['Male']++;
    } elseif ($gender === 'female') {
        $genderData['Female']++;
    } elseif (strpos($gender, 'prefer') !== false) {
        $genderData['Prefer not to say']++;
    }
}

// Step 5: Close the database connection
mysqli_close($conn);

// Step 6: Encode the data as JSON and output it
header('Content-Type: application/json');
echo json_encode($genderData);
?>
