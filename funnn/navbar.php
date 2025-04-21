<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navigation Bar</title>
    <style>
        /* Reset default styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: #111;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .navbar {
            background: linear-gradient(90deg, #000428, #004e92);
            padding: 15px 0;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            box-shadow: 0 4px 12px rgba(0, 255, 255, 0.2);
        }

        .nav-links {
            display: flex;
            justify-content: center;
            list-style: none;
        }

        .nav-links li {
            margin: 0 25px;
            position: relative;
        }

        .nav-links a {
            text-decoration: none;
            color: #00ffe1;
            font-size: 18px;
            font-weight: 600;
            text-transform: uppercase;
            padding: 8px 12px;
            transition: color 0.3s ease, transform 0.3s ease;
            position: relative;
        }

        .nav-links a::after {
            content: '';
            display: block;
            height: 3px;
            background: #ff007b;
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0%;
            transition: width 0.3s ease-in-out;
            border-radius: 10px;
        }

        .nav-links a:hover {
            color: #ff007b;
            transform: scale(1.1);
        }

        .nav-links a:hover::after {
            width: 100%;
        }

        @media (max-width: 768px) {
            .nav-links {
                flex-direction: column;
                align-items: center;
            }

            .nav-links li {
                margin: 10px 0;
            }
        }
    </style>
</head>
<body>

    <!-- Navigation Bar -->
    <nav class="navbar">
        <ul class="nav-links">
            <li><a href="index.php">Home</a></li>
            <li><a href="menu.php">Menu</a></li>
            <li><a href="order.php">Order Now</a></li>
            <li><a href="about.php">About Us</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="login.php">Login</a></li>
        </ul>
    </nav>

</body>
</html>
