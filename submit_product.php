<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productName = $_POST["productName"];
    $productCategory = $_POST["productCategory"];
    $productSKU = $_POST["productSKU"];
    $productImage = $_POST["productImage"];
    $productPrice = $_POST["productPrice"];

    // Connect to the database
    $conn = mysqli_connect('localhost', 'root', '', 'task1day2');

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Insert the product into the database
    $query = "INSERT INTO products (name, category, sku, image, price) VALUES ('$productName', '$productCategory', '$productSKU', '$productImage', '$productPrice')";
    if (mysqli_query($conn, $query)) {
        echo "Product added successfully.";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    echo "Invalid request.";
}
?>
