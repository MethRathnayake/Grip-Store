<?php

include "connection.php";

session_start();
if (isset($_SESSION["a"])) {

    //load all users from database
    $rs = Database::search("SELECT * FROM stock s
                    JOIN product p ON s.product_id = p.product_id");
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

    
        <div class="container mt-3">
            <a href="adminReport.php">
                <img src="Resorces/back.png" id="backbtn" height="50px" class="mt-3" alt="">
            </a>

            <div>
                <h1 class="text-center">Stock Report</h1>


                <!-- table -->

                <table class="table table-striped table-hover mt-5">
                    <thead>
                        <th class="fs-5 text-info">Stock ID</th>
                        <th class="fs-5 text-info">Product Name</th>
                        <th class="fs-5 text-info">QTY</th>
                        <th class="fs-5 text-info">Price</th>
                        <th class="fs-5 text-info">Status</th>
                        
                    </thead>

                    <tbody>

                        <?php

                        for ($i = 0; $i < $num; $i++) {
                            $d = $rs->fetch_assoc();


                        ?>


                            <tr>
                                <td><?php echo $d["stock_id"] ?></td>
                                <td><?php echo $d["product_name"] ?></td>
                                <td><?php echo $d["qty"] ?></td>
                                <td><?php echo $d["price"] ?></td>
                                <td><?php echo $d["status_id"] ?></td>
                               

                            </tr>

                        <?php
                        }
                        ?>


                    </tbody>
                </table>

                <!-- table -->

            </div>

                        <!-- button -->

                        <div class="container justify-content-end d-flex mt-5 mb-5">
                            <button id="printbtn" class="btn btn-outline-danger col-2" onclick="printpage();">Print</button>
                        </div>

                        <!-- button -->



        </div>









        <!-- footer -->
        <div class="fixed-bottom col-12">
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