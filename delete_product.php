<?php
// Check if the product ID is provided
if (isset($_GET["id"])) {
    // Retrieve the product ID from the URL
    $productId = $_GET["id"];

    // Connect to the database
    $conn = mysqli_connect('localhost', 'root', '', 'task1day2');

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Delete the product from the database
    $sql = "DELETE FROM products WHERE id = $productId";
    $result = mysqli_query($conn, $sql);

    // Close the database connection
    mysqli_close($conn);

    if ($result) {
        echo "<script> alert('Product deleted successfully.');</script>";
        echo "<script>window.location.href = 'index2.php';</script>";
    } else {
        echo '<div class="alert alert-danger">Error deleting product: ' . mysqli_error($conn) . '</div>';
    }
} else {
    echo '<div class="alert alert-warning">Invalid request.</div>';
}
?>