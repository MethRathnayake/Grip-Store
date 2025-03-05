<?php
session_start();
if (isset($_SESSION["a"])) {

    include "connection.php"
?>

    <!DOCTYPE html>
    <html lang="en" data-bs-theme="dark">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin | Stock Management</title>

        <link rel="stylesheet" href="./lib/bootstrap.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">


        <link rel="icon" href="./Resorces/icon.ico" type="image/x-icon">
    </head>

    <body class="adminUser">

        <!-- header -->
        <?php include "adminNavBar.php"; ?>
        <!-- header -->

        <!-- body -->
        <div style="margin-top: 5%;">

            <div class="row p-5 mt-5">
                <!-- Product Management -->
                <div class="row col-lg-5 col-md-6 col-12 offset-lg-1 mb-5">
                    <h2 class="text-center">Product Management</h2>

                    <div class="mt-3">
                        <label class="form-label">Product Name: </label>
                        <input class="form-control" type="text" id="pname">
                    </div>

                    <!-- Brand -->
                    <div class="mt-3 col-12 col-md-6">
                        <label class="form-label">Brand Name: </label>
                        <select class="form-select" id="bname">
                            <?php

                            $rs = Database::search("SELECT * FROM brand");
                            $num = $rs->num_rows;

                            for ($i = 0; $i < $num; $i++) {
                                $d = $rs->fetch_assoc();

                            ?>

                                <option value="<?php echo ($d["brand_id"])  ?>"><?php echo ($d["brand_name"])  ?></option>

                            <?php
                            }

                            ?>

                        </select>
                    </div>

                    <!-- Category -->
                    <div class="mt-3 col-12 col-md-6">
                        <label class="form-label">Category Name: </label>
                        <select class="form-select" id="cname">
                        <?php

$rs = Database::search("SELECT * FROM category");
$num = $rs->num_rows;

for ($i = 0; $i < $num; $i++) {
    $d = $rs->fetch_assoc();

?>

    <option value="<?php echo ($d["category_id"])  ?>"><?php echo ($d["category_name"])  ?></option>

<?php
}

?>

                        </select>
                    </div>

                    <!-- Product Type -->
                    <div class="mt-3 col-12 col-md-6">
                        <label class="form-label">Product Type: </label>
                        <select class="form-select" id="product_type">
                        <?php

$rs = Database::search("SELECT * FROM product_type");
$num = $rs->num_rows;

for ($i = 0; $i < $num; $i++) {
    $d = $rs->fetch_assoc();

?>

    <option value="<?php echo ($d["product_type_id"])  ?>"><?php echo ($d["product_type"]) ?></option>
<?php
}




?>
                        </select>
                    </div>

                    <!-- Colors -->
                    <div class="mt-3 col-12 col-md-6">
                        <label class="form-label">Colors: </label>
                        <select class="form-select" id="color">
                        <?php

$rs = Database::search("SELECT * FROM color");
$num = $rs->num_rows;

for ($i = 0; $i < $num; $i++) {
    $d = $rs->fetch_assoc();

?>

    <option value="<?php echo ($d["color_id"])  ?>"><?php echo ($d["color_name"]) ?></option>
<?php
}




?>
                        </select>
                    </div>

                    <!-- Description -->
                    <div class="mt-3">
                        <label class="form-label">Description: </label>
                        <input class="form-control" type="text" id="des" required>
                    </div>

                    <!-- Image -->
                    <div class="mt-3">
                        <label class="form-label">Choose Image: </label>
                        <input class="form-control" type="file" id="img" required>
                    </div>

                    <div class="mt-4 col-12 d-none" id="altDiv" role="alert">
                        <div id="altMsg"></div>
                    </div>

                    <!-- Register Button -->
                    <div class="mt-3 d-flex justify-content-center">
                        <button class="btn btn-outline-warning col-12" onclick="productRegister();">Register Product</button>
                    </div>
                </div>

                <!-- Stock Management -->
                <div class="row col-lg-5 col-md-6 col-12 mb-5">
                    <h2 class="text-center">Stock Management</h2>

                    <!-- Registered Product -->
                    <div class="mt-3">
                        <label for="" class="form-label">Registered Product:</label>
                        <select class="form-select" id="loadProduct">
                        <?php
                            $rs = Database::search("SELECT * FROM product");
                            $num = $rs->num_rows;

                            for($i = 0; $i<$num ; $i++){
                                $d= $rs->fetch_assoc();
                                ?>

                                <option value="<?php echo($d["product_id"]) ?>"><?php echo($d["product_name"]) ?></option>

                                <?php
                            }
                        
                        ?>
                        </select>
                    </div>

                    <!-- Quantity -->
                    <div class="mt-3">
                        <label class="form-label">QTY: </label>
                        <input class="form-control" type="text" id="qty" required>
                    </div>

                    <!-- Unit Price -->
                    <div class="mt-3">
                        <label class="form-label">Unit Price: </label>
                        <input class="form-control" type="text" id="price" required>
                    </div>

                    <div class="alert alert-danger col-12 d-none mt-3" id="altDiv1">
                        <div id="altMsg1"></div>
                    </div>

                    <!-- Update Button -->
                    <div class="mt-3 d-flex justify-content-center">
                        <button class="btn btn-outline-primary col-12" style="height: 40px;" onclick="stock();">Update Product</button>
                    </div>
                </div>
            </div>

        </div>



        <!-- body -->

        <!-- footer -->

        <div class="fixed-bottom col-12">
            <p class="text-center">2025 gripstore.lk || All Right Reserved &copy;</p>
        </div>
        <!-- footer -->


        <script src="script.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>




    </body>

    </html>







<?php
} else {
    include "admin_error.php";
}

?>