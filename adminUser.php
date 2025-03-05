<?php
session_start();
if (isset($_SESSION["a"])) {
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
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">




    </head>

    <body class="adminUser" onload="loadUsers();">

        <!-- header -->
        <?php include "adminNavBar.php"; ?>
        <!-- header -->

        <!-- body -->
        <div class="col-10">
            <div class="container mt-4">
                <div class="card">

                    <!-- chnage btn -->
                    <div class="card-header text-center fs-4">User Management
                        <div class="row justify-content-end align-items-center">
                            <div class="col-lg-2 col-md-4 col-sm-6 mb-2">
                                <input type="number" placeholder="User ID" class="form-control" id="statusId">
                            </div>

                            <div class="col-lg-2 col-md-3 col-sm-6 mb-2">
                                <button class="btn btn-outline-danger" onclick="changeStatus();">change Status</button>
                            </div>

                            <p class="row justify-content-end align-items-center fw-bold text-danger" id="alert"></p>
                        </div>
                    </div>

                    <!-- table -->
                    <div class="card-body ">
                        <table class="table table-bordered text-center">
                            <thead class="table-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Mobile</th>
                                    <th>Email</th>
                                    <th>Username</th>
                                    <th>Joined Date</th>
                                    <th>User Status</th>


                                </tr>
                            </thead>

                            <tbody id="td">
                               
                            </tbody>
                        </table>
                    </div>
                    <!-- table -->
                </div>


            </div>
        </div>
        <!-- body -->
        <!-- footer -->
        <div class="fixed-bottom col-12 bg-dark text-light py-2">
        <p class="text-center mb-0">2025 gripstore.lk  || All Right Reserved &copy;</p>
    </div>
        <!-- footer -->


    <script src="script.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    </body>

    </html>

<?php
}else {
    include "admin_error.php";
}

?>