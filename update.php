<?php
require 'db.php';

$id = $_GET['car_id'];
$sql = "SELECT * FROM cars WHERE car_id = $id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $make = $_POST['car_make'];
    $model = $_POST['car_model'];
    $year = $_POST['car_year'];
    $rental_price = $_POST['car_rental_price'];
    $status = $_POST['car_status'];

    $sql = "UPDATE cars SET car_make='$make', car_model='$model', car_year='$year', car_rental_price='$rental_price', car_status='$status' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Car</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h2>Update Car</h2>
    <form method="post" action="update.php?car_id=<?php echo $id; ?>">
        <label>Make:</label>
        <input type="text" name="car_make" value="<?php echo $row['car_make']; ?>" required><br>
        <label>Model:</label>
        <input type="text" name="car_model" value="<?php echo $row['car_model']; ?>" required><br>
        <label>Year:</label>
        <input type="number" name="car_year" value="<?php echo $row['car_year']; ?>" required><br>
        <label>Rental Price:</label>
        <input type="text" name="car_rental_price" value="<?php echo $row['car_rental_price']; ?>" required><br>
        <label>Status:</label>
        <select name="car_status">
            <option value="available" <?php if($row['car_status'] == 'available') echo 'selected'; ?>>Available</option>
            <option value="rented" <?php if($row['car_status'] == 'rented') echo 'selected'; ?>>Rented</option>
        </select><br>
        <input type="submit" value="Update">
    </form>
</body>
</html>
