<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="Resorces/icon.ico">
</head>
<body onload="loadCart();">

<?php include "NavBar.php";
        include "connection.php";
        ?>

    <div class="container mt-3 mt-md-5">
        <h1 class="mb-4 mb-md-5 text-center text-md-start">Shopping Cart</h1>

        <div class="row mb-4 g-4" id="cartBody">
            
        </div>
    </div>
    <script src="script.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>
</html>