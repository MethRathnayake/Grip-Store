<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile - E-commerce</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    </head>
<body class="bg-light">

<div class="container my-5">
    <div class="row">
        <!-- Profile Picture Column -->
        <div class="col-md-4 text-center">
            <img src="Resorces/hoodie.png" height="200px" class="rounded-circle mb-3" alt="Profile Photo">
            <h4>Meth Rathnayake</h4>
            <p class="text-muted">Username: meth.rathnayake</p>
        </div>

        <!-- Form Column -->
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5>Edit Profile</h5>
                </div>
                <div class="card-body">
                    <form>
                        <!-- First Name & Last Name -->
                        <div class="row mb-3">
                            <div class="col">
                                <label for="firstName" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="firstName" placeholder="Enter First Name">
                            </div>
                            <div class="col">
                                <label for="lastName" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="lastName" placeholder="Enter Last Name">
                            </div>
                        </div>

                        <!-- Username -->
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" placeholder="Enter Username">
                        </div>

                        <!-- Mobile -->
                        <div class="mb-3">
                            <label for="mobile" class="form-label">Mobile</label>
                            <input type="text" class="form-control" id="mobile" placeholder="Enter Mobile Number">
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Enter Email">
                        </div>

                        <!-- Password & Confirm Password -->
                        <div class="row mb-3">
                            <div class="col">
                                <label for="password" class="form-label">Password</label>
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
                                <input type="text" class="form-control" id="address" placeholder="Enter Address">
                            </div>
                            </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label for="city" class="form-label">City</label>
                                <input type="text" class="form-control" id="city" placeholder="Enter City">
                            </div>
                            <div class="col">
                                <label for="postalCode" class="form-label">Postal Code</label>
                                <input type="text" class="form-control" id="postalCode" placeholder="Enter Postal Code">
                            </div>
                            </div>
                       

                        

                        <!-- Save Button -->
                        <button type="submit" class="btn btn-primary mt-2">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="script.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
