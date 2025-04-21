<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login - Presidency Cafeteria</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to right, #0f2027, #203a43, #2c5364);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            color: white;
        }

        .login-box {
            background: rgba(0, 0, 36, 0.95);
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 255, 150, 0.5);
            width: 400px;
            animation: fadeIn 1s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: scale(0.95); }
            to { opacity: 1; transform: scale(1); }
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #00ffcc;
        }

        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: none;
            border-radius: 8px;
            background: rgba(255, 255, 255, 0.1);
            color: white;
            font-size: 16px;
        }

        .btn {
            width: 100%;
            padding: 12px;
            font-size: 18px;
            font-weight: bold;
            background: linear-gradient(90deg, #00ff99, #0066ff);
            border: none;
            border-radius: 8px;
            color: white;
            cursor: pointer;
            transition: 0.3s ease;
        }

        .btn:hover {
            background: linear-gradient(90deg, #ff007b, #0066ff);
            box-shadow: 0 0 15px rgba(255, 0, 123, 0.6);
        }

        .error {
            color: #ff4d4d;
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>
<div class="login-box">
    <h2>Admin Login</h2>
    <form action="admin_login_process.php" method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" class="btn">Login</button>
    </form>
</div>
</body>
</html>
