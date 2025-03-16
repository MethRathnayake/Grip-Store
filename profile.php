<?php
session_start();
if (isset($_SESSION["u"])) {
?>

<?php

include "connection.php";

//catch the login user from session data
$user = $_SESSION["u"];



$q = " SELECT * FROM `user` WHERE `id` = '" . $user["id"] . "' ";

$rs = Database::search($q);

$d = $rs->fetch_assoc();



?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile - GripStore</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body class="bg-light">

    <!-- Back Button -->
    <div class="container my-3">
        <a href="index.php" class="btn btn-secondary">Back to Home</a>
    </div>

    <div class="container my-5">
        <div class="row">
            <!-- Profile Picture Column -->
            <div class="col-md-4 text-center">
                <img src="<?php
                            if ($d["pro_path"] == null) {
                                echo "Resorces/pro_pic.webp";
                            } else {
                                echo $d["pro_path"];
                            }
                            ?>" height="200px" width="200px" class="rounded-circle mb-3" alt="Profile Photo">

                <h4><?php echo $d["name"] ?> <?php echo $d["last_name"] ?></h4>
                <p class="text-muted">Username: <?php echo $d["username"] ?></p>

                <!-- Change Profile Picture -->
                <span class="mt-3 d-block">Change Profile Picture:</span>
                <label for="file-input" class="btn btn-outline-secondary mt-2" style="cursor: pointer;">Choose File</label>
                <input type="file" id="file-input" class="form-control mt-2" style="display: none;" /><br>
                <div class="col-12 text-danger">
                    <p><strong>Note:</strong> Click Save Chnages after Upload the Photo.</p>
                </div>
            </div>


            <!-- Form Column -->
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5>Edit Profile</h5>
                    </div>
                    <div class="card-body">

                        <!-- First Name & Last Name -->
                        <div class="row mb-3">
                            <div class="col">
                                <label for="firstName" class="form-label">First Name</label>
                                <input type="text" class="form-control" value="<?php echo $d["name"] ?>" id="firstName" placeholder="Enter First Name">
                            </div>
                            <div class="col">
                                <label for="lastName" class="form-label">Last Name</label>
                                <input type="text" class="form-control" value="<?php echo $d["last_name"] ?>" id="lastName" placeholder="Enter Last Name">
                            </div>
                        </div>

                        <!-- Username -->
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" value="<?php echo $d["username"] ?>" id="username" placeholder="Enter Username">
                        </div>

                        <!-- Mobile -->
                        <div class="mb-3">
                            <label for="mobile" class="form-label">Mobile</label>
                            <input type="text" class="form-control" value="<?php echo $d["mobile"] ?>" id="mobile" placeholder="Enter Mobile Number">
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" value="<?php echo $d["email"] ?>" placeholder="Enter Email" disabled>
                        </div>

                        <!-- Password & Confirm Password -->
                        <div class="row mb-3">
                            <div class="col-12 text-danger">
                                <small><strong>Note:</strong> If you want to change your password, please enter a new one below.</small>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <label for="password" class="form-label">New Password</label>
                                <input type="password" class="form-control" id="password" placeholder="Enter Password">
                            </div>
                            <div class="col">
                                <label for="confirmPassword" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" id="confirmPassword" placeholder="Confirm Password">
                            </div>
                        </div>

                        <!-- Address -->
                        <div class="row mb-3">
                            <div class="col-12">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" class="form-control" value="<?php echo $d["address"] ?>" id="address" placeholder="Enter Address">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <label for="city" class="form-label">City</label>
                                <input type="text" class="form-control" value="<?php echo $d["city"] ?>" id="city" placeholder="Enter City">
                            </div>
                            <div class="col">
                                <label for="postalCode" class="form-label">Postal Code</label>
                                <input type="text" class="form-control" value="<?php echo $d["postal_code"] ?>" id="postalCode" placeholder="Enter Postal Code">
                            </div>
                        </div>
                        <!-- alert -->
                        <div class="d-none" id="alertDiv">
                            <div class="alert alert-danger" id="msgDiv"></div>
                        </div>

                        <!-- Save Button -->
                        <button class="btn btn-primary mt-2" onclick="updateProfile();">Save Changes</button>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>

<?php
}else{
    include "loginalert.php";
}


?>