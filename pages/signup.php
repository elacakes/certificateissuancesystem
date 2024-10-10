<?php
session_start();
include "../conn.php";
include "includes/header.php";
include "../assets/function.php";
?>
<div class="container" id="formContainer" style="margin-bottom:5rem;">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8 col-sm-10">
            <div class="p-4 shadow position-relative">
                <button type="button" class="btn-close position-absolute top-0 end-0 mt-2 me-2" aria-label="Close" id="closeFormBtn" onclick="window.location.href='index.php';"></button>
                <form action="action.php" method="POST">
                    <?php
                    if (isset($_SESSION['status'])) {
                    ?>
                        <div class="alert alert-success">
                            <p><?= $_SESSION['status']; ?></p>
                        </div>
                    <?php
                        unset($_SESSION['status']);
                    }
                    ?>
                    <h3 class="text-center fw-bold">Create New Account</h3>
                    <div>
                        <p class="text-muted mb-0">
                            &nbsp;&nbsp;Already have an account? <a href="login.php" class="text-decoration-none fw-bold">Sign In</a>
                        </p>
                    </div>
                    <div class="form-floating mb-3 mt-1">
                        <input type="text" name="name" class="form-control" placeholder="Full Name" required>
                        <label for="name">Full Name <sup>*</sup></label>
                    </div>
                    <div class="form-floating mb-3 mt-1">
                        <input type="email" name="email" class="form-control" placeholder="Email Address" required>
                        <label for="email">Email Address <sup>*</sup></label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                        <label for="password">Password <sup>*</sup></label>
                    </div>
                    <div class="mb-3">
                        <button type="submit" name="submit_user" class="btn btn-primary w-100 fw-bold">Sign Up</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include "includes/footer.php"; ?>