<?php
require 'db.php';

$id = $_GET['car_id'];
$sql = "SELECT * FROM cars WHERE car_id = $id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Car</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <h2>Car Details</h2>
    <p>Make: <?php echo $row['car_make']; ?></p>
    <p>Model: <?php echo $row['car_model']; ?></p>
    <p>Year: <?php echo $row['car_year']; ?></p>
    <p>Rental Price: <?php echo $row['car_rental_price']; ?></p>
    <p>Status: <?php echo $row['car_status']; ?></p>
    <a href="index.php">Back to list</a>
</body>
</html>
