<?php
include "connection.php";

session_start();

if (isset($_SESSION["a"])) {
    $rs = Database::search("SELECT * FROM product p
                                JOIN brand b ON p.brand_id = b.brand_id
                                JOIN product_type s ON p.product_type_id = s.product_type_id
                                JOIN category c ON p.category_id = c.category_id
                                JOIN color co ON p.color_id = co.color_id ORDER BY `product_id` ASC;");

    $num = $rs->num_rows;
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | User Management</title>

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="./lib/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>

    <div class="container-fluid mt-4">
        <a href="adminReport.php" class="d-block mb-3">
            <img src="Resorces/back.png" id="backbtn" height="50px" class="mt-3" alt="">
        </a>

        <h1 class="text-center">Product Report</h1>

        <!-- table -->
        <div class="table-responsive mt-5">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th class="fs-5 text-info">Product ID</th>
                        <th class="fs-5 text-info">Product Name</th>
                        <th class="fs-5 text-info">Brand Name</th>
                        <th class="fs-5 text-info">Category</th>
                        <th class="fs-5 text-info">Product Type</th>
                        <th class="fs-5 text-info">Color</th>
                        <th class="fs-5 text-info">Product Image</th>
                    </tr>
                </thead>

                <tbody>
                    <?php for ($i = 0; $i < $num; $i++) { 
                        $d = $rs->fetch_assoc(); ?>
                        <tr>
                            <td><?php echo $d["product_id"] ?></td>
                            <td><?php echo $d["product_name"] ?></td>
                            <td><?php echo $d["brand_name"] ?></td>
                            <td><?php echo $d["category_name"] ?></td>
                            <td><?php echo $d["product_type"] ?></td>
                            <td><?php echo $d["color_name"] ?></td>
                            <td><img src="<?php echo $d['path']; ?>" alt="Image" class="img-fluid" style="width:100px; height:auto;"></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <!-- table -->

        <!-- button -->
        <div class="container justify-content-end d-flex mt-5 mb-5">
            <button id="printbtn" class="btn btn-outline-danger col-6 col-md-2" onclick="printpage();">Print</button>
        </div>
        <!-- button -->

    </div>

    <!-- footer -->
    <div class="fixed-bottom col-12 bg-dark text-light py-2">
        <p class="text-center mb-0">2025 gripstore.lk  || All Right Reserved &copy;</p>
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
