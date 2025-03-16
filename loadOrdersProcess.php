<?php

session_start();
include "connection.php";

$user = $_SESSION["u"];

$q = "SELECT * FROM `orders` INNER JOIN `stock` ON `orders`.stock_id = `stock`.stock_id INNER JOIN `product` ON 
`product`.product_id = `stock`.product_id INNER JOIN `brand` ON `product`.brand_id = `brand`.brand_id
INNER JOIN `category` ON `product`.category_id = `category`.category_id INNER JOIN `product_type` ON
`product_type`.product_type_id = `product`.product_type_id INNER JOIN `order_status` ON 
`orders`.order_status_id = `order_status`.id WHERE `orders`.user_id = '" . $user["id"] . "' ";



$rs = Database::search($q);
$num = $rs->num_rows;

if ($num > 0) {
    for ($i = 0; $i < $num; $i++) {
        $d = $rs->fetch_assoc();

        //color
        $status = $d["status"];
        $badgeClass = 'bg-secondary';
        $precentage = 100;

        switch ($status) {
            case 'Order Placed':
                $badgeClass = 'bg-warning';
                $precentage = 20;
                break;
            case 'Processing':
                $badgeClass = 'bg-info';
                $precentage = 40;
                break;
            case 'Shipped':
                $badgeClass = 'bg-primary';
                $precentage = 60;
                break;
            case 'Out for Delivery':
                $badgeClass = 'bg-warning';
                $precentage = 80;
                break;
            case 'Delivered':
                $badgeClass = 'bg-success';
                $precentage = 100;
                break;
        }
        //color
?>

        <div class="card p-3 mb-3">
            <div class="row">
                <div class="col-md-3 d-flex align-items-center justify-content-center">
                    <img src="<?php echo $d["path"] ?>" class="img-fluid" alt="Product Image" style="height: 250px; border-radius: 10px;">
                </div>
                <div class="col-md-9">
                    <h5 class="mt-3">Product Name: <?php echo $d["product_name"] ?></h5>
                    <p><strong>Brand:</strong> <?php echo $d["brand_name"] ?> | <strong>Category:</strong> <?php echo $d["category_name"] ?> | <strong>Product Type:</strong> <?php echo $d["product_type"] ?></p>
                    <p>QTY: <?php echo $d["order_qty"] ?></p>
                    <p>Price: Rs.<?php echo ($d["price"] * $d["order_qty"]) ?></p>
                    <p>Status: <span class="badge <?php echo $badgeClass ?>"><?php echo $d["status"] ?></span></p>
                    <p>Shipping Progress:</p>
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped <?php echo $badgeClass ?>" role="progressbar" style="width: <?php echo $precentage ?>%" aria-valuenow="<?php echo $precentage ?>" aria-valuemin="0" aria-valuemax="100"><?php echo $precentage ?>%</div>
                    </div>
                </div>
            </div>
        </div>

    <?php

    }
} else {
    ?>
    <div id="noOrdersMessage" class="text-center my-5">
        <img src="https://cdn-icons-png.flaticon.com/512/2748/2748558.png" alt="Empty Box" width="150">
        <h3 class="mt-3 text-secondary">No Orders Yet</h3>
        <p class="text-muted">Looks like you haven't placed any orders. Start shopping now!</p>
        <a href="index.php" class="btn btn-primary mt-3">Go to Home</a>
    </div>
<?php
}



?>


<?php



?>