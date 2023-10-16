<?php
 
    $db = new PDO('mysql:host=localhost;dbname=register_form;charset=UTF-8', 
                  'root', 
                  '',
                  array(PDO::ATTR_EMULATE_PREPARES => false,
                  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));


?>
<?php

if (isset($_POST['editName'])) {
    $field1 = $_POST['editName'];
    $field2 = $_POST['editmonth'];
    $field3 = $_POST['editdate'];
    $field4 = $_POST['edittime'];
    $field5 = $_POST['editlocation'];
    $field6 = $_POST['editootd'];

    $stmt = $db->prepare("UPDATE activities SET name, month, date, time, location, ootd, WHERE id = :id");
    $stmt->bindParam($field1);
    $stmt->bindParam($field2);
    $stmt->bindParam($field3);
    $stmt->bindParam($field4);
    $stmt->bindParam($field5);
    $stmt->bindParam($field6);
    $stmt->bindParam(':id', $_POST['editId'], PDO::PARAM_INT);

    if ($stmt->execute()) {
        echo 'Updated successfully';
    } else {
        echo 'Error updating record: ' . print_r($stmt->errorInfo(), true);
    }
}

?>