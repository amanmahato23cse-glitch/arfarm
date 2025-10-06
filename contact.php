<?php
session_start(); // Start the session
require 'db_connection.php'; // Include database connection
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - AR FARM</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="script.js" defer></script>

</head>
<body class="bg-gray-100">
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

    <section class="max-w-7xl mx-auto px-6 py-12">
        <div class="text-center">
            <h2 class="text-4xl font-bold text-gray-800">Get in Touch</h2>
            <p class="text-gray-600 mt-2">We are here to assist you with any queries or concerns.</p>
        </div>

        <div class="grid md:grid-cols-2 gap-10 mt-10">
            <!-- Contact Info -->
            <div class="bg-white p-8 rounded-lg shadow-lg">
                <h3 class="text-xl font-semibold text-gray-800">Contact Information</h3>
                <p class="text-gray-600 mt-2">Feel free to reach out via any of the methods below.</p>

                <div class="mt-4 space-y-4">
                    <div class="flex items-center space-x-4">
                        <span class="text-green-600 text-xl">📍</span>
                        <p class="text-gray-700">123 Greenway Road, Nashville, TN</p>
                    </div>
                    <div class="flex items-center space-x-4">
                        <span class="text-green-600 text-xl">📧</span>
                        <p class="text-gray-700">info@arfarm.com</p>
                    </div>
                    <div class="flex items-center space-x-4">
                        <span class="text-green-600 text-xl">📞</span>
                        <p class="text-gray-700">555-555-5555</p>
                    </div>
                    <div class="flex items-center space-x-4">
                        <span class="text-green-600 text-xl">🔗</span>
                        <p>
                            <a href="https://www.instagram.com/ar_farm2025?igsh=MWF4d2MwMGEwa3A4aw==" target="_blank" class="text-green-600 hover:underline">Instagram</a> |
                            <a href="https://www.instagram.com/ar_farm2025?igsh=MWF4d2MwMGEwa3A4aw==" target="_blank" class="text-green-600 hover:underline">Facebook</a>
                        </p>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="bg-white p-8 rounded-lg shadow-lg">
                <h3 class="text-xl font-semibold text-gray-800">Send Your Message</h3>
                <form class="mt-6 space-y-4">
                    <input type="text" placeholder="Full Name*" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                    <input type="email" placeholder="Email Address*" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                    <textarea placeholder="Write Message..." class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"></textarea>
                    <button type="submit" class="w-full bg-green-600 text-white py-3 rounded-lg hover:bg-green-700 transition">Send Message</button>
                </form>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <p>&copy; 2025 AR Farm Bazaar. All rights reserved.</p>
    </footer>
</body>
</html>
