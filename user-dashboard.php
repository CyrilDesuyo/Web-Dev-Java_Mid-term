<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Add your head content here -->
    <link rel="stylesheet" href="user-dash.css">
</head>
<body>
<?php
    // Function to include a file if it exists
    function includeIfExists($filename) {
        if (file_exists($filename)) {
            include_once($filename);
        }
    }

    // Include the navbar.html file if it exists
    includeIfExists("navbar.html");
?>






<main id="main">

    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <!-- <h2>Inner Page</h2>
          <ol>
            <li><a href="index.html">Home</a></li>
            <li>Inner Page</li>
          </ol> -->
          <h2>Welcome USer!!!!!</h2>
        </div>

      </div>
    </section><!-- End Breadcrumbs Section -->

    <section class="inner-page pt-4">
      <div class="container">
        <!-- <p>
          Example inner page template
        </p> -->
        <div class="container-holder">
            <div class="add-activity"></div>
            <div class="show-all"></div>
            <div class="set-activity"></div>
            <div class="others"></div>
        </div>
      </div>
    </section>

  </main><!-- End #main -->






<?php
    // Include the footer.html file if it exists
    includeIfExists("footer.html");
?>
</body>
</html>
