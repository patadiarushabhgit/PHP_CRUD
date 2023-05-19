<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the form data
   // $categoryId = $_POST["categoryId"];
    $categoryName = $_POST["categoryName"];
    $categoryStatus = $_POST["categoryStatus"];

    // Connect to the database using PDO
    $dsn = "mysql:host=localhost;dbname=task1day2;charset=utf8mb4";
    $username = "root";
    $password = "";

    try {
        $conn = new PDO($dsn, $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Check if the category ID already exists
        $checkQuery = "SELECT * FROM categories WHERE id = :categoryId";
        $checkStmt = $conn->prepare($checkQuery);
        $checkStmt->bindParam(':categoryId', $categoryId);
        $checkStmt->execute();

        if ($checkStmt->rowCount() > 0) {
            // Category ID already exists, display an error message
            echo '<div class="alert alert-danger">Category ID already exists. Please choose a different ID.</div>';
        } else {
            // Category ID doesn't exist, insert the new category into the database
            $insertQuery = "INSERT INTO categories (id, name, status) VALUES (:categoryId, :categoryName, :categoryStatus)";
            $insertStmt = $conn->prepare($insertQuery);
            $insertStmt->bindParam(':categoryId', $categoryId);
            $insertStmt->bindParam(':categoryName', $categoryName);
            $insertStmt->bindParam(':categoryStatus', $categoryStatus);
            if ($insertStmt->execute()) {
                echo '<div class="alert alert-success">Category added successfully.</div>';
            } else {
                echo '<div class="alert alert-danger">Error adding category.</div>';
            }
        }

        // Close the database connection
        $conn = null;
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
} else {
    echo '<div class="alert alert-warning">Invalid request.</div>';
}
?>
