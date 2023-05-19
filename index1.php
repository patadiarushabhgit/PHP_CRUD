<!DOCTYPE html>
<html>

<head>
    <title>Category List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding-top: 50px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Category List</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Connect to the database
                $conn = mysqli_connect('localhost', 'root', '', 'task1day2');

                // Check connection
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                // Fetch categories from the database
                $sql = "SELECT * FROM categories";
                $result = mysqli_query($conn, $sql);

                // Display categories
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<tr>';
                        echo '<td>' . $row['id'] . '</td>';
                        echo '<td>' . $row['name'] . '</td>';
                        echo '<td>' . $row['status'] . '</td>';
                        echo '<td>
                                <a href="update_category.php?id=' . $row['id'] . '" class="btn btn-primary">Edit</a>
                                <a href="delete_category.php?id=' . $row['id'] . '" class="btn btn-danger">Delete</a>
                            </td>';
                        echo '</tr>';
                    }
                } else {
                    echo '<tr><td colspan="4">No categories found.</td></tr>';
                }

                // Close the database connection
                mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>
