<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">

<!-- Back Button -->
<div class="container my-3">
    <a href="index.html" class="btn btn-secondary">Back to Home</a>
</div>

<div class="container my-5">
    <h2>Order Details</h2>
    <div class="row">
        <!-- Product List -->
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5>Your Cart</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Hoodie
                            <span class="badge bg-primary rounded-pill">$30</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            T-shirt
                            <span class="badge bg-primary rounded-pill">$15</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Shoes
                            <span class="badge bg-primary rounded-pill">$50</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Order Form -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h5>Shipping Information</h5>
                </div>
                <div class="card-body">
                    <form>
                        <!-- Full Name -->
                        <div class="mb-3">
                            <label for="fullName" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="fullName" placeholder="Enter Full Name">
                        </div>

                        <!-- Address -->
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control" id="address" placeholder="Enter Address">
                        </div>

                        <!-- City -->
                        <div class="mb-3">
                            <label for="city" class="form-label">City</label>
                            <input type="text" class="form-control" id="city" placeholder="Enter City">
                        </div>

                        <!-- Postal Code -->
                        <div class="mb-3">
                            <label for="postalCode" class="form-label">Postal Code</label>
                            <input type="text" class="form-control" id="postalCode" placeholder="Enter Postal Code">
                        </div>

                        <!-- Payment Info -->
                        <div class="mb-3">
                            <label for="payment" class="form-label">Payment Method</label>
                            <select class="form-select" id="payment">
                                <option value="creditCard">Credit Card</option>
                                <option value="paypal">PayPal</option>
                                <option value="bankTransfer">Bank Transfer</option>
                            </select>
                        </div>

                        <!-- Total Price -->
                        <div class="mb-3">
                            <label for="totalPrice" class="form-label">Total Price</label>
                            <input type="text" class="form-control" id="totalPrice" value="$95" disabled>
                        </div>

                        <!-- Order Button -->
                        <button type="submit" class="btn btn-success w-100">Place Order</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
