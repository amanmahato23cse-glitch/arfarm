<?php
session_start(); // Start the session
require 'db_connection.php'; // Include database connection
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="styles.css">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="script.js" defer></script>
    <style>
        .mega-menu {
    position: fixed;
    width: 100%;
    background-color: #008000;
    padding: 10px;
    margin-top: -52px;
    z-index: 999;
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

<div class="productss">
<?php
 // Ensure you have a database connection file

$subcategory_id = isset($_GET['subcategory_id']) ? intval($_GET['subcategory_id']) : 0;

// Fetch products based on subcategory
$sql = "SELECT p.*, f.name AS farmer_name, f.address, f.phone 
        FROM products p
        JOIN farmers f ON p.farmer_id = f.farmer_id
        WHERE p.subcategory_id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $subcategory_id);
$stmt->execute();
$result = $stmt->get_result();

$products = [];
while ($row = $result->fetch_assoc()) {
    $products[] = $row;
}

// Get the subcategory_id from the URL
$subcategory_id = isset($_GET['subcategory_id']) ? intval($_GET['subcategory_id']) : 0;

if ($subcategory_id > 0) {
    // Fetch category_name and subcategory_name based on subcategory_id
    $sqlsub = "SELECT s.subcategory_name, c.category_name, c.category_id
            FROM subcategories s
            JOIN categories c ON s.category_id = c.category_id
            WHERE s.subcategory_id = ?";
    
    $stmtsub = $conn->prepare($sqlsub);
    $stmtsub->bind_param("i", $subcategory_id);
    $stmtsub->execute();
    $resultsub = $stmtsub->get_result();
    
    if ($row = $resultsub->fetch_assoc()) {
        $category_name = $row['category_name'];
        $subcategory_name = $row['subcategory_name'];
        $category_id = $row['category_id'];
    } else {
        $category_name = "Unknown Category";
        $subcategory_name = "Unknown Subcategory";
    }
} else {
    $category_name = "Unknown Category";
    $subcategory_name = "Unknown Subcategory";
}
?>

<div class="breadcrumb">
    <a href="index.php"><i class="fas fa-home"></i> Home</a>
    <span class="divider">›</span>
    <a href="category.php?category_id=<?php echo $category_id; ?>"><i class="fas fa-folder-open"></i> <?php echo $category_name; ?></a>
    <span class="divider">›</span>
    <span class="current"><i class="fas fa-tag"></i> <?php echo $subcategory_name; ?></span>
</div>



<!-- Page Title -->
<h2 class="page-title"><?php echo $subcategory_name; ?> Products</h2>

<!-- Product Layout -->
<div class="product-container">
    
    <!-- Sidebar -->
    <div class="sidebar">
        <h3>Related Category</h3>
        <ul>
    <?php 
    $category_id = isset($_GET['category_id']) ? intval($_GET['category_id']) : 1;

    $sql1 = "SELECT subcategory_id, subcategory_name, image_url FROM subcategories WHERE category_id = ?";
    $stmt1 = $conn->prepare(query: $sql1);
    $stmt1->bind_param("i", $category_id);
    $stmt1->execute();
    $result1 = $stmt1->get_result();

    while ($row = $result1->fetch_assoc()) { ?>
        <li onclick="window.location.href='products.php?subcategory_id=<?php echo $row['subcategory_id']; ?>'" style="cursor: pointer;">
            <img src="<?php echo $row['image_url']; ?>" alt="<?php echo $row['subcategory_name']; ?>"> 
            <?php echo $row['subcategory_name']; ?>
        </li>
    <?php } ?>
</ul>
    </div>

    <!-- Product Grid -->
    <div class="product-list">
    <?php foreach ($products as $product) { ?>
        <a href="product.php?product_id=<?php echo $product['product_id']; ?>" class="product-card-link">
            <div class="product-card">
                <img src="<?php echo $product['image_url']; ?>" alt="<?php echo $product['product_name']; ?>">
                <h3><?php echo $product['product_name']; ?></h3>
                <p>₹ <?php echo $product['price']; ?> / <?php echo $product['stock_quantity']; ?></p>
                <p>📍 <?php echo $product['address']; ?></p>
                <p>📅 <?php echo date("j M, Y", strtotime($product['created_at'])); ?></p>
            </div>
        </a>
    <?php } ?>
</div>

    <script src="script.js"></script>
</div>

</body>
</html>

<?php $conn->close(); ?>
