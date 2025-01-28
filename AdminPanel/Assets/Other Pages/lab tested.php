<?php
session_start();
if(isset($_SESSION['username']))
{

}
else
{
    header("Location: \SRSElectrical/login.php");
}
?>
<!doctype html>
<html lang="en">
  <head>
  	<title>Lab Tested</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Big+Shoulders+Display:wght@700&display=swap" rel="stylesheet">
    <link href="images/Others/icon.png" rel="icon">

<style>
.hover
{
  background:white;
  width:100%;
}
.hover:hover
{
  background: #74ebd5; 
  background: -webkit-linear-gradient(to right, #74ebd5, #acb6e5); 
  background: linear-gradient(to right, #74ebd5, #acb6e5);
  border-radius:20px;
  transition: width 2s;
  width:340px;
}
#div1
{
  transition-timing-function: ease;
}
</style>

  </head>
  <body>
    <?php
    include ('lab sidenav.php');
    ?>
    <div id="content" class="p-4 p-md-5 pt-5">
    <br>
    <div class="hover" id="div1">
        <h2 class="mb-4" style="font-family:Arial, Helvetica, sans-serif;font-weight:400;letter-spacing:2px;">Lab Tested Products</h2>
        </div>
        <br>
<table class="table container">
    <thead>
        <tr>
            <th>ID</th>
            <th>Product NAME</th>
            <th>Product code</th>
            <th>Product revision</th>
            <th>Manufacturing no</th>
            <th>Status</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
<?php 
include ('connect.php');
$res = mysqli_query($con,"SELECT * FROM products WHERE prod_status='Pass'");
while($row = mysqli_fetch_array($res))
{
?>
<tr>
<td><?= $row['prod_id'] ?></td>
<td><?=$row['prod_name']?></td>
<td><?=$row['product_code']?></td>
<td><?=$row['product_revision']?></td>
<td><?=$row['manufacturing_no']?></td>
<td><?=$row['prod_status']?></td>
</tr>
<?php
}       
?>
   </tbody>
</table>
      </div>
		</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>

