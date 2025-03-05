<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top shadow-sm">
    <div class="container-fluid">
        <!-- Brand Section -->
        <a class="navbar-brand fw-bold d-flex align-items-center fs-5" href="adminDashboard.php">
            <img src="Resorces/icon.ico" height="40px" alt="">
            <span class="ms-2">Grip Technologies | Admin</span>
        </a>
        <!-- Toggler -->
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Nav Items -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto text-center">
                <li class="nav-item mx-2">
                    <a class="nav-link fw-semibold fs-6" aria-current="page" href="adminDashboard.php">
                        <i class="fa-solid fa-chart-line"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link fw-semibold fs-6" href="adminUser.php">
                        <i class="fa-solid fa-user"></i> User Management
                    </a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link fw-semibold fs-6" href="adminProduct.php">
                        <i class="fa-solid fa-box"></i> Product Management
                    </a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link fw-semibold fs-6" href="adminStock.php">
                        <i class="fa-solid fa-warehouse"></i> Stock Management
                    </a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link fw-semibold fs-6" href="adminReport.php">
                        <i class="fa-solid fa-file-alt"></i> Reports
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <!-- <li class="nav-item mx-2">
                    <a class="nav-link fw-semibold fs-6" href="profile.php">
                        <i class="fa-solid fa-user-circle"></i> Profile
                    </a>
                </li> -->
                <li class="nav-item mx-2">
                    <a class="nav-link text-danger fw-bold fs-6" href="logout.php">
                        <i class="fa-solid fa-sign-out-alt"></i> Logout
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
