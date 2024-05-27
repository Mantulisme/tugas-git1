<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_name = $_POST['user_name'];
    $user_password = password_hash($_POST['user_password'], PASSWORD_DEFAULT);
    $user_email = $_POST['user_email'];

    $sql = "INSERT INTO users (user_name, user_password, user_email) VALUES ('$user_name', '$user_password', '$user_email')";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: Username atau email sudah dipakai";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Register</title>
</head>
<body>
    <div class="form">
    <h2>Register</h2>
    <form method="post" action="register.php">
        <label>Username:</label>
        <input type="text" name="user_name" required><br>
        <label>Password:</label>
        <input type="password" name="user_password" required><br>
        <label>Email:</label>
        <input type="email" name="user_email" required><br>
        <br>
        <input type="submit" value="Register">
        <br>
    </form>
    <a class="login" href="login.php">Already have an account?</a>
    </div>
    
</body>
</html>