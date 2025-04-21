<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "presidency_cafeteria";

$conn = new mysqli($host, $user, $password, $db);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

$sql = "SELECT o.id, o.customer_name, o.order_date, mi.item_name, oi.quantity, oi.price 
        FROM orders o
        JOIN order_items oi ON o.id = oi.order_id
        JOIN menu_items mi ON oi.menu_item_id = mi.id
        ORDER BY o.order_date DESC";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Track Orders</title>
    <style>
        body { background: #121212; color: white; font-family: Arial; padding: 20px; }
        table { width: 100%; border-collapse: collapse; background: #1e1e1e; }
        th, td { padding: 12px; border: 1px solid #444; text-align: center; }
        th { background: #00ffc8; color: black; }
    </style>
</head>
<body>
    <h2>Customer Orders</h2>
    <table>
        <tr>
            <th>Order ID</th><th>Customer</th><th>Date</th><th>Item</th><th>Qty</th><th>Price</th>
        </tr>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= htmlspecialchars($row['customer_name']) ?></td>
            <td><?= $row['order_date'] ?></td>
            <td><?= $row['item_name'] ?></td>
            <td><?= $row['quantity'] ?></td>
            <td>₹<?= $row['price'] ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
