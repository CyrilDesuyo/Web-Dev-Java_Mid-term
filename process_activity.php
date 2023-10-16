<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connect to your MySQL database (replace with your database credentials)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "register_form";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve form data
    $name = $_POST["name"];
    $date = $_POST["date"];
    $time = $_POST["time"];
    $location = $_POST["location"];
    $ootd = $_POST["ootd"];

    // Insert the data into the database (adjust your table name and columns)
    $sql = "INSERT INTO user-add-activity (name, date, time, location, ootd) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $name, $date, $time, $location, $ootd);

    if ($stmt->execute()) {
        // Data insertion successful
        echo "Activity added successfully!";
    } else {
        // Error handling
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>

<!-- Display activities from the database inside the "your-activity" div -->
<div class="your-activity">
    <?php
    // Connect to the database again to retrieve stored activities
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve stored activities (adjust your table name and columns)
    $sql = "SELECT name, date, time, location, ootd FROM activities";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "<p>Name: " . $row["name"] . "</p>";
            echo "<p>Date: " . $row["date"] . "</p>";
            echo "<p>Time: " . $row["time"] . "</p>";
            echo "<p>Location: " . $row["location"] . "</p>";
            echo "<p>OOTD: " . $row["ootd"] . "</p>";
            echo "<hr>";
        }
    } else {
        echo "No activities found.";
    }

    $conn->close();
    ?>
</div>
