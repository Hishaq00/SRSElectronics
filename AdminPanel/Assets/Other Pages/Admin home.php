<?php
session_start();
include('connect.php');
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
      .search {
        display: flex;
        margin-bottom: 20px;
      }
      .searchTerm {
        width: 100%;
        border: 3px solid #00B4CC;
        border-right: none;
        padding: 5px;
        height: 36px;
        border-radius: 5px 0 0 5px;
        outline: none;
        color: #9DBFAF;
      }
      .searchTerm:focus {
        color: #00B4CC;
      }
      .searchButton {
        width: 40px;
        height: 36px;
        border: 1px solid #00B4CC;
        background: #00B4CC;
        text-align: center;
        color: #fff;
        border-radius: 0 5px 5px 0;
        cursor: pointer;
        font-size: 20px;
      }
      .searchSelect {
        height: 36px;
        border: 3px solid #00B4CC;
        border-right: none;
        border-radius: 5px 0 0 5px;
        outline: none;
        padding: 5px;
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
      }
      .hover:hover {
        background: #74ebd5;
        background: -webkit-linear-gradient(to right, #74ebd5, #acb6e5);
        background: linear-gradient(to right, #74ebd5, #acb6e5);
        border-radius: 20px;
        transition: width 2s;
        width: 180px;
      }
      #div1 {
        transition-timing-function: ease;
      }
    </style>
  </head>
  <body>
    <?php include('admin nav.php'); ?>
    <div id="content" class="p-4 p-md-5 pt-5">
      <!-- Advanced Search Form -->
      <div class="wrap">
        <form method="GET" class="search">
          <select name="search_by" class="searchSelect">
            <option value="prod_id">Product ID</option>
            <option value="prod_name">Product Name</option>
          </select>
          <input type="text" name="search_term" class="searchTerm" placeholder="Enter search term...">
          <button type="submit" class="searchButton">
            <i class="fa fa-search"></i>
          </button>
        </form>
      </div>
      <br><br><br>
      <div class="hover container" id="div1">
        <b><h2 class="mb-4" style="font-family: 'Big Shoulders Display', cursive; font-weight: 400; letter-spacing: 2px; text-align: center;">Hello Admin</h2></b>
      </div>
      <br>
      <!-- Products Table -->
      <table class="table container">
        <thead>
          <tr>
            <th>ID</th>
            <th>Product Name</th>
            <th>Product Code</th>
            <th>Product Revision</th>
            <th>Manufacturing No</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          $query = "SELECT * FROM products";
          if (isset($_GET['search_term']) && isset($_GET['search_by'])) {
            $searchTerm = mysqli_real_escape_string($con, $_GET['search_term']);
            $searchBy = mysqli_real_escape_string($con, $_GET['search_by']);
            if (!empty($searchTerm) && in_array($searchBy, ['prod_id', 'prod_name'])) {
              $query .= " WHERE $searchBy LIKE '%$searchTerm%'";
            }
          }
          $res = mysqli_query($con, $query);
          while ($row = mysqli_fetch_array($res)) {
            echo "<tr>";
            echo "<td>" . $row['prod_id'] . "</td>";
            echo "<td>" . $row['prod_name'] . "</td>";
            echo "<td>" . $row['product_code'] . "</td>";
            echo "<td>" . $row['product_revision'] . "</td>";
            echo "<td>" . $row['manufacturing_no'] . "</td>";
            echo "<td>" . $row['prod_status'] . "</td>";
            echo "</tr>";
          }
          ?>
        </tbody>
      </table>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>
