<?php
include 'db_connection.php'; // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $role = $_POST['role'];
    $name = $_POST['name'];
    $phone = $_POST['phone']; // Phone is required
    $email = $_POST['email'] ?? null; // Email is optional
    $password = $_POST['password']; // Store as plain text (NOT recommended for production)
    $address = $_POST['address'];
    $image_url = null;

    // Handle file upload
    if (isset($_FILES['photo']) && $_FILES['photo']['size'] > 0) {
        $target_dir = "uploads/";
        $target_file = $target_dir . time() . "_" . basename($_FILES["photo"]["name"]);
        if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
            $image_url = $target_file;
        }
    }

    // Determine table based on role
    $table = ($role == 'farmer') ? 'farmers' : 'users';

    // Insert data into the appropriate table
    $stmt = $conn->prepare("INSERT INTO $table (name, phone, email, password, address, image_url) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $name, $phone, $email, $password, $address, $image_url);
    
    if ($stmt->execute()) {
        echo "<script>
                alert('Registration successful!');
                window.location.href = 'login.php';
              </script>";
    } else {
        echo "<script>
                alert('Error: " . $stmt->error . "');
                window.history.back();
              </script>";
    }
    
    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up | Farmer Bazaar</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&amp;display=swap" rel="stylesheet"/>
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
                <a href="login.php" class="login-btn">Login</a>
                <a href="signup.php" class="signup-btn">Sign Up</a>
            </div>
        </nav>
    </header>
    
    <div class="min-h-screen flex items-center justify-center relative" style="margin-top: 67px;">
        <img alt="Background image of crops in a field" class="absolute inset-0 w-full h-full object-cover opacity-50" src="signup_back.jpg"/>
        <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md relative z-10">
            <h2 class="text-2xl font-bold mb-6 text-center">AR FARM - Sign Up</h2>
            <form action="#" class="space-y-4" method="POST" enctype="multipart/form-data">
                <div>
                    <label class="block text-sm font-medium text-gray-700" for="role">Sign Up As *</label>
                    <select id="role" name="role" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm" required>
                        <option value="farmer">Farmer</option>
                        <option value="user">User</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700" for="name">Name *</label>
                    <input class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm" id="name" name="name" required type="text"/>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700" for="phone">Phone Number *</label>
                    <input class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm" id="phone" name="phone" required type="tel"/>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700" for="email">Email (Optional)</label>
                    <input class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm" id="email" name="email" type="email"/>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700" for="password">Password *</label>
                    <input class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm" id="password" name="password" type="password" required/>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700" for="address">Address *</label>
                    <input class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm" id="address" name="address" required type="text"/>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700" for="photo">Photo (Optional)</label>
                    <input class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm" id="photo" name="photo" type="file"/>
                </div>

                <div class="flex items-center justify-between">
                    <button class="w-full bg-green-600 text-white py-2 px-4 rounded-md shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500" type="submit">Sign Up</button>
                </div>
            </form>
        </div>
    </div>
    
    <footer>
        <p>&copy; 2025 Farmer Bazaar. All rights reserved.</p>
    </footer>
</body>
</html>
