<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="navbar.css">
    <style>
        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            text-align: center;
        }

        .edit-button {
            background-color: #008CBA;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }
    </style>
    <title>Navbar</title>
</head>

<body>
    <!-- navbar -->
    <div class="navbar">
        <div class="logo">
            <a href="#home">Admin Dashboard</a>
        </div>

        <ul>
            <!-- Remove the "Home" link -->
        </ul>

        <div class="dropdown-holder">
            <div class="dropdown">
                <button id="dropdown1-btn" class="dropbtn">Activity Options</button>
                <div id="dropdown1-content" class="dropdown-content">
                    <a href="#list-of-users">List of Users</a>
                    <a href="#show_all">Show All</a>
                    <a href="#set_activity">Set Activity</a>
                    <a href="#others">Others</a>
                </div>
            </div>

            <div class="dropdown">
                <img src="../Login_Form - Copy/assets/img/team-1.jpg" alt="Profile Picture" class="profile-pic"
                    id="profile-pic">
                <div id="dropdown2-content" class="dropdown-content">
                    <p>Welcome, Admin!</p>
                    <a href="logout.php">Logout</a>
                </div>
            </div>
        </div>

    </div>


    <!-- Main Content Here -->
    <section class="home" id="home">
    <div class="welcome-message">
            <?php
            // Start the session
            session_start();
            
            // Check if the user's name is set in the session
            if (isset($_SESSION["user_name"])) {
                echo "<h1 class='welcome-message'>Welcome here in the admin page, " . $_SESSION["user_name"] . "!</h1>";
            } else {
                echo "<h1 class='welcome-message'>Welcome, Guest!</h1>";
            }
            ?>
                <div class="supp-message">
                    <p>Thank you for signing up with us. We're excited to have you as part of our community.</p>
                </div>
                <div>
                    <p>Feel free to explore and use our servises prepared for you.</p>
                </div>
        </div>
    </section>
            

            <!-- LIST OF USERS -->
    <section class="list-of-users" id="list-of-users">
 
    <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Status</th>
            <th>Created At</th> <!-- Add this column -->
            <th>Edit</th>
        </tr>
        <?php
        // Database connection settings (replace with your actual database credentials)
        $db_host = "localhost";
        $db_name = "register_form";
        $db_user = "root";
        $db_password = "";

        try {
            // Create a PDO database connection
            $pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Fetch user data from the database, ordered by createdAt in descending order
            $query = "SELECT id, name, email, status, createdAt FROM users ORDER BY createdAt DESC";
            $stmt = $pdo->query($query);

            // Loop through the results and populate the table rows
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td>" . $row["name"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td id='status-" . $row["id"] . "'>" . $row["status"] . "</td>";
                echo "<td>" . $row["createdAt"] . "</td>"; // Display the createdAt timestamp
                echo '<td><button class="edit-button" onclick="editStatus(' . $row["id"] . ')">Edit</button></td>';
                echo "</tr>";
            }
        } catch (PDOException $e) {
            // Handle database connection or query errors
            echo "Error: " . $e->getMessage();
        }
        ?>
    </table>

    <script>
        function editStatus(userId) {
            const newStatus = prompt("Enter the new status for this user");
            if (newStatus !== null) {
                // Send an AJAX request to update the user's status and updatedAt in the database
                const xhr = new XMLHttpRequest();
                xhr.open("POST", "update_status.php", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = function () {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        // Update the table cell and database if the update was successful
                        if (xhr.responseText === "success") {
                            const statusCell = document.getElementById('status-' + userId);
                            if (statusCell) {
                                statusCell.textContent = newStatus;
                            }
                        } else {
                            alert("Failed to update the status in the database.");
                        }
                    }
                };
                xhr.send("userId=" + userId + "&newStatus=" + encodeURIComponent(newStatus));
            }
        }
    </script>
    </section>
    

    <section class="show-all" id="show_all">
        <?php
            ob_start();
            // Replace with your database connection details
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "register_form";

            // Create a connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Fetch gender data from the database
            $sql = "SELECT gender, COUNT(*) as count FROM users GROUP BY gender";
            $result = $conn->query($sql);

            $data = [];
            while ($row = $result->fetch_assoc()) {
                $data[$row['gender']] = $row['count'];
            }

            // Close the database connection
            $conn->close();

            // Return the data as JSON
            header('Content-Type: application/json');
            echo json_encode($data);

            ob_end_flush();
        ?>

            <div class="chart-container" style="width: 80%; margin: auto;">
                <canvas id="genderChart"></canvas>
            </div>
    </section>

    <section class="set-activity" id="set_activity">
        set activity
    </section>

    <section class="others" id="others">
        others
    </section>

    <script src="profile-nav.js"></script>
    <script src="pie chart.js"></script>
</body>

</html>
