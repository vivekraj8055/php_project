<?php
session_start();

$conn = new mysqli("localhost", "root", "", "presidency_cafeteria");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

$sql = "SELECT * FROM admin_users WHERE username='$username' AND password='$password'";
$result = $conn->query($sql);

if ($result && $result->num_rows === 1) {
    $_SESSION['admin_logged_in'] = true;
    $_SESSION['admin_username'] = $username;
    header("Location: admin_dashboard.php");
    exit();
} else {
    echo "<script>alert('Invalid login. Please try again.'); window.location.href='admin_login.php';</script>";
}

$conn->close();
?>
