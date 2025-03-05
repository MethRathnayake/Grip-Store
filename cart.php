<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-3 mt-md-5">
        <h1 class="mb-4 mb-md-5 text-center text-md-start">Shopping Cart</h1>

        <div class="row mb-4 g-4">
            <!-- Cart Items -->
            <div class="col-12 col-md-8">
                <!-- Item 1 -->
                <div class="border p-3 rounded d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-3">
                    <div class="d-flex flex-column flex-md-row align-items-center mb-3 mb-md-0">
                        <img src="ProductImg\678407b14d4f9.png" style="height: 150px; max-width: 100%;" alt="Nomad Tumbler White" class="img-fluid me-md-3">
                        <div class="text-center text-md-start">
                            <h5 class="mb-1">Nomad Tumbler</h5>
                            <p class="mb-0">White | New | Brand</p>
                        </div>
                    </div>
                    <div class="d-flex flex-wrap justify-content-center justify-content-md-end align-items-center gap-2">
                        <div class="d-flex align-items-center">
                            <button class="btn btn-outline-secondary btn-sm">-</button>
                            <input type="number" class="form-control form-control-sm text-center mx-2" style="width: 60px;" value="1">
                            <button class="btn btn-outline-secondary btn-sm">+</button>
                        </div>
                        <button class="btn btn-danger btn-sm">X</button>
                        <p class="mb-0 fs-5 fw-bold">LKR 35.00</p>
                    </div>
                </div>
            </div>

            <!-- Order Summary -->
            <div class="col-12 col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Order Summary</h5>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Subtotal</span>
                            <span>$99.00</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Shipping estimate</span>
                            <span>$5.00</span>
                        </div>
                        <div class="d-flex justify-content-between mb-3">
                            <span>Tax estimate</span>
                            <span>$8.32</span>
                        </div>
                        <div class="d-flex justify-content-between fw-bold mb-4">
                            <span>Order total</span>
                            <span>$112.32</span>
                        </div>
                        <button class="btn btn-primary w-100">Checkout</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>