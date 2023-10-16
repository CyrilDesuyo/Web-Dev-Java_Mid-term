<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Inner Page - Regna Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700" rel="stylesheet">

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
        <a href="index.html"><img src="assets/img/logo.png" alt=""></a>
        <!-- Uncomment below if you prefer to use a text logo -->
        <!--<h1><a href="index.html">Regna</a></h1>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto " href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#services">Services</a></li>
          <li><a class="nav-link scrollto " href="#portfolio">Portfolio</a></li>
          <li><a class="nav-link scrollto" href="#team">Team</a></li>
          <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between">
          <div class="welcome-message">
              <?php
              // Start the session
              session_start();
              
              // Check if the user's name is set in the session
              if (isset($_SESSION["user_name"])) {
                  echo "<h4 class='welcome-message'>Welcome, " . $_SESSION["user_name"] . "!</h4>";
              } else {
                  echo "<h4 class='welcome-message'>Welcome, Guest!</h4>";
              }
              ?>
          </div>
        </div>

      </div>
    </section><!-- End Breadcrumbs Section -->


<!-- LINKSSSS -->
    <link rel="stylesheet" href="form.css">

    <section class="inner-page pt-4">
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
    <section class="inner-page pt-4">
    <div class="activity-container" id="activityContainer">
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

        // Fetch all activities from the database
        $query = "SELECT * FROM activities";
        $stmt = $pdo->query($query);

        // Loop through the results and populate the table rows
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
          echo "<tr data-id='" . $row["id"] . "'>";
          echo "<td>" . $row["name"] . "</td>";
          echo "<td>" . $row["month"] . "</td>";
          echo "<td>" . $row["date"] . "</td>";
          echo "<td>" . $row["time"] . "</td>";
          echo "<td>" . $row["location"] . "</td>";
          echo "<td>" . $row["ootd"] . "</td>";
          echo "<td>" . $row["result"] . "</td>"; // Replace "update_column" with your actual column name
          echo "<td>" . $row["remarks"] . "</td>"; // Replace "remarks" with your actual column name
          echo '<td><button class="edit-button" onclick="editActivity(' . $row["id"] . ')">Edit</button></td>';
          echo '<td><button class="set-activity-button" onclick="setActivity(' . $row['id'] . ')">Set Activity</button></td>';
          echo "</tr>";
        }

    } catch (PDOException $e) {
        // Handle database connection or query errors
        echo "Error: " . $e->getMessage();
    }
    ?>
</table>

    <!-- modal for set activity  -->
  <div id="setActivityModal" class="modal">
      <div class="modal-content">
          <span class="close" id="setActivityModalClose">&times;</span>
          <h2>Hai Hai</h2>
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


<script src="edit-activity.js"></script>
<script src="set-activity.js"></script>
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

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

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