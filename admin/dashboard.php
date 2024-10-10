<?php
include "../conn.php";
include "includes/header.php";
include "includes/sidebar.php";


?>

<div class="col-md-10">
    <nav class="navbar">
        <h4>Dashboard</h4>
    </nav>

    <div class="container content-wrapper">
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="dashboard-card shadow">
                    <i class="bi bi-people-fill"></i>
                    <h5>Total Residents</h5>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="dashboard-card shadow">
                    <i class="bi bi-house-door-fill"></i>
                    <h5>Total Requests</h5>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="dashboard-card shadow">
                    <i class="bi bi-file-earmark-text-fill"></i>
                    <h5>Printed Certificates</h5>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="dashboard-card shadow">
                    <i class="bi bi-file-earmark-text-fill"></i>
                    <h5>Approved Requests</h5>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="dashboard-card shadow">
                    <i class="bi bi-file-earmark-text-fill"></i>
                    <h5>Disapproved Requests</h5>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="dashboard-card shadow">
                    <i class="bi bi-file-earmark-text-fill"></i>
                    <h5>Pending Requests</h5>
                </div>
            </div>
        </div>

    </div>
</div>
<?php include "includes/footer.php"; ?>