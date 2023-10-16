<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $db_host = "localhost";
    $db_name = "register_form";
    $db_user = "root";
    $db_password = "";

    try {
        $pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $editId = $_POST["editId"];
        $editName = $_POST["editName"];
        $editMonth = $_POST["editMonth"];
        $editDate = $_POST["editDate"];
        $editTime = $_POST["editTime"];
        $editLocation = $_POST["editLocation"];
        $editOotd = $_POST["editOotd"];

        $query = "UPDATE activities SET name = :name, month = :month, date = :date, time = :time, location = :location, ootd = :ootd WHERE id = :id";

        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':name', $editName, PDO::PARAM_STR);
        $stmt->bindParam(':month', $editMonth, PDO::PARAM_STR);
        $stmt->bindParam(':date', $editDate, PDO::PARAM_STR);
        $stmt->bindParam(':time', $editTime, PDO::PARAM_STR);
        $stmt->bindParam(':location', $editLocation, PDO::PARAM_STR);
        $stmt->bindParam(':ootd', $editOotd, PDO::PARAM_STR);
        $stmt->bindParam(':id', $editId, PDO::PARAM_INT);
        $stmt->execute();

        // Redirect back to the page where the modal is displayed
        header("Location: inner-page1.php");
        exit();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>