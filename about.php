<?php
session_start(); // Start the session
require 'db_connection.php'; // Include database connection
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - AR Farm Bazaar</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Reset */
body, h1, h2, p, ul {
    margin: 0;
    padding: 0;
    font-family: 'Poppins', sans-serif;
}

/* General Styles */
body {
    background-color: #f9f9f9;
    color: #333;
}

.container {
    width: 80%;
    margin: auto;
    padding: 50px 0;
}

.mega-menu{
    margin-top: -80px;
}

/* Hero Section */
.hero {
    background: url('about_back.jpg') center/cover no-repeat;
    height: 500px;
    margin-top: 150px;
    text-align: center;
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
}

.hero h1 {
    font-size: 2.8rem;
}

.hero p {
    font-size: 1.2rem;
    margin: 10px 0;
}

.cta-button {
    background: #2c5f2d;
    color: white;
    padding: 15px 30px;
    font-size: 1.2rem;
    text-decoration: none;
    border-radius: 5px;
    margin-top: 15px;
}

.cta-button:hover {
    background: #256a27;
}

/* Sections */
section {
    background: white;
    margin: 30px 0;
    padding: 10px;
    border-radius: 10px;
}

h2 {
    font-size: 2rem;
    color: #2c5f2d;
}

ul {
    list-style: none;
}

ul li {
    font-size: 1.2rem;
    margin: 10px 0;
}

.fa-check-circle {
    color: green;
    margin-right: 8px;
}

/* Grid Layout */
.container {
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.text {
    flex: 1;
    padding: 20px;
}

.image img {
    width: 400px;
    border-radius: 10px;
}

/* Testimonials */
.testimonial {
    background: #f4f4f4;
    padding: 20px;
    border-left: 5px solid #2c5f2d;
    font-style: italic;
}

    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="script.js" defer></script>
</head>

<body>
    <!-- Navbar -->
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

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1>Welcome to <span>AR FARM</span></h1>
            <p>Connecting Farmers with Consumers for a Fair & Transparent Marketplace</p>
            <a href="signup.php" class="cta-button">Join Us Today</a>
        </div>
    </section>

    <!-- About Section -->
    <section class="about">
        <div class="container">
            <div class="text">
                <h2><i class="fas fa-seedling"></i> Our Journey</h2>
                <p>AR FARM was founded to revolutionize the way farmers sell their produce. By eliminating middlemen, we ensure that both farmers and consumers benefit from fair prices and fresh, high-quality produce.</p>
            </div>
            <div class="image">
                <img src="farm-journey.jpg" alt="Our Journey">
            </div>
        </div>
    </section>

    <!-- Mission Section -->
    <section class="mission">
        <div class="container">
            <div class="image">
                <img src="farmer-happy.jpg" alt="Our Mission">
            </div>
            <div class="text">
                <h2><i class="fas fa-bullseye"></i> Our Purpose</h2>
                <p>We empower farmers by providing them with an online marketplace to sell their products directly to consumers, ensuring they receive fair wages for their hard work.</p>
            </div>
        </div>
    </section>

    <!-- Goals Section -->
    <section class="goals">
        <div class="container">
            <h2><i class="fas fa-handshake"></i> Our Goals</h2>
            <ul>
                <li><i class="fas fa-check-circle"></i> Promote sustainable and local farming.</li>
                <li><i class="fas fa-check-circle"></i> Expand our network of farmers and customers.</li>
                <li><i class="fas fa-check-circle"></i> Provide fair pricing and eliminate middlemen.</li>
            </ul>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials">
        <div class="container">
            <h2><i class="fas fa-comment-alt"></i> Customer Feedback</h2>
            <div class="testimonial">
                <p>"AR FARM has completely changed the way I buy groceries. I love supporting local farmers while getting the freshest produce available!"</p>
                <h4>- Sarah D.</h4>
            </div>
        </div>
    </section>

    <!-- Achievements Section -->
    <section class="achievements">
        <div class="container">
            <h2><i class="fas fa-trophy"></i> Our Achievements</h2>
            <p>Over <b>100+ satisfied customers</b> and a growing network of farmers.</p>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="join-us">
        <div class="container">
            <h2>Be Part of the Change!</h2>
            <p>Join AR FARM today and support a sustainable and fair agricultural marketplace.</p>
            <a href="signup.php" class="cta-button">Get Started</a>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <p>&copy; 2025 AR Farm Bazaar. All rights reserved.</p>
    </footer>

</body>
</html>
