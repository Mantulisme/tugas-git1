<?php
require 'db.php';

$sql = "SELECT * FROM cars";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Car Rental System</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h2>Car List</h2>
    <a class="create" href="create.php">Add New Car</a>
    <br>
    <br>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Make</th>
            <th>Model</th>
            <th>Year</th>
            <th>Rental Price</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>" . $row["car_id"]. "</td>
                    <td>" . $row["car_make"]. "</td>
                    <td>" . $row["car_model"]. "</td>
                    <td>" . $row["car_year"]. "</td>
                    <td>" . $row["car_rental_price"]. "</td>
                    <td>" . $row["car_status"]. "</td>
                    <td>
                        <a href='read.php?car_id=" . $row["car_id"] . "'>View</a> | 
                        <a href='update.php?car_id=" . $row["car_id"] . "'>Edit</a> | 
                        <a href='delete.php?car_id=" . $row["car_id"] . "'>Delete</a>
                    </td>
                </tr>";
            }
        } else {
            echo "<tr><td colspan='7'>No cars found</td></tr>";
        }
        ?>
    </table>
</body>
</html>
