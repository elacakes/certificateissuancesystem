<?php
session_start();
include "../conn.php";
include "../assets/function.php";

if (!isset($_SESSION['user_id'])) {
    header('Location: ../pages/login.php');
    exit();
}

if ($_SESSION['role'] == 'admin') {
    header('Location: ../pages/login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../src/main.css">
    <link rel="stylesheet" href="../src/resident.css">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="../img/puncan logo.png">
    <title>Resident Dashboard</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg shadow sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="../img/puncan logo.png" alt="Brand" class="img-fluid" style="height: 90px; width:auto;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
                aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="notification.php">
                            <i class="bi bi-bell" style="font-size: 1.5rem;"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../logout.php" style="font-weight: 600;">
                            Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="container mt-5">
        <div class="row">
            <div class="col-12 col-md-4 mb-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body text-center">
                        <i class="bi bi-file-earmark-text" style="font-size: 2rem; color: #007bff;"></i>
                        <h5 class="card-title mt-3">Request Certificate</h5>
                        <p class="card-text">Apply for a new barangay certificate easily.</p>
                        <a href="request.php" class="btn btn-primary">Request Now</a>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-4 mb-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body text-center">
                        <i class="bi bi-clock-history" style="font-size: 2rem; color: #28a745;"></i>
                        <h5 class="card-title mt-3">History</h5>
                        <p class="card-text">View your previous certificate requests.</p>
                        <a href="history.php" class="btn btn-success">View History</a>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-4 mb-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body text-center">
                        <i class="bi bi-gear" style="font-size: 2rem; color: #ffc107;"></i>
                        <h5 class="card-title mt-3">Account Settings</h5>
                        <p class="card-text">Update your personal information.</p>
                        <a href="settings.php" class="btn btn-warning">Go to Settings</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-light text-center py-3 mt-5">
        <div class="container">
            <p class="mb-0">Barangay Certificate Issuance System &copy; 2024. All rights reserved.</p>
        </div>
    </footer>

    <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>