<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="navbar.css">
    <title>Navbar</title>
</head>

<body>
    <!-- navbar -->
    <div class="navbar">
        <div class="logo">
            <a href="#home">User Dashboard</a>
        </div>

        <ul>
            <!-- Remove the "Home" link -->
        </ul>

        <div class="dropdown-holder">
            <div class="dropdown">
                <button id="dropdown1-btn" class="dropbtn">Activity Options</button>
                <div id="dropdown1-content" class="dropdown-content">
                    <a href="#add_activity">Add Activity</a>
                    <a href="#show_all">Show All</a>
                    <a href="#set_activity">Set Activity</a>
                    <a href="#others">Others</a>
                </div>
            </div>

            <div class="dropdown">
                <img src="../Login_Form - Copy/assets/img/team-1.jpg" alt="Profile Picture" class="profile-pic"
                    id="profile-pic">
                <div id="dropdown2-content" class="dropdown-content">
                    <p>Welcome, User!</p>
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
                echo "<h1 class='welcome-message'>Welcome, " . $_SESSION["user_name"] . "!</h1>";
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



    <section class="add-activity" id="add_activity">
    <h2>Add Activity</h2>
    <div class="content-container">
            <div class="left-div">
                <!-- Add activity form -->
                <form action="add_activity.php" method="POST"></form>
                    <label for="name">Activity Name:</label>
                    <input type="text" id="name" name="name" required><br><br>

                    <label for="month">Month:</label>
                    <input type="text" id="month" name="month" required><br><br>

                    <label for="date">Date:</label>
                    <input type="date" id="date" name="date" required><br><br>

                    <label for="time">Time:</label>
                    <input type="time" id="time" name="time" required><br><br>

                    <label for="location">Location:</label>
                    <input type="text" id="location" name="location" required><br><br>

                    <label for="ootd">OOTD:</label>
                    <input type="text" id="ootd" name="ootd" required><br><br>

                    <input type="submit" value="Add Activity">
                </form>
            </div>
        </div>
    </section>

    <!-- Success Modal -->
    <div id="successModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Activity Added Successfully!</h2>
            <p>Your activity has been added.</p>
        </div>
    </div>

    <!-- Error Modal -->
    <div id="errorModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Error Adding Activity</h2>
            <p>There was an error adding the activity. Please try again later.</p>
        </div>
    </div>

    <script>
        // Get the modal elements
        var successModal = document.getElementById("successModal");
        var errorModal = document.getElementById("errorModal");

        // Get the <span> elements that close the modals
        var successClose = successModal.getElementsByClassName("close")[0];
        var errorClose = errorModal.getElementsByClassName("close")[0];

        // When the form is submitted, display the appropriate modal
        document.querySelector("form").addEventListener("submit", function (event) {
            event.preventDefault(); // Prevent the form from submitting

            // Simulate a success or error scenario (replace this with your actual logic)
            var isActivityAddedSuccessfully = true; // Change this based on your scenario

            if (isActivityAddedSuccessfully) {
                successModal.style.display = "block";
            } else {
                errorModal.style.display = "block";
            }
        });

        // Close the success modal when the user clicks on the close button (x)
        successClose.addEventListener("click", function () {
            successModal.style.display = "none";
        });

        // Close the error modal when the user clicks on the close button (x)
        errorClose.addEventListener("click", function () {
            errorModal.style.display = "none";
        });

        // Close the modals when the user clicks anywhere outside of them
        window.addEventListener("click", function (event) {
            if (event.target == successModal || event.target == errorModal) {
                successModal.style.display = "none";
                errorModal.style.display = "none";
            }
        });
    </script>
    </section>
    



    <section class="show-all" id="show_all">
        Show all
    </section>

    <section class="set-activity" id="set_activity">
        set activity
    </section>

    <section class="others" id="others">
        others
    </section>




    <script src="profile-nav.js"></script>
</body>

</html>