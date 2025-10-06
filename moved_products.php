<?php
session_start();
require 'db_connection.php';

// Ensure only logged-in farmers can access this page
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'farmer') {
    header("Location: index.php");
    exit();
}

$farmer_id = $_SESSION['user_id'];

// Fetch moved products of the logged-in farmer
$stmt = $conn->prepare("SELECT * FROM moved_products WHERE farmer_id = ?");
$stmt->bind_param("i", $farmer_id);
$stmt->execute();
$moved_products = $stmt->get_result();
$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moved Products</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <!-- Navbar -->
    <nav class="bg-green-600 p-4 shadow-lg">
        <div class="container mx-auto flex justify-between items-center">
            <a href="index.php" class="text-white text-2xl font-bold">Farmer Dashboard</a>
            <ul class="flex space-x-6">
                <li><a href="dashboard.php" class="text-white hover:text-gray-200">Dashboard</a></li>
                <li><a href="add_product.php" class="text-white hover:text-gray-200">Add Product</a></li>
                <li><a href="moved_products.php" class="text-white hover:text-gray-200">Moved Products</a></li>
                <li><a href="logout.php" class="bg-red-500 px-4 py-2 rounded text-white hover:bg-red-700">Logout</a></li>
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mx-auto mt-8">
        <h2 class="text-3xl font-bold text-gray-800 text-center">Moved Products</h2>

        <div class="overflow-x-auto mt-6">
            <table class="w-full table-auto bg-white shadow-lg rounded-lg overflow-hidden">
                <thead class="bg-green-600 text-white">
                    <tr>
                        <th class="px-4 py-2">Image</th>
                        <th class="px-4 py-2">Product Name</th>
                        <th class="px-4 py-2">Price</th>
                        <th class="px-4 py-2">Stock</th>
                        <th class="px-4 py-2">Moved At</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    <?php while ($product = $moved_products->fetch_assoc()): ?>
                    <tr class="border-b">
                        <td class="px-4 py-2">
                            <img src="<?php echo $product['image_url']; ?>" class="w-16 h-16 rounded-lg shadow-md">
                        </td>
                        <td class="px-4 py-2"><?php echo $product['product_name']; ?></td>
                        <td class="px-4 py-2 font-semibold text-green-600">₹ <?php echo $product['price']; ?> / kg</td>
                        <td class="px-4 py-2"><?php echo $product['stock_quantity']; ?> kg</td>
                        <td class="px-4 py-2"><?php echo $product['moved_at']; ?></td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>