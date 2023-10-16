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
        $editResult = $_POST["editResult"];
        $editRemarks = $_POST["editRemarks"];

        $query = "UPDATE activities SET result = :result, remarks = :remarks WHERE id = :id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':result', $editResult, PDO::PARAM_STR);
        $stmt->bindParam(':remarks', $editRemarks, PDO::PARAM_STR);
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