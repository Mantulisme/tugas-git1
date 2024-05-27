<?php
require 'db.php';

$id = $_GET['car_id'];
$sql = "DELETE FROM cars WHERE car_id = $id";

if ($conn->query($sql) === TRUE) {
    header("Location: index.php");
    exit();
} else {
    echo "Error deleting record: " . $conn->error;
}
?>
