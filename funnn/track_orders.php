<?php
include('db_connection.php'); // your DB connection
?>

<!DOCTYPE html>
<html>
<head>
    <title>Track Orders</title>
    <style>
        body { font-family: 'Segoe UI'; background: #111; color: #fff; padding: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; background: #222; }
        th, td { padding: 10px; border: 1px solid #444; text-align: left; }
        th { background: #00ffc8; color: #000; }
        h2 { color: #00ffc8; }
    </style>
</head>
<body>
    <h2>Customer Order Tracking</h2>

    <table>
        <tr>
            <th>Order ID</th>
            <th>Customer</th>
            <th>Item</th>
            <th>Quantity</th>
            <th>Total</th>
            <th>Payment Status</th>
            <th>Time</th>
        </tr>
        <?php
        $query = "SELECT o.order_id, c.customer_name, m.name AS item, oi.quantity, p.amount, p.status, o.order_time
                  FROM orders o
                  JOIN customers c ON o.customer_id = c.customer_id
                  JOIN order_items oi ON o.order_id = oi.order_id
                  JOIN menu_items m ON oi.menu_item_id = m.item_id
                  JOIN payments p ON o.order_id = p.order_id
                  ORDER BY o.order_time DESC";

        $result = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                <td>{$row['order_id']}</td>
                <td>{$row['customer_name']}</td>
                <td>{$row['item']}</td>
                <td>{$row['quantity']}</td>
                <td>₹{$row['amount']}</td>
                <td>{$row['status']}</td>
                <td>{$row['order_time']}</td>
              </tr>";
        }
        ?>
    </table>
</body>
</html>
