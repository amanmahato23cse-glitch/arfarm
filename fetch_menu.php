<?php
header("Content-Type: application/json");

// Database Connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "agriculturedb";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check Connection
if ($conn->connect_error) {
    echo json_encode(["error" => "Database Connection Failed: " . $conn->connect_error]);
    exit();
}

// Fetch Categories & Subcategories
$sql = "SELECT c.category_id, c.category_name, s.subcategory_id, s.subcategory_name 
        FROM categories c 
        LEFT JOIN subcategories s ON c.category_id = s.category_id 
        ORDER BY c.category_id, s.subcategory_id";

$result = $conn->query($sql);
$categories = [];

if ($result) {
    while ($row = $result->fetch_assoc()) {
        $categoryId = $row["category_id"];

        if (!isset($categories[$categoryId])) {
            $categories[$categoryId] = [
                "category_id" => $categoryId,
                "category_name" => $row["category_name"],
                "subcategories" => []
            ];
        }

        // Add subcategories only if they exist
        if (!empty($row["subcategory_id"])) {
            $categories[$categoryId]["subcategories"][] = [
                "subcategory_id" => $row["subcategory_id"],
                "subcategory_name" => $row["subcategory_name"]
            ];
        }
    }

    // Convert Associative Array to Indexed Array
    echo json_encode(array_values($categories), JSON_PRETTY_PRINT);
} else {
    echo json_encode(["error" => "Query failed: " . $conn->error]);
}

$conn->close();
?>
