<?php
session_start(); // Start the session
require 'db_connection.php'; // Include database connection
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AR Farm Bazaar</title>
    <link rel="stylesheet" href="styles.css">
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="script.js" defer></script>
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

            <!-- Show "Dashboard" only for farmers -->
            <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'farmer'): ?>
                <li><a href="dashboard.php">Dashboard</a></li>
            <?php endif; ?>
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


    <!-- <section id="home" class="hero">
        
    </section> -->

    <section class="hero">
    <div class="hero-content">
    <h2 class="fade-up">Connecting Farmers Directly to Buyers</h2>
        <p class="fade-up delay-1">Eliminating middlemen and ensuring fair prices for agricultural produce.</p>
        <button class="btn fade-up delay-2" onclick="location.href='signup.php'">Get Started</button>
    </div>
    <div class="hero-image">
        <img src="farmer2.png" alt="Farmer" class="slide-in-right" style="width: 400px; margin: -35px;">
    </div>
</section>


    <section class="organic-section">
        <div class="organic-container">
            <div class="organic-content">
                <p class="sub-title"><i class="fas fa-leaf"></i> ABOUT AR FARM Bazaar</p>
                <h2>Organic & Healthy Food</h2>
                <p class="description">
                    We are a vertically integrated agro-industrial company that runs a socially responsible business and
                    produces food products with a focus on global markets.
                </p>

                <div class="organic-features">
                    <div class="feature">
                        <i class="fas fa-wheat-awn"></i>
                        <div>
                            <h4>Agriculture & Foods</h4>
                            <p>Pellentesque porttitor enim et ipsum</p>
                        </div>
                    </div>
                    <div class="feature">
                        <i class="fas fa-carrot"></i>
                        <div>
                            <h4>Vegetables & Fruits</h4>
                            <p>Pellentesque porttitor enim et ipsum</p>
                        </div>
                    </div>
                </div>

                <p class="small-text">
                    Converting non-utilized lands into productive lands. Providing agricultural livelihood for farmers
                    and employing youth. Empowering the nation towards green and sustainable agriculture.
                </p>

                <div class="founder-section">
                    <p class="signature">Aman Mahato <br> <span>Co, Founder</span></p>
                    <a href="about.php" class="explore-btn">Explore More <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
            <div class="organic-image">
                <div class="leaf-overlay">
                    <img src="h1-banner1.png" alt="Farming Field">
                </div>
            </div>
        </div>
    </section>

    

    <section class="agriculture-process">
        <div class="content">
            <!-- Left Image Section -->
            <div class="image-container">
                <img src="h1-banner2.jpg" alt="Farmer Image">
            </div>
    
            <!-- Right Text Section -->
            <div class="text-container">
                <p class="sub-heading"><i class="fas fa-seedling"></i> WORK PROCESS</p>
                <h2>The Agriculture Process</h2>
                <p class="description">
                    We take part in many key international agricultural exhibitions, which gives us the opportunity to find new partners, 
                    learn new trends in the development of the agricultural sector, share experiences, present our products, and the latest innovations.
                </p>
    
                <!-- Experience Box -->
                <div class="experience-box">
                    <div class="experience-icon">
                        <i class="fas fa-tractor"></i>
                    </div>
                    <h3>250+</h3>
                    <p>Years of experience</p>
                </div>
    
                <!-- Steps Process -->
                <div class="steps">
                    <div class="step-box">
                        <span class="step-number">01</span>
                        <div class="step-icon"><i class="fas fa-calendar-check"></i></div>
                        <h3>Schedule Your Experience</h3>
                        <p>When you work with us, you’ll see that absolute conditions is our priority.</p>
                    </div>
    
                    <div class="step-box">
                        <span class="step-number">02</span>
                        <div class="step-icon"><i class="fas fa-user-tie"></i></div>
                        <h3>Meet Our Expert People</h3>
                        <p>When you work with us, you’ll see that absolute conditions is our priority.</p>
                    </div>
    
                    <div class="step-box">
                        <span class="step-number">03</span>
                        <div class="step-icon"><i class="fas fa-box"></i></div>
                        <h3>Now Get A Best Products</h3>
                        <p>When you work with us, you’ll see that absolute conditions is our priority.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="why-choose-us">
        <div class="content">
            <div class="text-content">
                <p class="sub-heading"><i class="fas fa-leaf"></i> WHY CHOOSE US</p>
                <h2 class="weare">We Are Different From Other Farming</h2>
                <p class="description">We have 15 years of agriculture & eco farming experience globally, working with professionals.</p>
    
                <div class="features">
                    <div class="feature-item">
                        <div class="icon"><i class="fas fa-seedling"></i></div>
                        <div class="feature-text">
                            <h3>Sustainable & Regenerative Agriculture</h3>
                            <p>Solution for small and large businesses voluptatem accusantium doloremque laudantium.</p>
                        </div>
                    </div>
    
                    <div class="feature-item">
                        <div class="icon"><i class="fas fa-leaf"></i></div>
                        <div class="feature-text">
                            <h3>Organic Agriculture & Food Production</h3>
                            <p>Solution for small and large businesses voluptatem accusantium doloremque laudantium.</p>
                        </div>
                    </div>
                </div>
    
                <div class="benefits">
                    <ul>
                        <li><i class="fas fa-check-circle"></i> 100% Naturally</li>
                        <li><i class="fas fa-check-circle"></i> Home Delivery Service</li>
                    </ul>
                    <ul>
                        <li><i class="fas fa-check-circle"></i> High-Tech Processing</li>
                        <li><i class="fas fa-check-circle"></i> Best Quality Product</li>
                    </ul>
                </div>
    
                <a href="features.php" class="explore-btn">More Features<i class="fas fa-arrow-right"></i></a>
            </div>
    
            <div class="image-content">
                <div class="main-image">
                    <img src="h1-banner3-300x238.jpg" alt="Farming Image">
                </div>
                <div class="video-preview">
                    <img src="h1-banner4-233x300.jpg" alt="Video Preview">
                    <div class="play-button"><i class="fas fa-play"></i></div>
                </div>
                <div class="stat-box">
                    <i class="fas fa-seedling"></i>
                    <h3>26+</h3>
                    <p>Growth Tons of Harvest</p>
                </div>
            </div>
        </div>
    </section>

    <section class="faq-section">
        <div class="faq-container">
            <div class="faq-images">
                <img src="farmer.jpg" alt="Farmer" class="img1">
                <img src="tractor.jpg" alt="Tractor" class="img2">
            </div>
            
            <div class="faq-content">
                <h4>🟢 ASKED QUESTIONS</h4>
                <h2>Frequently Asked Questions</h2>
                <p>We provide a platform where farmers can sell their fresh vegetables, fruits, and crops directly to buyers. Here are some common questions:</p>

                <div class="accordion">
                    <div class="accordion-item active">
                        <button class="accordion-header">How can I sell my products on Farmer Bazaar? <span>−</span></button>
                        <div class="accordion-content">
                            <p>To start selling, you need to register as a seller, list your products with details and pricing, and manage orders directly through our platform.</p>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <button class="accordion-header">What types of products can I sell? <span>+</span></button>
                        <div class="accordion-content">
                            <p>You can sell fresh vegetables, fruits, grains, pulses, spices, and other farm produce. Organic and naturally grown products are also encouraged.</p>
                        </div>
                    </div>


                    <div class="accordion-item">
                        <button class="accordion-header">How do buyers contact me? <span>+</span></button>
                        <div class="accordion-content">
                            <p>Buyers can place orders directly on the platform. If needed, they can contact you through the in-app messaging system for any queries.</p>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <button class="accordion-header">Can I update or remove my listings anytime? <span>+</span></button>
                        <div class="accordion-content">
                            <p>Yes, you can update pricing, stock availability, or remove products anytime through your seller dashboard.</p>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>

    <section class="projects-section">
        <div class="section-title">
            <p class="sub-title"><i class="fas fa-leaf"></i> EXPLORE PROJECTS</p>
            <h2>Recently Completed Projects</h2>
        </div>
    
        <div class="swiper project-slider">
            <div class="swiper-wrapper">
                <!-- Project 1 -->
                <div class="swiper-slide project-card">
                    <img src="succulence_oranges.jpg" alt="Rice Fields">
                    <div class="overlay">
                        <h3>Rice Fields</h3>
                    </div>
                    <div class="action-btn"><i class="fas fa-plus"></i></div>
                </div>
    
                <!-- Project 2 -->
                <div class="swiper-slide project-card">
                    <img src="tree_plantation.jpg" alt="Tree Plantation">
                    <div class="overlay">
                        <h3>Tree Plantation</h3>
                    </div>
                    <div class="action-btn"><i class="fas fa-plus"></i></div>
                </div>
    
                <!-- Project 3 -->
                <div class="swiper-slide project-card">
                    <img src="succulence_oranges.jpg" alt="Oranges">
                    <div class="overlay">
                        <h3>The Succulence Of Oranges</h3>
                    </div>
                    <div class="action-btn"><i class="fas fa-plus"></i></div>
                </div>
    
                <!-- Project 4 -->
                <div class="swiper-slide project-card">
                    <img src="easy_harvesting.jpg" alt="Easy Harvesting">
                    <div class="overlay">
                        <h3>Easy Harvesting</h3>
                    </div>
                    <div class="action-btn"><i class="fas fa-plus"></i></div>
                </div>
            </div>
    
            <!-- Navigation Buttons -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    
    </section>

    <section id="contact">
        <h2>Contact Us</h2>
        <form action="contact.php" method="POST">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="message">Message:</label>
            <textarea id="message" name="message" required></textarea>

            <button type="submit">Send Message</button>
        </form>
    </section>

    <footer>
        <p>&copy; 2025 Farmer Bazaar. All rights reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    var swiper = new Swiper(".project-slider", {
    slidesPerView: 3, /* Number of visible slides */
    spaceBetween: 20,
    loop: true,
    autoplay: {
        delay: 2500,
        disableOnInteraction: false,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    breakpoints: {
        1024: {
            slidesPerView: 3
        },
        768: {
            slidesPerView: 2
        },
        480: {
            slidesPerView: 1
        }
    }
});
</script>
<script>
    // GSAP Animation
    gsap.from(".fade-up", { y: 50, opacity: 0, duration: 1, stagger: 0.3, ease: "power2.out" });
    gsap.from(".slide-in-right", { x: 100, opacity: 0, duration: 2, ease: "power2.out" });
</script>
</body>

</html>