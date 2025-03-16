<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Required</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        .logo {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
        }
    </style>
</head>



<body class="d-flex justify-content-center align-items-center vh-100 bg-light">
    <div class="container text-center p-4 bg-white shadow rounded">
        <img src="Resorces/icon.ico" alt="Logo" class="mb-3 img-fluid logo">
        <h2 class="mb-3">Login Required</h2>
        <p class="mb-3">You need to log in to access your Watchlist, Profile, and Orders.</p>
        <a href="login.php" class="btn btn-primary">Login Now</a>
        <a href="index.php" class="btn btn-primary">Home page</a>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
