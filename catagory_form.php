<!DOCTYPE html>
<html>

<head>
    <title>Category Form</title>
    <style>
        * {
            box-sizing: border-box;
           
        
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
           
            margin: 40px;
            padding: 0;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 50px 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        select,
        input[type="text"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }

        button[type="submit"],
        a.btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            font-size: 14px;
        }

        a.btn-secondary {
            background-color: #6c757d;
            margin-left: 10px;
        }

        button[type="submit"]:hover,
        a.btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Category Form</h2>
        <form id="categoryForm" method="post" action="submit_category.php">
            <!-- <div class="form-group">
                <label for="categoryId">ID:</label>
                <input type="text" id="categoryId" name="categoryId" required>
            </div> -->
            <div class="form-group">
                <label for="categoryName">Name:</label>
                <select name="categoryName" required>
                    <option value="Electronics">Electronics</option>
                    <option value="Clothing">Clothing</option>
                    <option value="Home Decor">Home Decor</option>
                    <option value="Books">Books</option>
                    <option value="Sports">Sports</option>
                </select>
            </div>
            <div class="form-group">
                <label for="categoryStatus">Status:</label>
                <select id="categoryStatus" name="categoryStatus" required>
                    <option value="In Stock">In stock</option>
                    <option value="Out Of Stock">Out Of stock</option>
                </select>
            </div>
            <button type="submit">Submit</button>
            <a href="index1.php" class="btn btn-secondary">View</a>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script>
    $(document).ready(function () {
        $("#categoryForm").validate({
            rules: {
                categoryName: {
                    required: true
                }
            },
            messages: {
                categoryName: {
                    required: "Please select a category name"
                }
            },
            errorPlacement: function (error, element) {
                error.insertAfter(element);
            },
            highlight: function (element) {
                $(element).addClass("is-invalid");
            },
            unhighlight: function (element) {
                $(element).removeClass("is-invalid");
            },
            submitHandler: function (form) {
                form.submit();
            }
        });
    });
</script>

</body>

</html>
