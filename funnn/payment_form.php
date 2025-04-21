<?php
include 'db_connection.php';

// Fetch order ID dynamically (assuming it's stored in session)
$order_id = $_SESSION['order_id'] ?? 0;
$customer_id = $_SESSION['customer_id'] ?? 0;

// Fetch order total amount
$result = $conn->query("SELECT total_price FROM orders WHERE order_id = $order_id");
$order = $result->fetch_assoc();
$total_price = $order['total_price'] ?? 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Payment Page</title>
</head>
<body>
    <h2>Payment Page</h2>
    <form action="payment.php" method="POST">
        <input type="hidden" name="order_id" value="<?php echo $order_id; ?>">
        <input type="hidden" name="customer_id" value="<?php echo $customer_id; ?>">
        
        <label>Amount:</label>
        <input type="text" name="amount" value="<?php echo $total_price; ?>" readonly>

        <label>Payment Method:</label>
        <select name="payment_method" required>
            <option value="Cash">Cash</option>
            <option value="Credit Card">Credit Card</option>
            <option value="Online Payment">Online Payment</option>
        </select>

        <button type="submit">Make Payment</button>
    </form>
</body>
</html>
