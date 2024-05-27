<?php
session_start();
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Fetch the user from the database
    $sql = "SELECT * FROM users WHERE user_name = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verify the password
        if (password_verify($password, $user['user_password'])) {
            // Set session variables
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['username'] = $user['user_name'];
            $_SESSION['is_admin'] = in_array($user['user_id'], [1, 2]); // Admin check

            // Redirect to the index page
            header("Location: index.php");
            exit();
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No user found with that username.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Login</title>
</head>
<body>
    <div class="form login">
    <h2>Login</h2>
    <form method="post" action="login.php">
        <label>Username:</label>
        <input type="text" name="user_name" required><br>
        <label>Password:</label>
        <input type="password" name="user_password" required><br>
        <input type="submit" value="Login">
    </form>
    <a class="registration" href="register.php">Register</a>
    </div>
    
</body>
</html>
