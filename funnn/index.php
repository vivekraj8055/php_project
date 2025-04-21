<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Presidency Cafeteria - Home</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;600;800&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: 'Nunito', sans-serif;
            background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
            color: #ffffff;
        }

        .header {
            text-align: center;
            padding: 60px 20px 30px;
            position: relative;
        }

        .header h1 {
            font-size: 48px;
            color: #00ffcc;
            margin-bottom: 10px;
        }

        .header p {
            font-size: 20px;
            color: #ccc;
        }

        .nav {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 25px;
            margin-top: 40px;
        }

        .nav a {
            text-decoration: none;
            color: #fff;
            background: #00ff99;
            padding: 12px 25px;
            border-radius: 30px;
            font-weight: bold;
            box-shadow: 0 5px 15px rgba(0, 255, 150, 0.3);
            transition: background 0.3s ease, transform 0.3s ease;
        }

        .nav a:hover {
            background: #ff007b;
            transform: translateY(-3px);
        }

        .features {
            margin: 60px auto;
            max-width: 1000px;
            padding: 0 20px;
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
            justify-content: center;
        }

        .card {
            background: rgba(255, 255, 255, 0.05);
            padding: 30px;
            border-radius: 15px;
            flex: 1 1 250px;
            text-align: center;
            box-shadow: 0 0 15px rgba(0, 255, 200, 0.1);
        }

        .card h3 {
            font-size: 22px;
            color: #00ffc3;
            margin-bottom: 10px;
        }

        .card p {
            font-size: 16px;
            color: #ccc;
        }

        footer {
            text-align: center;
            padding: 20px;
            color: #aaa;
            font-size: 14px;
            border-top: 1px solid #00ff99;
            margin-top: 60px;
        }

        /* Added Sign In & Sign Up buttons */
        .auth-buttons {
            position: absolute;
            top: 30px;
            right: 30px;
        }

        .auth-buttons a {
            text-decoration: none;
            color: #fff;
            background: #00ff99;
            padding: 10px 20px;
            border-radius: 30px;
            font-weight: bold;
            margin-left: 10px;
            box-shadow: 0 5px 15px rgba(0, 255, 150, 0.3);
            transition: background 0.3s ease, transform 0.3s ease;
        }

        .auth-buttons a:hover {
            background: #ff007b;
            transform: translateY(-3px);
        }

    </style>
</head>
<body>

    <div class="header">
        <h1>Presidency Cafeteria</h1>
        <p>Delicious food at your fingertips – Order now!</p>
        
        <!-- Sign In & Sign Up Buttons -->
        <div class="auth-buttons">
            <a href="signin.php">Sign In</a>
            <a href="signup.php">Sign Up</a>
        </div>

        <div class="nav">
            <a href="customer_details.php">Order Now</a>
            <a href="menu.php">Menu</a>
            <a href="payment.php">Make Payment</a>
            <a href="admin_login.php">Admin Login</a>
            <a href="manager_dashboard.php">Manager Dashboard</a>
        </div>
    </div>

    <div class="features">
        <div class="card">
            <h3>Fast Ordering</h3>
            <p>Quick and seamless order process for all your favorite dishes.</p>
        </div>
        <div class="card">
            <h3>Digital Menu</h3>
            <p>View food images, prices, and ingredients before placing your order.</p>
        </div>
        <div class="card">
            <h3>Online & Offline Payment</h3>
            <p>Pay easily using your preferred payment method.</p>
        </div>
        <div class="card">
            <h3>Admin & Manager Dashboard</h3>
            <p>Track orders, sales, stock, and manage your menu easily.</p>
        </div>
    </div>

    <footer>
        &copy; <?php echo date("Y"); ?> Presidency Cafeteria. All rights reserved.
    </footer>

</body>
</html>
