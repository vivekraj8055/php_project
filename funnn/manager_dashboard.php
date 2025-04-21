<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Manager Dashboard - Presidency Cafeteria</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #121212;
            color: #fff;
            margin: 0;
            padding: 0;
        }
        header {
            background: #00ffc8;
            color: #000;
            padding: 20px;
            text-align: center;
        }
        nav {
            display: flex;
            justify-content: center;
            background: #1c1c1c;
            padding: 15px;
            gap: 20px;
        }
        nav a {
            color: #00ffc8;
            text-decoration: none;
            font-weight: bold;
            background: #000;
            padding: 10px 20px;
            border-radius: 8px;
            transition: 0.3s;
        }
        nav a:hover {
            background: #00ffc8;
            color: #000;
        }
        .container {
            padding: 40px;
            text-align: center;
        }
        .card {
            display: inline-block;
            background: #1e1e1e;
            padding: 30px;
            margin: 20px;
            border-radius: 12px;
            box-shadow: 0 0 12px rgba(0,255,200,0.3);
            width: 250px;
        }
        .card a {
            display: inline-block;
            margin-top: 15px;
            padding: 10px 15px;
            background: #00ffc8;
            color: #000;
            font-weight: bold;
            border-radius: 6px;
            text-decoration: none;
        }
        .card a:hover {
            background: #00cc99;
        }
    </style>
</head>
<body>

<header>
    <h1>Manager Dashboard</h1>
</header>

<nav>
    <a href="manager_dashboard.php">Dashboard</a>
    <a href="track_orders.php">Track Orders</a>
    <a href="manage_stock.php">Manage Stock</a>
    <a href="logout.php">Logout</a>
</nav>

<div class="container">
    <div class="card">
        <h3>Track Customer Orders</h3>
        <a href="track_orders.php">View Orders</a>
    </div>
    <div class="card">
        <h3>Manage Stock</h3>
        <a href="manage_stock.php">Update Stock</a>
    </div>
</div>

</body>
</html>
