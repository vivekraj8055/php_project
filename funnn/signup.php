<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conn = new mysqli('localhost', 'root', '', 'presidency_cafeteria');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $sql = "INSERT INTO customers (username, password, email, phone) VALUES ('$username', '$password', '$email', '$phone')";

    if ($conn->query($sql) === TRUE) {
        echo "Sign up successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up - Presidency Cafeteria</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;600;800&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: 'Nunito', sans-serif;
            background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
            color: #ffffff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .signup-container {
            background: rgba(255, 255, 255, 0.1);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 255, 150, 0.3);
            max-width: 400px;
            width: 100%;
        }

        .signup-container h2 {
            text-align: center;
            color: #00ffc3;
            font-size: 30px;
            margin-bottom: 20px;
        }

        .signup-container label {
            font-weight: bold;
            margin-top: 15px;
            color: #fff;
        }

        .signup-container input {
            width: 100%;
            padding: 10px;
            margin-top: 8px;
            border: 1px solid #ccc;
            border-radius: 30px;
            font-size: 16px;
            color: #333;
        }

        .signup-container button {
            width: 100%;
            padding: 12px;
            background-color: #00ff99;
            color: white;
            border: none;
            border-radius: 30px;
            font-size: 18px;
            cursor: pointer;
            margin-top: 20px;
            box-shadow: 0 5px 15px rgba(0, 255, 150, 0.3);
            transition: background 0.3s ease, transform 0.3s ease;
        }

        .signup-container button:hover {
            background-color: #ff007b;
            transform: translateY(-3px);
        }

        .signup-container p {
            text-align: center;
            color: #ccc;
            margin-top: 15px;
        }

        .signup-container a {
            color: #00ff99;
            text-decoration: none;
        }
    </style>
</head>
<body>

    <div class="signup-container">
        <h2>Create an Account</h2>
        <form method="POST" action="signup.php">
            <label for="username">Username:</label>
            <input type="text" name="username" required>

            <label for="password">Password:</label>
            <input type="password" name="password" required>

            <label for="email">Email:</label>
            <input type="email" name="email" required>

            <label for="phone">Phone Number:</label>
            <input type="text" name="phone" required>

            <button type="submit">Sign Up</button>
        </form>
        <p>Already have an account? <a href="signin.php">Sign In</a></p>
    </div>

</body>
</html>
