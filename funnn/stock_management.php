<?php
session_start();

if (!isset($_SESSION['manager_logged_in']) || $_SESSION['manager_logged_in'] !== true) {
    header("Location: manager_login.php");
    exit();
}

include('db_connection.php');

// Handle stock update
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['id']) && isset($_POST['stock'])) {
        $id = intval($_POST['id']);
        $stock = intval($_POST['stock']);

        $update = $conn->prepare("UPDATE menu_items SET stock = ? WHERE id = ?");
        if ($update) {
            $update->bind_param("ii", $stock, $id);
            if (!$update->execute()) {
                echo "Update failed: " . $conn->error;
            }
            $update->close();
            header("Location: " . $_SERVER['PHP_SELF']);
            exit();
        } else {
            echo "Prepare failed: " . $conn->error;
        }
    }
}

$result = $conn->query("SELECT id, item_name, stock FROM menu_items");

?>

<!DOCTYPE html>
<html>
<head>
    <title>Stock Management</title>
    <style>
        body {
            background: #121212;
            color: white;
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        h2 {
            color: #00ffc8;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: #1e1e1e;
            margin-top: 20px;
        }
        th, td {
            padding: 12px;
            border: 1px solid #444;
            text-align: center;
        }
        th {
            background: #00ffc8;
            color: black;
        }
        input[type=number] {
            width: 70px;
            padding: 5px;
        }
        input[type=submit] {
            background: #00ffc8;
            color: black;
            border: none;
            padding: 6px 12px;
            cursor: pointer;
        }
        .back-button {
            margin-top: 20px;
        }
        .back-button a {
            text-decoration: none;
            padding: 10px 20px;
            background-color: #00ffc8;
            color: black;
            border-radius: 5px;
            font-weight: bold;
        }
        .back-button a:hover {
            background-color: #00ddb8;
        }
    </style>
</head>
<body>
    <h2>Update Stock (Manager Access Only)</h2>
    
    <div class="back-button">
        <a href="index.php">⬅ Back to Home</a>
    </div>

    <table>
        <tr>
            <th>Item</th>
            <th>Current Stock</th>
            <th>Update</th>
        </tr>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= htmlspecialchars($row['item_name']) ?></td>
            <td><?= $row['stock'] ?></td>
            <td>
                <form method="post" action="">
                    <input type="number" name="stock" min="0" value="<?= $row['stock'] ?>" required>
                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                    <input type="submit" value="Update">
                </form>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
