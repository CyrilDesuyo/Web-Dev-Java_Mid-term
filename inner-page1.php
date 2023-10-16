<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>User Dashboard</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Regna
  * Updated: Jul 27 2023 with Bootstrap v5.3.1
  * Template URL: https://bootstrapmade.com/regna-bootstrap-onepage-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center ">
    <div class="container d-flex justify-content-between align-items-center">

      <div id="logo">
        <a href="index.html">USER DASHBOARD</a>
        <!-- Uncomment below if you prefer to use a text logo -->
        <!--<h1><a href="index.html">Regna</a></h1>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#add-activity">Add Activity</a></li>
          <li><a class="nav-link scrollto" href="#show-activity">Show Activities</a></li>
        </ul>
        <li class="logout"><a href="logout.php">Logout</a></li>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs" id="hero">
      <div class="container">

        <div class="message-holder1">
          <div class="welcome-message">
            <?php
              // Start the session
              session_start();
              
              // Check if the user's name is set in the session
              if (isset($_SESSION["user_name"])) {
                  echo "<h1 class='welcome-message1'>Welcome, " . $_SESSION["user_name"] . "!</h1>";
              } else {
                  echo "<h6 class='welcome-message'>Welcome, Guest!</h6>";
              }
              ?>

              <a href="#add-activity" id="get-started">Get Started</a>
          </div>
        </div>

      </div>
    </section><!-- End Breadcrumbs Section -->


    <!-- LINKSSSS -->
    <link rel="stylesheet" href="form.css">

    <section class="inner-page pt-4" id="add-activity">
      <div class="container-form">
        <div class="left-side">
          <h1>Add Activity</h1>
          <div class="message-holder">
            <h5>Enter the details of your activity in the form and make sure to input a valid value!</h5>
          </div>
        </div>
        <div class="right-side">
          <form id="activityForm" action="add_activity.php" method="post">
            <label for="name">Activity Name:</label>
            <input type="text" id="name" name="name" required>
            <label for="month">Month:</label>
            <select id="month" name="month" required>
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
            <label for="date">Date:</label>
            <input type="date" id="date" name="date" required>
            <label for="time">Time:</label>
            <input type="time" id="time" name="time" required>
            <label for="location">Location:</label>
            <input type="text" id="location" name="location" required>
            <label for="ootd">OOTD:</label>
            <input type="text" id="ootd" name="ootd" required>
            <button type="submit">Add Activity</button>
          </form>
        </div>


        <!-- Success Modal -->
        <div id="successModal" class="modal">
          <div class="modal-content">
            <span class="close" id="successModalClose">&times;</span>
            <p>Activity added successfully!</p>
          </div>
        </div>

        <!-- Error Modal -->
        <div id="errorModal" class="modal">
          <div class="modal-content">
            <span class="close" id="errorModalClose">&times;</span>
            <p>Error adding activity. Please try again.</p>
          </div>
        </div>

        <script src="add-activity.js"></script>
      </div>
    </section>


    <!-- show all -->
    <section class="inner-page pt-4" id="show-activity">
      <div class="activity-container" id="activityContainer">
       <h2>Activities</h2>
      <div class="table-holder">
        <table>
          <tr>
              <th>Name</th>
              <th>Month</th>
              <th>Date</th>
              <th>Time</th>
              <th>Location</th>
              <th>OOTD</th>
              <th>Result</th>
              <th>Remarks</th>
              <th>Edit</th>
              <th>Set Activity</th>
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

        // Fetch activities from the database, ordered by createdAt in descending order
        $query = "SELECT * FROM activities ORDER BY createdAt DESC LIMIT :startRow, :rowsPerPage";
        $stmt = $pdo->prepare($query);

        // Initialize variables for pagination
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $rowsPerPage = 10;
        $startRow = ($page - 1) * $rowsPerPage;

        $stmt->bindParam(':startRow', $startRow, PDO::PARAM_INT);
        $stmt->bindParam(':rowsPerPage', $rowsPerPage, PDO::PARAM_INT);
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["month"] . "</td>";
            echo "<td>" . $row["date"] . "</td>";
            echo "<td>" . $row["time"] . "</td>";
            echo "<td>" . $row["location"] . "</td>";
            echo "<td>" . $row["ootd"] . "</td>";
            echo "<td>" . $row["result"] . "</td>";
            echo "<td>" . $row["remarks"] . "</td>";
            echo '<td><button class="edit-button" onclick="openEditModal(' . $row["id"] . ')">Edit</button></td>';
            echo '<td><button class="set-activity-button" onclick="openSetActivityModal(' . $row["id"] . ')">Set Activity</button></td>';
            echo "</tr>";

            // edit activity modal 
            echo '<dialog id="modal-edit-' . $row["id"] . '">';
            echo '<div class="modal-content">';
            echo '<h3>Edit Activity</h3>';
            echo '<form id="activityForm" action="update_modal.php" method="post" class="form">
                  <input type="hidden" id="editId" name="editId" value="' . $row["id"] . '">

                  <label for="editName">Activity Name</label>
                  <input type="text" id="editName" name="editName" required>

                  <label for="editMonth">Month</label>
                  <select id="editMonth" name="editMonth" required>
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

                  <label for="editDate">Date</label>
                  <input type="date" id="editDate" name="editDate" required>

                  <label for="editTime">Time</label>
                  <input type="time" id="editTime" name="editTime" required>

                  <label for="editLocation">Location</label>
                  <input type="text" id="editLocation" name="editLocation" required>

                  <label for="editOotd">OOTD</label>
                  <input type="text" id="editOotd" name="editOotd" required>

                  <br><br>
                  <button type="submit">Save Changes</button>
              </form>';
            echo '<br>';
            echo '<button class="close-button" onclick="closeModal(' . $row["id"] . ', \'edit\')">Close</button>';
            echo '</div>';
            echo '</dialog>';

            // set activity modal 
            echo '<dialog id="modal-set-activity-' . $row["id"] . '">';
            echo '<div class="modal-content">';
            echo '<p>Set Activity</p>';
            echo '<form id="activityForm" action="set_modal.php" method="post">
                  <label for="editResult">Result:</label>
                  <select id="editResult" name="editResult">
                    <option value="Not Started">Not Started</option>
                    <option value="Done">Done</option>
                    <option value="Canceled">Canceled</option>
                  </select>
                  <label for="editRemarks">Remarks:</label>
                  <textarea id="editRemarks" name="editRemarks" rows="4" cols="50"></textarea>
                  <br><br>
                  <input type="hidden" id="editId" name="editId" value="' . $row["id"] . '">
                  <button type="submit">Save Changes</button>
                </form>';
            echo '<br>';
            echo '<button class="close-button" onclick="closeModal(' . $row["id"] . ', \'set-activity\')">Close</button>';
            echo '</div>';
            echo '</dialog>';
        }

        $totalRows = $pdo->query("SELECT COUNT(*) FROM activities")->fetchColumn();
        $totalPages = ceil($totalRows / $rowsPerPage);
    } catch (PDOException $e) {
        // Handle database connection or query errors
        echo "Error: " . $e->getMessage();
    }
    ?>

