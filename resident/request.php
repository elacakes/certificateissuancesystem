<?php
session_start();
include '../conn.php';
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.css">
    <title>Request Certificate</title>
    <style>
        body {
            background-color: #f0f9ff;
            /* Light pastel blue background */
            font-family: Arial, sans-serif;
        }

        .container {
            background-color: #fff;
            /* White background for the form card */
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            /* Soft shadow for card */
            padding: 20px;
            border-radius: 10px;
            /* Rounded corners */
            margin-top: 50px;
        }

        @media (min-width: 768px) {
            .container {
                max-width: 600px;
                /* Full width on smaller devices, constrained on larger ones */
            }
        }

        .header h4 {
            color: #007bff;
            /* Blue for the form heading */
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-secondary {
            background-color: #6c757d;
            border: none;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
        }

        label {
            color: #333;
            /* Darker label color */
        }

        .form-control {
            border-radius: 5px;
        }
    </style>
</head>

<body>

    <div class="container py-5">
    <?php
                if (isset($_SESSION['status'])) {
                ?>
                    <div class="alert alert-success">
                        <b><?= $_SESSION['status']; ?></b>
                    </div>
                <?php
                    unset($_SESSION['status']);
                }
                ?>
        <div class="card">
            <div class="header">
                <h4 class="text-center text-dark">Request Certificate</h4>
                <div class="card-body">
                    <a href="dashboard.php" class="btn mb-3" style="background-color: #a7c6ed; border-color: #a7c6ed;">
                        <i class="bi bi-arrow-left"></i> Back to Dashboard
                    </a>
                    <form action="action.php" method="POST">
                        <div class="form-floating mb-3 mt-2">
                            <input type="name" name="name" class="form-control" placeholder="Full Name" required>
                            <label for="name">Full Name</label>
                        </div>
                        <div class="form-group mb-3">
                            <label for="certificate" class="form-label"><b>Select Certificate Type</b></label>
                            <select class="form-select" name="certificate" id="certificate" required>
                                <option hidden>--Please Select--</option>
                                <option value="clearance">Barangay Clearance</option>
                                <option value="indigency">Barangay Indigency</option>
                                <option value="residency">Barangay Residency</option>
                                <option value="birth_cert">Birth Certificate</option>
                            </select>
                        </div>
                        <div class="form-floating mb-3 mt-2">
                            <input type="text" name="purpose" class="form-control" placeholder="Purpose" required>
                            <label for="purpose">Purpose</label>
                        </div>
                        <div class="form-floating mb-3 mt-2">
                            <input type="datetime-local" name="pickup_datetime" class="form-control" placeholder="Pick-Up Date and Time" required>
                            <label for="pickup_datetime">Pick-Up Date and Time</label>
                        </div>
                        <div class="form-group mb-3 text-center">
                            <button type="submit" name="send" class="btn btn-primary">Submit Request</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and Icons -->
    <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>