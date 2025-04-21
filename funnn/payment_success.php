<?php
session_start();

$payment_amount = $_SESSION['payment_amount'] ?? "₹0";
$payment_method = $_SESSION['payment_method'] ?? "Unknown";
$order_id = $_SESSION['order_id'] ?? "N/A";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Payment Success</title>
    <style>
        body {
            background-color: #111;
            font-family: Arial, sans-serif;
            color: #0ff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .box {
            background-color: #1a1a1a;
            border: 2px solid #0ff;
            border-radius: 20px;
            padding: 40px;
            text-align: center;
            box-shadow: 0 0 20px #0ff;
        }

        h1 {
            color: #00ffe7;
            margin-bottom: 20px;
        }

        .inner-box {
            background-color: #000;
            padding: 20px;
            border-radius: 15px;
            margin-bottom: 20px;
        }

        .inner-box p {
            color: #ccc;
            font-size: 18px;
            margin: 10px 0;
        }

        .highlight {
            color: #00ffcc;
            font-weight: bold;
        }

        .btn {
            background-color: #00ffcc;
            color: #000;
            padding: 12px 24px;
            border: none;
            border-radius: 12px;
            font-size: 16px;
            cursor: pointer;
            font-weight: bold;
            margin: 10px 5px;
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-block;
        }

        .btn:hover {
            background-color: #00b894;
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <div class="box">
        <h1>Payment Successful 🎉</h1>
        <div class="inner-box">
            <p>Your payment of <span class="highlight"><?php echo $payment_amount; ?></span> was processed.</p>
            <p>Payment Method: <span class="highlight"><?php echo $payment_method; ?></span></p>
            <p>Order ID: <span class="highlight"><?php echo $order_id; ?></span></p>
        </div>

        <!-- Buttons -->
        <a href="index.php" class="btn">← Back to Home</a>
        <a href="menu.php" class="btn">Order More</a>
    </div>
</body>
</html>
