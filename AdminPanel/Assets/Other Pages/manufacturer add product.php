<?php
session_start();
include('connect.php'); // Ensure this file contains your DB connection code
//For Adding Products
if (isset($_POST['btn_addproduct'])) {
  $productCode = mysqli_real_escape_string($con, $_POST['product_code']);
  $productName = mysqli_real_escape_string($con, $_POST['product_name']);
  $productRevision = mysqli_real_escape_string($con, $_POST['product_revision']);
  $categoryId = mysqli_real_escape_string($con, $_POST['category_id']);
  $manufacturingNo = mysqli_real_escape_string($con, $_POST['manufacturing _no']); 
  $productId = rand(111111111, 999999999);
  if ($query = mysqli_query($con, "INSERT INTO products (`prod_id`, `product_code`, `prod_name`, `product_revision`, `cat_id`, `manufacturing _no`, `prod_status`) VALUES ('$productId', '$productCode', '$productName', '$productRevision', '$categoryId', '$manufacturingNo', 'Untested')")) {
    echo"<script>alert('product added successfully')</script>";
      header("Location: manufacturer add product.php");
      exit();
  } else {
      echo "Error: " . mysqli_error($con);
  }
}
?>
<!doctype html>
<html lang="en">
<head>
    <title>Admin Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="images/Others/icon.png" rel="icon">

    <link href="https://fonts.googleapis.com/css2?family=Big+Shoulders+Display:wght@700&display=swap" rel="stylesheet">
    <style>
        body {
            background: #f2f2f2;
            font-family: 'Open Sans', sans-serif;
        }

        .wrap {
            width: 30%;
            position: absolute;
            top: 10%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .hover {
            background: white;
            width: 100%;
            border: 1px solid #333;
            border-radius: 20px;
        }

        .hover:hover {
            background: #74ebd5;
            background: -webkit-linear-gradient(to right, #74ebd5, #acb6e5);
            background: linear-gradient(to right, #74ebd5, #acb6e5);
            border-radius: 20px;
            transition: width 3s;
            width: 290px;
        }

        #div1 {
            transition-timing-function: ease;
        }

        /* Additional CSS for Form Styling */
        .form-container {
            background: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-container .form-group label {
            font-weight: 600;
            color: #333;
        }

        .form-container .form-group input[type="text"],
        .form-container .form-group select {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            width: 100%;
            box-sizing: border-box;
        }

        .form-container .btn {
            background: #00B4CC;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .form-container .btn:hover {
            background: #009ab8;
        }
    </style>
</head>
<body>
    <?php include('manufacturer sidenav.php'); ?>
    <div class="wrap"></div>
    <br><br><br>
    <div id="content">
        <br><br><br><br>
        <div class="hover container" id="div1">
            <h2 class="" style="font-family: 'Big Shoulders Display', cursive; font-weight: 400; letter-spacing: 2px; text-align: center;">Add Product</h2>
        </div>
        <br>
        <div class="form-container container">
            <form method="post">
                <div class="form-group">
                    <label for="product_code">Product Code:</label>
                    <input type="text" placeholder="Product Code" name="product_code" required />
                </div>
                <div class="form-group">
                    <label for="product_name">Product Name:</label>
                    <input type="text" placeholder="Product Name" name="product_name" required />
                </div>
                <div class="form-group">
                    <label for="product_revision">Product Revision:</label>
                    <input type="text" placeholder="Product Revision" name="product_revision" required />
                </div>
                <div class="form-group">
                    <i class="fa fa-pencil"></i>
                    <select name="category_id" required>
                        <option value="">Select category</option>
                        <?php
                        $q = mysqli_query($con, "SELECT * FROM `categories`");
                        while ($cat = mysqli_fetch_array($q)) { ?>
                            <option value="<?php echo $cat[0] ?>"> <?php echo $cat[1] ?> </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="manufacturing _no">Manufacturing Number:</label>
                    <input type="text" placeholder="Manufacturing Number" name="manufacturing _no" required />
                </div>
                <input class="btn btn-info" type="submit" name="btn_addproduct" value="Add Product" />
            </form>
        </div>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
