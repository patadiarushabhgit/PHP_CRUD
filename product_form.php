<!DOCTYPE html>
<html>

<head>
    <title>Product Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h2>Product Form</h2>
        <form id="productForm" method="post" action="submit_product.php">
            <!-- <div class="form-group">
                <label for="productId">ID:</label>
                <input type="text" class="form-control" id="productId" name="productId" required>
            </div> -->
            <div class="form-group">
                <label for="productName">Name:</label>
                <select class="form-control" name="productName" required>
                    <option value="">Select a product name</option>
                    <option value="Gold Rings">Gold Rings</option>
                    <option value="Diamond Rings">Diamond Rings</option>
                    <option value="Silver Rings">Silver Rings</option>
                    <option value="Gold Bracelet">Gold Bracelet</option>
                    <option value="Diamond Bracelet">Diamond Bracelet</option>
                    <option value="Silver Bracelet">Silver Bracelet</option>
                </select>
            </div>
            <div class="form-group">
                <label for="productCategory">Category:</label>
                <select class="form-control" name="productCategory" required>
                    <option value="">Select a product category</option>
                    <option value="category1">category1</option>
                    <option value="category2">category2</option>
                    <option value="category3">category3</option>
                    <option value="category4">category4</option>
                </select>
            </div>
            <div class="form-group">
                <label for="productSKU">SKU:</label>
                <input type="text" class="form-control" id="productSKU" name="productSKU" required>
            </div>
            <div class="form-group">
                <label for="productImage">Image:</label>
                <input type="file" class="form-control" id="productImage" name="productImage">
            </div>
            <div class="form-group">
                <label for="productPrice">Price:</label>
                <input type="text" class="form-control" id="productPrice" name="productPrice" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="index2.php" class="btn btn-secondary">View</a>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#productForm').submit(function (event) {
                var isValid = true;

                // Remove previous error messages
                $('.error').remove();

                // Validate product name
                var productName = $('#productName').val();
                if (productName === '') {
                    $('#productName').after('<span class="error">Please select a product name</span>');
                    isValid = false;
                }

                // Validate product category
                var productCategory = $('#productCategory').val();
                if (productCategory === '') {
                    $('#productCategory').after('<span class="error">Please select a product category</span>');
                    isValid = false;
                }

                // Validate SKU
                var productSKU = $('#productSKU').val();
                if (productSKU === '') {
                    $('#productSKU').after('<span class="error">Please enter a SKU</span>');
                    isValid = false;
                }

                // Validate price
                var productPrice = $('#productPrice').val();
                if (productPrice === '') {
                    $('#productPrice').after('<span class="error">Please enter a price</span>');
                    isValid = false;
                }

                if (!isValid) {
                    event.preventDefault(); // Prevent form submission if validation fails
                }
            });
        });
    </script>
</body>

</html>
