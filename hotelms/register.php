<?php

$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "hotelms"; 

$conn = mysqli_connect($servername, $username, $password, $dbname);


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashed_password = password_hash($password, PASSWORD_BCRYPT); 
    $created_at = date('Y-m-d H:i:s');


    $sql = "INSERT INTO user (name, username, email, password, created_at) VALUES ('$name', '$username', '$email', '$hashed_password', '$created_at')";

    if (mysqli_query($conn, $sql)) {
        echo "Admin registered successfully!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/login.css"/>
    <title>Register Admin</title>
</head>
<body>
   
    <h2>Register Admin</h2>
    <form method="POST" action="">
        <label for="name">Full Name:</label><br>
        <input type="text" id="name" name="name" required><br><br>
        
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br><br>
        
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>
        
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        
        <button type="submit">Register</button><br>
        <a href="login.php">Back to Login</a><br>
    </form>


<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/validator.min.js"></script>
</body>
</html>
