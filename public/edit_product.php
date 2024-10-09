<?php
require_once '../config/database.php';
require_once '../src/Product.php';

$database = new Database();
$db = $database->getConnection();

$product = new Product($db);

if (isset($_GET['id'])) {
    $product->id = $_GET['id'];
    $stmt = $db->prepare("SELECT * FROM products WHERE id = ?");
    $stmt->execute([$product->id]);
    $prodData = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$prodData) {
        echo "Product not found!";
        exit;
    }
} else {
    echo "Product ID is missing!";
    exit;
}

if ($_POST) {
    // Actualización de los datos del producto
    $product->name = $_POST['name'];
    $product->description = $_POST['description'];
    $product->price = $_POST['price'];

    if ($product->update()) {
        echo "<p>Product updated successfully.</p>";
    } else {
        echo "<p>Failed to update product.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <title>Edit Product</title>
</head>
<body>
    <h1>Edit Product</h1>
    <form action="edit_product.php?id=<?php echo $product->id; ?>" method="POST">
        <label for="name">Name</label>
        <input type="text" name="name" value="<?php echo htmlspecialchars($prodData['name']); ?>" required><br>

        <label for="description">Description</label>
        <textarea name="description" required><?php echo htmlspecialchars($prodData['description']); ?></textarea><br>

        <label for="price">Price</label>
        <input type="text" name="price" value="<?php echo htmlspecialchars($prodData['price']); ?>" required><br>

        <button type="submit">Update Product</button>
    </form>
    <a href="index.php">Back to Product List</a>
</body>
</html>
