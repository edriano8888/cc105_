<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require 'db.php'; // Database connection
    $email = $_POST['email'];

    // Check if email exists
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        // Here, you would send a reset link to the email
        echo "A password reset link has been sent to your email.";
    } else {
        echo "No account found with this email.";
    }
    $stmt->close();
    $conn->close();
}
?>
