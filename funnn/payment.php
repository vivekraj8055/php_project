<?php
session_start();
include 'db_connection.php';

// Redirect if cart is empty or total not sent
if (!isset($_SESSION['cart']) || empty($_SESSION['cart']) || !isset($_POST['total_amount'])) {
    header("Location: order.php");
    exit();
}

$cart = $_SESSION['cart'];
$total_amount = $_POST['total_amount'];
$payment_method = $_POST['payment_method'] ?? 'Cash';

$customer_id = 1; // Replace with actual customer ID if available

// Insert order
$order_query = "INSERT INTO orders (customer_id, order_date, total_amount) VALUES (?, NOW(), ?)";
$stmt = $conn->prepare($order_query);
$stmt->bind_param("id", $customer_id, $total_amount);
$stmt->execute();
$order_id = $stmt->insert_id;
$stmt->close();

// Insert each item into order_items
$order_item_query = "INSERT INTO order_items (order_id, item_name, quantity, price) VALUES (?, ?, ?, ?)";
$order_item_stmt = $conn->prepare($order_item_query);
foreach ($cart as $item_name => $item) {
    $quantity = $item['quantity'];
    $price = $item['price'];
    $order_item_stmt->bind_param("isid", $order_id, $item_name, $quantity, $price);
    $order_item_stmt->execute();
}
$order_item_stmt->close();

// Insert payment info
$payment_query = "INSERT INTO payments (order_id, amount, payment_date, payment_method) VALUES (?, ?, NOW(), ?)";
$payment_stmt = $conn->prepare($payment_query);
$payment_stmt->bind_param("ids", $order_id, $total_amount, $payment_method);
$payment_stmt->execute();
$payment_stmt->close();

// Clear the cart
unset($_SESSION['cart']);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Payment Successful</title>
    <style>
        body {
            background: #0f0f0f;
            color: #00ffc8;
            font-family: 'Segoe UI', sans-serif;
            text-align: center;
            padding: 60px;
        }
        .box {
            background: #1c1c1c;
            border: 2px solid #00ffc8;
            border-radius: 15px;
            padding: 40px;
            display: inline-block;
            box-shadow: 0 0 15px rgba(0,255,200,0.3);
            max-width: 700px;
        }
        h2 {
            color: #00ffc8;
            margin-bottom: 20px;
        }
        p {
            font-size: 18px;
            color: #ccc;
        }
        .btn {
            margin-top: 30px;
            padding: 12px 25px;
            background: #00ffc8;
            color: #000;
            font-weight: bold;
            border: none;
            border-radius: 10px;
            text-decoration: none;
            transition: 0.3s;
        }
        .btn:hover {
            background: #00cc99;
        }
        .online-section {
            margin-top: 25px;
            background: #111;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 0 10px #00ffc8;
            display: inline-block;
        }
        .online-section p {
            color: #00ffc8;
            font-size: 16px;
            margin: 10px 0;
        }
        .qr-image {
            width: 200px;
            height: 200px;
            margin-top: 10px;
            border: 2px solid #00ffc8;
            border-radius: 10px;
        }
        .info-box {
            background: #000;
            margin: 10px auto;
            padding: 10px 20px;
            border-radius: 10px;
            width: fit-content;
            box-shadow: 0 0 10px rgba(0,255,255,0.2);
        }
        .highlight {
            color: #00ffc8;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="box">
        <h2>Payment Successful 🎉</h2>

        <div class="info-box">
            <p>Your payment of <span class="highlight">₹<?= htmlspecialchars($total_amount) ?></span> was processed.</p>
            <p>Payment Method: <span class="highlight"><?= htmlspecialchars($payment_method) ?></span></p>
            <p>Order ID: <span class="highlight"><?= htmlspecialchars($order_id) ?></span></p>
        </div>

        <?php if (strtolower($payment_method) === 'online'): ?>
        <div class="online-section">
            <p><strong>Send your payment to:</strong></p>
            <p>📱 <strong>8296924601</strong></p>
            <p>Scan this QR code to pay:</p>
            <img src="images\qr.jpg" alt="Scan to Pay" class="qr-image">
        </div>
        <?php endif; ?>

        <a href="menu.php" class="btn">Order More</a>
    </div>
</body>
</html>
