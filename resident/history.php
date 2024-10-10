<?php
session_start();
include '../conn.php';

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
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.css">
    <title>History</title>
    <style>
        body {
            background-color: #f0f9ff;
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 800px;
            background-color: #fff;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            border-radius: 10px;
            margin-top: 50px;
        }

        .header h4 {
            color: #007bff;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .log-entry {
            border-left: 4px solid #007bff;
            background-color: #e7f1ff;
            padding: 10px 20px;
            border-radius: 5px;
            margin-bottom: 15px;
        }

        .log-entry h6 {
            margin: 0;
            color: #007bff;
        }

        .log-entry p {
            margin: 0;
        }

        .log-date {
            font-size: 0.9rem;
            color: #888;
        }

        .table {
            margin-top: 20px;
        }

        .table th, .table td {
            vertical-align: middle;
        }

    </style>
</head>

<body>

<div class="container py-5">
    <div class="header">
        <h4 class="text-center">History of Requests and Updates</h4>
        <div class="card-body">
            <a href="dashboard.php" class="btn btn-primary mb-3">
                <i class="bi bi-arrow-left"></i> Back to Dashboard
            </a>

            <!-- Log Entries from Database -->
            <?php if ($result && $result->num_rows > 0): ?>
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Certificate</th>
                            <th>Request Date</th>
                            <th>Purpose</th>
                            <th>Status</th>
                            <th>Updated At</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?= $row['certificate']; ?></td>
                                <td><?= $row['request_date']; ?></td>
                                <td><?= $row['purpose']; ?></td>
                                <td><?= $row['status']; ?></td>
                                <td><?= $row['updated_at']; ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <div class="log-entry">
                    <h6>No Request History</h6>
                    <p>You don't have any request or update history yet.</p>
                </div>
            <?php endif; ?>

            <?php $conn->close(); ?>
        </div>
    </div>
</div>

<!-- Bootstrap JS and Icons -->
<script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