</table>
</div>

<ul class="pagination">
    <?php
    // Calculate the total number of pages
    $totalPages = ceil($totalRows / $rowsPerPage);

    for ($i = 1; $i <= $totalPages; $i++) {
        echo "<li><a href='?page=$i'>$i</a></li>";
    }
    ?>
</ul>

<script>
    const rowsPerPage = 10;
    const tableRows = document.querySelectorAll('table tr');

    function showPage(page) {
        const startIndex = (page - 1) * rowsPerPage;
        const endIndex = startIndex + rowsPerPage;

        tableRows.forEach((row, index) => {
            if (index >= startIndex && index < endIndex) {
                row.style.display = 'table-row';
            } else {
                row.style.display = 'none';
            }
        });
    }

    // Show the first page by default
    showPage(1);

    function openEditModal(activityId) {
        const modal = document.getElementById('modal-edit-' + activityId);
        modal.showModal();
    }

    function openSetActivityModal(activityId) {
        const modal = document.getElementById('modal-set-activity-' + activityId);
        modal.showModal();
    }

    function closeModal(activityId, modalType) {
        const modal = document.getElementById('modal-' + modalType + '-' + activityId);
        modal.close();
    }
</script>


    <!-- Edit Modal -->
<div id="editModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Edit Activity</h2>
        <form id="editForm">
            <input type="hidden" id="activityId" name="activityId">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name">
            <label for="month">Month:</label>
            <input type="text" id="month" name="month">
            <label for="date">Date:</label>
            <input type="text" id="date" name="date">
            <label for="time">Time:</label>
            <input type="text" id="time" name="time">
            <label for="location">Location:</label>
            <input type="text" id="location" name="location">
            <label for="ootd">OOTD:</label>
            <input type="text" id="ootd" name="ootd">
            <label for="result">Result:</label>
            <input type="text" id="result" name="result">
            <label for="remarks">Remarks:</label>
            <input type="text" id="remarks" name="remarks">
            <input type="submit" value="Save">
        </form>
    </div>
</div>

    <!-- Modal for set activity -->
    <div id="setActivityModal" class="modal">
        <div class="modal-content">
            <span class="close" id="setActivityModalClose">&times;</span>
            <h2>Edit Activity</h2>
            <!-- Hidden input for activityId -->
            <input type="hidden" id="activityId" name="activityId" value="">
            <form id="setActivityForm" action="set_activity_result.php" method="post">
                <label for="result">Result:</label>
                <select id="result" name="result">
                    <option value="Done">Done</option>
                    <option value="Cancelled">Cancelled</option>
                </select>
                <label for="remarks">Remarks:</label>
                <textarea id="remarks" name="remarks"></textarea>
                <button type="submit">Save</button>
            </form>
        </div>
    </div>



<script src="test.js"></script>
<!-- <script src="set-activity.js"></script> -->
</div>
</section>

</main><!-- End #main -->







<!-- ======= Footer ======= -->
<footer id="footer">
  <div class="footer-top">
    <div class="container">

    </div>
  </div>

  <div class="container">
    <div class="copyright">
      &copy; Copyright <strong>Regna</strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!--
        All the links in the footer should remain intact.
        You can delete the links only if you purchased the pro version.
        Licensing information: https://bootstrapmade.com/license/
        Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Regna
      -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
    class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>

</body>

</html>