<?php
session_start(); // Start the session
require 'db_connection.php'; // Include database connection

if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];

    // Fetch product details along with farmer's phone number using a JOIN query
    $stmt = $conn->prepare("
        SELECT p.*, f.phone AS farmer_phone
        FROM products p
        JOIN farmers f ON p.farmer_id = f.farmer_id
        WHERE p.product_id = ?
    ");
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $product = $result->fetch_assoc();
    $stmt->close();

    if (!$product) {
        echo "<script>alert('Product not found!'); window.location.href = 'index.php';</script>";
        exit();
    }
} else {
    echo "<script>alert('Invalid request!'); window.location.href = 'index.php';</script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($product['product_name']); ?> | Product Details</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="script.js" defer></script>

    <style>
        /* Product Details Container */
        .product-details {
            max-width: 900px;
            background: white;
            margin: 50px auto;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .product-details img {
            width: 100%;
            max-height: 400px;
            object-fit: cover;
            border-radius: 8px;
        }

        .product-details h2 {
            font-size: 28px;
            margin: 15px 0;
            color: #333;
        }

        .product-details p {
            font-size: 16px;
            margin: 10px 0;
        }

        .product-details strong {
            color: #008000;
        }

        .product-image img {
            width: 400px;
            height: 400px;
            object-fit: cover;
            border-radius: 8px;
            display: block;
            margin: 10px auto;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        .product-image {
            padding: 20px;
        }

        .product-info {
            padding: 20px;
        }

        /* Price & Availability */
        .price {
            font-size: 22px;
            font-weight: bold;
            color: #28a745;
        }

        /* Buy Button */
        .buy-btn {
            display: inline-block;
            width: 100%;
            background: #008000;
            color: white;
            font-size: 18px;
            font-weight: bold;
            padding: 12px;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            transition: background 0.3s;
        }

        .buy-btn:hover {
            background: #006400;
        }

        .product-container {
            position: relative;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            padding: 130px;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .product-container {
                flex-direction: column;
                align-items: center;
            }

            .product-image img {
                width: 100%;
                height: auto;
            }

            .product-info {
                text-align: center;
            }
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
        <ul class="mgmn" id="category-list"></ul>
    </nav>
</header>

<div class="product-container">
    <div class="product-image">
        <img src="<?php echo htmlspecialchars($product['image_url']); ?>" alt="<?php echo htmlspecialchars($product['product_name']); ?>">
    </div>
    <div class="product-info">
        <h2><?php echo htmlspecialchars($product['product_name']); ?></h2>
        <p class="price">₹ <?php echo htmlspecialchars($product['price']); ?> / kg</p>
        <p><strong>Quantity Available:</strong> <?php echo htmlspecialchars($product['stock_quantity']); ?> kg</p>
        <p class="description"><?php echo nl2br(htmlspecialchars($product['description'])); ?></p>
        
        <?php if(isset($_SESSION['user_id'])): ?>
            <p><strong>Farmer Contact:</strong> <?php echo htmlspecialchars($product['farmer_phone']); ?></p>
        <?php else: ?>
            <a href="login.php" class="buy-btn">Login to View Contact</a>
        <?php endif; ?>
    </div>
</div>
</body>
</html>
