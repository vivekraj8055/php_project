<?php
session_start();

// Initialize cart
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Handle cart actions
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $item_name = $_POST['item_name'];
    $action = $_POST['action'];

    if (isset($_SESSION['cart'][$item_name])) {
        if ($action === 'increase') {
            $_SESSION['cart'][$item_name]['quantity']++;
        } elseif ($action === 'decrease') {
            $_SESSION['cart'][$item_name]['quantity']--;
            if ($_SESSION['cart'][$item_name]['quantity'] <= 0) {
                unset($_SESSION['cart'][$item_name]);
            }
        } elseif ($action === 'remove') {
            unset($_SESSION['cart'][$item_name]);
        }
    }
    header("Location: order.php");
    exit();
}

$cart = $_SESSION['cart'];
$total_amount = 0;
?>
<!DOCTYPE html>
<html>
<head>
    <title>Your Order</title>
    <style>
        body {
            background: #0f0f0f;
            color: #f2f2f2;
            font-family: 'Segoe UI', sans-serif;
            padding: 30px;
        }
        h2 {
            color: #00ffc8;
            margin-bottom: 20px;
        }
        table {
            width: 95%;
            margin: auto;
            border-collapse: collapse;
            background-color: #1c1c1c;
            box-shadow: 0 0 15px rgba(0,255,200,0.3);
            border-radius: 12px;
            overflow: hidden;
        }
        th, td {
            padding: 15px;
            border-bottom: 1px solid #00ffc8;
        }
        th {
            background-color: #00ffc8;
            color: #000;
        }
        td img {
            width: 100px;
            height: 70px;
            object-fit: cover;
            border-radius: 8px;
            box-shadow: 0 0 6px rgba(0,255,200,0.3);
        }
        .btn {
            padding: 6px 10px;
            margin: 2px;
            font-weight: bold;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .increase, .decrease {
            background-color: #00ffc8;
            color: #000;
        }
        .remove {
            background-color: #ff4c4c;
            color: white;
        }
        .actions {
            margin-top: 30px;
            text-align: center;
        }
        .actions a, .actions button, .actions select {
            padding: 12px 25px;
            margin: 10px;
            background: #00ffc8;
            color: #000;
            font-weight: bold;
            text-decoration: none;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            transition: 0.3s;
            font-size: 16px;
        }
        .actions select {
            padding: 10px 20px;
        }
        .actions button:hover, .actions select:hover {
            background: #00cc99;
        }
        .empty-cart {
            color: #ff6666;
            margin-top: 50px;
            font-size: 20px;
        }
    </style>
</head>
<body>

<h2>Your Cart</h2>

<?php if (!empty($cart)): ?>
<table>
    <tr>
        <th>Image</th>
        <th>Item</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Subtotal</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($cart as $name => $item): 
        $qty = $item['quantity'];
        $price = $item['price'];
        $subtotal = $qty * $price;
        $total_amount += $subtotal;

        $image_path = isset($item['image']) && file_exists($item['image']) 
            ? $item['image'] 
            : 'https://via.placeholder.com/90x70';
    ?>
    <tr>
        <td><img src="<?= htmlspecialchars($image_path) ?>" alt="<?= htmlspecialchars($name) ?>"></td>
        <td><?= htmlspecialchars($name) ?></td>
        <td>
            <form method="post" style="display:inline;">
                <input type="hidden" name="item_name" value="<?= htmlspecialchars($name) ?>">
                <input type="hidden" name="action" value="decrease">
                <button class="btn decrease">−</button>
            </form>
            <?= $qty ?>
            <form method="post" style="display:inline;">
                <input type="hidden" name="item_name" value="<?= htmlspecialchars($name) ?>">
                <input type="hidden" name="action" value="increase">
                <button class="btn increase">+</button>
            </form>
        </td>
        <td>₹<?= $price ?></td>
        <td>₹<?= $subtotal ?></td>
        <td>
            <form method="post">
                <input type="hidden" name="item_name" value="<?= htmlspecialchars($name) ?>">
                <input type="hidden" name="action" value="remove">
                <button class="btn remove">Remove</button>
            </form>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<h3 style="color: #00ffc8; text-align:center;">Total: ₹<?= $total_amount ?></h3>

<div class="actions">
    <a href="menu.php">← Back to Menu</a>
    
    <form action="payment.php" method="post" style="display:inline;">
        <select name="payment_method" required>
            <option value="" disabled selected>Select Payment Method</option>
            <option value="Cash">Cash</option>
            <option value="Delivery">Delivery</option>
            <option value="Online">Online</option>
        </select>
        <input type="hidden" name="total_amount" value="<?= $total_amount ?>">
        <button type="submit">Proceed to Payment</button>
    </form>
</div>

<?php else: ?>
<p class="empty-cart">Your cart is empty. <a href="menu.php" style="color:#00ffc8;">Browse Menu</a></p>
<?php endif; ?>

</body>
</html>
