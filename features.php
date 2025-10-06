<?php
session_start(); // Start the session
require 'db_connection.php'; // Include database connection
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Features - AR Farm Bazaar</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="script.js" defer></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }

        .container {
    max-width: 1200px;
    margin: 135px auto 0px auto;
    padding: 20px;
    display: flex;
    gap: 50px;
    flex-wrap: wrap;
    align-content: flex-start;
    justify-content: space-evenly;
}

        .mega-menu {
            margin-top: -65px;
        }

        .feature {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            display: flex;
            gap: 10px;
            width: 400px;
            flex-wrap: wrap;
            flex-direction: column;
            justify-content: flex-start;
        }

        .feature h2 {
            color: #008000;
        }

        .feature p {
            color: #555;
        }

        .feature i {
            font-size: 24px;
            margin-right: 10px;
            color: #008000;
        }
    </style>
</head>

<body>
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
            <?php if(isset($_SESSION['user_id'])): ?>
                <a href="logout.php" class="logout-btn">Logout</a>
            <?php else: ?>
                <a href="login.php" class="login-btn">Login</a>
                <a href="signup.php" class="signup-btn">Sign Up</a>
            <?php endif; ?>
        </div>
    </nav>
        <nav class="mega-menu">
            <ul class="mgmn" id="category-list">

            </ul>
        </nav>
    </header>

    <div class="container">
        <div class="feature">
            <h2><i class="fas fa-store"></i> Online Marketplaces</h2>
            <p>Digital platforms like eNAM and AgriBazaar allow farmers to list and sell their produce directly to
                buyers.</p>
        </div>
        <div class="feature">
            <h2><i class="fas fa-mobile-alt"></i> Direct-to-Consumer Sales</h2>
            <p>Farmers can bypass wholesalers and sell directly to consumers via mobile apps and websites, ensuring
                fresh farm produce at competitive prices.</p>
        </div>
        <div class="feature">
            <h2><i class="fas fa-chart-line"></i> Price Transparency</h2>
            <p>Real-time market price updates help farmers decide the best time and place to sell.</p>
        </div>
        <div class="feature">
            <h2><i class="fas fa-boxes"></i> Bulk Selling Options</h2>
            <p>Farmers can sell in large quantities, making it easier to connect with wholesalers and food processing
                industries.</p>
        </div>
        <div class="feature">
            <h2><i class="fas fa-seedling"></i> Crop-Specific Selling Options</h2>
            <p>Farmers can list crops with category-specific features for better visibility and targeted selling.</p>
        </div>
        <div class="feature">
            <h2><i class="fas fa-users"></i> Group Selling Feature</h2>
            <p>Farmers can form groups or cooperatives to sell together, increasing bargaining power and reducing
                logistics costs.</p>
        </div>
        <div class="feature">
            <h2><i class="fas fa-shield-alt"></i> Buyer Verification</h2>
            <p>Platforms verify buyers through KYC processes to prevent fraud and ensure secure transactions.</p>
        </div>
    </div>

    <footer>
        <p>&copy; 2025 AR Farm Bazaar. All rights reserved.</p>
    </footer>
</body>

</html>