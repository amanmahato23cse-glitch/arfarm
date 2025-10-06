<?php
session_start();
require 'db_connection.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'farmer') {
    header("Location: index.php");
    exit();
}

if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];
    $stmt = $conn->prepare("SELECT * FROM products WHERE product_id = ?");
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $product = $stmt->get_result()->fetch_assoc();
    $stmt->close();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $price = $_POST['price'];
    $stock_quantity = $_POST['stock_quantity'];
    $description = $_POST['description'];

    $stmt = $conn->prepare("UPDATE products SET product_name = ?, price = ?, stock_quantity = ?, description = ?, updated_at = NOW() WHERE product_id = ?");
    $stmt->bind_param("siisi", $product_name, $price, $stock_quantity, $description, $product_id);

    if ($stmt->execute()) {
        echo "<script>alert('Product updated successfully!'); window.location.href = 'dashboard.php';</script>";
    } else {
        echo "<script>alert('Error updating product');</script>";
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <!-- Navbar -->
    <nav class="bg-green-600 p-4 shadow-lg">
        <div class="container mx-auto flex justify-between items-center">
            <a href="dashboard.php" class="text-white text-2xl font-bold">Farmer Dashboard</a>
            <ul class="flex space-x-6">
                <li><a href="dashboard.php" class="text-white hover:text-gray-200">Dashboard</a></li>
                <li><a href="logout.php" class="bg-red-500 px-4 py-2 rounded text-white hover:bg-red-700">Logout</a></li>
            </ul>
        </div>
    </nav>

    <!-- Edit Product Form -->
    <div class="max-w-lg mx-auto mt-10 bg-white p-8 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold text-gray-800 text-center mb-6">Edit Product</h2>

        <form action="" method="post" class="space-y-4">
            <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">

            <div>
                <label class="block text-gray-700 font-semibold">Product Name:</label>
                <input type="text" name="product_name" value="<?php echo $product['product_name']; ?>" required class="w-full px-3 py-2 border rounded focus:ring focus:ring-green-400">
            </div>

            <div>
                <label class="block text-gray-700 font-semibold">Price (₹ per kg):</label>
                <input type="number" name="price" value="<?php echo $product['price']; ?>" required class="w-full px-3 py-2 border rounded focus:ring focus:ring-green-400">
            </div>

            <div>
                <label class="block text-gray-700 font-semibold">Stock Quantity (kg):</label>
                <input type="number" name="stock_quantity" value="<?php echo $product['stock_quantity']; ?>" required class="w-full px-3 py-2 border rounded focus:ring focus:ring-green-400">
            </div>

            <div>
                <label class="block text-gray-700 font-semibold">Description:</label>
                <textarea name="description" required class="w-full px-3 py-2 border rounded focus:ring focus:ring-green-400"><?php echo $product['description']; ?></textarea>
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded font-bold hover:bg-blue-800">
                Update Product
            </button>
        </form>
    </div>

</body>
</html>
