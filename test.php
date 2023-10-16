<!DOCTYPE html>
<html>
<head>
    <title>Activities Table</title>
    <style>
        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px;
        }

        table, th, td {
            border: 1px solid #ccc;
        }

        th, td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>My Activities</h1>
    <table>
        <thead>
            <tr>
                <th>Activity Name</th>
                <th>Month</th>
                <th>Date</th>
                <th>Time</th>
                <th>Location</th>
                <th>OOTD</th>
                <th>Results</th>
                <th>Remarks</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Replace with your database connection code
            $host = "localhost";
            $username = "root";
            $password = "";
            $database = "register_form";

            $conn = new mysqli($host, $username, $password, $database);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM activities";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["name"] . "</td>";
                    echo "<td>" . $row["month"] . "</td>";
                    echo "<td>" . $row["date"] . "</td>";
                    echo "<td>" . $row["time"] . "</td>";
                    echo "<td>" . $row["location"] . "</td>";
                    echo "<td>" . $row["ootd"] . "</td>";
                    echo "<td>" . $row["result"] . "</td>";
                    echo "<td>" . $row["remarks"] . "</td>";
                    echo '<td><button data-action="edit" data-activityId="' . $row["id"] . '" data-name="' . $row["name"] . '" data-month="' . $row["month"] . '" data-date="' . $row["date"] . '" data-time="' . $row["time"] . '" data-location="' . $row["location"] . '" data-ootd="' . $row["ootd"] . '">Edit</button></td>';

                    echo "</tr>";
                }
                
            } else {
                echo "No activities found in the database.";
            }

            $conn->close();
            ?>
        </tbody>

    </table>

    <dialog id="editDialog">
    <form id="editForm" method="post">
        <input type="hidden" id="editId" name="editId">
        <label for="editName">Activity Name:</label>
        <input type="text" id="editName" name="editName"><br>
        <label for="editmonth">Month:</label>
            <select id="editmonth" name="editmonth" required>
              <option value="January">January</option>
              <option value="February">February</option>
              <option value="March">March</option>
              <option value="April">April</option>
              <option value="May">May</option>
              <option value="June">June</option>
              <option value="July">July</option>
              <option value="August">August</option>
              <option value="September">September</option>
              <option value="October">October</option>
              <option value="November">November</option>
              <option value="December">December</option>
            </select>
        <label for="editdate">Date:</label>
        <input type="date" id="editdate" name="editdate">
        <label for="edittime">Time:</label>
        <input type="time" id="edittime" name="edittime">
        <label for="editlocation">Location:</label>
        <input type="text" id="editlocation" name="editlocation">
        <label for="editootd">OOTD:</label>
        <input type="text" id="editootd" name="editootd">

        <button type="submit">Save</button>
        <button type="button" id="closeDialog">Cancel</button>
    </form>
</dialog>

<script src="test.js"></script>
</body>
</html>
