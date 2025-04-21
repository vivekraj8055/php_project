<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Presidency Cafeteria</title>
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

        .container {
            position: relative;
            z-index: 1;
            max-width: 600px;
            margin: 100px auto;
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
            font-size: 32px;
            text-transform: uppercase;
            color: #00ffcc;
            animation: glow 1.5s infinite alternate;
        }

        @keyframes glow {
            from { text-shadow: 0 0 10px #00ffcc; }
            to { text-shadow: 0 0 20px #00ffcc; }
        }

        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        label {
            font-size: 18px;
            font-weight: bold;
        }

        input, textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            background: rgba(255, 255, 255, 0.9);
            color: #333;
        }

        .btn {
            display: inline-block;
            padding: 12px 30px;
            font-size: 18px;
            font-weight: bold;
            text-transform: uppercase;
            text-decoration: none;
            background: linear-gradient(90deg, #00ff99, #0066ff);
            color: white;
            border-radius: 10px;
            transition: all 0.3s ease-in-out;
            box-shadow: 0 4px 10px rgba(0, 255, 150, 0.5);
            cursor: pointer;
            border: none;
        }

        .btn:hover {
            background: linear-gradient(90deg, #ff007b, #0066ff);
            box-shadow: 0 0 20px rgba(255, 0, 123, 0.8);
            transform: scale(1.1);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Contact Us</h1>
        <form action="contact_process.php" method="POST">
            <div class="form-group">
                <label for="name">Your Name</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Your Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="message">Your Message</label>
                <textarea id="message" name="message" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn">Send Message</button>
        </form>
    </div>
</body>
</html>
