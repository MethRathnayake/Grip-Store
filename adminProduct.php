<?php
session_start();
if (isset($_SESSION["a"])) {
?>

    <!DOCTYPE html>
    <html lang="en" data-bs-theme="dark">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin | Product Management</title>
        <link rel="stylesheet" href="style.css">
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
<div class="container pb-2">
    <h2 class="text-center mb-4 pt-3">Product Management</h2>

    <!-- brand -->
    <div class="row mt-5 pt-5">
        <div class="col-12 col-md-5 col-lg-4 offset-md-1">
            <label for="brand" class="fw-bold">Brand</label>
            <input type="text" class="form-control rounded-3 mt-1 fw-semibold mb-2" placeholder="Register New Brand" id="brand">
            <div class="d-none mt-2" id="brandAlertDiv">
                <div class="alert alert-danger" id="brandAlert">Alert</div>
            </div>
            <button class="btn btn-outline-secondary w-100" onclick="brand();">Brand Register</button>
        </div>

        <!-- color -->
        <div class="col-12 col-md-5 col-lg-4 offset-md-1 mt-4 mt-md-0">
            <label for="color" class="fw-bold">Color</label>
            <input type="text" class="form-control rounded-3 mt-1 fw-semibold mb-2" placeholder="Register New Color" id="color">
            <div class="d-none mt-2" id="colorAlertDiv">
                <div class="alert alert-danger" id="colorAlert">Alert</div>
            </div>
            <button class="btn btn-outline-secondary w-100" onclick="color();">Color Register</button>
        </div>
    </div>
    <!-- brand and color -->

    <div class="row mt-5">
        <!-- size -->
        <div class="col-12 col-md-5 col-lg-4 offset-md-1">
            <label for="size" class="fw-bold">Product Type</label>
            <input type="text" class="form-control rounded-3 mt-1 fw-semibold mb-2" placeholder="Register New Product type" id="product_type">
            <div class="d-none mt-2" id="sizeAlertDiv">
                <div class="alert alert-danger" id="sizeAlert">Alert</div>
            </div>
            <button class="btn btn-outline-secondary w-100" onclick="product_type();">Product type Register</button>
        </div>

        <!-- category -->
        <div class="col-12 col-md-5 col-lg-4 offset-md-1 mt-4 mt-md-0">
            <label for="category" class="fw-bold">Category</label>
            <input type="text" class="form-control rounded-3 mt-1 fw-semibold mb-2" placeholder="Register New Category" id="category">
            <div class="d-none mt-2" id="categoryAlertDiv">
                <div class="alert alert-danger" id="categoryAlert">Alert</div>
            </div>
            <button class="btn btn-outline-secondary w-100 mb-5" onclick="category();">Category Register</button>
        </div>
    </div>
    <!-- size and category -->
</div>
<!-- body -->



        <!-- footer -->

        <div class="fixed-bottom mt-5 col-12">
            <p class="text-center">2025 gripstore.lk  || All Right Reserved &copy;</p>
        </div>
        <!-- footer -->


        <script src="script.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


    </body>

    </html>







<?php
} else {
    include "admin_error.php";
}

?>