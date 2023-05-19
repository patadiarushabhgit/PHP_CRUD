<!DOCTYPE html>
<html>

<head>
    <title>Product List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h2>Product List</h2>

        <?php
        // Connect to the database
        $conn = mysqli_connect('localhost', 'root', '', 'task1day2');

        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Retrieve products from the database
        $query = "SELECT * FROM products";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            echo '<table class="table table-striped">';
            echo '<tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>SKU</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>';

            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>
                        <td>' . $row['id'] . '</td>
                        <td>' . $row['name'] . '</td>
                        <td>' . $row['category'] . '</td>
                        <td>' . $row['sku'] . '</td>
                        <td> <img width="100px" src='. $row['image'].'></td>
                        <td>' . $row['price'] . '</td>
                        <td>
                            <a href="update_product.php?id=' . $row['id'] . '" class="btn btn-primary">Edit</a>
                            <a href="delete_product.php?id=' . $row['id'] . '" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>';
            }

            echo '</table>';
        } else {
            echo '<div class="alert alert-warning">No products found.</div>';
        }

        // Close the database connection
        mysqli_close($conn);
        ?>
    </div>
</body>

</html>
