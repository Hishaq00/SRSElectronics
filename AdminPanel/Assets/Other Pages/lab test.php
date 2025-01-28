<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: /SRSElectrical/login.php");
    exit();
}
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Lab Test</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Big+Shoulders+Display:wght@700&display=swap" rel="stylesheet">
    <link href="images/Others/icon.png" rel="icon">

    <style>
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
        width: 200px;
      }
      #div1 {
        transition-timing-function: ease;
      }
    </style>
  </head>

  <body>
    <?php include('lab sidenav.php'); ?>

    <div id="content" class="p-4 p-md-5 pt-5">
      <br>
      <div class="hover container" id="div1">
        <h2 class="mb-4" style="font-family: 'Big Shoulders Display', cursive; font-weight: 400; letter-spacing: 2px; text-align: center;">Process</h2>
      </div>
      <br>

      <table class="table container">
        <thead>
          <tr>
            <th>ID</th>
            <th>Product NAME</th>
            <th>Test's ID</th>
            <th>Product Quantity</th>
            <th>Status</th>
            <th>Test</th>
          </tr>
        </thead>
        <tbody>
        <?php
        include('connect.php');

        $query = "
          SELECT 
              tg.testing_id,
              tg.testing_performed,
              tg.prod_id,
              p.prod_name,
              p.product_code,
              p.prod_status 
          FROM 
              products p 
          INNER JOIN 
              testing tg 
          ON 
              p.prod_id = tg.prod_id 
          WHERE 
              p.prod_status IN ('SENT', 'RESENT')
        ";

        $res = mysqli_query($con, $query);

        if (!$res) {
            echo "Error: " . mysqli_error($con);
            exit;
        }

        while ($row = mysqli_fetch_assoc($res)) {
        ?>
          <tr>
            <td><?= htmlspecialchars($row['prod_id']) ?></td>
            <td><?= htmlspecialchars($row['prod_name']) ?></td>
            <td><?= htmlspecialchars($row['testing_id']) ?></td>
            <td><?= htmlspecialchars($row['product_code']) ?></td>
            <td><?= htmlspecialchars($row['prod_status']) ?></td>
            <td>
              <form action="dataaccess.php?id=<?= htmlspecialchars($row['prod_id']) ?>" method="post">
      
                <input class="btn btn-info" type="submit" name="btn_TestProduct" value="Test"/>
              </form>
            </td>
          </tr>
        <?php
        }

        mysqli_close($con);
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
