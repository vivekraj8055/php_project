<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin_login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
</head>
<body style="background:#111; color:white; text-align:center; font-family:sans-serif;">
    <h1>Welcome, <?= $_SESSION['admin_username'] ?>!</h1>
    <p>This is your admin dashboard.</p>
    <a href="logout.php" style="color:#00ffcc;">Logout</a>
</body>
</html>
