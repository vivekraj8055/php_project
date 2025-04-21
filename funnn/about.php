<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Presidency Cafeteria</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background: url('bg/cafeteria.JPG') no-repeat center center fixed;
            background-size: cover;
            text-align: center;
            color: white;
        }

        body::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 36, 0.7);
            z-index: 0;
        }

        .navbar {
            background: rgba(0, 0, 50, 0.9);
            padding: 15px 0;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            box-shadow: 0 4px 10px rgba(0, 255, 150, 0.5);
        }

        .nav-links {
            display: flex;
            justify-content: center;
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .nav-links li {
            margin: 0 20px;
        }

        .nav-links a {
            text-decoration: none;
            color: #00ffcc;
            font-size: 18px;
            font-weight: bold;
            text-transform: uppercase;
            transition: 0.3s ease;
        }

        .nav-links a:hover {
            color: #ff007b;
            text-shadow: 0 0 10px rgba(255, 0, 123, 0.8);
        }

        .container {
            position: relative;
            z-index: 1;
            max-width: 700px;
            margin: 100px auto 40px;
            padding: 40px;
            background: rgba(0, 0, 50, 0.85);
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 255, 150, 0.7);
            animation: fadeIn 1.5s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        h1 {
            font-size: 36px;
            text-transform: uppercase;
            letter-spacing: 3px;
            margin-bottom: 20px;
            color: #00ffcc;
            animation: glow 1.5s infinite alternate;
        }

        @keyframes glow {
            from { text-shadow: 0 0 10px #00ffcc; }
            to { text-shadow: 0 0 20px #00ffcc; }
        }

        p {
            font-size: 20px;
            margin-bottom: 20px;
            line-height: 1.8;
            color: #ddd;
        }

        .btn {
            display: inline-block;
            padding: 15px 35px;
            font-size: 20px;
            font-weight: bold;
            text-transform: uppercase;
            text-decoration: none;
            background: linear-gradient(90deg, #00ff99, #0066ff);
            color: white;
            border-radius: 10px;
            transition: all 0.3s ease-in-out;
            box-shadow: 0 4px 10px rgba(0, 255, 150, 0.5);
        }

        .btn:hover {
            background: linear-gradient(90deg, #ff007b, #0066ff);
            box-shadow: 0 0 25px rgba(255, 0, 123, 0.8);
            transform: scale(1.1);
        }
    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar">
        <ul class="nav-links">
            <li><a href="index.html">Home</a></li>
            <li><a href="menu.php">Menu</a></li>
            <li><a href="order.php">Order Now</a></li>
            <li><a href="about.php">About Us</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="login.php">Login</a></li>
        </ul>
    </nav>

    <div class="container">
        <h1>About Presidency Cafeteria</h1>
        <p>Welcome to <strong>Presidency Cafeteria</strong>, your go-to spot for delicious and freshly prepared meals. 
           We are committed to providing high-quality food made with the freshest ingredients.</p>
        
        <p>Our mission is to bring people together over great food, creating a welcoming and comfortable environment. 
           Whether you're a student, a faculty member, or just visiting, we strive to serve meals that not only satisfy 
           your taste buds but also bring a sense of warmth and joy.</p>
        
        <p>At Presidency Cafeteria, we believe in <strong>quality, hygiene, and excellent service</strong>. 
           Our chefs prepare each dish with love, ensuring you get the best dining experience every time you visit.</p>

        <p>Come and experience the taste of tradition with a modern twist!</p>

        <a href="menu.php" class="btn">Explore Our Menu</a>
    </div>
</body>
</html>
