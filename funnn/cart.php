<?php
session_start();

// Remove item from cart
if (isset($_POST['remove'])) {
    $itemName = $_POST['item_name'];
    foreach ($_SESSION['cart'] as $key => $item) {
        if ($item['item_name'] == $itemName) {
            unset($_SESSION['cart'][$key]);
            $_SESSION['cart'] = array_values($_SESSION['cart']);
            break;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cart - Presidency Cafeteria</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;600;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background: linear-gradient(120deg, #1f4037, #99f2c8);
            color: #fff;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 900px;
            margin: 50px auto;
            padding: 30px;
            background-color: rgba(0,0,0,0.3);
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.2);
        }

        h2 {
            text-align: center;
            font-size: 36px;
            margin-bottom: 30px;
            color: #00ffc3;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: rgba(255,255,255,0.1);
            border-radius: 10px;
            overflow: hidden;
        }

        th, td {
            padding: 15px;
            text-align: center;
            color: #fff;
        }

        th {
            background-color: rgba(0,255,150,0.2);
        }

        tr:nth-child(even) {
            background-color: rgba(255,255,255,0.05);
        }

        .btn {
            padding: 8px 15px;
            background: #00ff99;
            color: black;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
            transition: all 0.3s ease;
        }

        .btn:hover {
            background: #ff007b;
            color: white;
        }

        .total {
            text-align: right;
            margin-top: 20px;
            font-size: 24px;
            color: #fff;
        }

        .actions {
            text-align: center;
            margin-top: 30px;
        }

        .actions a {
            text-decoration: none;
            margin: 0 10px;
            background: #00ffc3;
            padding: 10px 20px;
            border-radius: 30px;
            color: black;
            font-weight: bold;
            transition: all 0.3s ease-in-out;
        }

        .actions a:hover {
            background: #ff007b;
            color: white;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Your Cart</h2>

    <?php if (!empty($_SESSION['cart'])): ?>
        <table>
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Price (₹)</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $total = 0;
                foreach ($_SESSION['cart'] as $item): 
                    $total += $item['item_price'];
                ?>
                <tr>
                    <td><?= $item['item_name']; ?></td>
                    <td>₹<?= $item['item_price']; ?></td>
                    <td>
                        <form method="POST">
                            <input type="hidden" name="item_name" value="<?= $item['item_name']; ?>">
                            <button class="btn" name="remove">Remove</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="total">
            <strong>Total: ₹<?= $total; ?></strong>
        </div>

        <div class="actions">
            <a href="order.php">Proceed to Order</a>
            <a href="payment.php">Proceed to Payment</a>
        </div>

    <?php else: ?>
        <p style="text-align:center; font-size:18px;">Your cart is empty!</p>
    <?php endif; ?>
</div>

</body>
</html>
