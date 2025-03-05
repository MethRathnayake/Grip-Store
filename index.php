    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin | User Management</title>



        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">




    </head>

    <body onload="productLoad(0);">

        <!-- header -->
        <?php include "NavBar.php";
        include "connection.php";
        ?>
        <!-- header -->

        <!-- body -->






        <br>
        <!-- basic search -->

        <div class="container d-flex justify-content-center">
            <div class="col-10 col-md-5 mt-1">
                <input type="text" class="form-control" placeholder="Type here to search Product" onkeyup="basicSearch(0);" id="inputData">
            </div>

            <div class="btn-group ms-2" role="group">


                <button type="button" class="btn btn-outline-secondary mt-1" onclick="viewFilter();" style="padding: 0.25rem 0.5rem;">
                    <img src="Resorces/filter.png" class="img-fluid" style="height: 20px;" alt="">
                </button>
            </div>
        </div>




        <!-- basic search -->



        <!-- advanced search -->
<div class="d-none" id="filterId">
    <div class="border border-light rounded-5 mt-3 p-3 mx-auto" style="max-width: 600px;">
        <div class="row g-3">
            <!-- Brand -->
            <div class="col-12 col-md-6">
                <label class="form-label fw-bold fs-5">Brand:</label>
                <select id="brand" name="" class="form-select">
                    <option value="0">Select the Brand</option>
                    <?php
                    $rs1 = Database::search("SELECT * FROM `brand` ");
                    $num = $rs1->num_rows;
                    for ($i = 0; $i < $num; $i++) {
                        $d1 = $rs1->fetch_array();
                    ?>
                        <option value="<?php echo ($d1["brand_id"]) ?>"><?php echo ($d1["brand_name"]) ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <!-- Category -->
            <div class="col-12 col-md-6">
                <label class="form-label fw-bold fs-5">Category:</label>
                <select id="category" name="" class="form-select">
                    <option value="0">Select the Category</option>
                    <?php
                    $rs2 = Database::search("SELECT * FROM category");
                    $num2 = $rs2->num_rows;
                    for ($i = 0; $i < $num2; $i++) {
                        $d2 = $rs2->fetch_array();
                    ?>
                        <option value="<?php echo ($d2["category_id"]) ?>"><?php echo ($d2["category_name"]) ?></option>
                    <?php } ?>
                </select>
            </div>
            <!-- Color -->
            <div class="col-12 col-md-6">
                <label class="form-label fw-bold fs-5">Color:</label>
                <select id="color" name="" class="form-select">
                    <option value="0">Select the Color</option>
                    <?php
                    $rs3 = Database::search("SELECT * FROM color");
                    $num3 = $rs3->num_rows;
                    for ($i = 0; $i < $num3; $i++) {
                        $d3 = $rs3->fetch_array();
                    ?>
                        <option value="<?php echo ($d3["color_id"]) ?>"><?php echo ($d3["color_name"]) ?></option>
                    <?php } ?>
                </select>
            </div>
            <!-- Product Type -->
            <div class="col-12 col-md-6">
                <label class="form-label fw-bold fs-5">Product Type:</label>
                <select id="product_type" name="" class="form-select">
                    <option value="0">Select the Product Type</option>
                    <?php
                    $rs4 = Database::search("SELECT * FROM `product_type`");
                    $num4 = $rs4->num_rows;
                    for ($i = 0; $i < $num4; $i++) {
                        $d4 = $rs4->fetch_array();
                    ?>
                        <option value="<?php echo ($d4["product_type_id"]) ?>"><?php echo ($d4["product_type"]) ?></option>
                    <?php } ?>
                </select>
            </div>
            <!-- Min Price -->
            <div class="col-12 col-md-6">
                <label class="form-label fw-bold fs-5">Min Price:</label>
                <input type="number" id="min" placeholder="Type Your Min Price" class="form-control">
            </div>
            <!-- Max Price -->
            <div class="col-12 col-md-6">
                <label class="form-label fw-bold fs-5">Max Price:</label>
                <input type="number" id="max" placeholder="Type Your Max Price" class="form-control">
            </div>
        </div>
        <div class="text-center mt-3">
            <button onclick="advanceSearch(0);" class="btn btn-primary col-6 col-md-2">Search</button>
        </div>
    </div>
</div>
<!-- advanced search -->





        <!-- body(product loading) -->
        <div class="bg-white">
            <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
                <h2 class="text-2xl font-bold tracking-tight text-gray-900">Explore Popular Products</h2>

                <div id="pid" class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                    
                    <!-- More products can go here -->

                    <!-- Pagination -->
                    
                </div>
            </div>
        </div>
        <!-- body(product loading) -->










        <!-- body -->








        <!-- footer -->
        <div class="fixed-bottom col-12">
            <p class="text-center">2025 gripstore.lk || All Right Reserved &copy;</p>
        </div>
        <!-- footer -->

        <script src="https://cdn.tailwindcss.com"></script>
        <script src="script.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    </body>

    </html>