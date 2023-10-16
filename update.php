php
<?php
if (isset($_POST['activityId'])) {
    $activityId = $_POST['activityId'];
    $name = $_POST['name'];
    $month = $_POST['month'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $location = $_POST['location'];
    $ootd = $_POST['ootd'];
    $result = $_POST['result'];
    $remarks = $_POST['remarks'];
    $query = "UPDATE activities SET name = '$name', month = '$month', date = '$date', time = '$time', location = '$location', ootd = '$ootd', result = '$result', remarks = '$remarks' WHERE activityId = '$activityId'";
    mysqli_query($conn, $query);
}
?>