<?php

session_start();
include "connection.php";

//catch the login user from session data
$user = $_SESSION["u"];

$netTotal = 0;


$q = "SELECT * FROM `cart`
        INNER JOIN `stock` ON `cart`.stock_id = `stock`.stock_id
        INNER JOIN `product` ON `product`.product_id = `stock`.product_id
        INNER JOIN `brand` ON `product`.brand_id = `brand`.brand_id 
        INNER JOIN `category` ON `category`.category_id = `product`.category_id
        INNER JOIN `product_type` ON `product_type`.`product_type_id` = `product`.`product_type_id` 
        INNER JOIN `color` ON `color`.color_id = `product`.color_id
        WHERE `cart`.user_id = '" . $user["id"] . "' ";

$rs = Database::search($q);
$num = $rs->num_rows;


?><div class="col-12 col-md-8"> <?php

if ($num > 0) {
    //already have in cart

    for ($i = 0; $i < $num; $i++) {
        //get result in card rows
        $d = $rs->fetch_assoc();

        //get total in same product
        $total = $d["price"] * $d["cart_qty"];

        //update full total
        $netTotal += $total;


?>


        

        
            <div class="border p-3 rounded d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-3">
                <div class="d-flex flex-column flex-md-row align-items-center mb-3 mb-md-0">
                    <img src="<?php echo $d["path"] ?>" style="height: 150px; max-width: 100%;" alt="Nomad Tumbler White" class="img-fluid me-md-3">
                    <div class="text-center text-md-start">
                        <h5 class="mb-1"><?php echo $d["product_name"] ?></h5>
                        <p class="mb-0"><?php echo $d["brand_name"] ?> | <?php echo $d["product_type"] ?> | <?php echo $d["color_name"] ?></p>
                    </div>
                </div>
                <div class="d-flex flex-wrap justify-content-center justify-content-md-end align-items-center gap-2">
                    <div class="d-flex align-items-center">
                        <button class="btn btn-outline-secondary btn-sm" onclick="decrementCartQty('<?php echo $d['cart_id'] ?>');">-</button>
                        <input type="number" class="form-control form-control-sm text-center mx-2"
                            id="qty<?php echo $d['cart_id'] ?>"
                            value="<?php echo $d["cart_qty"] ?>"
                            style="width: 60px;" value="1" disabled>
                        <button class="btn btn-outline-secondary btn-sm" onclick="incrementCartQty('<?php echo $d['cart_id'] ?>');">+</button>
                    </div>
                    <button class="btn btn-danger btn-sm" onclick="removeCart('<?php echo $d['cart_id'] ?>');">X</button>
                    <p class="mb-0 fs-5 fw-bold"> Rs: <?php echo $total ?> </p>
                </div>
            </div>
        


    <?php
    } ?>



</div>
    


    <!-- Order Summary -->
    <div class="col-12 col-md-4">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Order Summary</h5>
            <div class="d-flex justify-content-between mb-2">
                <span>Subtotal</span>
                <span>Rs. <?php echo $netTotal ?></span>
            </div>
            <div class="d-flex justify-content-between mb-2">
                <span>Shipping estimate</span>
                <span>Rs. 500</span>
            </div>
            <div class="d-flex justify-content-between align-items-center mb-3">
                <span>Coupon</span>
                <div class="input-group" style="max-width: 200px;">
                    <input type="text" class="form-control" placeholder="Coupon Code" aria-label="Coupon Code">
                    <button class="btn btn-outline-success" type="button">Apply</button>
                </div>
            </div>
            <div class="d-flex justify-content-between fw-bold mb-4">
                <span>Order total</span>
                <span>Rs. <?php echo $netTotal + 500 ?>.00</span>
            </div>
            <button class="btn btn-primary w-100" onclick="checkout();">Checkout</button>
        </div>
    </div>
</div>

<?php
} else {
?>
    <div class="text-center mt-5 col-12">
        <img src="Resorces/delete_cart.png" height="100px" alt="">
        <h2 class="mb-3 mt-4">Your cart is empty. Continue shopping to explore more.</h2>
        <button class="btn btn-outline-info" style="border-radius: 20px;">Start Shopping</button>
    </div>

<?php
}





?>