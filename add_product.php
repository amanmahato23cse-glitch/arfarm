<?php
session_start();
require 'db_connection.php';

// Ensure only logged-in farmers can access this page
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'farmer') {
    header("Location: index.php");
    exit();
}

$farmer_id = $_SESSION['user_id'];

// Fetch subcategories for dropdown
$subcategories_query = $conn->query("SELECT subcategory_id, subcategory_name FROM subcategories");

// Handle Form Submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_name = $_POST['product_name'];
    $subcategory_id = $_POST['subcategory_id'];
    $price = $_POST['price'];
    $stock_quantity = $_POST['stock_quantity'];
    $description = $_POST['description'];

    // ** Step 1: Initialize Image URL **  
    $image_url = null;

    if (!empty($_FILES['image']['name'])) {
        $target_dir = "uploads/";
        $image_name = time() . "_" . basename($_FILES["image"]["name"]); // Unique filename
        $target_file = $target_dir . $image_name;
        $image_file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Allowed file types
        $allowed_types = ['jpg', 'jpeg', 'png', 'gif'];
        if (!in_array($image_file_type, $allowed_types)) {
            die("<script>alert('Invalid file type. Only JPG, PNG, and GIF allowed.');</script>");
        }

        // Move file to uploads folder
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $image_url = $target_file;
        } else {
            die("<script>alert('Error: File move failed!');</script>");
        }
    }

    // ** Step 2: Debug Before Insert **
    echo "<pre>";
    print_r([
        'Product Name' => $product_name,
        'Subcategory ID' => $subcategory_id,
        'Price' => $price,
        'Stock' => $stock_quantity,
        'Description' => $description,
        'Image URL' => $image_url ?: 'No Image',
        'Farmer ID' => $farmer_id
    ]);
    echo "</pre>";

    // ** Step 3: Correct SQL Insert Statement (Check Table Name) **
    $stmt = $conn->prepare("INSERT INTO products (product_name, subcategory_id, price, stock_quantity, description, image_url, farmer_id, created_at, updated_at) 
                            VALUES (?, ?, ?, ?, ?, ?, ?, NOW(), NOW())");

    if ($image_url !== null) {
        $stmt->bind_param("siidsis", $product_name, $subcategory_id, $price, $stock_quantity, $description, $image_url, $farmer_id);
    } else {
        $stmt->bind_param("siidsis", $product_name, $subcategory_id, $price, $stock_quantity, $description, NULL, $farmer_id);
    }

    // ** Step 4: Execute & Debug SQL Errors **
    if ($stmt->execute()) {
        echo "<script>alert('Product added successfully!'); window.location.href='dashboard.php';</script>";
    } else {
        die("<script>alert('Database Insert Error: " . $stmt->error . "');</script>");
    }

    $stmt->close();
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

    <!-- Navbar -->
    <nav class="bg-green-600 p-4 shadow-lg">
        <div class="container mx-auto flex justify-between items-center">
            <a href="dashboard.php" class="text-white text-2xl font-bold">Farmer Dashboard</a>
            <ul class="flex space-x-6">
                <li><a href="dashboard.php" class="text-white hover:text-gray-200">Dashboard</a></li>
                <li><a href="logout.php" class="bg-red-500 px-4 py-2 rounded text-white hover:bg-red-700">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Add Product Form -->
    <div class="max-w-lg mx-auto mt-10 bg-white p-8 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold text-gray-800 text-center mb-6">Add New Product</h2>

        <form action="" method="post" enctype="multipart/form-data" class="space-y-4">
            <div>
                <label class="block text-gray-700 font-semibold">Product Name:</label>
                <input type="text" name="product_name" required
                    class="w-full px-3 py-2 border rounded focus:ring focus:ring-green-400">
            </div>

            <div>
                <label class="block text-gray-700 font-semibold">Subcategory:</label>
                <select name="subcategory_id" required
                    class="w-full px-3 py-2 border rounded focus:ring focus:ring-green-400">
                    <option value="">Select Subcategory</option>
                    <?php while ($row = $subcategories_query->fetch_assoc()): ?>
                        <option value="<?php echo $row['subcategory_id']; ?>">
                            <?php echo $row['subcategory_name']; ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>

            <div>
                <label class="block text-gray-700 font-semibold">Price (₹ per kg):</label>
                <input type="number" name="price" required
                    class="w-full px-3 py-2 border rounded focus:ring focus:ring-green-400">
            </div>

            <div>
                <label class="block text-gray-700 font-semibold">Stock Quantity (kg):</label>
                <input type="number" name="stock_quantity" required
                    class="w-full px-3 py-2 border rounded focus:ring focus:ring-green-400">
            </div>

            <div>
                <label class="block text-gray-700 font-semibold">Description:</label>
                <textarea name="description" required
                    class="w-full px-3 py-2 border rounded focus:ring focus:ring-green-400"></textarea>
            </div>

            <div>
                <label class="block text-gray-700 font-semibold">Product Image:</label>
                <input type="file" name="image" class="w-full px-3 py-2 border rounded">
            </div>

            <button type="submit" class="w-full bg-green-600 text-white py-2 rounded font-bold hover:bg-green-800">
                Add Product
            </button>
        </form>
    </div>

</body>

</html>