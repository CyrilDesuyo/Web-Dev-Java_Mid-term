<?php
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

// SQL query to retrieve members/users
$sql = "SELECT * FROM users"; // Replace 'users' with your actual table name
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Members</title>
</head>
<body>
    <h1>List of Members</h1>
    
    <?php
    if ($result->num_rows > 0) {
        // Output data of each row
        echo "<table border='1'>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                </tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["id"] . "</td>
                    <td>" . $row["name"] . "</td>
                    <td>" . $row["email"] . "</td>
                </tr>";
        }
        echo "</table>";
    } else {
        echo "No members found.";
    }
    ?>

</body>
</html>

<?php
// Close the database connection
$conn->close();
?>
