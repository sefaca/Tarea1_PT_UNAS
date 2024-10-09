<?php
require_once '../config/database.php';
require_once '../src/Product.php';

$database = new Database();
$db = $database->getConnection();

$product = new Product($db);

if ($_POST) {
    $product->name = $_POST['name'];
    $product->description = $_POST['description'];
    $product->price = $_POST['price'];

    if ($product->create()) {
        echo "<p>Product added successfully.</p>";
    } else {
        echo "<p>Failed to add product.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <title>Add Product</title>
</head>
<body>
    <h1>Add Product</h1>
    <a href="index.php">Back to Product List</a>
    <form action="add_product.php" method="POST">
        <label for="name">Name</label>
        <input type="text" name="name" required><br>

        <label for="description">Description</label>
        <textarea name="description" required></textarea><br>

        <label for="price">Price</label>
        <input type="text" name="price" required><br>

        <button type="submit">Add Product</button>
    </form>
</body>
</html>
