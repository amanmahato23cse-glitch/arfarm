<?php
session_start();
require 'db_connection.php';

// Ensure only logged-in farmers can access this page
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'farmer') {
    header("Location: index.php");
    exit();
}

if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];
    $farmer_id = $_SESSION['user_id'];

    // Fetch the product details
    $stmt = $conn->prepare("SELECT * FROM products WHERE product_id = ? AND farmer_id = ?");
    $stmt->bind_param("ii", $product_id, $farmer_id);
    $stmt->execute();
    $product = $stmt->get_result()->fetch_assoc();
    $stmt->close();

    if ($product) {
        // Insert the product into the moved_products table
        $stmt = $conn->prepare("INSERT INTO moved_products (product_id, product_name, subcategory_id, price, stock_quantity, description, created_at, updated_at, image_url, farmer_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param(
            "isidissisi",
            $product['product_id'],
            $product['product_name'],
            $product['subcategory_id'],
            $product['price'],
            $product['stock_quantity'],
            $product['description'],
            $product['created_at'],
            $product['updated_at'],
            $product['image_url'],
            $product['farmer_id']
        );
        $stmt->execute();
        $stmt->close();

        // Delete the product from the products table
        $stmt = $conn->prepare("DELETE FROM products WHERE product_id = ?");
        $stmt->bind_param("i", $product_id);
        $stmt->execute();
        $stmt->close();

        // Redirect back to the dashboard with a success message
        header("Location: dashboard.php?move_success=1");
        exit();
    } else {
        // Redirect back to the dashboard with an error message
        header("Location: dashboard.php?move_error=1");
        exit();
    }
} else {
    // Redirect back to the dashboard if no product_id is provided
    header("Location: dashboard.php");
    exit();
}
?>