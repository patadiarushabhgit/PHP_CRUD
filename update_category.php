<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the form data
    $categoryId = $_POST["categoryId"];
    $categoryName = $_POST["categoryName"];
    $categoryStatus = $_POST["categoryStatus"];

    // Connect to the database using PDO
    $dsn = "mysql:host=localhost;dbname=task1day2;charset=utf8mb4";
    $username = "root";
    $password = "";

    try {
        $conn = new PDO($dsn, $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prepare the update query
        $sql = "UPDATE categories SET name = :name, status = :status WHERE id = :id";
        $stmt = $conn->prepare($sql);

        // Bind the parameters
        $stmt->bindParam(':name', $categoryName);
        $stmt->bindParam(':status', $categoryStatus);
        $stmt->bindParam(':id', $categoryId);

        // Execute the update query
        $stmt->execute();

        // Check if the update was successful
        if ($stmt->rowCount() > 0) {
            echo "<script> alert('Category updated successfully')</script>";
            echo "<script>window.location.href = 'index1.php';</script>";
        } else {
            echo '<div class="alert alert-danger">Error updating category.</div>';
        }

        // Close the database connection
        $conn = null;
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Update Category</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
        .container {
            max-width: 400px;
            margin: 0 auto;
            padding-top: 50px;
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
        <h2>Update Category</h2>
        <form method="post" action="update_category.php">
            <div class="form-group">
                <label for="categoryId">Category ID:</label>
                <input type="text" class="form-control" id="categoryId" name="categoryId" required>
            </div>
            <div class="form-group">
                <label for="categoryName">Name:</label>
                <select class="form-control" name="categoryName" required>
                    <option value="Electronics">Electronics</option>
                    <option value="Clothing">Clothing</option>
                    <option value="Home Decor">Home Decor</option>
                    <option value="Books">Books</option>
                    <option value="Sports">Sports</option>
                </select>
            </div>
            <div class="form-group">
                <label for="categoryStatus">Status:</label>
                <select class="form-control" id="categoryStatus" name="categoryStatus" required>
                    <option value="In stock">In stock</option>
                    <option value="Out Of Stock">Out Of Stock</option>
                </select>
            
            <button type="submit" class="btn btn-primary">Update Category</button>
        </form>
    </div>
</body>
</html>
