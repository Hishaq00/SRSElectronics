<?php
session_start();
include('connect.php'); // Ensure this file contains your DB connection code
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
        .form-container .form-group input[type="password"]{
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
    <?php include('admin nav.php'); ?>
    <div class="wrap"></div>
    <br><br><br>
    <div id="content">
        <br><br><br><br>
        <div class="hover container" id="div1">
            <h2 class="" style="font-family: 'Big Shoulders Display', cursive; font-weight: 400; letter-spacing: 2px; text-align: center;">Register</h2>
        </div>
        <br>
        <div class="form-container container">
        <form method="POST" action="">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="role">Role:</label>
                <input type="text" id="role" name="role" required>
            </div>
            <button type="submit" name="sign" class="btn">Register</button>
        </form>
    </div>

    <?php
    // Handle form submission
    if (isset($_REQUEST['sign'])) {
        // Include your database connection inside the form handling block
        $con = mysqli_connect("localhost", "root", "", "lab");

        // Check connection
        if (!$con) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $name = $_POST['username'];
        $pass = md5($_POST['password']);
        $role = $_POST['role'];

        if (mysqli_query($con, "INSERT INTO users (user_name, user_pass, user_role) VALUES ('$name', '$pass', '$role')")) {
            header("Location: Assets/other Pages/Login.php");
        } else {
            echo "Error: " . $con->error;
        }

        // Close connection
        mysqli_close($con);
    }
    ?>
</body>
</html>
