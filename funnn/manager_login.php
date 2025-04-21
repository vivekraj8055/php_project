<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Assuming login credentials are hardcoded or retrieved from DB
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Simple check (this should be more secure in production)
    if ($username == 'admin' && $password == 'password') {
        $_SESSION['manager_logged_in'] = true;
        header('Location: stock_management.php');
        exit();
    } else {
        echo "<p style='color: red; text-align: center;'>Invalid login credentials.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manager Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            background: #111;
            color: #fff;
            font-family: 'Poppins', sans-serif;
            padding: 50px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-container {
            background: rgba(255, 255, 255, 0.1);
            padding: 40px 30px;
            border-radius: 12px;
            box-shadow: 0 10px 20px rgba(0, 255, 150, 0.2);
            width: 400px;
            text-align: center;
        }

        h2 {
            color: #00ffc8;
            margin-bottom: 30px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-size: 16px;
            color: #00ffc8;
        }

        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            background: #222;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            box-sizing: border-box;
            transition: 0.3s ease;
        }

        input[type="text"]:focus, input[type="password"]:focus {
            background-color: #333;
            border-color: #00ffc8;
        }

        input[type="submit"] {
            width: 100%;
            padding: 12px;
            background: linear-gradient(90deg, #00ffc8, #002244);
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 18px;
            box-shadow: 0 4px 10px rgba(0, 255, 150, 0.3);
            transition: background 0.3s ease;
        }

        input[type="submit"]:hover {
            background: linear-gradient(90deg, #00cc99, #002244);
        }

        .back-btn {
            margin-top: 20px;
            display: inline-block;
            background-color: #00ffc8;
            color: black;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 6px;
            font-weight: bold;
        }

        .back-btn:hover {
            background-color: #00ddb8;
        }

        .error {
            color: red;
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <div class="login-container">
        <h2>Manager Login</h2>
        <form method="POST" action="">
            <label for="username">Username:</label>
            <input type="text" name="username" required><br><br>

            <label for="password">Password:</label>
            <input type="password" name="password" required><br><br>

            <input type="submit" value="Login">
        </form>

        <div class="back-btn">
            <a href="index.php">← Back to Home</a>
        </div>
    </div>

</body>
</html>
