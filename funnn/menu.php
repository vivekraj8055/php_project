<?php
session_start();
include('db_connection.php');

// Sample menu (replace with DB query in production)
$menu_items = [
    "Appetizers" => [
        ["name" => "Spring Rolls", "price" => 100, "image" => "images/baked-spring-rolls-sq.jpg"],
        ["name" => "Paneer Tikka", "price" => 150, "image" => "images/OIP (1).jpg"]
    ],
    "Main Course" => [
        ["name" => "Butter Chicken with Naan", "price" => 220, "image" => "images/Indian-butter-chicken-1-801x1200.jpg"]
    ],
    "Desserts" => [
        ["name" => "Gulab Jamun", "price" => 100, "image" => "images/OIP.jpg"]
    ],
    "Beverages" => [
        ["name" => "Mojitos", "price" => 100, "image" => "images/mojito-recipe2.webp"]
    ]
];

// Handle Add to Cart without redirection
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_to_cart'])) {
    $item_name = $_POST['item_name'];
    $item_price = $_POST['item_price'];
    $item_image = $_POST['item_image'];

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    if (isset($_SESSION['cart'][$item_name])) {
        $_SESSION['cart'][$item_name]['quantity']++;
    } else {
        $_SESSION['cart'][$item_name] = [
            'price' => $item_price,
            'quantity' => 1,
            'image' => $item_image
        ];
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Digital Menu - Presidency Cafeteria</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            background: #111;
            color: #fff;
            font-family: 'Poppins', sans-serif;
            padding: 20px;
        }

        h2 {
            text-align: center;
            color: #00ffcc;
            margin-bottom: 30px;
        }

        .menu-section {
            margin: 40px 0;
            padding: 20px;
            border-radius: 15px;
            background: rgba(255, 255, 255, 0.03);
            box-shadow: 0 0 15px rgba(0, 255, 150, 0.2);
        }

        .menu-section h3 {
            font-size: 26px;
            margin-bottom: 15px;
            border-bottom: 1px solid #00ff99;
            padding-bottom: 5px;
        }

        .menu-items {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }

        .menu-form {
            flex: 1 1 40%;
        }

        .menu-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 15px;
            background: #222;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 255, 150, 0.2);
            transition: transform 0.3s ease;
        }

        .menu-item:hover {
            transform: scale(1.03);
        }

        .menu-item img {
            width: 200px;
            height: 150px;
            border-radius: 10px;
            margin-bottom: 10px;
            object-fit: cover;
            box-shadow: 0 2px 10px rgba(0,255,150,0.3);
        }

        .menu-item span {
            font-weight: bold;
            margin-bottom: 8px;
            color: #00ffcc;
            font-size: 16px;
        }

        .btn {
            padding: 8px 15px;
            background: linear-gradient(90deg, #00ff99, #002244);
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            box-shadow: 0 4px 12px rgba(0, 255, 150, 0.5);
            transition: 0.3s ease;
            text-decoration: none;
        }

        .btn:hover {
            background: linear-gradient(90deg, #ff007b, #002244);
            transform: scale(1.05);
        }

        .cart {
            position: fixed;
            top: 20px;
            right: 20px;
            background: #222;
            padding: 10px 20px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            box-shadow: 0 0 12px #00ffcc;
            cursor: pointer;
            z-index: 999;
        }

        .cart-icon {
            width: 32px;
            height: 32px;
            margin-right: 10px;
        }

        .cart span {
            color: #00ffcc;
            font-weight: bold;
            font-size: 18px;
        }

        .back-btn {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<!-- Cart Icon with Total -->
<div class="cart" onclick="window.location.href='order.php'">
    <img src="images/cart.PNG" class="cart-icon" alt="Cart">
    <span>
        ₹<?= array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $_SESSION['cart'] ?? [])); ?>
    </span>
</div>

<h2>Digital Menu</h2>

<!-- Back to Home Button -->
<div class="back-btn">
    <a href="index.php" class="btn">← Back to Home</a>
</div>

<?php foreach ($menu_items as $category => $items): ?>
    <div class="menu-section">
        <h3><?= htmlspecialchars($category) ?></h3>
        <div class="menu-items">
            <?php foreach ($items as $item): ?>
                <form method="POST" class="menu-form">
                    <div class="menu-item">
                        <img src="<?= htmlspecialchars($item['image']) ?>" alt="<?= htmlspecialchars($item['name']) ?>">
                        <span><?= htmlspecialchars($item['name']) ?> - ₹<?= $item['price'] ?></span>
                        <input type="hidden" name="item_name" value="<?= htmlspecialchars($item['name']) ?>">
                        <input type="hidden" name="item_price" value="<?= htmlspecialchars($item['price']) ?>">
                        <input type="hidden" name="item_image" value="<?= htmlspecialchars($item['image']) ?>">
                        <button type="submit" name="add_to_cart" class="btn">Add to Cart</button>
                    </div>
                </form>
            <?php endforeach; ?>
        </div>
    </div>
<?php endforeach; ?>

</body>
</html>
