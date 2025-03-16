<?php
session_start();
if (isset($_SESSION["u"])) {
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders - eCommerce</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body onload="loadOrders();">
    <div class="container my-3">
        <a href="index.php" class="btn btn-secondary">Back to Home</a>
    </div>
    <div class="container mt-4">

        <h2 class="mb-4">My Orders</h2>
        <div id="order_body">
            <!-- body -->
        </div>
        


    </div>

    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php
}else{
    include "loginalert.php";
}


?>