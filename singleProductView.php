<?php 

session_start();

include "connection.php";

$stock_id = $_GET["s"];

$q = "SELECT * FROM `stock` INNER JOIN `product` ON `stock`.product_id = `product`.product_id INNER JOIN 
`brand` ON `product`.brand_id = `brand`.brand_id INNER JOIN `category` ON `product`.category_id = `category`.category_id 
INNER JOIN `product_type` ON `product_type`.product_type_id = `product`.product_type_id INNER JOIN 
`color` ON `product`.color_id = `color`.color_id WHERE `stock`.stock_id = '".$stock_id."' " ;

 $rs = Database::search($q);
 $d = $rs->fetch_assoc();



?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $d["product_name"] ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

</head>
<body>


<?php
include "navbar.php";

?>

<!-- Breadcrumb -->
<nav class="mt-5 ms-4" aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><?php echo $d["brand_name"] ?><a href="#"></a></li>
    <li class="breadcrumb-item"><a href="#"><?php echo $d["category_name"] ?></a></li>
    <li class="breadcrumb-item"><a href="#"><?php echo $d["product_type"] ?></a></li>

    <li class="breadcrumb-item active" aria-current="page"><?php echo $d["product_name"] ?></li>
  </ol>
</nav>

<!-- Product Section -->
<div class="container my-5">
  <div class="row">
    <!-- Product Image -->
    <div class="col-md-6">
      <img src="<?php echo $d["path"] ?>" style="height: 500px;" alt="Product Image" class="img-fluid rounded shadow-sm">
    </div>
    
    <!-- Product Details -->
    <div class="col-md-6">
      <h1 class="display-4 mt-5"><?php echo $d["product_name"] ?></h1>
      <p class="text-muted"><?php echo $d["description"] ?>.</p>

      <h3 class="text-success mt-3 display-5">Rs.<?php echo number_format($d["price"]); ?></h3>
      
       <!-- Product Info (Brand, Category, Product Type, Color) -->
<div class="my-4">
  <h5 class="text-center mb-3">Product Information</h5>
  <ul class="list-group list-group-flush">
    <li class="list-group-item d-flex justify-content-between align-items-center">
      <strong>Brand:</strong>
      <span class="text-muted"><?php echo $d["brand_name"] ?></span>
    </li>
    <li class="list-group-item d-flex justify-content-between align-items-center">
      <strong>Category:</strong>
      <span class="text-muted"><?php echo $d["category_name"] ?></span>
    </li>
    <li class="list-group-item d-flex justify-content-between align-items-center">
      <strong>Product Type:</strong>
      <span class="text-muted"><?php echo $d["product_type"] ?></span>
    </li>
    <li class="list-group-item d-flex justify-content-between align-items-center">
      <strong>Color:</strong>
      <span class="text-muted"><?php echo $d["color_name"] ?></span>
    </li>
  </ul>
</div>

      
      <!-- Buttons (Add to Watchlist, Buy Now, Add to Cart) -->
      <div class="d-grid gap-2 d-md-block my-4 pt-3">
        <button class="btn btn-outline-primary btn-lg">Add to Watchlist</button>
        <button class="btn btn-success btn-lg">Buy Now</button>
        <button class="btn btn-primary btn-lg">Add to Cart</button>
      </div>
    </div>
  </div>
</div>


    <script src="https://cdn.tailwindcss.com"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
