<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the form data
    $productId = $_POST["productId"];
    $productName = $_POST["productName"];
    $productCategory = $_POST["categoryname"];
    $productSKU = $_POST["productSKU"];
    $productImage = $_POST["productImage"];
    $productPrice = $_POST["productPrice"];

    // Connect to the database
    $dsn = 'mysql:host=localhost;dbname=task1day2';
    $username = 'root';
    $password = '';

    try {
        $conn = new PDO($dsn, $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Check if the product ID already exists
        $sql = "SELECT * FROM products WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$productId]);

        if ($stmt->rowCount() > 0) {
            // Update the product in the database
            $sql = "UPDATE products SET name = ?, category = ?, sku = ?, image = ?, price = ? WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$productName, $productCategory, $productSKU, $productImage, $productPrice, $productId]);

            if ($stmt->rowCount() > 0) {
                echo "<script> alert('Product updated successfully')</script>";
                echo "<script>window.location.href = 'index2.php';</script>";
            } else {
                echo '<div class="alert alert-danger">Error updating product: Unable to update the product.</div>';
            }
        } else {
            echo '<div class="alert alert-warning">Product not found.</div>';
        }

        // Close the database connection
        $conn = null;
    } catch (PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }
} else {
    // Check if the product ID is provided
    if (isset($_GET["id"])) {
        // Retrieve the product ID from the URL
        $productId = $_GET["id"];

        // Connect to the database
        $dsn = 'mysql:host=localhost;dbname=task1day2';
        $username = 'root';
        $password = '';

        try {
            $conn = new PDO($dsn, $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Retrieve the product details from the database
            $sql = "SELECT * FROM products WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$productId]);
            $product = $stmt->fetch(PDO::FETCH_ASSOC);

            // Close the database connection
            $conn = null;

            if ($product) {
                $productName = $product["name"];
                $productCategory = $product["category"];
                $productSKU = $product["sku"];
                $productImage = $product["image"];
                $productPrice = $product["price"];
            } else {
                echo '<div class="alert alert-warning">Product not found.</div>';
            }
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    } else {
        echo '<div class="alert alert-warning">Invalid request.</div>';
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Update Product</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding-top: 50px;
        }

        .alert {
            margin-top: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        button[type="submit"] {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Update Product</h2>
        <form method="post" action="update_product.php">
            <div class="form-group">
                <label for="productId">ID:</label>
                <input type="text" class="form-control" id="productId" name="productId" value="<?php echo $productId ?? ''; ?>" required>
            </div>
            <div class="form-group">
                <label for="productName">Name:</label>
                <select class="form-control" name="productName" required>
                    <option value="Gold Rings" <?php if ($productName == "Gold Rings") echo 'selected'; ?>>Gold Rings</option>
                    <option value="Diamond Rings" <?php if ($productName == "Diamond Rings") echo 'selected'; ?>>Diamond Rings</option>
                    <option value="Silver Rings" <?php if ($productName == "Silver Rings") echo 'selected'; ?>>Silver Rings</option>
                    <option value="Gold Bracelet" <?php if ($productName == "Gold Bracelet") echo 'selected'; ?>>Gold Bracelet</option>
                    <option value="Diamond Bracelet" <?php if ($productName == "Diamond Bracelet") echo 'selected'; ?>>Diamond Bracelet</option>
                    <option value="Silver Bracelet" <?php if ($productName == "Silver Bracelet") echo 'selected'; ?>>Silver Bracelet</option>
                </select>
            </div>
            <div class="form-group">
                <label for="productCategory">Category:</label>
                <select class="form-control" name="categoryname" required>
                    <option value="category1" <?php if ($productCategory == "category1") echo 'selected'; ?>>category1</option>
                    <option value="category2" <?php if ($productCategory == "category2") echo 'selected'; ?>>category2</option>
                    <option value="category3" <?php if ($productCategory == "category3") echo 'selected'; ?>>category3</option>
                    <option value="category4" <?php if ($productCategory == "category4") echo 'selected'; ?>>category4</option>
                </select>
            </div>
            <div class="form-group">
                <label for="productSKU">SKU:</label>
                <input type="text" class="form-control" id="productSKU" name="productSKU" value="<?php echo $productSKU ?? ''; ?>" required>
            </div>
            <div class="form-group">
                <label for="productImage">Image:</label>
                <input type="file" class="form-control" id="productImage" name="productImage" value="<?php echo $productImage ?? ''; ?>" required>
            </div>
            <div class="form-group">
                <label for="productPrice">Price:</label>
                <input type="text" class="form-control" id="productPrice" name="productPrice" value="<?php echo $productPrice ?? ''; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Product</button>
        </form>
    </div>
</body>

</html>
