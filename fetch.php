php
<?php
if (isset($_POST['activityId'])) {
    $activityId = $_POST['activityId'];
    $result = mysqli_query($conn, "SELECT * FROM activities WHERE activityId = '$activityId'");
    $row = mysqli_fetch_assoc($result);
    echo json_encode($row);
}
?>