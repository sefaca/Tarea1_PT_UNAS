<?php
require_once '../config/database.php';
require_once '../src/Product.php';

$database = new Database();
$db = $database->getConnection();

$product = new Product($db);

if (isset($_GET['id'])) {
    $product->id = $_GET['id'];

    if ($product->delete()) {
        echo "<p>Product deleted successfully.</p>";
    } else {
        echo "<p>Failed to delete product.</p>";
    }
} else {
    echo "Product ID is missing!";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <title>Delete Product</title>
</head>
<body>
    <a href="index.php">Back to Product List</a>
</body>
</html>
