<?php
session_start();
require 'db.php';

if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] != 'admin') {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $make = $_POST['make'];
    $model = $_POST['model'];
    $year = $_POST['year'];
    $rental_price = $_POST['rental_price'];
    $status = $_POST['status'];

    $sql = "INSERT INTO cars (make, model, year, rental_price, status) VALUES ('$make', '$model', '$year', '$rental_price', '$status')";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <title>Create Car</title>
</head>
<body>
    <h2>Create Car</h2>
    <form method="post" action="create.php">
        <label>Make:</label>
        <input type="text" name="make" required><br>
        <label>Model:</label>
        <input type="text" name="model" required><br>
        <label>Year:</label>
        <input type="number" name="year" required><br>
        <label>Rental Price:</label>
        <input type="text" name="rental_price" required><br>
        <label>Status:</label>
        <select name="status">
            <option value="available">Available</option>
            <option value="rented">Rented</option>
        </select><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
