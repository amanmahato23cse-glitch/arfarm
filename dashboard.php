<?php
session_start();
require 'db_connection.php';

// Ensure only logged-in farmers can access this page
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'farmer') {
    header("Location: index.php");
    exit();
}

$farmer_id = $_SESSION['user_id'];

// Fetch products of the logged-in farmer
$stmt = $conn->prepare("SELECT * FROM products WHERE farmer_id = ?");
$stmt->bind_param("i", $farmer_id);
$stmt->execute();
$products = $stmt->get_result();
$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmer Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

    <!-- Navbar -->
    <nav class="bg-green-600 p-4 shadow-lg">
    <div class="container mx-auto flex justify-between items-center">
        <a href="index.php" class="text-white text-2xl font-bold">Farmer Dashboard</a>
        <ul class="flex space-x-6">
            <li><a href="dashboard.php" class="text-white hover:text-gray-200">Dashboard</a></li>
            <li><a href="moved_products.php" class="text-white hover:text-gray-200">Ledger</a></li>
            <li><a href="add_product.php" class="text-white hover:text-gray-200">Add Product</a></li>
            <li><a href="logout.php" class="bg-red-500 px-4 py-2 rounded text-white hover:bg-red-700">Logout</a></li>
        </ul>
    </div>
</nav>

    <!-- Main Content -->
    <div class="container mx-auto mt-8">
        <h2 class="text-3xl font-bold text-gray-800 text-center">Manage Your Products</h2>

        <div class="overflow-x-auto mt-6">
        <?php
if (isset($_GET['move_success'])) {
    echo '<div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">Product moved successfully!</div>';
} elseif (isset($_GET['move_error'])) {
    echo '<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">Error moving product!</div>';
}
?>
            <table class="w-full table-auto bg-white shadow-lg rounded-lg overflow-hidden">
                <thead class="bg-green-600 text-white">
                    <tr>
                        <th class="px-4 py-2">Image</th>
                        <th class="px-4 py-2">Product Name</th>
                        <th class="px-4 py-2">Price</th>
                        <th class="px-4 py-2">Stock</th>
                        <th class="px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    <?php while ($product = $products->fetch_assoc()): ?>
                        <tr class="border-b">
                            <td class="px-4 py-2">
                                <img src="<?php echo $product['image_url']; ?>" class="w-16 h-16 rounded-lg shadow-md">
                            </td>
                            <td class="px-4 py-2">
                                <?php echo $product['product_name']; ?>
                            </td>
                            <td class="px-4 py-2 font-semibold text-green-600">₹
                                <?php echo $product['price']; ?> / kg
                            </td>
                            <td class="px-4 py-2">
                                <?php echo $product['stock_quantity']; ?> kg
                            </td>
                            <td class="px-4 py-2 space-x-2">
                                <a href="edit_product.php?product_id=<?php echo $product['product_id']; ?>"
                                    class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-700">Edit</a>
                                <a href="delete_product.php?product_id=<?php echo $product['product_id']; ?>"
                                    onclick="return confirm('Are you sure?');"
                                    class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-700">Delete</a>
                                <a href="move_product.php?product_id=<?php echo $product['product_id']; ?>"
                                    onclick="return confirm('Are you sure you want to move this product?');"
                                    class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-700">Move</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>