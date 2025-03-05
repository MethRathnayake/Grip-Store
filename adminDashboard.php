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

        <h1>Dashboard</h1>

        <!-- body -->

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