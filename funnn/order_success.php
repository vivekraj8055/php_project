<?php
session_start();

$customer_name = isset($_SESSION['customer_name']) ? $_SESSION['customer_name'] : "Valued Customer";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Order Success</title>
    <style>
        body {
            background-color: #111;
            color: #00ffcc;
            font-family: Arial, sans-serif;
            padding: 40px;
            text-align: center;
        }
        .success-box {
            background-color: #222;
            padding: 30px;
            border-radius: 12px;
            display: inline-block;
            box-shadow: 0 0 15px #00ffcc;
        }
        .success-box h1 {
            font-size: 36px;
            margin-bottom: 15px;
        }
        .success-box p {
            font-size: 20px;
        }
    </style>
</head>
<body>
    <div class="success-box">
        <h1>Thank You, <?php echo htmlspecialchars($customer_name); ?>!</h1>
        <p>Your order has been placed successfully.</p>
        <p>We appreciate your trust in our service.</p>
    </div>
</body>
</html>
