<?php

include "connection.php";

session_start();
if (isset($_SESSION["a"])) {

    // Load all users from the database
    $rs = Database::search("SELECT * FROM `user`");
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
            <a href="adminReport.php" class="d-block mb-3">
                <img src="Resorces/back.png" id="backbtn" height="50px" class="mt-3" alt="">
            </a>

            <div>
                <h1 class="text-center">User Report</h1>

                <!--  table -->
                <div class="table-responsive mt-5">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th class="fs-6 text-info">User ID</th>
                                <th class="fs-6 text-info">Name</th>
                                <th class="fs-6 text-info">Mobile</th>
                                <th class="fs-6 text-info">Email</th>
                                <th class="fs-6 text-info">Username</th>
                                <th class="fs-6 text-info">Date</th>
                                <th class="fs-6 text-info">Status</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php for ($i = 0; $i < $num; $i++) {
                                $d = $rs->fetch_assoc(); ?>
                                <tr>
                                    <td><?php echo $d["id"]; ?></td>
                                    <td><?php echo $d["name"]; ?></td>
                                    <td><?php echo $d["mobile"]; ?></td>
                                    <td><?php echo $d["email"]; ?></td>
                                    <td><?php echo $d["username"]; ?></td>
                                    <td><?php echo $d["date"]; ?></td>
                                    <td>
                                        <?php
                                        if ($d["status_id"] == 0) {
                                            echo "Inactive";
                                        } else {
                                            echo "Active";
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <!-- table -->

            </div>

            <!-- button -->
            <div class="container justify-content-end d-flex mt-5 mb-5">
                <button id="printbtn" class="btn btn-outline-danger col-6 col-md-2" onclick="printpage();">Print</button>
            </div>

            <!-- button -->

        </div>

        <!-- Footer -->
        <div class="fixed-bottom col-12 bg-dark text-light py-2">
            <p class="text-center mb-0">2025 gripstore.lk || All Right Reserved &copy;</p>
        </div>
        <!-- Footer -->

        <script src="script.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>

    </html>

<?php
} else {
    include "admin_error.php";
}
?>