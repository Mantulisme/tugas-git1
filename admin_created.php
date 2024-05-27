<?php
require 'db.php';

$admin1_password = password_hash('admin1password', PASSWORD_DEFAULT);
$admin2_password = password_hash('admin2password', PASSWORD_DEFAULT);

$sql = "INSERT INTO users (user_name, user_password, user_email, user_role) VALUES 
('admin1', '$admin1_password', 'admin1@example.com', 'admin'),
('admin2', '$admin2_password', 'admin2@example.com', 'admin')";

if ($conn->query($sql) === TRUE) {
    echo "Admin users created successfully.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>