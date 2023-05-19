
<!DOCTYPE html>
<html>

<head>
    <title>Delete Category</title>
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
    </style>
</head>

<body>
    <div class="container">
        <?php
        // Check if the category ID is provided
        if (isset($_GET['id'])) {
            // Retrieve the category ID from the query parameter
            $categoryId = $_GET['id'];

            // Connect to the database
            $conn = mysqli_connect('localhost', 'root', '', 'task1day2');

            // Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            // Delete the category from the database
            $sql = "DELETE FROM categories WHERE id = $categoryId";
            if (mysqli_query($conn, $sql)) {
                echo '<div class="alert alert-success">Category deleted successfully.</div>';
            } else {
                echo '<div class="alert alert-danger">Error deleting category: ' . mysqli_error($conn) . '</div>';
            }

            // Close the database connection
            mysqli_close($conn);
        } else {
            echo '<div class="alert alert-warning">Invalid category ID.</div>';
        }
        ?>
    </div>
</body>

</html>


<?php
// Check if the category ID is provided
if (isset($_GET['id'])) {
    // Retrieve the category ID from the query parameter
    $categoryId = $_GET['id'];

    // Connect to the database
    $conn = mysqli_connect('localhost', 'root', '', 'task1day2');

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Delete the category from the database
    $sql = "DELETE FROM categories WHERE id = $categoryId";
    if (mysqli_query($conn, $sql)) {
        echo "Category deleted successfully.";
    } else {
        echo "Error deleting category: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    echo "Invalid category ID.";
}
?>
