<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment History</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2 class="mb-4">Your Payment History</h2>

    <!-- Table to display payment history -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Payment ID</th>
                <th scope="col">Order ID</th>
                <th scope="col">Amount</th>
                <th scope="col">Payment Status</th>
                <th scope="col">Payment Date</th>
            </tr>
        </thead>
        <tbody>
            <tr onclick="window.location='invoice.php?order_id=12345';" style="cursor: pointer;">
                <td>12345</td>
                <td>Credit Card</td>
                <td>$120.50</td>
                <td><span class="badge bg-success">Completed</span></td>
                <td>2025-03-15 14:23:10</td>
            </tr>
            <tr onclick="window.location='invoice.php?order_id=12346';" style="cursor: pointer;">
                <td>12346</td>
                <td>PayPal</td>
                <td>$75.30</td>
                <td><span class="badge bg-warning">Pending</span></td>
                <td>2025-03-14 11:05:02</td>
            </tr>
            <tr onclick="window.location='invoice.php?order_id=12347';" style="cursor: pointer;">
                <td>12347</td>
                <td>Bank Transfer</td>
                <td>$50.00</td>
                <td><span class="badge bg-danger">Failed</span></td>
                <td>2025-03-13 09:18:45</td>
            </tr>
            <tr onclick="window.location='invoice.php?order_id=12348';" style="cursor: pointer;">
                <td>12348</td>
                <td>Credit Card</td>
                <td>$200.00</td>
                <td><span class="badge bg-success">Completed</span></td>
                <td>2025-03-12 16:43:25</td>
            </tr>
            <!-- Add more rows as needed -->
        </tbody>
    </table>
</div>

<!-- Optional: Include Bootstrap JS and Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
