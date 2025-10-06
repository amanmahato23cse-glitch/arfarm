<?php
session_start();
require 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Check if user is a farmer
    $stmt = $conn->prepare("SELECT farmer_id AS id, name, email, phone, password, 'farmer' AS role FROM farmers WHERE email = ? OR phone = ?");
    $stmt->bind_param("ss", $username, $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $farmer = $result->fetch_assoc();

    // Check if user is a normal user
    if (!$farmer) {
        $stmt = $conn->prepare("SELECT user_id AS id, name, email, phone, password, 'user' AS role FROM users WHERE email = ? OR phone = ?");
        $stmt->bind_param("ss", $username, $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
    }

    $stmt->close();
    $conn->close();

    $account = $farmer ?? $user ?? null;

    if (!$account) {
        echo "<script>alert('User not found!'); window.history.back();</script>";
        exit();
    } elseif ($password !== $account['password']) { // Direct password check
        echo "<script>alert('Incorrect password!'); window.history.back();</script>";
        exit();
    } else {
        $_SESSION['user_id'] = $account['id'];
        $_SESSION['name'] = $account['name'];
        $_SESSION['role'] = $account['role'];

        $redirectPage = ($account['role'] === 'farmer') ? 'dashboard.php' : 'index.php';

        echo "<script>
                alert('Login successful! Redirecting...');
                window.location.href = '$redirectPage';
              </script>";
        exit();
    }
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AR FARM Login</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
</head>
<body class="bg-green-500 flex items-center justify-center min-h-screen font-roboto">

<header>
    <nav class="navbar">
    <div class="logo">AR Farm <span>Bazaar</span></div>
        <ul class="nav-links">
            <li><a href="index.php">Home</a></li>
            <li><a href="features.php">Features</a></li>
            <li><a href="about.php">About Us</a></li>
            <li><a href="contact.php">Contact</a></li>
        </ul>
        <div class="auth-buttons">
            <a href="login.php" class="login-btn">Login</a>
            <a href="signup.php" class="signup-btn">Sign Up</a>
        </div>
        <div class="menu-toggle" onclick="toggleMenu()">☰</div>
    </nav>
</header>

<div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
    <h2 class="text-2xl font-bold mb-6 text-center">AR FARM Login</h2>
    <form action="" method="POST">
        <div class="mb-4">
            <label for="username" class="block text-gray-700 font-bold mb-2">Email or Phone *</label>
            <input type="text" id="username" name="username" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter your email or phone">
        </div>
        <div class="mb-6">
            <label for="password" class="block text-gray-700 font-bold mb-2">Password *</label>
            <input type="password" id="password" name="password" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter your password">
        </div>
        <div class="flex items-center justify-between">
            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Login
            </button>
            <a href="#" class="inline-block align-baseline font-bold text-sm text-green-500 hover:text-green-800">
                Forgot Password?
            </a>
        </div>
    </form>
</div>

</body>
</html>
